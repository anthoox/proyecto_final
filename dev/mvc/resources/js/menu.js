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


//Boton editar lista - llama una ventana para editarla
iconEdit = document.querySelectorAll('.icon__editList');
for(let i = 0; i<iconEdit.length; i++){
    iconEdit[i].addEventListener('click', showEditList, false);
}
editList = document.querySelector('.section__editList');
editList.style.transition='all 500ms';
iconCloseEdit = document.querySelector('.icon__editList--close');
iconCloseEdit.addEventListener('click', showEditList, false);

function showEditList(){
    if(editList.classList.contains('reset__position--0')){
        editList.classList.remove('reset__position--0');
    }else{
        editList.classList.add('reset__position--0');
    }

}

function borrarLista(list_name) {
    // Realizar una solicitud AJAX al controlador PHP para borrar la lista sin recargar la página
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'C:/xampp/htdocs/proyecto/dev/mvc/controllers/controller.php', true); // Reemplaza 'controlador.php' con la ruta correcta a tu controlador PHP
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                // Actualizar la página o realizar cualquier otra acción después de borrar la lista
                alert('Lista borrada exitosamente!');
                location.reload(); // Recargar la página para actualizar la lista
            } else {
                // Manejar errores en la solicitud AJAX si es necesario
                console.error('Error al borrar la lista:', xhr.statusText);
            }
        }
        ///probar a obtener el texto con javascript para la funcioón.
    };
    xhr.send('list_name=' + list_name); // Enviar el id_list como datos en la solicitud
}

