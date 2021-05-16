function sendData(data){
    data.userid = userid;
    data.roomid = roomid;
    data.username = username;
    data.usertype = usertype;
    data.roompassword = roompassword;
    console.log(data);
    ws.send(JSON.stringify(data));
}

ws.onmessage = function(e){
    handlesignallingdata(e.data);
}

function handlesignallingdata( data ){
    data = JSON.parse(data);
    console.log("..................................................");
    console.log(data);
    let type = data.type;
    switch(type){
        case 'client':
            addclient(data);
            break;
        case 'chunk':
            clientchunk(data);
            break;
        case 'camera':
            sendcamerabuffer();
            break;
        case 'offer':
            getoffer(data);
            break;
        case 'answer':
            getanswer(data);
            break;
        case 'candidate':
            getcandidates(data);
            break;
        case 'message':
            getmessage(data);
            break;
        case 'queryRoomResponse':
            queryRoomResponse(data);
            break;
        case 'joinResponse':
            joinResponse(data);
            break;
        case 'defaultResponse':
            defaultResponse(data);
            break;
        case 'notification':
            handleNotification(data);
            break;
        case 'disconnected':
            clientdisconnected(data);
            break;
        case 'videoupdate':
            videoupdate(data);
            break;
        case 'audioupdate':
            audioupdate(data);
            break;
        case 'manipulateaudio':
            manipulateaudio();
            break;
        case 'manipulatevideo':
            manipulatevideo();
            break;
        case 'streamover':
            streamover();
            break;
        case 'roomover':
            roomover();
            break;
        case 'callover':
            callover();
            break;
        case 'roomduplicasy':
            roomduplicasy();
            break;
        case 'passworderror':
            passworderror();
            break;
        case 'forcevideodeactive':
            forcevideodeactive();
            break;
        case 'forcevideoactive':
            forcevideoactive();
            break;
        case 'forceaudiodeactive':
            forceaudiodeactive();
            break;
        case 'forceaudioactive':
            forceaudioactive();
            break;
        case 'file':
            getfile(data);
            break;
    }
}