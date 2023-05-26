//boton añadir lista:
btnList = document.querySelector('.button__add_list');
btnList.addEventListener('click', showAddList, false);

//menu:
addList = document.querySelector('.section__addList');
iconClose = document.querySelector('.icon__addList--close');
iconClose.addEventListener('click', showAddList, false)

function showAddList(){
    addList.style.transition='all 500ms';
    if(addList.classList.contains('reset__position--0')){
        addList.classList.remove('reset__position--0');
    }else{
        addList.classList.add('reset__position--0');
    }
    
}

