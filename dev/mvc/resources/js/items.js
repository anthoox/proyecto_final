//boton añadir item:
//Selección del boton y se le asigna el envento shoAddItem
var btnDelItem = document.querySelector('.button__add_item');
btnDelItem.addEventListener('click', showAddItem, false);
//Selección de la ventana con el formulario para añadir el item
var addItem = document.querySelector('.section__addItem');
//Selección del botón para cerrar la venta del formulario
var iconClose = document.querySelector('.icon__addList--close');
//Asignación de la clase para cerrar la ventana
iconClose.addEventListener('click', showAddItem, false)
  

//funcion para mostrar ventana para añadir item addItem.php
function showAddItem(){
    addItem.style.transition='all 500ms';
    if(addItem.classList.contains('reset__position--0')){
        addItem.classList.remove('reset__position--0');
    }else{
        addItem.classList.add('reset__position--0');
    }
}

