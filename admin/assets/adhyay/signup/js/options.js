let options = document.querySelectorAll('.options__option');

Array.from( options ).forEach( (option,index) => {

    if(usertype != 'admin'){
        if(option.classList.contains('mutevideos')){
            option.parentElement.removeChild(option);
        }
        else if(option.classList.contains('muteaudios')){
            option.parentElement.removeChild(option);
        }
        else if(option.classList.contains('invite')){
            option.parentElement.removeChild(option);
        }
    }

    option.addEventListener( 'click',function(){
        if( option.classList.contains('user') ){
            //---------------------------USER PROFILE HERE------------------------------
        }
        else if( option.classList.contains('mutevideos') ){
            if(usertype != 'admin')
                return;
            //---------------------------MUTE VIDEOS------------------------------------
            if(option.classList.contains('select')){
                sendData({
                    type: 'forcevideo__active'
                })
                option.classList.remove('select');
            }else{
                sendData({
                    type: 'forcevideo__deactive'
                })
                option.classList.add('select');
            }
        }
        else if( option.classList.contains('muteaudios') ){
            if(usertype != 'admin')
                return;
            //---------------------------MUTE AUDIOS------------------------------------
            if(option.classList.contains('select')){
                sendData({
                    type: 'forceaudio__active'
                })
                option.classList.remove('select');
            }else{
                sendData({
                    type: 'forceaudio__deactive'
                })
                option.classList.add('select');
            }
        }
        else if( option.classList.contains('invite') ){
            copylink();
        }
    } );
} );


function copylink(){
    if(usertype != 'admin')
        return;
    //---------------------------INVITE-----------------------------------------
    let search = `?r=${roomid}&p=${roompassword}`;
    let predomain = window.location.origin;
    let text = predomain + search;
    navigator.clipboard.writeText(text).then(function() {
        createtoast('Link copied successfully');
    }, function(err) {
        createtoast('Could not copy text: ', err);
    });
}

//--------------IIFE FOR INVITE BUTTON------------------------------

(
    ()=>{
        if( usertype == 'admin'){
            document.querySelector('.app__system--invitebutton').classList.add('select');
        }
    }
)()