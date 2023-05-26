// Obtén una referencia al formulario
var linksBotons = document.getElementById("miForm");

// Agrega un evento submit al formulario
linksBotons.addEventListener("click", function(event) {
    // Previene la acción predeterminada del formulario (enviar datos al servidor)
    event.preventDefault();

    // Obtencion el botón que se hizo clicado
    var btnClicked = event.target;
    switch (btnClicked.id) {
    case "btn-1":
        window.location.href = "./index.php";
        break;
    case "btn-2":
        window.location.href = "./upcoming.php";
       
        break;
    case "btn-3":
        window.location.href = "./pending.php";
        break;
    case "btn-4":
        window.location.href = "./completed.php";
        break;
    default:
        // Acción predeterminada si no se encuentra el botón
        console.log("Botón no reconocido");
        break;
    }
});




//Configuración para que el texto flotante desaparezca
var parraf = document.querySelector(".p-flotante");
setTimeout(() => {
    parraf.style.display = "none";
}, 2500);


