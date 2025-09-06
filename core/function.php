<?php
session_start();
function set_message($message)
{
    $_SESSION['message'] = $message;
}
function show_Message()
{
    if (isset($_SESSION['message'])) {
        echo '__' . $_SESSION['message'] . '__';
        unset($_SESSION['message']);
    }
}

function register_user($name, $email, $password, $phone)
{

    $conn = $GLOBALS['conn'];
    $hash_password = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO users(`name`,`email`,`password`,`phone`) VALUES('$name','$email','$hash_password','$phone')";
    try {
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $_SESSION['user'] = [
                "name" => $name,
                "email" => $email,
                "phone" => $phone,
            ];
        } else {
            return false;
        }
    } catch (\Throwable $e) {
        return false;
    }
    return true;
}
function login_user($email, $password)
{

    $conn = $GLOBALS['conn'];
    $sql = "SELECT * FROM users where email='$email'";
    try {
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) == 0) {
            return false;
        }
        $user=mysqli_fetch_assoc($result);
        if(password_verify($password, trim($user["password"]))) {
            $_SESSION['user'] = [
                "name" => $user["name"],
                "email" => $user["email"],
                "phone" => $user["phone"],
            ];
            return true;
        }
        return false;
    }
    catch (\Throwable $e) {
        return false;
    }
}
