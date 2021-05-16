var testimonialDots = document.getElementsByClassName('testimonials__dot');
var testimonials = document.getElementsByClassName('testimonial');
var currentTestimonial = 0;

Array.from(testimonialDots).forEach( (dot,index) => {
    dot.addEventListener( 'click', function () { 

        Array.from(testimonialDots).forEach( d => {
            d.classList.remove('selected');
        } );

        if( currentTestimonial === index ){
            //DO NOTHING
        }else{
            switch( currentTestimonial ){
                case 0 : {
                    testimonials[0].style.left = '-100%';
                }
                case 1 : {
                    if( index === 0 ){
                        testimonials[1].style.left = '100%';
                    }else{
                        testimonials[1].style.left = '-100%';
                    }
                }
                case 2 : {
                    testimonials[2].style.left = '100%';
                }
            }
            testimonials[index].style.left = '0%';
            dot.classList.add('selected');
            currentTestimonial = index;
        }
    } )
} );