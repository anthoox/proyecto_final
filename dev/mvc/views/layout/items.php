<?php 
    require_once 'C:/xampp/htdocs/proyecto/dev/mvc/controllers/controller.php';
    require_once 'C:/xampp/htdocs/proyecto/dev/mvc/controllers/functions.php';
    //Creo que esto debería ir al controlador.
    $items = new Items();

    $itemsList = $items->getItems('id_list',3);
    $items_total_price = $items->totalItemsTime();
    $items_total_price = format_time($items_total_price[0]);
    //Si tiene listas:
    if($itemsList){
        //Precio total para la cabecera
        $totalP = $items->sumPriceItems(3);
        if($totalP[0]>0){
            $totalP = $totalP[0];
            $totalP = round($totalP, 3) . "€";
            
        }else{
            $totalP = '0';
        }
        echo 
        //Le quito el carousel-dark
        '<header id="carouselExampleDark" class="carousel  slide border rounded-4 mt-3 pt-3 pb-3 w-100">
            <div class="carousel-inner ">
              <div class="carousel-item active">
                <p class="p-0 m-0  fw-semibold fs-5 text-center">Precio total: '. $totalP .' </p>      
              </div>
              
              <div class="carousel-item">
                <p class="p-0 m-0 fw-semibold fs-5 text-center">Tiempo acumulado: '.$items_total_price.'</p>
                
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
        </header>';
        for($i = 0; $i<(sizeof($itemsList)-1); $i++){
            
            $item_price = $itemsList[$i]['price'];
            if($item_price<=0){
                $item_price = '';
            }else{
                $item_price = $item_price . "€";
            }

            $quantity = 'x' . $itemsList[$i]['quantity'];
            
            $item_time = $itemsList[$i]['total_time'];
            $item_time = format_time($item_time);
            

            $notif_date  = $itemsList[$i]['alarm_date'];
            $notif_date =  format_date_time($notif_date);
            
            
            echo
            '<ul class="p-0 m-0">
            <li class="d-flex  align-items-center justify-content-between border rounded-4 mt-3 ul__li--size">
            <div class="d-flex justify-content-center align-items-center m-0 form-check border-end h-100  ul__li___div--size">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" data-target="textToStrike"
                ';
                 if($itemsList[$i]['is_check'] == 1){
                    echo "checked";
                 }
                echo'
                >
            </div>
            <div class="position-relative w-75 h-100">
                
                <div class="p-0 ps-3 d-flex flex-column m-0 form-check h-100 justify-content-end">
                    <div>
                    
            <span class="fw-semibold ms-1 mb-2 m-0 p-0 fs-6">' . $item_price . '</span>
                    <span class="fw-semibold ms-1 mb-2 m-0 p-0 fs-6">'.$quantity.'</span>
                    </div>
                    <div class="w-100 ul__li__div--scroll">
                        <p class="p-0 m-0 fs-4 fw-semibold " id="textToStrike">' . $itemsList[$i]['item_name'] . '</p>
                    </div>
                    
                    <div class="d-flex align-items-center  li__div__icon">';
                    // echo $itemsList[$i]['total_time'];

                    if($item_time){
                        echo                       
                       '<i class="w-semibold mb-1  la-lg las la-stopwatch"></i>
                        <span class="fw-semibold mb-1 ms-2 m-0 p-0 fs-6">'.$item_time.'</span>';
                        if($notif_date){
                            echo
                            '<i class="w-semibold mb-1 ms-2 la-lg las la-bell"></i>
                            <span class="fw-semibold mb-1 ms-2 m-0 p-0 fs-6">'.$notif_date.'</span>';
                        }
                    };

                    echo
                    '</div>
                </div>
            </div>
            
            <div class="d-flex flex-column p-1 pe-3 h-100 justify-content-between">
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