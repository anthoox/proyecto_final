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



var listname;

// Obtención todos los elementos con la clase 'icon__editList'
var editIcons = document.querySelectorAll('.icon__editList');

// Agrega un evento de clic a cada icono de edición
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

    
    listname = secondChild
    console.log(listname);

  });
}


//Boton editar lista - llama una ventana para editarla
var iconEdit = document.querySelectorAll('.icon__editList');
for(let i = 0; i<iconEdit.length; i++){
    iconEdit[i].addEventListener('click', showEditList, false);
}
editList = document.querySelector('.section__editList');
editList.style.transition='all 500ms';
iconCloseEdit = document.querySelector('.icon__editList--close');
iconCloseEdit.addEventListener('click', showEditList, false);
//Funcion que muestra el formulario para cambio de nombre
function showEditList(){
    prueba = document.querySelector('#editNameInput');
document.querySelector('#editNameInput').value=listname;
console.log(prueba)
    if(editList.classList.contains('reset__position--0')){
        editList.classList.remove('reset__position--0');
    }else{
        editList.classList.add('reset__position--0');
    }
}
