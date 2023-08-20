<?php

class User_session{

    public function __construct(){
        session_start();
    }

    public function setCurrentUser($user_data){
        $_SESSION['user']['id_user'] = $user_data['id_user'];
        $_SESSION['user']['name'] = $user_data['name'];
        $_SESSION['user']['password'] = $user_data['password'];
        $_SESSION['user']['email'] = $user_data['email'];
        $_SESSION['user']['rol'] = $user_data['rol'];
        $_SESSION['user']['registration_date'] = $user_data['registration_date'];
        $_SESSION['user']['photo'] = $user_data['photo'];
    }

    public function getCurrentUser(){
        return $_SESSION['user'];
    }

    public function closeSession(){
        session_unset();
        session_destroy();
    }
}
?>