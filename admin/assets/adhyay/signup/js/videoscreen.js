function adjustvideoscreen(){
    let container = document.querySelector('.app__videocontainer--grid');
    let screensCount = container.childElementCount;
    let containerWidth = container.getBoundingClientRect().width;
    let containerHeight = container.getBoundingClientRect().height;
    let screens = container.children;
    if( screensCount < 6 ){
        container.classList.remove('grid');
    }
    //debugger;
    if( screensCount == 1 ){
        let child = screens[0];
        child.style.position = 'relative';
        child.style.top = '0';
        child.style.left = '0';
        child.style.height = '100%';
        child.style.width = '100%';
        document.querySelector('.app__videocontainer--background').classList.remove('background');
    }
    else if( screensCount == 2 ){
        document.querySelector('.app__videocontainer--background').classList.remove('background');
        containerWidth = container.getBoundingClientRect().width;
        //---------------------CONTAINER WIDTH > 800--------------------------
        console.log("CONTAINER WIDTH: "+containerWidth);
        Array.from(screens).forEach( (child,index) => {
            child.style.position = 'absolute';
            if(index == 0){
                child.style.height = '25vh';
                child.style.width = '25vh';
                child.style.top = '1rem';
                child.style.left = '1rem';
                child.style.zIndex = '21';
            }else{
                child.style.top = '0';
                child.style.left = '0';
                child.style.height = '100%';
                child.style.width = '100%';
            }
        } );
    }
    else if( screensCount == 3 ){
        document.querySelector('.app__videocontainer--background').classList.remove('background');
        Array.from(screens).forEach( (child,index) => {
            child.style.position = 'absolute';
            child.style.height = 'calc(50% - 1rem)';
            child.style.width = 'calc(50% - 1rem)';
            if(index != screensCount -1){
                child.style.left = index*50+'%';
                child.style.top = '0%';
            }else{
                child.style.top = '50%';
                child.style.left = '25%';
            }
        } );
    }
    else if( screensCount == 4 ){
        document.querySelector('.app__videocontainer--background').classList.remove('background');
        Array.from(screens).forEach( (child,index) => {
            child.style.position = 'absolute';
            child.style.height = 'calc(50% - 1rem)';
            child.style.width = 'calc(50% - 1rem)';
            if(index < 2){
                child.style.top = '0%';
            }else{
                child.style.top = '50%';
                index = index - 2;
            }
            child.style.left = index*50+'%';
        });
    }
    else{
        container.classList.add('grid');
        document.querySelector('.app__videocontainer--background').classList.add('background');
        if(capturevideo){
            document.querySelector('.app__videocontainer--background video').srcObject = capturestream;
        }
        else{
            document.querySelector('.app__videocontainer--background video').srcObject = camerastream;
        }
        Array.from(screens).forEach( (child,index) => {
            child.style = '';
        });
    }

}
adjustvideoscreen();
window.addEventListener('resize',adjustvideoscreen);
function closevideobutton(button){
    //*******************************Add Code For Close This User Stream***************************************
    console.log("Button Click");
    if( usertype != 'admin' )
        return;
    let videobox = button.parentElement;
    let grid = videobox.parentElement;
    sendData({
        type: 'close_stream',
        clientid: videobox.getAttribute('data-user')
    })
    grid.removeChild(videobox);
    adjustvideoscreen();
}

function closevideobox(){
    let allclosebuttons = document.querySelectorAll('.videobox__icon.cross');
    Array.from(allclosebuttons).forEach( (button,index) => {
        button.addEventListener('click',function(){
            closevideobutton(button);
        });
    } );
}
closevideobox();

//-----------------------------------------------ZOOMING FUNCTION----------------------------------------------------------

let zoomedvideo;
let zoomedvideobox;

function zoomvideo(videobox){
    let backgroundcontainer = document.querySelector('.app__videocontainer--background');
    let backgroundvideo = document.querySelector('.app__videocontainer--backgroundvideo');
    let video = videobox.querySelector('.videobox__video');
    if(video == null)
        return;
    backgroundcontainer.classList.add('select');
    backgroundvideo.srcObject = null;
    backgroundvideo.style.display='none';
    backgroundcontainer.append(video);
    video.classList.add('contain');
    zoomedvideo = video;
    zoomedvideobox = videobox;
}

function zoomvideobox(){
    let allvideobox = document.getElementsByClassName('videobox');
    Array.from(allvideobox).forEach( (videobox,index) => {
        videobox.querySelector('video').addEventListener( 'click',function(){
            zoomvideo(videobox);
        } );
    } );
}

document.querySelector('.app__videocontainer--background').addEventListener('click',function(){
    this.classList.remove('select');
    if(zoomedvideo == null)
        return;
    zoomedvideo.classList.remove('contain');
    zoomedvideobox.append(zoomedvideo);
    zoomedvideo = '';
    zoomedvideobox = '';
    if(document.querySelector('.app__videocontainer--grid').childElementCount >= 5){
        console.log("----------------------------------------------");
        document.querySelector('.app__videocontainer--backgroundvideo').style.display = 'block';
        if(capturevideo){
            document.querySelector('.app__videocontainer--backgroundvideo').srcObject = capturestream;
        }else{
            document.querySelector('.app__videocontainer--backgroundvideo').srcObject = camerastream;
        }
        
    }else{
        document.querySelector('.app__videocontainer--backgroundvideo').style.display = 'none';
        document.querySelector('.app__videocontainer--backgroundvideo').srcObject = null;
    }
})

function findVideoboxByClientIdAndStream(clientid,stream){
    //debugger;
    let videoboxes = document.querySelectorAll('.videobox')
    for( let i = 0 ; i < videoboxes.length ; i++ ){
        let videobox = videoboxes[i];
        let cid = videobox.getAttribute('data-user');
        let s = videobox.getAttribute('data-stream');
        if( cid == clientid && s == stream ){
            return videobox;
        }
    }
}

//--------------------------------------------Remove Video Box---------------------------------------------------

function removevideobox(clientid){
    //debugger;
    let videoboxes = document.querySelectorAll('.videobox');
    Array.from(videoboxes).forEach( (videobox,index) => {
        let videoboxuser = videobox.getAttribute('data-user');
        if( videoboxuser == clientid+'' ){
            videobox.querySelector('video').srcObject = null;
            videobox.querySelector('audio').srcObject = null;
            videobox.parentElement.removeChild(videobox);
            adjustvideoscreen();
        }
    })
}

//-----------------------------Client Audio---------------------------

function clientaudio(videobox){
    let clientid = videobox.getAttribute('data-user');
    let client = findclientbyid(clientid);
    if( client == null )
        return;
    if( client.cameraaudio == true && usertype == 'admin' )
        sendData({
            type: 'manipulate_audio',
            clientid: clientid
        })
}

//------------------------------Client Video--------------------------

function clientvideo(videobox){
    let clientid = videobox.getAttribute('data-user');
    let client = findclientbyid(clientid);
    if( client == null )
        return;
    if( (client.cameravideo == true || client.capturevideo == true) && usertype == 'admin' ){
        sendData({
            type: 'manipulate_video',
            clientid: clientid
        })
    }
}