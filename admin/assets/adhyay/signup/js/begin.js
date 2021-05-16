let begin = document.querySelector('.app__home--button');

let btexts = document.querySelectorAll('.app__home--text');
Array.from( btexts ).forEach( (text,index) => {
    text.addEventListener( 'change', function(){
        console.log(text.value);
        if( text.value == '' ){
            text.classList.remove('select');
        }else{
            text.classList.add('select');
        }
        if( text.value.length > 0 ){
            text.classList.add('select');
        }
    } );
    text.addEventListener( 'focusout',function(){
        if( text.classList.contains('clear') ){
            text.type = 'password';
            text.classList.remove('clear');
        }
        if( text.value.length > 0 ){
            text.classList.add('select');
        }
    } )
} );

//--------------------Let's Start the video calling app-----------------------------------

begin.addEventListener( 'click',function(e){
    e.preventDefault();
    let runame = document.getElementById('runame');
    if(runame.value.trim() == '' || runame.value.length < 1 || camerastream == null){
        return;
    }
    let videocontainer = document.querySelector('.app__videocontainer');
    let app = document.querySelector('.app__system');
    let home = document.querySelector('.app__home');
    document.getElementById('localname').textContent = runame.value;
    username = runame.value;

    //--------------------------------------        CREATE ROOM USING PHP       -----------------------------------------------------------

    if( const_roomid == null && usertype == 'admin' && roomid == undefined ){


        if( ws.readyState == 2 || ws.readyState == 3 ){
            createtoast("Server is closed, Kindly refresh the page!");
            return;
        }

        //--------------------------        CREATE NEW ROOM IF USER IS ADMIN        -------------------------------------------------------
        let xhr = new XMLHttpRequest();
        xhr.open('post',createroomAJAX);
        //Send the proper header information along with the request
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onload = function(){
            let data = JSON.parse( xhr.responseText );


            if( data == 0 ){
                createtoast("Error while creating the room");
                begin.removeAttribute('disabled');
                runame.removeAttribute('disabled');
                return;
            }

            begin.querySelector('span').textContent = '';
            begin.classList.add('select');
            begin.setAttribute('disabled',true);
            roomid = data;

            while( ws.readyState != 1 ){
                //-----------DON'T MOVE FOREWARD------------------------
            }
            createtoast("Server Connected");
            //--------------NOW WEBSOCKET IS CONNECTED------------------

            home.classList.remove('select');
            videocontainer.classList.add('select');
            app.classList.add('select');
            zoomvideobox();
            startcall();

        }
        roompassword = parseInt(Math.random()*100000000000);
        xhr.send(`usertype=${usertype}&userid=${userid}&username=${username}&roompassword=${roompassword}`);

        //Change the button loaded
        begin.querySelector('span').textContent = '';
        begin.classList.add('select');
        begin.setAttribute('disabled',true);
        runame.setAttribute('disabled',true);

    }

    //--------------------------        JOIN ROOM USING PHP     ------------------------------------

    if( const_roomid != null ){
        //------------------------      JOIN ROOM USING PHP     ------------------------------------
        let xhr = new XMLHttpRequest();
        xhr.open('post',joinroomAJAX);
        //Send the proper header information along with the request
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        xhr.onload = function(){
            let data = JSON.parse(xhr.responseText);

            if( data != 1 ){    //If Error occured
                createtoast("Error while connecting to room!");
                window.location.href(window.location.origin);
                return;
            }

            begin.querySelector('span').textContent = '';
            begin.classList.add('select');
            begin.setAttribute('disabled',true);
            roomid = const_roomid;
            roompassword = const_roompassword;

            while( ws.readyState != 1 ){
                //-----------DON'T MOVE FOREWARD------------------------
            }
            createtoast("Server Connected");
            //--------------NOW WEBSOCKET IS CONNECTED------------------

            home.classList.remove('select');
            videocontainer.classList.add('select');
            app.classList.add('select');
            zoomvideobox();

            if( usertype == 'admin' ){
                startcall();
            }else{
                joincall();
            }

        }

        xhr.send(`usertype=${usertype}&userid=${userid}&username=${username}&roompassword=${const_roompassword}&roomid=${const_roomid}`);
        //Change the button loaded
        begin.querySelector('span').textContent = '';
        begin.classList.add('select');
        begin.setAttribute('disabled',true);
        runame.setAttribute('disabled',true);
    }
    
} );

//--------------------Capture Camera by Default------------------------------------
let micid;
let isrotated = true;
(
    ()=>{

        if( urlname != null ){
            document.getElementById('runame').value = urlname;
        }


        if(beginpage){
            navigator.mediaDevices.enumerateDevices()
            .then( (devices) => {
                Array.from(devices).forEach( device => {
                    if(device.kind == 'audioinput' && device.label == 'Speakerphone'){
                        micid = device.deviceId;
                    }
                } )
                navigator.mediaDevices.getUserMedia({
                    video: {
                        facingMode: 'user'
                    },
                    audio: {
                        deviceId: micid ? {exact: micid} : undefined,
                        echoCancellation: true,
                        noiseSuppression: true,
                        autoGainControl: true
                    }
                }).then( (stream) => {
                    camerastream = stream;
                    document.getElementById('localvideo').srcObject = camerastream;
                    document.getElementById('localvideo').setAttribute('playsinline','');
                    isrotated = true;
                    document.getElementById('localvideo').style.transform = "rotateY(180deg)";
                } ).catch( (error) => {
                    console.log(error);
                } )
            } )
        }
    }
)()

let begincontrols = document.querySelectorAll('.app__home--icon');
Array.from(begincontrols).forEach( (button,index) => {
    button.addEventListener('click',function(){
        if(button.classList.contains('audio')){
            cameraaudio = !cameraaudio;
            if( cameraaudio ){
                buttonOn(button);
                buttonOn(document.querySelector('.app__system--button.mic'));
            }else{
                buttonOff(button);
                buttonOff(document.querySelector('.app__system--button.mic'));
            }
            camerastream.getAudioTracks()[0].enabled = cameraaudio;
        }else{
            cameravideo = !cameravideo;
            if( cameravideo ){
                buttonOn(button);
                buttonOn(document.querySelector('.app__system--button.video'));
            }else{
                buttonOff(button);
                buttonOff(document.querySelector('.app__system--button.video'));
            }
            camerastream.getVideoTracks()[0].enabled = cameravideo;
        }
    });
} );