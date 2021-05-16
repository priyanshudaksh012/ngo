const ws = new WebSocket( 'wss://inc.adhyay.co.in' );

let username;
let roomid;
let roompassword;
let camerastream;
let capturestream;
let facecam = true;
let cameraaudio = true;
let cameravideo = true;
let capturevideo = false;
let forceaudio = false;
let forcevideo = false;

function buttonOn(button){
    let ref = button.getAttribute('data-on');
    button.querySelector('svg use').href.baseVal = ref;
    button.classList.remove('off');
}

function buttonOff(button){
    let ref = button.getAttribute('data-off');
    button.querySelector('svg use').href.baseVal = ref;
    button.classList.add('off');
}

//---------------------------------RESET EVERYTHING------------------------------------

(
    () => {
        let allforms = document.querySelectorAll('form');
        Array.from(allforms).forEach( (form) => {form.reset();} );
        let allinputs = document.querySelectorAll('input');
        Array.from(allinputs).forEach( input => {input.value = '';} );
    }
)();

//---------------------------ADD VIDEO CODE HERE-----------------------------


function addvideo(clientid,clientname,stream){
    let videobox = document.createElement('div');
    videobox.classList = 'videobox';
    videobox.setAttribute( 'data-user',clientid );
    videobox.setAttribute( 'data-stream',stream );

    let video = document.createElement('video');
    video.classList.add('videobox__video');
    video.autoplay = true;
    video.setAttribute('playsinline','');

    let audio = document.createElement('audio');
    audio.classList.add('videobox__audio');
    audio.autoplay = true;

    let name = document.createElement('p');
    name.classList.add('videobox__name');
    name.textContent = clientname;

    let moreIcon = document.createElement('div');
    moreIcon.classList.add('videobox__icon');
    moreIcon.classList.add('more');

    moreIcon.innerHTML = `
        <svg>
            <use href="./svg/sprite.svg#icon-more-vertical"></use>
        </svg>`;

    let crossIcon = document.createElement('div');
    crossIcon.classList.add('videobox__icon');
    crossIcon.classList.add('cross')

    crossIcon.innerHTML = `
        <svg>
            <use href="./svg/sprite.svg#icon-phone"></use>
        </svg>`;


    let audioIcon = document.createElement('div');
    audioIcon.classList.add('videobox__icon');
    audioIcon.classList.add('audio');
    audioIcon.setAttribute('data-on','./svg/sprite.svg#icon-mic');
    audioIcon.setAttribute('data-off','./svg/sprite.svg#icon-mic-off');

    audioIcon.innerHTML = `
        <svg>
            <use href="./svg/sprite.svg#icon-mic"></use>
        </svg>`;

    let videoIcon = document.createElement('div');
    videoIcon.classList.add('videobox__icon');
    videoIcon.classList.add('video');
    videoIcon.setAttribute('data-on','./svg/sprite.svg#icon-video');
    videoIcon.setAttribute('data-off','./svg/sprite.svg#icon-video-off');

    videoIcon.innerHTML = `
        <svg>
            <use href="./svg/sprite.svg#icon-video"></use>
        </svg>`;

    videobox.append(video);
    videobox.append(audio);
    videobox.append(name);
    videobox.append(moreIcon);
    videobox.append(crossIcon);
    videobox.append(audioIcon);
    videobox.append(videoIcon);

    let grid = document.querySelector('.app__videocontainer--grid');
    grid.append(videobox);

    //--------------------ADD LISTENERS-----------------------------
    if(usertype == 'admin'){
        crossIcon.addEventListener('click',function(){
            closevideobutton(crossIcon);
        });
    }else{
        videobox.removeChild(crossIcon);
    }
    video.src = '#';
    video.addEventListener('click',function(){
        zoomvideo(videobox);
    });
    audioIcon.addEventListener('click',function(){
        clientaudio(videobox);
    });
    videoIcon.addEventListener('click',function(){
        clientvideo(videobox);
    })

    adjustvideoscreen();
    return video;
}


//----------------------------------------CREATE TOAST---------------------------

function createtoast(string){
    let toastDOM = document.createElement('div');
    toastDOM.classList.add('toast');
    
    let svg = document.createElement('svg');
    svg.innerHTML = `<svg><use href="./svg/sprite.svg#icon-bell"></use></svg>`;

    let p = document.createElement('p');
    p.classList.add('toast__paragraph');
    p.textContent = string;

    toastDOM.appendChild(svg);
    toastDOM.appendChild(p);

    document.querySelector('body').appendChild(toastDOM);
    setTimeout(() => {
        toastDOM.classList.add('select');
    },0)
    setTimeout(()=>{
        toastDOM.classList.add('hide');
        setTimeout(()=>{
            document.querySelector('body').removeChild(toastDOM);
        },601)
    },1000)
}