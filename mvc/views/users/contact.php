<!DOCTYPE html>
<html lang="es">';
<?php
require "../layout/head.php";
?>
<body class="d-flex flex-column justify-content-between p-3">
<!-- body__grid--contact -->
    <header class="d-md-none container-fluid border-bottom fixed-top z-3 bg-white ps-3 pe-3 shadow" >
        <div class=" d-flex justify-content-between align-items-center header__cnt">
            <div class="d-flex align-items-center">
                <a href="../users/index.php"><i class="text-black la-2x las la-angle-left"></i></a><span class="ms-2 fs-4">Atras</span>
            </div>
            <h1 class="m-0 fs-2 fw-semibold">Contacto</h1>
        </div>
    </header>

    <header class="d-none d-md-block container-fluid border-bottom fixed-top z-3 bg-white ps-3 pe-3 shadow " >
        <div class=" d-flex justify-content-between align-items-center ">
            <div class="d-flex align-items-center">
                <a href="../users/index.php"><i class="text-black la-2x las la-angle-left"></i></a><span class="ms-2 fs-4">Atras</span>
            </div>
            <h1 class="m-0 fs-2 fw-semibold">Contacto</h1>
            <div>
                <img class="logo" src="http://localhost/proyecto/mvc/resources/img/logo.svg" alt="logo web" >
            </div>
        </div>
    </header>
    <main class="mt-3 mt-md-5 container-xxl d-flex flex-column  p-0 main__trash">
        <section class="d-flex justify-content-between flex-column align-items-center m-0 p-2 pt-0">
            <p class="p-1 fs-5 parraf__contact--justify">En Lista Simple, valoramos tu opinión y estamos aquí para atender cualquier pregunta, sugerencia o consulta que puedas tener. Queremos asegurarnos de que tengas la mejor experiencia posible con nuestra aplicación y que te sientas apoyado en todo momento.

Nuestra sección de contacto es el lugar perfecto para que puedas comunicarte con nosotros. Estamos listos para escuchar tus comentarios, resolver tus dudas y ayudarte en lo que necesites. Ya sea que tengas alguna sugerencia para mejorar la aplicación, necesites asistencia técnica o simplemente quieras dejarnos un mensaje de aprecio, estaremos encantados de recibirlo.

</p>
<p class="p-1 fs-5 parraf__contact--justify">Puedes comunicarte con nosotros enviándonos un correo electrónico a <span class="fw-bolder fs-5">contacto@listasimple.com</span>. Nos comprometemos a responder a la brevedad posible, porque tu satisfacción es nuestra prioridad.

Tu opinión es valiosa para nosotros, ya que nos ayuda a crecer y mejorar continuamente. Así que no dudes en ponerte en contacto con nosotros. ¡Estamos ansiosos por escucharte!

Gracias por ser parte de la comunidad de Lista Simple y por confiar en nosotros para organizar tu vida de manera sencilla y eficiente.</p>
            <p class="fs-5 text-left">Correo de contacto: <span class="fw-bolder fs-5">contacto@listasimple.com</span></p>
            <form class="mt-3 row d-flex align-items-center justify-content-center">
                <div class="col-11 ">
                    <select class=" mb-3 form-select fs-5" aria-label="Default select example" disabled>
                        <option selected>Seleccione el asunto</option>
                        <option class="fs-5" value="1">Consulta</option>
                        <option class="fs-5" value="2">Comentarios</option>
                        <option class="fs-5" value="3">Reclamación</option>
                        <option class="fs-5" value="3">Otros</option>
                    </select>
                </div>              
                <div class="mt-1 col-11 fs-5 mb-3">
                    <label for="exampleFormControlTextarea1" class="ms-2 p-0 m-0 mb-2 fs-5 form-label">Escriba aquí su consulta</label>
                    <textarea class=" fs-5 form-control" id="exampleFormControlTextarea1" rows="3" disabled></textarea>
                </div>
            </form>

            
        </section>
    </main>
    <footer class="">
        <p class="fs-5 text-center">Siguenos en:</p>
        <div class="d-flex justify-content-center  ">
            <a class="text-decoration-none text-black" target="_blank" href="https://www.linkedin.com/in/anthony-alegr%C3%ADa-alc%C3%A1ntara-58920a233/"><i class="me-4 lab la-3x la-linkedin"></i></a>
            <a class="text-decoration-none text-black" target="_blank" href="https://github.com/anthoox/proyecto_final"><i class="me-4 lab la-3x la-github"></i></a> 
            <a class="text-decoration-none text-black" target="_blank" href="https://www.youtube.com/channel/UCoDBM6mX49A52d_RYcPbv-Q"><i class="la-3x lab la-youtube"></i></a>
            <a class="text-decoration-none text-black" target="_blank" href="https://www.facebook.com/anthony.laos"><i class="ms-4 la-3x lab la-facebook"></i></a>
        </div>
        <p class="text-center p-2 fs-5 w-100">Desarrollado por <span class="fs-5 fw-bold">Anthony Alegría Alcántara</span> como proyecto final de DAW en el centro CCC.<br> Todos los derechos reservados 2023 <br>
        Curso 2022-2023</p>

    </footer>
</body>

</html>