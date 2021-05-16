let signupcards = document.querySelectorAll('.signup__left--card');

Array.from(signupcards).forEach( (card,index) => {
    card.addEventListener( 'click',function(){
        if( index == 0 )
            return;
        document.querySelector('.signup').classList.remove('select');
        document.querySelector('.plans').classList.add('select');
    } )
} )

document.querySelector('.plans__goback').addEventListener('click',function(){
    document.querySelector('.plans').classList.remove('select');
    setTimeout(()=>{
        document.querySelector('.signup').classList.add('select');
    },600);
});
