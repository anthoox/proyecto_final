//boton:
btnMenu = document.querySelector('.icon__menu--user');
btnMenu.addEventListener('click', showMenu, false);

//menu:
menu = document.querySelector('.menu');
btnClose = document.querySelector('.icon__menu--close');
btnClose.addEventListener('click', showMenu, false)

function showMenu(){
    if(menu.classList.contains('menu__position--0')){
        menu.classList.remove('menu__position--0');
    }else{
        menu.classList.add('menu__position--0');
    }
    
}
