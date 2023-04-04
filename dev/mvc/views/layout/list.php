<?php 

    //Creo que esto debería ir al controlador.
    $lists = new Lists();
    $items = new Items();
    
    $activeLists = $lists->getActiveLists($_SESSION['id_user']);
    
    //Si tiene listas:
    if($activeLists){
        //Esto me vale para el cambio del tiempo
        $totalP = $items->fullPriceItems($_SESSION['id_user']);
        if($totalP[0]>0){
            $totalP = $totalP[0];
            $totalP = round($totalP, 3) . "€";
            
        }else{
            $totalP = '0';
        }
        //ESTA SECCION VA EN ITEMS
        // echo 
        // '<header id="carouselExampleDark" class="carousel carousel-dark slide border rounded-4 mt-3 pt-3 pb-3 w-100">
        //     <div class="carousel-inner ">
        //       <div class="carousel-item active">
        //         <p class="p-0 m-0  fw-semibold fs-5 text-center">Precio total: '. $totalP .' </p>      
        //       </div>
              
        //       <div class="carousel-item">
        //         <p class="p-0 m-0 fw-semibold fs-5 text-center">Tiempo total: </p>
                
        //       </div>
        //     </div>
        //     <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
        //       <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        //       <span class="visually-hidden">Previous</span>
        //     </button>
        //     <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
        //       <span class="carousel-control-next-icon" aria-hidden="true"></span>
        //       <span class="visually-hidden">Next</span>
        //     </button>
        // </header>';
        for($i = 0; $i<sizeof($activeLists); $i++){
            $itemsTotal = $items->getItems('id_list', $activeLists[$i]['id_list']);
            if($itemsTotal){
                $itemsTotal = $itemsTotal['rows'];
            }else{
                $itemsTotal = 0;
            }

            $itemsPrice = $items->sumPriceItems($activeLists[$i]['id_list']);
            if($itemsPrice[0]>0){
                $itemsPrice = $itemsPrice[0];
                $itemsPrice = round($itemsPrice, 3) . "€";
                
            }else{
                $itemsPrice = '';
            }

             $itemChecked = $lists->checked($activeLists[$i]['id_list']);     
            if($itemChecked == false){
                 $itemChecked['items'] = 0;
            }
    
            echo
            '<ul class="p-0 m-0">
                <li class="d-flex  align-items-center justify-content-between border rounded-4 mt-3 ul__li--size">
                    <div class="position-relative w-75 h-100">
                        <div class="p-0 ps-3 d-flex flex-column m-0 form-check h-100 justify-content-end w-100">
                            <div class="w-100 ul__li__div--scroll">
                                <p class="p-0 m-0 fs-4 fw-semibold " id="textToStrike">' . $activeLists[$i]['list_name'] .'</p>
        
                            </div>
                            <div class="d-flex align-items-center  li__div__icon">
                                <i class="mb-1 la-lg las la-check-circle"></i><span class="fw-semibold mb-1 ms-2 m-0 p-0 fs-6 ">' . $itemChecked['items'] .  '/'. $itemsTotal . '</span>
                                <span class="fw-semibold mb-1 ms-2 m-0 p-0 fs-6">' . $itemsPrice .'</span>
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
            </ul>';
        }
    }else{
        
        $_SESSION['error_message']['loadLists'] = "No tiene listas creadas aún";
        //ESto debe almacenarse en un error.
        // echo ;
        echo
            '<ul class="p-0 m-0"> 
                <li class="d-flex  align-items-center justify-content-between mt-5">
                    <div class="position-relative w-100 h-100">
                        <div class="p-0 ps-3 d-flex  m-0 form-check h-100 justify-content-center align-items-center w-100">        
                            <p class="p-0 m-0 fs-5 fw-semibold text-muted" id="textToStrike">' . $_SESSION['error_message']['loadLists'] .'</p>
                        </div>
                    </div>     
                </li>
            </ul>';
    }    
?>