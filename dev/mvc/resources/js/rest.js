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
      console.log(secondChild);
    });
  }

//Asignación de evento a todos los iconTrash.
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
            // trashList.classList.remove('reset__position--0');
            restList.classList.add('reset__position--0');

        }
}