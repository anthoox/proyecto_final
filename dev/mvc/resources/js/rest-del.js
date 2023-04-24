var idList;
//configuración icono para restetear la papelera.
var iconRest = document.querySelectorAll('.icon__restList');
for (var i = 0; i < iconRest.length; i++) {
    iconRest[i].addEventListener('click', function(event) {
  
      var parentElement = event.target.parentElement;
      parentElement = parentElement.parentElement;
      parentElement = parentElement.parentElement;
      var broElement = parentElement.previousElementSibling;
      var sonElement = broElement.firstElementChild;
      sonElement = sonElement.firstElementChild;
      sonElement = sonElement.firstElementChild;
      var secondChild = sonElement.children[1].innerHTML
  
      idList = secondChild
       console.log(secondChild); //para comprobar el id del elemento seleccionado
    });
  }

//Asignación de evento a todos los iconRest.
for(let i = 0; i<iconRest.length; i++){
    iconRest[i].addEventListener('click', showRestList, false);
}

restList = document.querySelector('.section__restList');
restList.style.transition='all 500ms';
iconCloseRest = document.querySelector('.icon__restList--close');
iconCloseRest.addEventListener('click', showRestList, false);

function showRestList(){
    document.querySelector('#restList').value=idList;
        if(restList.classList.contains('reset__position--0')){
            restList.classList.remove('reset__position--0');

        }else{
            deleteList.classList.remove('reset__position--0');
            restList.classList.add('reset__position--0');

        }
}

//DELETE LIST===================================================================
var iconDelete = document.querySelectorAll('.icon__delList');
for (var i = 0; i < iconDelete.length; i++) {
    iconDelete[i].addEventListener('click', function(event) {
  
      var parentElement = event.target.parentElement;
      parentElement = parentElement.parentElement;
      parentElement = parentElement.parentElement;
      var broElement = parentElement.previousElementSibling;
      var sonElement = broElement.firstElementChild;
      sonElement = sonElement.firstElementChild;
      sonElement = sonElement.firstElementChild;
      var secondChild = sonElement.children[1].innerHTML
  
      idList = secondChild
      console.log(secondChild);
    });
  }

//Asignación de evento a todos los iconDelete.
for(let i = 0; i<iconRest.length; i++){
    iconDelete[i].addEventListener('click', showDeleteList, false);
}

deleteList = document.querySelector('.section__deleteList');
deleteList.style.transition='all 500ms';
iconCloseDel = document.querySelector('.icon__deleteList--close');
iconCloseDel.addEventListener('click', showDeleteList, false);

function showDeleteList(){
    document.querySelector('#deleteList').value=idList;
        if(deleteList.classList.contains('reset__position--0')){
            deleteList.classList.remove('reset__position--0');

        }else{
            restList.classList.remove('reset__position--0');
            deleteList.classList.add('reset__position--0');

        }
}