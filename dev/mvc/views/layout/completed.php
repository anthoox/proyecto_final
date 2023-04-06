<?php 
    require_once 'C:/xampp/htdocs/proyecto/dev/mvc/controllers/controller.php';
    require_once 'C:/xampp/htdocs/proyecto/dev/mvc/controllers/functions.php';
    // session_start();

    // $items = new Items();
    
    $lists_items = new UserItems();

    // echo $_SESSION['user']['id_user'];
    // $prueba = $lists_items->upcoming($_SESSION['user']['id_user']);
    $lists_items = $lists_items->completed($_SESSION['user']['id_user']);

    if($lists_items){
        for($i = 0; $i < sizeof($lists_items); $i++){
            $item_price = $lists_items[$i]['price'];
                if($item_price<=0){
                    $item_price = '';
                }else{
                    $item_price = $item_price . "€";
                }
    
                $quantity = 'x' . $lists_items[$i]['quantity'];
                
                $item_time = $lists_items[$i]['total_time'];
                $item_time = format_time($item_time);
                
    
                $notif_date  = $lists_items[$i]['alarm_date'];
                $notif_date =  format_date_time($notif_date);
    
            echo 
            '<ul class="p-0 m-0">
            <li class="d-flex  align-items-center justify-content-between border rounded-4 mt-3 ul__li--size">
            <div class="d-flex justify-content-center align-items-center m-0 form-check border-end h-100  ul__li___div--size">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" data-target="textToStrike"
                ';
                 if($lists_items[$i]['is_check'] == 1){
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
                        <p class="p-0 m-0 fs-4 fw-semibold text-muted" id="textToStrike">' . $lists_items[$i]['item_name'] . '</p>
                    </div>
                    
                    <div class="d-flex align-items-center  li__div__icon">';

                    if($item_time){
                        echo                       
                       '<i class="w-semibold mb-1  la-lg las la-stopwatch text-muted"></i>
                        <span class="fw-semibold mb-1 ms-2 m-0 p-0 fs-6 text-muted">'.$item_time.'</span>';
                        if($notif_date){
                            echo
                            '<i class="w-semibold mb-1 ms-2 la-lg las la-bell text-muted"></i>
                            <span class="fw-semibold mb-1 ms-2 m-0 p-0 fs-6 text-muted">'.$notif_date.'</span>';
                        }
                    }else{
                        if($notif_date){
                            echo
                            '<i class="w-semibold mb-1 la-lg las la-bell text-muted"></i>
                            <span class="fw-semibold mb-1 ms-2 m-0 p-0 fs-6 text-muted">'.$notif_date.'</span>';
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
        $_SESSION['error_message']['loadLists'] = "No tiene próximas tareas";
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