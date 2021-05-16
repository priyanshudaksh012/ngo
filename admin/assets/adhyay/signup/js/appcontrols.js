//-------------------------SCREEN CAST LOGIC-------------------------------
function screencast(){
    navigator.mediaDevices.getDisplayMedia({
        video: true
    }).then((stream) => {
        capturestream = stream;
        // let video = addvideo(userid,username,'screencast');
        // video.srcObject = stream;
        //-------------------CREATE NEW PRODUCER-------------------------------------------
        removeOldVideoProducers();
        let videoProducer = mediasouproom.createProducer(capturestream.getVideoTracks()[0]);
        videoProducer.send(sendTransport);
        document.getElementById('localvideo').srcObject = capturestream;
        document.getElementById('localvideo').style.transform = "rotateY(0deg)";
        buttonOff(document.querySelector('.app__system--button.video'));
        updatevideo();
        //---------------WHEN STOP SHARING IS CALLED----------------------
        capturestream.getVideoTracks()[0].onended = function () {
            // doWhatYouNeedToDo();
            capturevideo = false;
            capturestream = null;
            document.getElementById('localvideo').srcObject = camerastream;
            if(isrotated){
                document.getElementById('localvideo').style.transform = "rotateY(180deg)";
            }else{
                document.getElementById('localvideo').style.transform = "rotateY(0deg)";
            }
            camerastream.getVideoTracks()[0].enabled = cameravideo;
            if( cameravideo ){
                buttonOn(document.querySelector('.app__system--button.video'));
            }else{
                buttonOff(document.querySelector('.app__system--button.video'));
            }
            //-------------------CREATE NEW PRODUCER-------------------------------------------
            removeOldVideoProducers();
            let videoProducer = mediasouproom.createProducer(camerastream.getVideoTracks()[0]);
            videoProducer.send(sendTransport);
            updatevideo();
        };
    }).catch((error) => {
        capturevideo = false;
        capturestream = null;
        camerastream.getVideoTracks()[0].enabled = cameravideo;
        document.getElementById('localvideo').srcObject = camerastream;
        if(isrotated){
            document.getElementById('localvideo').style.transform = "rotateY(180deg)";
        }else{
            document.getElementById('localvideo').style.transform = "rotateY(0deg)";
        }
        if( cameravideo ){
            buttonOn(document.querySelector('.app__system--button.video'));
        }else{
            buttonOff(document.querySelector('.app__system--button.video'));
        }
        //-------------------CREATE NEW PRODUCER-------------------------------------------
        removeOldVideoProducers();
        let videoProducer = mediasouproom.createProducer(camerastream.getVideoTracks()[0]);
        videoProducer.send(sendTransport);
        updatevideo();
        console.log(error);
    })
}

//------------------------------------------OPEN USER OPTIONS--------------------------------------------

function openuseroptions(){
    let options = document.querySelector('.options');
    if( options.classList.contains('select') ){
        options.classList.remove('select')
    }else{
        options.classList.add('select')
    }
}

function appcontrols(){
    let allappcontrolbuttons = document.querySelectorAll('.app__system--button');
    Array.from(allappcontrolbuttons).forEach( (button,index) => {
        button.addEventListener( 'click',function(){
            if( button.classList.contains('chat') ){
                setunreadmessages(0);
                //----------------------GROUP CHAT----------------------------
                document.querySelector('.app__videocontainer').classList.add('chat');
                button.classList.add('off');
                document.querySelector('.app__roomessage').classList.add('select');
                document.querySelector('.app__system--buttonbox').classList.add('chat');
                setTimeout(
                    () => {
                        adjustvideoscreen();
                    },301
                )
            }
            else if( button.classList.contains('option') ){
                //-----------------------OPTION-------------------------------
                openuseroptions();
            }
            else if( button.classList.contains('screencast') ){
                if(forcevideo && usertype != 'admin'){
                    buttonOff(document.querySelector('.app__system--button.video'));
                    createtoast("Admin Banned Everyone to open camera or screencase");
                    return;
                }
                //-----------------------SCREEN CAST HERE---------------------
                if( capturestream == null ){
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
            else if( button.classList.contains( 'call' ) ){
                //-----------------------DISCONNECT CALL----------------------
                sendData({
                    type: 'call_disconnect'
                })
                

                if( usertype != 'admin' )
                    return;

                //---------------------     DEACTIVATE THE ROOM FROM THE DATABASE       ----------------------------------------
                const xhr = new XMLHttpRequest();
                xhr.open('post',closeroomAJAX);
                //Send the proper header information along with the request
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.onload = function(){
                    let data = JSON.parse( xhr.responseText );
                    if( data != 1 ){
                        setTimeout(
                            ()=>{
                                createtoast("Error while deactivating room from database.");
                            },1200
                        )
                        return;
                    }

                    setTimeout(
                        ()=>{
                            createtoast("Room is deactivated");
                        },1200
                    )

                }
                xhr.send(`userid=${userid}&usertype=${usertype}&roomid=${roomid}&roompassword=${roompassword}`);

            }
            else if( button.classList.contains( 'video' ) ){
                if(forcevideo && usertype != 'admin'){
                    buttonOff(document.querySelector('.app__system--button.video'));
                    createtoast("Admin Banned Everyone to open camera or screencase");
                    return;
                }
                //-----------------------CAMERA VIDEO-------------------------
                if( capturestream == null ){
                    cameravideo = !cameravideo;
                    if( cameravideo ){
                        buttonOn(button);
                    }else{
                        buttonOff(button);
                    }
                    camerastream.getVideoTracks()[0].enabled = cameravideo;
                    //-------------------CREATE NEW PRODUCER-------------------------------------------
                    removeOldVideoProducers();
                    let videoProducer = mediasouproom.createProducer(camerastream.getVideoTracks()[0]);
                    videoProducer.send(sendTransport);
                    updatevideo();
                }else{
                    alert('Kidnly Stop Sharing the Sceen');
                    return;
                }
            }
            else if(button.classList.contains( 'camera' )){
                //---------------------------IF CAMERA NOT ALLOWED BY ADMIN------------------------------------
                if(forcevideo && usertype != 'admin'){
                    buttonOff(document.querySelector('.app__system--button.video'));
                    createtoast("Admin Banned Everyone to open camera or screencast");
                    return;
                }
                //----------------------CAMERA SWITCH-------------------------
                facecam = !facecam;
                if( facecam == true ){
                    navigator.mediaDevices.getUserMedia({
                        video: {
                            facingMode: 'user'
                        },
                        audio: {
                            echoCancellation: true,
                            noiseSuppression: true,
                            sampleRate: 44100
                        }
                    }).then( (stream) => {
                        let cameratracks = camerastream != null ? camerastream.getTracks() : null;
                        Array.from( cameratracks ).forEach( (track) => {
                            track.stop();
                        } )
                        camerastream = stream;
                        document.getElementById('localvideo').srcObject = camerastream;
                        document.getElementById('localvideo').setAttribute('playsinline','');
                        isrotated = true;
                        document.getElementById('localvideo').style.transform = "rotateY(180deg)";
                        if( cameravideo ){
                            buttonOn(document.querySelector('.app__system--button.video'));
                        }else{
                            buttonOff(document.querySelector('.app__system--button.video'));
                        }
                        camerastream.getVideoTracks()[0].enabled = cameravideo;
                        //-------------------CREATE NEW PRODUCER-------------------------------------------
                        removeOldVideoProducers();
                        let videoProducer = mediasouproom.createProducer(camerastream.getVideoTracks()[0]);
                        videoProducer.send(sendTransport);
                        updatevideo();
                        /*
                        //---------------------------IF MIC NOT ALLOWED BY ADMIN------------------------------------
                        if(forceaudio && usertype != 'admin'){
                            buttonOff(document.querySelector('.app__system--button.mic'));
                            //createtoast("Admin Banned Everyone to open camera or screencast");
                            return;
                        }
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
                        */
                    } ).catch( (error) => {
                        console.log(error);
                    } )
                }else{
                    navigator.mediaDevices.getUserMedia({
                        video: {
                            facingMode: 'environment'
                        },
                        audio: {
                            deviceId: micid ? {exact: micid} : undefined,
                            echoCancellation: true,
                            noiseSuppression: true,
                            autoGainControl: true
                        }
                    }).then( (stream) => {
                        let cameratracks = camerastream != null ? camerastream.getTracks() : null;
                        Array.from( cameratracks ).forEach( (track) => {
                            track.stop();
                        } )
                        camerastream = stream;
                        document.getElementById('localvideo').srcObject = camerastream;
                        document.getElementById('localvideo').setAttribute('playsinline','');
                        isrotated = false;
                        document.getElementById('localvideo').style.transform = "rotateY(0deg)";
                        if( cameravideo ){
                            buttonOn(document.querySelector('.app__system--button.video'));
                        }else{
                            buttonOff(document.querySelector('.app__system--button.video'));
                        }
                        camerastream.getVideoTracks()[0].enabled = cameravideo;
                        //-------------------CREATE NEW PRODUCER-------------------------------------------
                        removeOldVideoProducers();
                        let videoProducer = mediasouproom.createProducer(camerastream.getVideoTracks()[0]);
                        videoProducer.send(sendTransport);
                        updatevideo();
                        /*
                        //---------------------------IF MIC NOT ALLOWED BY ADMIN------------------------------------
                        if(forceaudio && usertype != 'admin'){
                            buttonOff(document.querySelector('.app__system--button.mic'));
                            //createtoast("Admin Banned Everyone to open camera or screencast");
                            return;
                        }
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
                        */
                    } ).catch( (error) => {
                        console.log(error);
                    } )
                }
            }
            else{
                if(forceaudio && usertype != 'admin'){
                    buttonOff(document.querySelector('.app__system--button.mic'));
                    createtoast("Admin Banned Everyone to open microphone");
                    return;
                }
                //-----------------------CAMERA AUDIO-------------------------
                cameraaudio = !cameraaudio;
                if( cameraaudio ){
                    buttonOn(button);
                }else{
                    buttonOff(button);
                }
                camerastream.getAudioTracks()[0].enabled = cameraaudio;
                //-------------------CREATE NEW PRODUCER-------------------------------------------
                removeOldAudioProducers();
                let audioProducer = mediasouproom.createProducer(camerastream.getAudioTracks()[0]);
                audioProducer.send(sendTransport);
                updateaudio();
            }
        } )
    } );
}
appcontrols();