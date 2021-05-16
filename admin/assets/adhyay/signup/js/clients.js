let allclients = [];

class Client{
    clientid
    roomid
    clientname
    clienttype
    camerastream
    cameravideo
    cameramediasource
    camerasourcebuffer
    camerabasetime
    cameralooptime
    cameralasttime
    capturestream
    capturevideo
    capturemediasource
    capturesourcebuffer
    capturebasetime
    capturelooptime
    capturelasttime

    constructor(clientid,roomid,clientname,clienttype){
        this.clientid = clientid;
        this.roomid = roomid;
        this.clientname = clientname;
        this.clienttype = clienttype;
        this.camerabasetime = 12;
        this.cameralooptime = 8;
        this.cameralasttime = 0;
        this.capturebasetime = 12;
        this.capturelooptime = 8;
        this.capturelasttime = 0;
    }

}

function base64toblob(dataURI){
    let byteString = atob(dataURI.split(',')[2]);
    let ab = new ArrayBuffer(byteString.length);
    let ia = new Uint8Array(ab);

    for (var i = 0; i < byteString.length; i++) {
        ia[i] = byteString.charCodeAt(i);
    }
    return new Blob([ab], { type: 'video/webm; codecs="opus, vp8"'});
}

Client.prototype.addcamerastream = function( chunk ){
    let client = this;
    if( this.camerastream != 'active' ){
        client.camerastream = 'active';
        client.cameramediasource = new MediaSource();
        client.cameravideo = addvideo(client.clientid,client.clientname,'camera');
        client.cameravideo.src = window.URL.createObjectURL(client.cameramediasource);
        client.cameramediasource.onsourceopen = function(){
            client.camerasourcebuffer = client.cameramediasource.addSourceBuffer('video/webm; codecs="opus, vp8"');
            client.cameramediasource.setLiveSeekableRange(client.cameralasttime,client.camerabasetime+1);
            //-----------------------------BASE 64 to BLOB-----------------------------------------
            let blob = base64toblob(chunk);
            console.log(blob);
            blob.arrayBuffer().
            then( (buffer) => {
                //console.log(new Uint8Array(buffer));
                client.camerasourcebuffer.appendBuffer(new Uint8Array(buffer));
            } ).
            catch( (error) => {
                console.log(error);
            } )
        }
    }else{
        if(client.cameramediasource.readyState == 'closed'){
            return;
        }
        let blob = base64toblob(chunk);
        //console.log(blob);
        blob.arrayBuffer().
        then( (buffer) => {
            console.log(buffer);
            if( client.cameravideo.currentTime > client.camerabasetime ){
                function updateend(e){
                    //console.log(client.cameramediasource);
                    client.cameramediasource.clearLiveSeekableRange();
                    client.camerasourcebuffer .removeEventListener('updateend',updateend);
                    client.camerasourcebuffer.remove(client.cameralasttime,client.cameralooptime);
                    buffer = null;
                    client.cameralasttime = client.cameralooptime;
                    client.cameralooptime = client.camerabasetime-1;
                    client.camerabasetime = client.camerabasetime + 12;
                    client.cameramediasource.setLiveSeekableRange(client.cameralasttime,client.camerabasetime+1);
                }
                client.camerasourcebuffer.addEventListener('updateend',updateend);
                client.camerasourcebuffer.appendBuffer(new Uint8Array(buffer));
            }else{
                //client.camerasourcebuffer = client.cameramediasource.addSourceBuffer('video/webm; codecs="opus, vp9"');
                client.camerasourcebuffer.appendBuffer(new Uint8Array(buffer));
                //console.log(client.camerasourcebuffer.buffered.end());
                //client.cameravideo.play();
                //client.cameramediasource.endOfStream();
                //buffer = null;
            }
        } ).
        catch( (error) => {
            console.log(error);
        } );
    }
}

function addclient(data){
    console.log(data);
    let clientid = data.clientid;
    let clientname = data.clientname;
    let clienttype = data.clienttype;
    let roomid = data.roomid;
    let client = new Client(clientid,roomid,clientname,clienttype);
    allclients.push(client);
}

function findclientbyid( clientid ){
    for( let i = 0 ; i < allclients.length ; i++ ){
        if( allclients[i].clientid == clientid ){
            return allclients[i];
        }
    }
    return null;
}

function clientchunk(data){
    let clientid = data.clientid;
    if(clientid == userid){
        return;
    }
    let client = findclientbyid(clientid);
    console.log(client);
    if( client == null )
        return;
    let stream = data.stream;
    let chunk = data.chunk;
    if( stream == 'camera' ){
        client.addcamerastream( chunk );
    }else{
        // *****************************ADD CAPTURE STREAM CODE FOR CLIENT************************************* 
    }
}


//--------------------------SEND CAMERA BUFFER-------------------------------
function sendcamerabuffer(){
    let mediarecorder = new MediaRecorder(camerastream, {
        mimeType: 'video/webm; codecs="opus, vp8"'
    });
    mediarecorder.ondataavailable = function(event){
        let blob = event.data;
        let reader = new FileReader();
        reader.readAsDataURL(blob); 
        reader.onloadend = function(){
            let base64data = reader.result;
            //--------------------CAMERA CHUNK IS NOW SEND--------------------
            sendData({
                type: 'send_chunk',
                stream: 'camera',
                chunk: base64data
            });
        }
    }
    mediarecorder.start(2000);
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