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

//Selección de los checkbox y se añade addEvenListener con evento a cada una
var checkButtons = document.querySelectorAll('.input-check');
for(i = 0; i<= checkButtons.length; i++){
 
    checkButtons[i].addEventListener("change", function (event){
        //Selección del elemento target
        var checkBox = event.target
        var isChecked = checkBox.checked;
        var idItem = checkBox.value;
        //Comprobación si el elemento tiene activo el check
        if (isChecked) {
            activateItem(idItem);
        } else {
            deactivateItem(idItem);
        }
        console.log(idItem);
    })
}

//Función para activar
function activateItem(idItem) {
    const xhr = new XMLHttpRequest();
    const url = 'http://localhost/proyecto/dev/mvc/controllers/check.php';

    xhr.open('POST', url, true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                console.log(xhr.responseText);
            } else {
                console.error('Error en la petición: ' + xhr.status);
            }
        }
    };

    const params = 'action=activate&idItem=' + encodeURIComponent(idItem);
    xhr.send(params);
}
//Función para desactivar el chek
function deactivateItem(idItem) {
    const xhr = new XMLHttpRequest();
    const url = 'http://localhost/proyecto/dev/mvc/controllers/check.php';

    xhr.open('POST', url, true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                console.log(xhr.responseText);
            } else {
                console.error('Error en la petición: ' + xhr.status);
            }
        }
    };

    const params = 'action=deactivate&idItem=' + encodeURIComponent(idItem);
    xhr.send(params);
}
