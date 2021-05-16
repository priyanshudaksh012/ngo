var slideDots = document.getElementsByClassName('slide__dot');
var slides = document.getElementsByClassName('slide');
var currentSlide = 0;

var slideOne = {
    in : function(){
        slides[0].style.animation = 'slideIN 2s ease-in-out';
        slides[0].style.display = 'block';
    },
    out : function(){
        slides[0].style.animation = 'slideOUT 2s ease-in-out';
        setTimeout(
            function(){
                slides[0].style.display = 'none';
            },1001
        );
    } 
}

var slideTwo = {
    in : function(){
        slides[1].style.animation = 'slideIN 2s ease-in-out';
        slides[1].style.display = 'block';
    },
    out : function(){
        slides[1].style.animation = 'slideOUT 2s ease-in-out';
        setTimeout(
            function(){
                slides[1].style.display = 'none';
            },1001
        );
    } 
}

var slideThree = {
    in : function(){
        slides[2].style.animation = 'slideIN 2s ease-in-out';
        slides[2].style.display = 'block';
    },
    out : function(){
        slides[2].style.animation = 'slideOUT 2s ease-in-out';
        setTimeout(
            function(){
                slides[2].style.display = 'none';
            },1001
        );
    } 
}

Array.from(slideDots).forEach( (dot,index) => {
    dot.addEventListener( 'click',() => {
        clearInterval(slideShow);
        Array.from(slideDots).forEach( d => {
            d.classList.remove('selected');
        } );

        if( index === currentSlide ){

        }else{
            switch( currentSlide ){
                case 0:
                    slideOne.out();
                    break;
                case 1:
                    slideTwo.out();
                    break;
                case 2:
                    slideThree.out();
                    break;
            }
            switch( index ){
                case 0:
                    slideOne.in();
                    break;
                case 1:
                    slideTwo.in();
                    break;
                case 2:
                    slideThree.in();
                    break;
            }
            currentSlide = index;
            dot.classList.add('selected');
        }

        setTimeout(
            function(){
                clearInterval(slideShow);
                slideShow = setInterval(
                    function(){
                        switch( currentSlide ){
                            case 0:
                                slideOne.out();
                                slideDots[0].classList.remove('selected');
                                break;
                            case 1:
                                slideTwo.out();
                                slideDots[1].classList.remove('selected');
                                break;
                            case 2:
                                slideThree.out();
                                slideDots[2].classList.remove('selected');
                                break;
                        }
                
                        let index = 0;
                        if( currentSlide <= 1 ){
                            index = currentSlide+1;
                        }else{
                            index = 0;
                        }
                
                        switch( index ){
                            case 0:
                                slideOne.in();
                                slideDots[0].classList.add('selected');
                                break;
                            case 1:
                                slideTwo.in();
                                slideDots[1].classList.add('selected');
                                break;
                            case 2:
                                slideThree.in();
                                slideDots[2].classList.add('selected');
                                break;
                        }
                
                        currentSlide = index;
                    },10000
                )
            },2100
        );
    } )
} );

var slideShow = setInterval(
    function(){
        switch( currentSlide ){
            case 0:
                slideOne.out();
                slideDots[0].classList.remove('selected');
                break;
            case 1:
                slideTwo.out();
                slideDots[1].classList.remove('selected');
                break;
            case 2:
                slideThree.out();
                slideDots[2].classList.remove('selected');
                break;
        }

        let index = 0;
        if( currentSlide <= 1 ){
            index = currentSlide+1;
        }else{
            index = 0;
        }

        switch( index ){
            case 0:
                slideOne.in();
                slideDots[0].classList.add('selected');
                break;
            case 1:
                slideTwo.in();
                slideDots[1].classList.add('selected');
                break;
            case 2:
                slideThree.in();
                slideDots[2].classList.add('selected');
                break;
        }

        currentSlide = index;
    },10000
);

