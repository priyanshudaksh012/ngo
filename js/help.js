var causesDots = document.getElementsByClassName( 'causes__dot' );
var winWidth = window.innerWidth;

if( winWidth > 768 ){
    let active = 3;

    Array.from(causesDots).forEach( (dot,i) => {
        dot.classList.add('deactive');
        if( i <= active ){
            dot.classList.remove('deactive');
        }else{
            dot.classList.remove('active');
        }
    } );

}else if( winWidth <= 768 && winWidth > 450 ) {
    let active = 4;

    Array.from(causesDots).forEach( (dot,i) => {
        dot.classList.add('deactive');
        if( i <= active ){
            dot.classList.remove('deactive');
        }else{
            dot.classList.remove('active');
        }
    } );
}else{
    let active = 9;
    Array.from(causesDots).forEach( (dot,i) => {
        dot.classList.add('deactive');
        if( i <= active ){
            dot.classList.remove('deactive');
        }
    } );
}


window.addEventListener( 'resize' , function(){

    winWidth = window.innerWidth;
    
    if( winWidth > 768 ){
        let active = 3;

        Array.from(causesDots).forEach( (dot,i) => {
            dot.classList.add('deactive');
            if( i <= active ){
                dot.classList.remove('deactive');
            }else{
                dot.classList.remove('active');
            }
        } );

    }else if( winWidth <= 768 && winWidth > 450 ) {
        let active = 4;

        Array.from(causesDots).forEach( (dot,i) => {
            dot.classList.add('deactive');
            if( i <= active ){
                dot.classList.remove('deactive');
            }else{
                dot.classList.remove('active');
            }
        } );
    }else{
        let active = 9;
        Array.from(causesDots).forEach( (dot,i) => {
            dot.classList.add('deactive');
            if( i <= active ){
                dot.classList.remove('deactive');
            }
        } );
    }

} );

Array.from(causesDots).forEach( (dot,index) => {
    dot.addEventListener( 'click' , function(){
        Array.from(causesDots).forEach( (dot) => {
            dot.classList.remove('selected');
        } );
        dot.classList.add('selected');        
        
        if( winWidth > 768 && index === 3 ){
            document.querySelector('.causes__container').style.left = -233.37+'%';
        }else{
            document.querySelector('.causes__container').style.left = -(index*100)+'%';
        }

    } )
} )

