let signupbutton = document.querySelector('.signup__right--button');
signupbutton.addEventListener( 'click',function handler(e){
    

} );
let stexts = document.querySelectorAll('.signup__right--text');
Array.from( stexts ).forEach( (text,index) => {
    if( text.value.length > 0 ){
        text.classList.add('select');
    }
    text.addEventListener( 'change', function(){
        console.log(text.value);
        if( text.value == '' || text.value.length < 1 ){
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
let seyes = document.querySelectorAll('.signup__right--eye');
Array.from(seyes).forEach( (eye,index) => {
    eye.addEventListener( 'click',function(){
        if( eye.parentElement.querySelector('.password').classList.contains( 'clear' ) ){
            eye.parentElement.querySelector('.password').type = 'password';
            eye.parentElement.querySelector('.password').classList.remove( 'clear' );
        }else{
            eye.parentElement.querySelector('.password').type = 'text';
            eye.parentElement.querySelector('.password').classList.add( 'clear' );
        }
    } );
} );