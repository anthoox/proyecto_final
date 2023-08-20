<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    
    ?>
    <section class="p-0 m-0 w-100">
        <ul class="p-0 m-0 mt-3">
            <li class="shadow-sm align-items-center justify-content-between border border-2 rounded-4 mt-2 ul__li--size li__hover d-flex ">
                <div class="position-relative w-75 h-100">
                    <div class="p-0 ps-3 d-flex flex-column m-0 form-check h-100 justify-content-end w-100">
                        <div class="w-100 ul__li__div--scroll">
                            <form  action="../users/itemsList.php" method="post">
                                <input type="hidden" name="id_list" value="' . $user_list[$i]["id_list"] . '">
                                <input name="nameList" class="form-control-plaintext text-start w-100 btn btn-link fs-5  ps-0 fw-bold text-decoration-none text-black" type="submit" value="' . $user_list[$i]["list_name"] . '">
                            </form>
                        </div>
                        
                        <div class="d-flex align-items-center  li__div__icon">
                            <i class="mb-1 la-lg las la-check-circle"></i><span class="fw-semibold mb-1 ms-2 m-0 p-0 fs-6 ">' . $items_check['items'] .  '/'. $items . '</span>
                            <span class="fw-semibold mb-1 ms-2 m-0 p-0 fs-6">' . $item_price .'</span>
                        </div>
                    </div>
                </div>
    
                <div class="d-flex flex-column p-1 pe-3 h-100 justify-content-between ">
                    <div class="d-flex ">
                        <button class="mt-0 btn btn-link text-black"><i class="la-2x las la-pen icon__editList"></i></button> 
                        <button class="btn mt-0 btn-link text-black"><i class="la-2x las la-trash-alt icon__trashList"></i></button>
                    </div>            
                </div>
            </li>
        </ul>
    </section>
</body>
</html>