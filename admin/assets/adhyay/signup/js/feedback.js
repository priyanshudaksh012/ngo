let stars = document.querySelectorAll('.feedback__stars--star');
let starcount = 0;
let feedbackmessage = '';
Array.from( stars ).forEach( (star,index) => {
    star.addEventListener( 'click',function(){
        for( let i = 0 ; i <= index ; i++ ){
            stars[i].querySelector('use').href.baseVal = './svg/star.svg#icon-star-full';
        }
        starcount = index;
        for( let i = index+1 ; i < stars.length ; i++ ){
            stars[i].querySelector('use').href.baseVal = './svg/star.svg#icon-star-empty';
        }
    } )
} );

//----------------------------------SUBMIT FEEDBACK--------------------------------------------
let feedbacksubmit = document.querySelector('.feedback__submit');
feedbacksubmit.addEventListener( 'click',function(){
    const xhr = new XMLHttpRequest();
    xhr.open('post',sendfeedbackAJAX);
    //Send the proper header information along with the request
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onload = function(){
        let data = JSON.parse( xhr.responseText );
        if( data != 1 ){
            createtoast("Feedback Not Saved");
            setTimeout(
                ()=>{
                    window.location.href = window.location.origin;
                },1200
            )
        }else{
            createtoast("Feedback Stored");
            setTimeout(
                ()=>{
                    window.location.href = window.location.origin;
                },1200
            )
        }
    }
    xhr.send(`userid=${userid}&usertype=${usertype}&username=${username}&rating=${starcount}&message=${feedbackmessage}&roomid=${roomid}`);
} );

let nothanks = document.querySelector('.feedback__nothanks');
nothanks.addEventListener( 'click',function(){
    window.location.href = window.location.origin;
} );

//----------------------------------SHOW FEEBACK SCREEN----------------------------------------

function showfeedbackscreen(){
    //debugger;
    removeOldAudioProducers();
    removeOldVideoProducers();
    mediasouproom = null;
    let cameratracks = camerastream != null ? camerastream.getTracks() : null;
    Array.from( cameratracks ).forEach( (track) => {
        track.stop();
    } )
    if( capturestream != null ){
        Array.from( capturestream.getTracks() ).forEach( (track) => {
            track.stop();
        }  )
    }
    let allselectdoms = document.querySelectorAll('.select');
    Array.from( allselectdoms ).forEach( d => {d.classList.remove('select');} );

    let feedbackscreen = document.querySelector('.screen.feedback');
    feedbackscreen.classList.add('select');
}