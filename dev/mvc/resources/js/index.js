// Obtén una referencia al formulario
var miFormulario = document.getElementById("miForm");

// Agrega un evento submit al formulario
miFormulario.addEventListener("click", function(event) {
    // Previene la acción predeterminada del formulario (enviar datos al servidor)
    event.preventDefault();

    // Obtén el botón que se hizo clic
    var botonClicado = event.target;
    console.log(botonClicado);
    //Redireccionar a diferentes páginas en función del botón que se hizo clic
    switch (botonClicado.id) {
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
