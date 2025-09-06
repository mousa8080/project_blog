<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $email=$_POST['email'];
    $password=$_POST['password'];
    $error=validate_login($email,$password);
    if(!empty($error)){
        set_message($error);
        header('Location:index.php?page=login');
        exit;
    }
    if(login_user($email,$password)){
        set_message("user login succssfly");
        header('Location:index.php?page=home');
        exit;
    }else{
        set_message(" user login failed");
        header('Location:index.php?page=login');
        exit;
    }
}