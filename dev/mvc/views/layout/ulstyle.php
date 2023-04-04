
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Principal</title>
    <!-- Link Bootstrap compilado -->
    <link rel="stylesheet" href="http://localhost/proyecto/dev/mvc/resources/css/bootstrap.css">
    <!-- Iconos de iconos8 -->
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Mis estilos -->
    <link rel="stylesheet" href="http://localhost/proyecto/dev/mvc/resources/css/style.css">
</head>

<body class="d-flex flex-column">
    <?php
        require "../layout/header.php";
    ?>
    <main class="container-xxl d-flex flex-column ps-3 pe-3 pb-3 main__user"> 
        <section class="d-flex  align-items-center justify-content-between">
                    <!-- <div class="d-flex justify-content-center align-items-center m-0 form-check border-end h-100  ul__li___div--size">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" data-target="textToStrike">
                    </div> -->

                    <button class="btn fs-6 d-flex bg-primary text-white justify-content-center align-items-center p-1 border rounded-4 mt-3 h-100 section__btn--size" type="submit">
                        Mis listas
                    </button>
                    <button class="btn fs-6 d-flex justify-content-center align-items-center p-1 border rounded-4 mt-3 h-100 section__btn--size" type="submit">
                        Próximas
                    </button>
                    <button class="btn fs-6 d-flex justify-content-center align-items-center p-1 border rounded-4 mt-3 h-100 section__btn--size" type="submit">
                        Pendientes
                    </button>
                    <button class="btn fs-6 d-flex justify-content-center align-items-center p-1 border rounded-4 mt-3 h-100" type="submit">
                        Completas
                    </button>
          
        </section>   
            <ul class="p-0 m-0">
                
                <!-- Ejemplo para listas de usuario que no estan en la papelera. Independientemente de que esten completas o no -->
                <li class="d-flex  align-items-center justify-content-between border rounded-4 mt-3 ul__li--size">

                    <div class="position-relative w-75 h-100">
                        <div class="p-0 ps-3 d-flex flex-column m-0 form-check h-100 justify-content-end w-100">
                            <div class="w-100 ul__li__div--scroll">
                                <p class="p-0 m-0 fs-4 fw-semibold " id="textToStrike">Tareas</p>

                            </div>
                            <div class="d-flex align-items-center  li__div__icon">
                                <i class="mb-1 la-lg las la-check-circle"></i><span class="fw-semibold mb-1 ms-2 m-0 p-0 fs-6 ">0/10</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="d-flex flex-column p-1 pe-3 h-100 justify-content-between ">
                        <div class="d-flex ">
                            <div class="me-3"><i class="la-2x las la-pen"></i></div> 
                            <div><i class="la-2x las la-trash-alt"></i></div>
                        </div>
                        
                    </div>
                </li>

                <li class="d-flex  align-items-center justify-content-between border bg-light rounded-4 mt-3 ul__li--size">
                   <!-- w-75 debe de pasar a 100 cuando la pantalla sea más grande -->
                    <div class="position-relative  w-75 h-100">
                        <div class="p-0 ps-3 d-flex flex-column m-0 form-check h-100 justify-content-end w-100">
                            <div class="w-100 ul__li__div--scroll">
                                <p class="p-0 m-0 fs-4 text-decoration-line-through text-muted fw-semibold" id="textToStrike">Compraaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>
                            </div>
                            
                            <div class="d-flex align-items-center  li__div__icon">
                                <i class="mb-1 la-lg las la-check-circle text-muted"></i><span class="mb-1 ms-2 m-0 p-0 fs-6 text-muted fw-semibold">10/10</span><span class="fw-semibold mb-1 ms-2 m-0 p-0 fs-6 text-muted">50.45€</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="d-flex flex-column p-1 pe-3 h-100 justify-content-between ">
                        <div class="d-flex ">
                            <div class="me-3"><i class="la-2x las la-pen"></i></div> 
                            <div><i class="la-2x las la-trash-alt"></i></div>
                        </div>
                        <div class="d-flex justify-content-center align-self-end"></div>
                    </div>
                </li>

                <li class="d-flex  align-items-center justify-content-between border rounded-4 mt-3 ul__li--size">
    
                    <div class="position-relative w-75 h-100">
                        
                        <div class="p-0 ps-3 d-flex flex-column m-0 form-check h-100 justify-content-end">
                            <div class="w-100 ul__li__div--scroll">
                                <p class="p-0 m-0 fs-4 fw-semibold " id="textToStrike">Estudiar</p>
                            </div>
                            
                            <div class="d-flex align-items-center  li__div__icon">
                                <i class="mb-1 la-lg las la-check-circle"></i>
                                <span class="fw-semibold mb-1 ms-2 m-0 p-0 fs-6">4/10</span>
                                <span class="fw-semibold mb-1 ms-2 m-0 p-0 fs-6">4.50 €</span>
                                <i class="w-semibold mb-1 ms-2 la-lg las la-bell"></i>
                                <i class="w-semibold mb-1 ms-2 la-lg las la-stopwatch"></i>
                                <span class="fw-semibold mb-1 ms-2 m-0 p-0 fs-6">2 h 35 min</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="d-flex flex-column p-1 pe-3 h-100 justify-content-between">
                        <div class="d-flex ">
                            <div class="me-3"><i class="la-2x las la-pen"></i></div> 
                            <div><i class="la-2x las la-trash-alt"></i></div>
                        </div>
                        
                    </div>
                </li>
                
                <!-- Ejemplo para items de una lista-->

                <li class="d-flex  align-items-center justify-content-between border rounded-4 mt-3 ul__li--size">
                    <div class="d-flex justify-content-center align-items-center m-0 form-check border-end h-100  ul__li___div--size">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" data-target="textToStrike">
                    </div>
                    <div class="position-relative w-75 h-100">
                        
                        <div class="p-0 ps-3 d-flex flex-column m-0 form-check h-100 justify-content-end">
                            <div>
                            
                            <span class="fw-semibold ms-1 mb-2 m-0 p-0 fs-6">4.50 €</span>
                            <span class="fw-semibold ms-1 mb-2 m-0 p-0 fs-6">x2</span>
                            </div>
                            <div class="w-100 ul__li__div--scroll">
                                <p class="p-0 m-0 fs-4 fw-semibold " id="textToStrike">Mates</p>
                            </div>
                            
                            <div class="d-flex align-items-center  li__div__icon">
                                                       
                                <i class="w-semibold mb-1  la-lg las la-stopwatch"></i>
                                <span class="fw-semibold mb-1 ms-2 m-0 p-0 fs-6">2 h 35 min</span>
                                
                                <i class="w-semibold mb-1 ms-2 la-lg las la-bell text-muted"></i>

                                <span class="fw-semibold mb-1 ms-2 m-0 p-0 fs-6">19:30 02/01/2023</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="d-flex flex-column p-1 pe-3 h-100 justify-content-between">
                        <div class="d-flex ">
                            <div class="me-3"><i class="la-2x las la-pen"></i></div> 
                            <div><i class="la-2x las la-trash-alt"></i></div>
                        </div>
                        
                    </div>
                </li>

                <li class="d-flex bg-light align-items-center justify-content-between border rounded-4 mt-3 ul__li--size">
                    <div class="d-flex justify-content-center align-items-center m-0 form-check border-end h-100  ul__li___div--size">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" data-target="textToStrike" checked>
                    </div>
                    <div class="position-relative w-75 h-100">
                        
                        <div class="p-0 ps-3 d-flex flex-column m-0 form-check h-100 justify-content-end">
                            <div>
                                <span class="fw-semibold ms-1 mb-2 m-0 p-0 fs-6 text-decoration-line-through text-muted">4.50 €</span>
                                <span class="fw-semibold ms-1 mb-2 m-0 p-0 fs-6 text-muted">x2</span>
                            </div>
                            <div class="w-100 ul__li__div--scroll">
                                <p class="p-0 m-0 fs-4 text-decoration-line-through text-muted fw-semibold " id="textToStrike">Lengua</p>
                            </div>
                            
                            <div class="d-flex align-items-center  li__div__icon">                                
                                <i class="w-semibold mb-1 la-lg las la-stopwatch text-muted"></i>
                                <span class="fw-semibold mb-1 ms-2 m-0 p-0 fs-6 text-muted">2h 35 min</span>
                                <i class="w-semibold mb-1 ms-2 la-lg las la-bell text-muted"></i>
                                <span class="fw-semibold mb-1 ms-2 m-0 p-0 fs-6 text-decoration-line-through text-muted">19:30 02/01/2023</span>  
                            </div>
                        </div>
                    </div>
                    
                    <div class="d-flex flex-column p-1 pe-3 h-100 justify-content-between">
                        <div class="d-flex ">
                            <div class="me-3"><i class="la-2x las la-pen"></i></div> 
                            <div><i class="la-2x las la-trash-alt"></i></div>
                        </div>
                        
                    </div>
                </li>
                
                <!-- Ejemplo para items en próximas, pendientes y completados-->

                <li class="d-flex  align-items-center justify-content-between border rounded-4 mt-3 ul__li--size">
                    <div class="d-flex justify-content-center align-items-center m-0 form-check border-end h-100  ul__li___div--size">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" data-target="textToStrike">
                    </div>
                    <div class="position-relative w-75 h-100">
                        
                        <div class="p-0 ps-3 d-flex flex-column m-0 form-check h-100 justify-content-end">
                            <div>
                            
                            <span class="fw-semibold ms-1 mb-2 m-0 p-0 fs-6">4.50 €</span>
                            <span class="fw-semibold ms-1 mb-2 m-0 p-0 fs-6">x2</span>
                            </div>
                            <div class="w-100 ul__li__div--scroll">
                                <p class="p-0 m-0 fs-4 fw-semibold " id="textToStrike"><span class="p-0 m-0 fs-4 fw-semibold">Estudiar - </span>Mates</p>
                            </div>
                            
                            <div class="d-flex align-items-center  li__div__icon">
                                                       
                                <i class="w-semibold mb-1  la-lg las la-stopwatch"></i>
                                <span class="fw-semibold mb-1 ms-2 m-0 p-0 fs-6">2 h 35 min</span>
                                
                                <i class="w-semibold mb-1 ms-2 la-lg las la-bell text-muted"></i>

                                <span class="fw-semibold mb-1 ms-2 m-0 p-0 fs-6">19:30 02/01/2023</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="d-flex flex-column p-1 pe-3 h-100 justify-content-between">
                        <div class="d-flex ">
                            <div class="me-3"><i class="la-2x las la-pen"></i></div> 
                            <div><i class="la-2x las la-trash-alt"></i></div>
                        </div>
                        
                    </div>
                </li>

                

                <li class="d-flex bg-light align-items-center justify-content-between border rounded-4 mt-3 ul__li--size">
                    <div class="d-flex justify-content-center align-items-center m-0 form-check border-end h-100  ul__li___div--size">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" data-target="textToStrike" checked>
                    </div>
                    <div class="position-relative w-75 h-100">
                        
                        <div class="p-0 ps-3 d-flex flex-column m-0 form-check h-100 justify-content-end">
                            <div>
                                <span class="fw-semibold ms-1 mb-2 m-0 p-0 fs-6 text-decoration-line-through text-muted">4.50 €</span>
                                <span class="fw-semibold ms-1 mb-2 m-0 p-0 fs-6 text-muted">x2</span>
                            </div>
                            <div class="w-100 ul__li__div--scroll">
                                <p class="p-0 m-0 fs-4 text-decoration-line-through text-muted fw-semibold " id="textToStrike"><span class="p-0 m-0 fs-4 fw-semibold">Estudiar - </span>Lengua</p>
                            </div>
                            
                            <div class="d-flex align-items-center  li__div__icon">                                
                                <i class="w-semibold mb-1 la-lg las la-stopwatch text-muted"></i>
                                <span class="fw-semibold mb-1 ms-2 m-0 p-0 fs-6 text-muted">2h 35 min</span>
                                <i class="w-semibold mb-1 ms-2 la-lg las la-bell text-muted"></i>
                                <span class="fw-semibold mb-1 ms-2 m-0 p-0 fs-6 text-decoration-line-through text-muted">19:30 02/01/2023</span>  
                            </div>
                        </div>
                    </div>
                    
                    <div class="d-flex flex-column p-1 pe-3 h-100 justify-content-between">
                        <div class="d-flex ">
                            <div class="me-3"><i class="la-2x las la-pen"></i></div> 
                            <div><i class="la-2x las la-trash-alt"></i></div>
                        </div>
                        
                    </div>
                </li>
                
            </ul>
       
        <button class="btn btn-secondary fs-5 text-light d-flex justify-content-center align-items-center p-1 button button__add_list">
        <i class="la-2x las la-plus-circle"></i></button>
    </main>
</body>

</html>