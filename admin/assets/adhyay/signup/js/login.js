let signin = document.querySelector('.signin__container--button');

let ltexts = document.querySelectorAll('.signin__container--text');
Array.from( ltexts ).forEach( (text,index) => {
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
let leyes = document.querySelectorAll('.signin__container--eye');
Array.from(leyes).forEach( (eye,index) => {
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

//-------------------------------------     SHOW LOGIN SCREENS      --------------------------------------------------

function showloginscreen(){
    if( actualname != null )
        return;
    let screens = document.querySelectorAll('.screen');
    Array.from( screens ).forEach( screen => {screen.classList.remove('select')} );     //HIDING ALL SCREENS
    document.querySelector('.screen.signin').classList.add('select');
}