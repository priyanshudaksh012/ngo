document.querySelector('.app__roomessage--close').addEventListener( 'click',function(){
    document.querySelector('.app__roomessage').classList.remove('select');
    document.querySelector('.app__videocontainer').classList.remove('chat');
    document.querySelector('.app__system--button.chat').classList.remove('off');
    document.querySelector('.app__system--buttonbox').classList.remove('chat');
    setTimeout(
        () => {
            adjustvideoscreen();
        },301
    )
} );

//-------------------------------UNREAD MESSAGES--------------------------------------------------
let unreadmessages = 0;
function setunreadmessages(count){
    if( count == 0 ){
        //---------RESET THE COUNT---------
        unreadmessages = 0;
        document.querySelector('.app__system--chatcount').style.display='none';
    }else{
        //---------UPDATE THE COUNT--------
        unreadmessages++;
        document.querySelector('.app__system--chatcount').style.display='flex';
    }
    document.querySelector('.app__system--chatcount').textContent=unreadmessages;
}

//--------------------------------SEND MESSAGE----------------------------------------------------

let currentchat = 'group';
let sendmessagebutton = document.querySelector('.sendmessage');

function sendmessage(){
    setunreadmessages(0);
    let message = document.getElementById('message').value;
    if(message.trim().length < 1){
        createtoast("Message is empty!");
        return;
    }
    sendData({
        type: 'send_message',
        messageto: currentchat,
        message: message
    });
    let messagecontainer = document.querySelector('.app__roomessage--container');
    let messageDOM = document.createElement( 'p' );
    messageDOM.classList.add('message');
    messageDOM.classList.add('right');
    let msg = document.createElement('span');
    msg.textContent = message;
    messageDOM.append(msg);
    messagecontainer.append(messageDOM);
    document.getElementById('message').value = '';
    document.querySelector('.app__roomessage--container').scrollTop = document.querySelector('.app__roomessage--container').scrollHeight;
}

sendmessagebutton.addEventListener( 'click',function(){
    sendmessage();
} );

document.querySelector('#message').addEventListener('keypress', function (e) {
    if (e.key === 'Enter') {
      // code for enter
      sendmessage();
      setTimeout(
          function(){
            document.getElementById('message').value = '';
          },0
      )
    }
});

//-------------------------------------FILE LOAD ...--------------------------------------

function fileload(fileloaditerate,fileloadDOM,filestatus,fileloadinterval){
    if( filestatus == true ){
        fileloadDOM.textContent = '';
        clearInterval(fileloadinterval);
        return;
    }
    if( fileloaditerate < 2 ){
        fileloadDOM.textContent = fileloadDOM.textContent + '.';
        fileloaditerate++;
    }else{
        fileloadDOM.textContent = '.';
        fileloaditerate = 0;
    }
    return fileloaditerate;
}

//--------------------------------------SEND FILE-------------------------------------------------

let sendfilebutton = document.querySelector('.sendfile');

sendfilebutton.addEventListener( 'click',function(){
    setunreadmessages(0);
    let input = document.createElement('input');
    input.setAttribute('type','file');
    input.click();
    input.addEventListener('change',function(){
        const formdata = new FormData();
        let filename = '';
        let filestatus = false;
        let filetype = '';
        let ext = '';
        let fileloaditerate = 0;
        let messageDOM = document.createElement('div');
        let fileDOM;
        let filepropDOM;
        let filelinkDOM;
        let fileloadDOM;
        messageDOM.classList.add('message');
        messageDOM.classList.add('right');
        for( const file of input.files ){
            formdata.append("myFiles[]",file);
            filename = file.name;
        }
        for( let i = filename.length - 1 ; i > 0 ; i-- ){
            if( filename.charAt(i) == '.' ){
                ext = filename.substr(i+1,filename.length);
                break;
            }
        }
        switch (ext){
            case 'jpg':
                filetype = 'IMG';
                break;
            case 'jpeg':
                filetype = 'IMG';
                break;
            case 'png':
                filetype = 'IMG';
                break;
            case 'mp4':
                filetype = 'VID';
                break;
            case 'mpeg':
                filetype = 'VID';
                break;
            default:
                filetype = 'DOC';
                break;
        }
        console.log(filetype);
        if( filetype == 'IMG' ){
            //-------------------------------CREATE IMAGE MESSAGE---------------------
            fileDOM = document.createElement('img');
            fileDOM.classList.add('message__image');
            let reader = new FileReader();
            reader.onload = function (e) {
                fileDOM.src = e.target.result;
            }
            reader.readAsDataURL(input.files[0]);
        }
        else if( filetype == 'VID' ){
            //-------------------------------CREATE IMAGE MESSAGE---------------------
            fileDOM = document.createElement('video');
            fileDOM.classList.add('message__video');
            let reader = new FileReader();
            reader.onload = function (e) {
                fileDOM.src = e.target.result;
                fileDOM.setAttribute('controls','');
            }
            reader.readAsDataURL(input.files[0]);
        }
        else{
            fileDOM = document.createElement('div');
            fileDOM.classList.add('message__filebox');
            fileDOM.innerHTML = `
                <svg class="message__filesvg">
                    <use href="./svg/sprite.svg#icon-file-text"></use>
                </svg>`;
        }


        filepropDOM = document.createElement('div');
        filepropDOM.classList.add('message__fileprop');

        filelinkDOM = document.createElement('a');
        filelinkDOM.setAttribute('target','_blank');
        filelinkDOM.textContent = input.files[0].name.length > 15 ? input.files[0].name.substr(0,12)+'...': input.files[0].name;

        fileloadDOM = document.createElement('div');
        fileloadDOM.classList.add('message__filestatus');
        fileloadDOM.textContent = '.';

        let fileloadinterval = setInterval(
            function(){
                fileloaditerate = fileload(fileloaditerate,fileloadDOM,filestatus,fileloadinterval);
            },500
        )

        filepropDOM.appendChild(filelinkDOM);
        filepropDOM.appendChild(fileloadDOM);
        messageDOM.appendChild(fileDOM);
        messageDOM.appendChild(filepropDOM);
        
        //--------------------------TEMPCURRENT CHAT DENOTES CURRENT CHAT---------------------------------
        let tempcurrentchat = currentchat;

        let answer = window.confirm( 'Are you sure to upload this file?\n'+filename );
        if(answer){
            if( tempcurrentchat == 'group' ){
                document.querySelector('.app__roomessage--container').appendChild(messageDOM);
            }else{
                //-----------------------APPEND TO PRIVATE CHAT---------------------------------
            }
            const xhr = new XMLHttpRequest();
            xhr.open('post','https://adhyay.co.in/fileupload/fileupload.php');
            xhr.send(formdata);
            xhr.onload = function(){
                let data = JSON.parse(xhr.responseText)[0];
                filestatus = true;
                filelinkDOM.href=data.path;
                filelinkDOM.setAttribute('download',data.name);
                sendData({
                    type: 'send_file',
                    messageto: tempcurrentchat,
                    filename: data.name,
                    filetype: data.type,
                    filelink: data.path
                })
            }
        }else{
            
        }
        setTimeout( () => {
            document.querySelector('.app__roomessage--container').scrollTop = document.querySelector('.app__roomessage--container').getBoundingClientRect().height;
        },500 )
    });
} )

//--------------------------------------DISPLAY PRIVATE MESSAGE-----------------------------------

function displayprivatemessage( data ){
    // ********************* PRIVATE MESSAGE CODE HERE *******************************************
}

//--------------------------------------DISPLAY GROUP MESSAGE-------------------------------------

function displaygroupmessage( data ){
    let messagecontainer = document.querySelector('.app__roomessage--container');
    let messageDOM = document.createElement( 'p' );
    messageDOM.classList.add('message');
    messageDOM.classList.add('left');
    let clientName = data.clientname+": ";
    let nameDOM = document.createElement('strong');
    nameDOM.textContent = clientName;
    let message = document.createElement('span');
    message.textContent = data.message;
    messageDOM.appendChild(nameDOM);
    messageDOM.appendChild(message);
    messagecontainer.appendChild(messageDOM);
    document.querySelector('.app__roomessage--container').scrollTop = document.querySelector('.app__roomessage--container').scrollHeight;
    if( document.querySelector('.app__roomessage').classList.contains('select') ){
        setunreadmessages(0);
    }else{
        setunreadmessages(1);
    }
}

//--------------------------------------GET MESSAGE-----------------------------------------------

function getmessage( data ){
    if( data.messagetype != 'group' ){
        displayprivatemessage( data );
    }else{
        displaygroupmessage( data );
    }
}

//---------------------------GET GROUP FILE-------------------------------

function getgroupfile(data){
    setunreadmessages(1);
    let messageDOM = document.createElement('div');
    messageDOM.classList.add('message');
    messageDOM.classList.add('left');
    if(data.filetype == 'IMG'){
        let clientnameDOM = document.createElement('p');
        clientnameDOM.classList.add('message__client');
        clientnameDOM.textContent = data.clientname+': ';
        let clientimageDOM = document.createElement( 'img' );
        clientimageDOM.classList.add('message__image');
        clientimageDOM.src = data.filelink;
        messageDOM.appendChild(clientnameDOM);
        messageDOM.appendChild(clientimageDOM);
    }else if( data.filetype == 'VID' ) {
        let clientnameDOM = document.createElement('p');
        clientnameDOM.classList.add('message__client');
        clientnameDOM.textContent = data.clientname+': ';
        let clientvideoDOM = document.createElement( 'video' );
        clientvideoDOM.classList.add('message__video');
        clientvideoDOM.src = data.filelink;
        clientvideoDOM.setAttribute('controls','');
        messageDOM.appendChild(clientnameDOM);
        messageDOM.appendChild(clientvideoDOM);
    }else{
        let fileboxDOM = document.createElement('div');
        fileboxDOM.classList.add('message__filebox');
        let clientnameDOM = document.createElement('p');
        clientnameDOM.classList.add('message__client');
        clientnameDOM.textContent = data.clientname+': ';
        let fileSVG = document.createElement('svg');
        fileSVG.classList.add('message__filesvg');
        fileSVG.innerHTML = `<use href="./svg/sprite.svg#icon-file-text"></use>`;
        fileboxDOM.appendChild(clientnameDOM);
        fileboxDOM.appendChild(fileSVG);
        messageDOM.appendChild(fileboxDOM);
    }

    let messagepropDOM = document.createElement('div');
    messagepropDOM.classList.add('message__fileprop');

    let filelinkDOM = document.createElement('a');
    filelinkDOM.classList.add('message__filename');
    filelinkDOM.setAttribute('download',true);
    filelinkDOM.setAttribute('target','_blank');

    filelinkDOM.textContent = data.filename.length > 15 ? data.filename.substr(0,12)+'...' : data.filename;
    filelinkDOM.href = data.filelink;

    messagepropDOM.appendChild(filelinkDOM);
    messageDOM.appendChild(messagepropDOM);

    document.querySelector('.app__roomessage--container').appendChild(messageDOM);
    setTimeout( () => {
        document.querySelector('.app__roomessage--container').scrollTop = document.querySelector('.app__roomessage--container').scrollHeight;
    },10 )

}

//-------------------------GET PRIVAT FILE-----------------------

function getprivatefile(data){
    
}