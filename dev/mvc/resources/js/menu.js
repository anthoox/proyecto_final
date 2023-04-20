//variable que llevará el identificador de la lista
var idList;
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


// //boton añadir item:)=========================================
// btnItem = document.querySelector('.button__add_item');
// btnItem.addEventListener('click', showAddItem, false);

// addItem = document.querySelector('.section__addList');
// addItem.style.transition='all 500ms';
// iconClose = document.querySelector('.icon__addList--close');
// iconClose.addEventListener('click', showAddItem, false)

// function showAddItem(){
//     if(addItem.classList.contains('reset__position--0')){
//         addItem.classList.remove('reset__position--0');
//     }else{
//         addItem.classList.add('reset__position--0');
//     }
// }
///////////////////////////////////////////================================================//////////////////////////////////



// Obtención todos los elementos con la clase 'icon__editList'
var editIcons = document.querySelectorAll('.icon__editList');
// Agrega un evento de clic a cada icono de edición y obtención del valor del elemento que queremos borrar
for (var i = 0; i < editIcons.length; i++) {
  editIcons[i].addEventListener('click', function(event) {

    var parentElement = event.target.parentElement;
    parentElement = parentElement.parentElement;
    parentElement = parentElement.parentElement;
    var broElement = parentElement.previousElementSibling;
    var sonElement = broElement.firstElementChild;
    sonElement = sonElement.firstElementChild;
    sonElement = sonElement.firstElementChild;
    var secondChild = sonElement.children[0].value

    idList = secondChild
  });
}

// Obtención todos los elementos con la clase 'icon__trashList'
var iconTrash = document.querySelectorAll('.icon__trashList');
for (var i = 0; i < iconTrash.length; i++) {
    iconTrash[i].addEventListener('click', function(event) {
  
      var parentElement = event.target.parentElement;
      parentElement = parentElement.parentElement;
      parentElement = parentElement.parentElement;
      var broElement = parentElement.previousElementSibling;
      var sonElement = broElement.firstElementChild;
      sonElement = sonElement.firstElementChild;
      sonElement = sonElement.firstElementChild;
      var secondChild = sonElement.children[0].value
  
      idList = secondChild
    });
  }

//Boton editar lista - llama una ventana para editarla
for(let i = 0; i<editIcons.length; i++){
    editIcons[i].addEventListener('click', showEditList, false);
}

editList = document.querySelector('.section__editList');
editList.style.transition='all 500ms';
iconCloseEdit = document.querySelector('.icon__editList--close');
iconCloseEdit.addEventListener('click', showEditList, false);


//Asignación de evento a todos los iconTrash.
for(let i = 0; i<iconTrash.length; i++){
    iconTrash[i].addEventListener('click', showTrashList, false);
}

trashList = document.querySelector('.section__trashList');
trashList.style.transition='all 500ms';
iconCloseTrash = document.querySelector('.icon__trashList--close');
iconCloseTrash.addEventListener('click', showTrashList, false);




  
//Funcion que muestra el formulario para cambio de nombre. EStos se podria optimizar con una funcion.
function showEditList(){
    document.querySelector('#editNameInput').value=idList;
        if(editList.classList.contains('reset__position--0')){
            editList.classList.remove('reset__position--0');

        }else{
            trashList.classList.remove('reset__position--0');
            editList.classList.add('reset__position--0');

        }
}

//Función para enviar una lista a la papelera
function showTrashList(){
    //añadimos el valor de idList del elemento que ha generado el evento
    document.querySelector('#trashList').value=idList;
        if(trashList.classList.contains('reset__position--0')){
            trashList.classList.remove('reset__position--0');

        }else{
            editList.classList.remove('reset__position--0');
            trashList.classList.add('reset__position--0');

        }
}

