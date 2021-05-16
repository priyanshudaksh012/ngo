let allclients = [];
class Client{
    clientid
    roomid
    clientname
    clienttype

    cameravideo
    cameraaudio
    capturevideo
    videobox

    constructor(clientid,roomid,clientname,clienttype){
        this.clientid = clientid;
        this.roomid = roomid;
        this.clientname = clientname;
        this.clienttype = clienttype;
    }
}

//------------------------------ADMIN FORCE AUDIO---------------------

function adminforcevideo(data,join){
    forcevideo = data;
    if( forcevideo ){
        buttonOff(document.querySelector('.app__system--button.video'));
        //--------------------DISABLE THE AUDIO WHEN ADMIN DOES NOT ALLOW
        if( capturestream == null || capturestream == undefined ){
            camerastream.getVideoTracks()[0].enabled = false;
            //-------------------CREATE NEW PRODUCER-------------------------------------------
            if(mediasouproom == null || mediasouproom == undefined){
                sendData({
                    type: 'update_video',
                    cameravideo: false,
                    capturevideo: false
                })
                return;
            }
            removeOldVideoProducers();
            let videoProducer = mediasouproom.createProducer(camerastream.getVideoTracks()[0]);
            videoProducer.send(sendTransport);
            sendData({
                type: 'update_video',
                cameravideo: false,
                capturevideo: false
            })
        }else{
            capturestream.getVideoTracks()[0].enabled = false;
            //-------------------CREATE NEW PRODUCER-------------------------------------------
            if(mediasouproom == null || mediasouproom == undefined){
                sendData({
                    type: 'update_video',
                    cameravideo: false,
                    capturevideo: false
                })
                return;
            }
            removeOldVideoProducers();
            let videoProducer = mediasouproom.createProducer(capturestream.getVideoTracks()[0]);
            videoProducer.send(sendTransport);
            sendData({
                type: 'update_video',
                cameravideo: false,
                capturevideo: false
            })
        }
    }else{
        if(join)
            return;
        //--------------------ENABLE THE AUDIO WHEN ADMIN ALLOW IT-------
        //-----------------------SCREEN CAST HERE---------------------
        if( capturestream != null ){
            capturevideo = true;
            screencast();
        }else{
            capturevideo = false;
            capturestream = null;
            camerastream.getVideoTracks()[0].enabled = cameravideo;
            if( cameravideo ){
                buttonOn(document.querySelector('.app__system--button.video'));
            }else{
                buttonOff(document.querySelector('.app__system--button.video'));
            }
            document.getElementById('localvideo').srcObject = camerastream;
            //-------------------CREATE NEW PRODUCER-------------------------------------------
            removeOldVideoProducers();
            let videoProducer = mediasouproom.createProducer(camerastream.getVideoTracks()[0]);
            videoProducer.send(sendTransport);
            updatevideo();
        }
    }
}

//------------------------------ADMIN FORCE VIDEO---------------------

function adminforceaudio(data,join){
    //debugger;
    forceaudio = data;
    if( forceaudio ){
        buttonOff(document.querySelector('.app__system--button.mic'));
        //--------------------DISABLE THE AUDIO WHEN ADMIN DOES NOT ALLOW
        camerastream.getAudioTracks()[0].enabled = false;
        //-------------------CREATE NEW PRODUCER-------------------------------------------
        if(mediasouproom == null || mediasouproom == undefined){
            sendData({
                type: 'update_audio',
                cameraaudio: false
            })
            return;
        }
        removeOldAudioProducers();
        let audioProducer = mediasouproom.createProducer(camerastream.getAudioTracks()[0]);
        audioProducer.send(sendTransport);
        sendData({
            type: 'update_audio',
            cameraaudio: false
        })
    }else{
        if(join)
            return;
        //--------------------ENABLE THE AUDIO WHEN ADMIN ALLOW IT-------
        if( cameraaudio ){
            buttonOn(document.querySelector('.app__system--button.mic'));
        }else{
            buttonOff(document.querySelector('.app__system--button.mic'));
        }
        camerastream.getAudioTracks()[0].enabled = cameraaudio;
        //-------------------CREATE NEW PRODUCER-------------------------------------------
        removeOldAudioProducers();
        let audioProducer = mediasouproom.createProducer(camerastream.getAudioTracks()[0]);
        audioProducer.send(sendTransport);
        updateaudio();
    }
}

//------------------------------Add Client----------------------------

function addclient(data){
    if( data.clientid == userid )
        return;
    let client = new Client(data.clientid,data.roomid,data.clientname,data.clienttype);
    allclients.push(client);
    client.videobox = addvideo(client.clientid,client.clientname,'camera').parentElement;
    client.cameraaudio = data.cameraaudio;
    client.cameravideo = data.cameravideo;
    client.capturevideo = data.capturevideo;
    if( client.cameraaudio == false ){
        client.videobox.querySelector('.videobox__icon.audio').classList.add('off');
        buttonOff(client.videobox.querySelector('.videobox__icon.audio'));
    }
    if( client.cameravideo == false ){
        if( client.capturevideo == false ){
            buttonOff(client.videobox.querySelector('.videobox__icon.video'));
        }
    }
    //--------------------IF ADDED CLIENT IS ADMIN--------------------
    if( usertype != 'admin' ){
        if( !forcevideo )
            adminforcevideo(data.forcevideo,true);
        if( !forceaudio )
            adminforceaudio(data.forceaudio,true);
    }
    //-------------------IF ADMIN REJOIN THE ROOM----------------------
    if( usertype == 'admin'){
        if(data.forcevideo == true )
            document.querySelector('.options__option.mutevideos').classList.add('select');
        if(data.forceaudio == true)
            document.querySelector('.options__option.muteaudios').classList.add('select');
    }
    createtoast(client.clientname+' just joined');
}

//-----------------------------Find client by id----------------------

function findclientbyid(clientid){
    for( let i = 0 ; i < allclients.length ; i++ ){
        if( allclients[i].clientid == clientid )
            return allclients[i];
    }
    return null;
}

//-----------------------------Remove Peer----------------------------

function removepeer(clientid){
    let peer = mediasouproom.getPeerByName(clientid+'');
    peer.close();
}

//-----------------------------Client Disconnected--------------------

function clientdisconnected(data){
    let tempclients = [];
    let client;
    for( let i = 0 ; i < allclients.length ; i++ ){
        if( allclients[i].clientid != data.clientid ){
            tempclients.push(allclients[i]);
        }else{
            client = allclients[i];
        }
    }
    if(client == null)
        return;
    removevideobox(data.clientid);
    removepeer(data.clientid);
    allclients = [];
    allclients = tempclients;
}

//-----------------------------Send Camera Buffer---------------------
let MScallback;
let MSerrorback;

let callbackstack = [];

let mediasouproom;
let mediasouprequest;
let sendTransport;
let recvTransport;

function sendcamerabuffer(){
    mediasouproom = new mediasoupClient.Room();
    mediasouproom.on( 'request', (request,callback, errback) => {
        mediasouprequest = request;
        if( request.method == 'queryRoom' || request.method == 'join' ){
            sendData({
                type: 'mediasoup-request',
                request: request
            })
            MScallback = callback;
            MSerrorback = errback;
        }else{
            let TScallback = callback;
            let TSerrorback = errback;
            let temp = {
                TScallback,
                TSerrorback
            }
            callbackstack.push(temp);
            sendData({
                type: 'mediasoup-request',
                request: request,
                stack: callbackstack.length-1
            })
        }
    });
    let user = {
        userid: userid,
        username: username,
        usertype: usertype
    }
    //---------------------JOIN MEDIASOUP ROOM----------------------------------
    mediasouproom.join(userid+'',user)
    .then( (peers) => {
        // Getting all peers from the room
        // Create the Transport for sending our media.
        sendTransport = mediasouproom.createTransport('send');
        // Create the Transport for receiving media from remote Peers.
        recvTransport = mediasouproom.createTransport('recv');
        peers.forEach(peer => handleMediasoupPeer(peer));
    })
    .then( () => {
        //let audioTrack = camerastream.getAudioTracks()[0];
        //let videoTrack = camerastream.getVideoTracks()[0];

        // Create Producers for audio and video.
        if(forcevideo){
            camerastream.getVideoTracks()[0].enabled = false;
            buttonOff(document.querySelector('.app__system--button.video'));
        }
        if(forceaudio){
            camerastream.getAudioTracks()[0].enabled = false;
            buttonOff(document.querySelector('.app__system--button.mic'));
        }
        let audioProducer = mediasouproom.createProducer(camerastream.getAudioTracks()[0]);
        let videoProducer = mediasouproom.createProducer(camerastream.getVideoTracks()[0]);

        // Send our audio.
        audioProducer.send(sendTransport);
        // Send our video.
        videoProducer.send(sendTransport);
    })

    mediasouproom.on('newpeer',(peer) => {
        console.log("Handle New Peer :" +peer.name);
        handleMediasoupPeer(peer);
    })

    mediasouproom.on('notify',(notification) => {
        //console.log(notification);
        sendData({
            type: 'mediasoup-notification',
            notification: notification
        })
    })

}


//----------------------QUERY ROOM RESPONSE---------------------------

function queryRoomResponse(data){
    MScallback(data.response);
}

//----------------------JOIN RESPONSE--------------------------------

function joinResponse(data){
    MScallback(data.response);
}

//---------------------DEFAULT RESPONSE-----------------------------

function defaultResponse(data){
    if(data.result == 'response'){
        if(data.response)
            callbackstack[parseInt(data.stack)].TScallback(data.response);
        else
            callbackstack[parseInt(data.stack)].TScallback(null);
    }else{
        if(data.error){
            callbackstack[parseInt(data.stack)].TSerrorback(data.error);
        }
        else
            callbackstack[parseInt(data.stack)].TSerrorback(null);
    }
    
}

function handleNotification(data){
    mediasouproom.receiveNotification(data.notification);
}


//-------------------------------------------REMOVE OLD VIDEO PRODUCERS------------------------------------------------

function removeOldVideoProducers(){
    if(mediasouproom == null || mediasouproom == undefined || mediasouproom.producers.length < 0)
        return;
    let producers = mediasouproom.producers;
    Array.from(producers).forEach( (producer) => {
        if( producer.track.kind == 'video' ){
            producer.close();
        }
    } );
}

//------------------------------------------REMOVE OLD AUDIO PRODUCERS------------------------------------------------

function removeOldAudioProducers(){
    if(mediasouproom == null || mediasouproom == undefined || mediasouproom.producers.length < 0)
        return;
    let producers = mediasouproom.producers;
    Array.from(producers).forEach( (producer) => {
        if( producer.track.kind == 'audio' ){
            producer.close();
        }
    } );
}

//------------------------------------------"UPDATE VIDEO"------------------------------------------------------------

function updatevideo(){
    sendData({
        type: 'update_video',
        cameravideo: cameravideo,
        capturevideo: capturevideo
    })
}

//--------------------------------------------"UPDATE AUDIO"----------------------------------------------------------

function updateaudio(){
    sendData({
        type: 'update_audio',
        cameraaudio: cameraaudio
    })
}

//--------------------------------------------------VIDEO UPDATE BY CLIENT--------------------------------------------

function videoupdate(data){
    let client = findclientbyid(data.clientid);
    if(client.clientid == userid || client == null)
        return;
    let videobox = client.videobox;
    client.capturevideo = data.capturevideo;
    client.cameravideo = data.cameravideo;
    if( client.cameravideo == false ){
        if( client.capturevideo == false ){
            buttonOff(videobox.querySelector('.videobox__icon.video'));
        }else{
            buttonOn(videobox.querySelector('.videobox__icon.video'));
        }
    }else{
        buttonOn(videobox.querySelector('.videobox__icon.video'));
    }
}

//---------------------------------------------------AUDIO UPDATE BY CLIENT--------------------------------------------

function audioupdate(data){
    let client = findclientbyid(data.clientid);
    if(client.clientid == userid || client == null)
        return;
    let videobox = client.videobox;
    client.cameraaudio = data.cameraaudio;
    if(client.cameraaudio == false){
        buttonOff(videobox.querySelector('.videobox__icon.audio'));
    }else{
        buttonOn(videobox.querySelector('.videobox__icon.audio'));
    }
}

//---------------------------------------------------MANIPULATE AUDIO BY ADMIN------------------------------------------

function manipulateaudio(){
    if(cameraaudio){
        cameraaudio = !cameraaudio;
        buttonOff(document.querySelector('.app__system--button.mic'));
        camerastream.getAudioTracks()[0].enabled = cameraaudio;
        //-------------------CREATE NEW PRODUCER-------------------------------------------
        removeOldAudioProducers();
        let audioProducer = mediasouproom.createProducer(camerastream.getAudioTracks()[0]);
        audioProducer.send(sendTransport);
        updateaudio();
    }
}

//----------------------------------------------------MANIPULATE VIDEO BY ADMIN------------------------------------------

function manipulatevideo(){
    if( cameravideo || capturevideo ){
        cameravideo = false;
        capturevideo = false;
        capturestream = null;
        buttonOff(document.querySelector('.app__system--button.video'));
        camerastream.getVideoTracks()[0].enabled = cameravideo;
        document.getElementById('localvideo').srcObject = camerastream;
        //-------------------CREATE NEW PRODUCER-------------------------------------------
        removeOldVideoProducers();
        let videoProducer = mediasouproom.createProducer(camerastream.getVideoTracks()[0]);
        videoProducer.send(sendTransport);
        updatevideo();
    }
}


//------------------------------------STREAM OVER BY ADMIN-----------------------------------

function streamover(){
    mediasouproom = null;
    createtoast('u have been kicked out by ADMIN');
    showfeedbackscreen();
    //window.location.href = window.location.origin;
}

//------------------------------------ROOM OVER BY ADMIN-------------------------------------

function roomover(){
    createtoast('u have been kicked out by ADMIN');
    showfeedbackscreen();
    //window.location.href = window.location.origin;
}

//------------------------------------CALL OVER BY CLIENT------------------------------------


function callover(){
    createtoast('u have been kicked out by yourself');
    showfeedbackscreen();
    //window.location.href = window.location.origin;
}

//---------------------------------------ROOM DUPLICASY-----------------------------------------------

function roomduplicasy(){
    createtoast('room duplicasy arrives');
    showfeedbackscreen();
}

//---------------------------------------PASSWORD NOT MATCHED-------------------------------------

function passworderror(){
    createtoast('password not matched');
    showfeedbackscreen();
}

//------------------------------FORCE VIDEO DISABLE----------------------

function forcevideodeactive(){
    if( usertype != 'admin' ){
        buttonOff(document.querySelector('.app__system--button.video'));
        adminforcevideo(true,false);
    }
}

//---------------------------FORCE VIDEO ENABLE--------------------------

function forcevideoactive(){
    if( usertype != 'admin' )
        adminforcevideo(false,false);
}

//---------------------------FORCE AUDIO DISABLE-------------------------

function forceaudiodeactive(){
    if( usertype != 'admin' ){
        buttonOff(document.querySelector('.app__system--button.mic'));
        adminforceaudio(true,false);
    }
}

//---------------------------FORCE AUDIO ENABLE--------------------------

function forceaudioactive(){
    if( usertype != 'admin' )
        adminforceaudio(false,false);
}

//----------------------------GET FILE------------------------------------


function getfile(data){
    if(data.messagetype == 'group'){
        getgroupfile(data);
    }else{
        getprivatefile(data);
    }
}












































/**
 * Handles specified peer in the room
 *
 * @param peer
 */
function handleMediasoupPeer(peer) {
    // Handle all the Consumers in the Peer.
    peer.consumers.forEach(consumer => handleConsumer(consumer));
    //console.log("-----------------------HERE------------------------");
    //console.log(peer);
    // Event fired when the remote Room or Peer is closed.
    peer.on('close', () => {
        console.log('Remote Peer closed');
    });
    
    // Event fired when the remote Peer sends a new media to mediasoup server.
    peer.on('newconsumer', (consumer) => {
        console.log('Got a new remote Consumer');
        
        // Handle the Consumer.
        handleConsumer(consumer);
    });
}

  
  /**
   * Handles specified consumer
   *
   * @param consumer
   */
function handleConsumer(consumer) {
    
    // Receive the media over our receiving Transport.
    console.log("------------------------CONSUMER--------------------------");
    console.log(consumer.peer.name);
    let videobox = findVideoboxByClientIdAndStream(consumer.peer.name,'camera');
    if(videobox == null)
        return;
    //console.log(videobox);
    consumer.receive(recvTransport)
    .then((track) => {
        //console.debug('Receiving a new remote MediaStreamTrack:', consumer.kind);
        
        // Attach the track to a MediaStream and play it.
        const stream = new MediaStream();
        stream.addTrack(track);
        
        if (consumer.kind === 'video') {
            const video = videobox.querySelector('video');
            console.log(video);
            video.srcObject = stream;            
        }
        if (consumer.kind === 'audio') {
            const audio = videobox.querySelector('audio');
            audio.srcObject = stream;
        }
    });
    
    // Event fired when the Consumer is closed.
    consumer.on('close', () => {
        console.log('Consumer closed');
    });
}


/*
*
*
----------------------------------------------------------------------------------------------------------------------------------------
========================================================================================================================================
                                                    START APP
========================================================================================================================================
----------------------------------------------------------------------------------------------------------------------------------------
*
*
*/

function startcall(){
    sendData({
        type: 'start_call',
        cameraaudio: cameraaudio,
        cameravideo: cameravideo,
        capturevideo: capturevideo,
        forcevideo: forcevideo,
        forceaudio: forceaudio
    });
}

function joincall(){
    sendData({
        type: 'join_call',
        cameraaudio: cameraaudio,
        cameravideo: cameravideo,
        capturevideo: capturevideo
    });
}