//boton mostrar menu:
btnMenu = document.querySelector('.icon__menu--user');
btnMenu.addEventListener('click', showMenu, false);

//menu:
menu = document.querySelector('.menu');
menu.style.transition='all 500ms';
menuBtnClose = document.querySelector('.icon__menu--close');
menuBtnClose.addEventListener('click', showMenu, false)

function showMenu(){
    if(menu.classList.contains('reset__position--0')){
        menu.classList.remove('reset__position--0');
    }else{
        menu.classList.add('reset__position--0');
    }
    
}

//boton añadir lista:
btnList = document.querySelector('.button__add_list');
btnList.addEventListener('click', showAddList, false);

//menu:
addList = document.querySelector('.section__addList');
addList.style.transition='all 500ms';
iconClose = document.querySelector('.icon__addList--close');
iconClose.addEventListener('click', showAddList, false)

function showAddList(){
    if(addList.classList.contains('reset__position--0')){
        addList.classList.remove('reset__position--0');
    }else{
        addList.classList.add('reset__position--0');
    }
    
}