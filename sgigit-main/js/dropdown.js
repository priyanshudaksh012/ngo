var navigationDropdown = document.querySelector('.navigation__dropdown');
var dropdown = document.querySelector('.dropdown');

navigationDropdown.addEventListener( 'mouseover' , function(){
    console.log('Navigation IN');
    dropdown.style.left = navigationDropdown.getBoundingClientRect().left+'px';
    dropdown.style.top = (navigationDropdown.getBoundingClientRect().top+50)+'px';
    dropdown.style.opacity = 1;
    dropdown.style.display = 'flex';
} );

dropdown.addEventListener( 'mouseover' , function(){
    console.log('Dropdown IN');
    
    dropdown.style.left = navigationDropdown.getBoundingClientRect().left+'px';
    dropdown.style.top = (navigationDropdown.getBoundingClientRect().top+50)+'px';
    dropdown.style.opacity = 1;
    dropdown.style.display = 'flex';

} );

dropdown.addEventListener( 'mouseout' , function(){
    console.log('Dropdown OUT');
    
    dropdown.style.display = 'none';
    dropdown.style.opacity = 0;

} );

navigationDropdown.addEventListener( 'mouseout' , function(){
    
    dropdown.style.opacity = 0;
    dropdown.style.display = 'none';

} );