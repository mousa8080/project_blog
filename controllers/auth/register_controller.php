<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $confirm_password=$_POST['confirm_password'];
    $phone=$_POST['phone'];

    $error=validate_register($name,$email,$password,$confirm_password);
    if(!empty($error)){
        set_message($error);
        header('Location:index.php?page=register'); 
        exit;
    }
    if(register_user($name,$email,$password,$phone)){
        set_message("user register succssfly");
        header('Location:index.php?page=home');
        exit;
    }else{
        set_message(" user register failed");
        header('Location:index.php?page=register');
        exit;
    }
}


