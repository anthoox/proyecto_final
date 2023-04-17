<?php 
    require_once 'C:/xampp/htdocs/proyecto/dev/mvc/controllers/controller.php';
    
    $items = new Items();
    
    $user_list = new UserList();
    $user_list = $user_list->toList($_SESSION['user']['id_user']);
  
    $user_items = new UserItems();
  

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

      
        // Realizar la validación de los datos recibidos
        if (!empty($_POST['id_list']) && !empty($_POST['newNameList'])) {
            $newName = new UserList();
            $result = $newName->editList($_POST['id_list'], 'list_name',$_POST['newNameList'] );
            if($result){
                
                echo'<script>
          console.log("cambiado");
          </script>';
          header("Location: " . $_SERVER['REQUEST_URI']);
                exit();
            }else{
                
                echo'<script>
          console.log("no cambiado");
          </script>';
          echo $_POST['newNameList'];
          echo $_POST['id_list'];
            }
    
        } else {

          echo'<script>
          console.log("no");
          </script>';
        }
      }
    //Si tiene listas:
    if($user_list){        
        for($i = 0; $i<sizeof($user_list); $i++){
            $items = $user_items->itemsUser('id_list', $user_list[$i]['id_list']);

            if($items){
                $items = $items['rows'];
            }else{
                $items = 0;
            }

            $item_price = $user_items->itemsPrice($user_list[$i]['id_list']);
            if($item_price[0]>0){
                $item_price = $item_price[0];
                $item_price = round($item_price, 3) . "€";
                
            }else{
                $item_price = '';
            }

            $items_check = $user_items->itemsChecked($user_list[$i]['id_list']);
            if($items_check == false){
                $items_check['items'] = 0;
            }
    
            echo
            '<li class="d-flex  align-items-center justify-content-between border rounded-4 mt-3 ul__li--size">
                <div class="position-relative w-75 h-100">
                    <div class="p-0 ps-3 d-flex flex-column m-0 form-check h-100 justify-content-end w-100">
                        <div class="w-100 ul__li__div--scroll">

                        <form action="../users/itemsList.php" method="post">
                          <input type="hidden" name="id_list" value="' . $user_list[$i]["id_list"] . '">
                          <input class=" btn btn-link fs-4 fw-semibold text-decoration-none text-black" type="submit" value="' . $user_list[$i]["list_name"] . '">
                        </form>
                        

                        </div>
                        <div class="d-flex align-items-center  li__div__icon">
                            <i class="mb-1 la-lg las la-check-circle i"></i><span class="fw-semibold mb-1 ms-2 m-0 p-0 fs-6 ">' . $items_check['items'] .  '/'. $items . '</span>
                            <span class="fw-semibold mb-1 ms-2 m-0 p-0 fs-6">' . $item_price .'</span>
                        </div>
                    </div>
                </div>
    
                <div class="d-flex flex-column p-1 pe-3 h-100 justify-content-between ">
                    <div class="d-flex ">
                        <div class="me-3"><i class="la-2x las la-pen icon__editList"></i></div> 
                        <div><i class="la-2x las la-trash-alt"></i></div>
                    </div>            
                </div>
            </li>';
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