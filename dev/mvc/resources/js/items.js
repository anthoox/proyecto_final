//boton añadir item:
btnItem = document.querySelector('.button__add_item');
btnItem.addEventListener('click', showAddItem, false);

addItem = document.querySelector('.section__addItem');
addItem.style.transition='all 500ms';
iconClose = document.querySelector('.icon__addList--close');
iconClose.addEventListener('click', showAddItem, false)

function showAddItem(){
    if(addItem.classList.contains('reset__position--0')){
        addItem.classList.remove('reset__position--0');
    }else{
        addItem.classList.add('reset__position--0');
    }
}