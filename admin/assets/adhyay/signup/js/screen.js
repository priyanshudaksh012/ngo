let beginpage = false;
let currentscreen;
(
    () => {
        let screens = document.querySelectorAll('.screen');
        Array.from( screens ).forEach( (screen) => {
            if( screen.classList.contains('select') ){
                if( screen.classList.contains('app') )
                    beginpage = true;
            }
        } );
    }
)();

//-------------------BEGIN SCREEN-----------------------

function showbeginscreen(){
    if( usertype != 'admin' && const_roomid != null ){
        createtoast("Error during this task");
        return;
    }
    beginpage = true;
    let screens = document.querySelectorAll('.screen');
    Array.from( screens ).forEach( (screen) => {
        screen.classList.remove('select');
        if( screen.classList.contains('app') ){
            screen.classList.add('select');
            screen.querySelector('.appscreen').classList.add('select');


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
    } );
}

//--------------------PROFILE SCREEN--------------------

window.addEventListener( 'resize',function(){
    let p = document.querySelector('.screen.profile.select');
    p.scrollTop = '0px';
} );

//--------------------SIGNUP SCREEN---------------------

function showsignupscreen(){
    if( actualname != null ){
        createtoast("Already logged in");
        return;
    }
    let allselects = document.querySelectorAll('.select');
    Array.from( allselects ).forEach( (d) => {d.classList.remove('select');} );
    document.querySelector('.screen.signup').classList.add('select');
}