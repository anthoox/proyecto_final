<?php
require_once 'C:/xampp/htdocs/proyecto/dev/mvc/controllers/controller.php';

 $new_user = new LoginController();           
 $lists_user = new UserList();
 
 $total_users = $new_user->usersList();
//máximo de páginas
 $users_per_page = 25;

 $total_pages = ceil($total_users / $users_per_page);
 //definimos la página
 $page = isset($_GET['page']) ? $_GET['page'] : 1;
 //obtenemos el valor máximo
 $page = max(1, min($page, $total_pages));
 //numero de registros de usuarios por página
 $offset = ($page - 1) * $users_per_page;

 $users = $new_user->limitUsers($offset, $users_per_page);
 echo
 '<h2 class="mt-3 text-success title title__h2 fs-2 fw-bolder ">
 Usuarios:
 </h2>';
 echo
 '<div class="div__table--scroll border border-2 rounded-4">
 <table class="table table-striped table-hover">
     <thead>
         <tr>
         <th class="table__th--pointer" scope="col">ID</th>
         <th class="table__th--pointer"scope="col">Nombre</th>
         <th class="table__th--pointer"scope="col">Correo</th>
         <th class="table__th--pointer"scope="col">Fecha alta</th>
         <th class="table__th--pointer"scope="col">rol</th>
         <th class="table__th--pointer"scope="col">#Listas</th>
         </tr>
     </thead>
     <tbody class>';
     $rol;
     $lists;
     for($i = 0; $i<(sizeof($users)); $i++){
         echo
         '<tr>
         <th scope="row">'.$users[$i]['id_user'].'</th>
         <td><a href="edit_user.php?id=' . $users[$i]['id_user'] . '&name=' . $users[$i]['name'] . '&email=' . $users[$i]['email'] . '&rol=' . $users[$i]['rol'] . '   " class="text-decoration-none text-black fw-semibold table__th--pointer">'.$users[$i]['name'].'</a></td>
         <td><a href="edit_user.php?id=' . $users[$i]['id_user'] . '&name=' . $users[$i]['name'] . '&email=' . $users[$i]['email'] . '&rol=' . $users[$i]['rol'] . '   " class="text-decoration-none text-black fw-semibold table__th--pointer">'.$users[$i]['email'].'</a></td>
         <td><a href="edit_user.php?id=' . $users[$i]['id_user'] . '&name=' . $users[$i]['name'] . '&email=' . $users[$i]['email'] . '&rol=' . $users[$i]['rol'] . '   " class="text-decoration-none text-black fw-semibold table__th--pointer">'.$users[$i]['registration_date'].'</a></td>';
         if($users[$i]['rol'] == 1){
             $rol = "admin";
             $lists = '--';
         }else if($users[$i]['rol'] == 2){
             $rol = "usuario";
             $lists = $lists_user->listsUser($users[$i]['id_user']);
         }
         echo
         '<td><a href="edit_user.php?name=' . $users[$i]['name'] . '&email=' . $users[$i]['email'] . '&rol=' . $users[$i]['rol'] . '   " class="text-decoration-none text-black fw-semibold table__th--pointer">' . $rol . '</a></td>
         <td><a href="edit_user.php?name=' . $users[$i]['name'] . '&email=' . $users[$i]['email'] . '&rol=' . $users[$i]['rol'] . '   " class="text-decoration-none text-black fw-semibold table__th--pointer">' . $lists. '</a></td>
         </tr>
         ';
     }
     echo
    '</tbody>
 </table>
 </div> 
 <ul class="list-group list-group-flush pt-1">';
 if ($page > 1){
     echo'
     <li class="list-group-item list-group-item-action"><a class="text-decoration-none fs-6 text-black " href="?page='. ($page - 1) .'">Anterior</a></li>';
 }

 if ($page < $total_pages){
     echo'
     <li class="list-group-item list-group-item-action"><a class="text-decoration-none fs-6 text-black " href="?page=' . ($page + 1) . '">Siguiente</a></li>';
 }
     
echo'

</ul>';

?>