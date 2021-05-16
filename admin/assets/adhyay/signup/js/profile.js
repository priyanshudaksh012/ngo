//---------------------------------CHANGE PASSWORD BUTTON CLICK----------------------------------------------

let profilepasswordbutton = document.querySelector('.profile__user--passwordbtton');
profilepasswordbutton.addEventListener( 'click',function(){

    if( usertype != 'admin' ){
        createtoast("Kindly login first");
        return;
    }

    let pwdboxes = document.querySelectorAll('.profile__user--inputbox.password');
    let changepasswordbutton = document.querySelector('.profile__user--changepassword');
    profilepasswordbutton.classList.add('select');
    //-------------SHOW PASSWORD FILEDS------------------
    Array.from(pwdboxes).forEach( (box) => {
        box.classList.add('select');
    } );
    //---------------SHOW CHANGE PASSWORD BUTTON----------
    changepasswordbutton.classList.add('select');
    let alleyes = document.querySelectorAll('.profile__user--eye');
    Array.from(alleyes).forEach( (eye) => {
        eye.addEventListener('mousedown',function(){
            eye.parentElement.querySelector('.profile__user--input.password').setAttribute('type','text');
        });
        eye.addEventListener('mouseup',function(){
            eye.parentElement.querySelector('.profile__user--input.password').setAttribute('type','password');
        });
        eye.addEventListener('mouseleave',function(){
            eye.parentElement.querySelector('.profile__user--input.password').setAttribute('type','password');
        });
    } );
    //----------------------CHANGE PASSWORD BUTTON-----------------
    changepasswordbutton.addEventListener( 'click',function(){
        const currentpassword = document.getElementById('profilcurrentpassword').value;
        const newpassword = document.getElementById('profilnewpassword').value;
        const confirmpassword = document.getElementById('profilconfirmpassword').value;
        if( newpassword != confirmpassword ){
            createtoast( "Confirm Password and New Password not matched" );
            return;
        }
        if( newpassword.length < 8 ){
            createtoast("Password length must be longer than 8 characters");
            return;
        }
        if( currentpassword == newpassword ){
            createtoast("Current and New Password are same");
            return;
        }
        //----------------CHANGE PASSWORD AJAX------------------------

        const xhr = new XMLHttpRequest();
        xhr.open('post',changepasswordAJAX);
        //Send the proper header information along with the request
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onload = function(){
            const data = JSON.parse( xhr.responseText );
            if( data == 0 ){
                createtoast("Something went wrong during Changing of password");
            }else if( data == -1 ){
                createtoast("Current Password is wrong");
            }else if( data == 1 ){
                createtoast("Password Changed successfully");
            }else{
                createtoast("Something went wrong during Changing of password");
            }
        }
        xhr.send(`userid=${userid}&usertype=${usertype}&currentpassword=${currentpassword}&newpassword=${newpassword}`);
    } );
} );

//----------------------------------SETTLE INPUT FIELDS--------------------------------------------------------------

function settleinputfileds(){
    if( actualname == null ){
        return;
    }
    document.getElementById('profilename').value = actualname;
    document.getElementById('profilemail').value = email;
    if( dp == null ){
        document.querySelector('.profile__user--dp').src = window.location.origin+'/svg/user.svg';
    }
}

settleinputfileds();




//-----------------------------------SETTLE CALL LOGS----------------------------------------------------------------
const callhistory = {logs:[]};


function settlecallogs(){
    if( usertype != 'admin' ){
        return;
    }
    const callogs = calls.logs;
    const xhr = new XMLHttpRequest();
    xhr.open('post',callogsAJAX);
    //Send the proper header information along with the request
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onload = function(){
        const data = JSON.parse(xhr.responseText);
        if( data == 0 ){
            return;
        }
        for( let i = data.length-1 ; i >= 0 ; i-- ){
            let r = data[i];
            const rid = r.roomid;
            const status = r.status == '1' ? 'Active' : 'Deactivated';
            const ucounts = r.userscount;
            const role = r.role;
            const users = role == 'admin' ? JSON.parse(r.users) : null;
            const link = r.link;
            
            let roomidDOM = document.createElement('td');
            roomidDOM.textContent = rid;
            let statusDOM = document.createElement('td');
            statusDOM.textContent = status;
            let usersDOM = document.createElement('td');
            usersDOM.textContent = ucounts;
            let roleDOM = document.createElement('td');
            roleDOM.textContent = role;
            let joinDOM = document.createElement('td');
            let linkDOM;

            if( status == 'Active' && role == 'admin' ){
                linkDOM = document.createElement('a');
                linkDOM.textContent = "Join Now";
                linkDOM.href = link;
            }else if( status == 'Deactivated' ){
                linkDOM = document.createElement('p');
                linkDOM.textContent = 'Closed';
            }else{
                linkDOM = document.createElement('p');
                linkDOM.textContent = 'Not Closed';
            }
            joinDOM.appendChild(linkDOM);
            let rowDOM = document.createElement('tr');
            rowDOM.appendChild(roomidDOM);
            rowDOM.appendChild(statusDOM);
            rowDOM.appendChild(usersDOM);
            rowDOM.appendChild(roleDOM);
            rowDOM.appendChild(joinDOM);
            document.querySelector('.profile__calls--calllogs tbody').appendChild(rowDOM);
            callhistory.logs.push(r);
            Object.freeze(callhistory);
        }
    }
    xhr.send(`userid=${userid}&usertpe=${usertype}&callogs=${callogs}`);
}

settlecallogs();