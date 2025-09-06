<?php
function validate_requerd($field_name, $value)
{
    return $value ? null : "$field_name is requerd";
}
function validate_password($password)
{
    if (strlen($password) < 6) {
        return "password must be at least 6 characters";
    }
    if (!preg_match('/[A-Z]/', $password)) {
        return "password must contain at least one uppercase letter";
    }
    if (!preg_match('/[a-z]/', $password)) {
        return "password must contain at least one lowercase letter";
    }
    if (!preg_match('/[0-9]/', $password)) {
        return "password must contain at least one number";
    }
    return null;
}
function validate_email($email)
{
    return filter_var($email, FILTER_VALIDATE_EMAIL) ? null : "email is not valid";
}
function uniqe_email($email)
{
    $conn = $GLOBALS['conn'];
    $sql = "SELECT * FROM users where email='$email'";
    $result = mysqli_query($conn, $sql);
    return mysqli_num_rows($result) == 0 ? null : "email is already exist";
}
function validate_confirm_password($password, $confirm_password)
{
    return $password == $confirm_password ? null : "the password not much";
}
function validate_register($name, $email, $password, $confirm_password)
{
    $filed_error = [
        "name" => $name,
        "email" => $email,
        "password" => $password,
        "confirm_password" => $confirm_password,
    ];
    foreach ($filed_error as $field_name => $value) {
        if ($error = validate_requerd($field_name, $value)) {
            return $error;
        }
    }
    if ($error = validate_password($password)) {
        return $error;
    }
    if ($error = validate_email($email)) {
        return $error;
    }
    if ($error = uniqe_email($email)) {
        return $error;
    }
    if ($error = validate_confirm_password($password, $confirm_password)) {
        return $error;
    }
    return null;
}
function validate_login($email, $password)
{
    $filed_error = [
        "email" => $email,
        "password" => $password,
    ];
    foreach ($filed_error as $field_name => $value) {
        if ($error = validate_requerd($field_name, $value)) {
            return $error;
        }
    }
    if ($error = validate_email($email)) {
        return $error;
    }
    return null;
}
