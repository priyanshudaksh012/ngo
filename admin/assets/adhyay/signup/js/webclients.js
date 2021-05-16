let allclients = [];

class Client{
    clientid
    roomid
    clientname
    clienttype
    camerastream
    cameravideo
    camerapeer
    capturestream
    capturevideo
    capturepeer

    constructor(clientid,roomid,clientname,clienttype){
        this.clientid = clientid;
        this.roomid = roomid;
        this.clientname = clientname;
        this.clienttype = clienttype;
    }

}

//------------------------------Add Client----------------------------

function addclient(data){
    let clientid = data.clientid;
    let clientname = data.clientname;
    let clienttype = data.clienttype;
    let roomid = data.roomid;
    let client = new Client(clientid,roomid,clientname,clienttype);
    allclients.push(client);
    configurecamerapeer( clientid );
}

//---------------------------Find Client by CLINETID------------------

function findclientbyid( clientid ){
    for( let i = 0 ; i < allclients.length ; i++ ){
        if( allclients[i].clientid == clientid ){
            return allclients[i];
        }
    }
    return null;
}

let iceconfiguration = {
    iceServers: [
        {
            "urls": ["stun:stun.l.google.com:19302", 
            "stun:stun1.l.google.com:19302", 
            "stun:stun2.l.google.com:19302"]
        }
    ]
}

//---------------------------Send Offer--------------------------------

function sendcameraoffer( clientid ){
    let client = findclientbyid(clientid);
    if( client == null )
        return;
    let peer = client.camerapeer;
    peer.createOffer().
    then((offer) => {
        sendData({
            type: 'send_offer',
            stream: 'camera',
            from: userid,
            to: client.clientid,
            clientname: client.clientname,
            offer: offer
        })
        peer.setLocalDescription(offer);
    }).
    catch((error) => console.log(error))
}

//-----------------------------Configure Peer----------------------------------

function configurecamerapeer( clientid ){
    let client = findclientbyid( clientid );
    if( client == null )
        return;
    let peer =  new RTCPeerConnection( iceconfiguration );
    camerastream.getTracks().forEach(track => peer.addTrack(track, camerastream));

    let audioadded = false;
    let videoadded = false;
    let outputTracks = [];
    peer.ontrack = (e) => {
        if( e.track.kind == 'audio' ){
            audioadded = true;
        }
        if( e.track.kind == 'video' ){
            videoadded = true;
        }
        outputTracks = outputTracks.concat(e.track);
        if( audioadded == true && videoadded == true ){
            let outputMediaStream;
            outputMediaStream = new MediaStream(outputTracks);
            console.log(outputMediaStream);
            client.cameravideo = addvideo(client.clientid,client.clientname,'camera');
            client.camerastream = 'active';
            client.cameravideo.srcObject = outputMediaStream;
            adjustvideoscreen();
        }
    }

    peer.onicecandidate = (e) => {
        if (e.candidate == null)
            return
        sendData({
            type: 'send_candidate',
            stream: 'camera',
            from: userid,
            to: client.clientid,
            clientname: client.clientname,
            candidate: e.candidate
        });
    }
    client.camerapeer = peer;
    sendcameraoffer( clientid );
}

//----------------------------GET CAMERA ANSWER-------------------------------

function getcameraanswer( data ){
    let clientid = data.from;
    let client = findclientbyid(clientid);
    if( client == null || clientid == userid )
        return;
    client.camerapeer.setRemoteDescription(data.answer);
}

//----------------------------GET CAMERA CANDIDATES---------------------------

function getcameracandidates( data ){
    let clientid = data.from;
    let client = findclientbyid(clientid);
    if( client == null || clientid == userid )
        return;
    client.camerapeer.addIceCandidate(data.candidate);
}

//-----------------------------GET ANSWER-------------------------------------

function getanswer( data ){
    if( data.stream == 'camera' ){
        getcameraanswer( data );
    }
}

//------------------------------GET CANDIDATES--------------------------------

function getcandidates( data ){
    if( data.stream == 'camera' ){
        getcameracandidates( data );
    }
}

//-------------------------------GET CAMERA OFFER------------------------------------

function getcameraoffer(data){
    let clientid = data.from;
    let client = findclientbyid(clientid);
    if( client != null ){
        return;
    }
    client = new Client(data.from,data.roomid,data.clientname,data.clienttype);
    let peer = new RTCPeerConnection( iceconfiguration );
    camerastream.getTracks().forEach(track => peer.addTrack(track, camerastream));
        
    let audioadded = false;
    let videoadded = false;
    let outputTracks = [];
    peer.ontrack = (e) => {
        if( e.track.kind == 'audio' ){
            audioadded = true;
        }
        if( e.track.kind == 'video' ){
            videoadded = true;
        }
        outputTracks = outputTracks.concat(e.track);
        if( audioadded == true && videoadded == true ){
            let outputMediaStream;
            outputMediaStream = new MediaStream(outputTracks);
            console.log(outputMediaStream);
            client.cameravideo = addvideo(client.clientid,client.clientname,'camera');
            client.camerastream = 'active';
            client.cameravideo.srcObject = outputMediaStream;
            adjustvideoscreen();
        }
        
    }

    peer.onicecandidate = (e) => {
        if (e.candidate == null)
            return
        sendData({
            type: 'send_candidate',
            stream: 'camera',
            from: userid,
            to: client.clientid,
            clientname: client.clientname,
            candidate: e.candidate
        });
    }
    peer.setRemoteDescription( data.offer );
    peer.createAnswer().then((answer) => {
        peer.setLocalDescription(answer);
        sendData({
            type: 'send_answer',
            from: userid,
            to: client.clientid,
            clientname: client.clientname,
            answer: answer,
            stream: 'camera'
        });
    });
    client.camerapeer = peer;
    allclients.push(client);
}

//-----------------------------------GET OFFER------------------------------------------

function getoffer( data ){
    if( data.stream == 'camera' ){
        getcameraoffer(data);
    }
}


/*
*
*
----------------------------------------------------------------------------------------------------------------------------------------
========================================================================================================================================
                                                    START APP
========================================================================================================================================
----------------------------------------------------------------------------------------------------------------------------------------
*/

function startcall(){
    sendData({
        type: 'start_call',
        cameraaudio: cameraaudio,
        cameravideo: cameravideo,
        capturevideo: capturevideo
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