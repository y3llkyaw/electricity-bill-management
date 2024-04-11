<?php
require "../bootstrap.php";

$users = $db->get_all_Users();
foreach ($users as $user) {
    if ($_POST['email'] == $user->email) {
        session_start();
        $_SESSION['register_error'] = "this email is already registered.";
        header('Location: /electricityy/signup.php');
        die();
    }
}


$isValid = false;
// validation email
if ($_POST['name'] != "" && $_POST['email'] != "" && $_POST['password'] != "" && $_POST['c_password'] != "" && $_POST['board_id'] != "" && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $isValid = true;
}

if ($isValid) {
    if ($_POST['password'] == $_POST['c_password']) {
        $name = $_POST['name'];
        $email = strtolower($_POST['email']);
        $password = $_POST['password'];

        $user_id = $db->create_user($name, $email, $password);
        $db->create_board($user_id, $_POST['board_id'], $_POST['type']);

        $_SESSION['register_success'] = "your account is created, try login.";
        header("Location: /electricityy/signup.php");
    } else {
        $_SESSION['register_error'] = "passwords doesn't match";
        header("Location: /electricityy/signup.php");
    }
} else {
    $_SESSION['register_error'] = "you need to fill all of the fields";
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $_SESSION['register_error'] = "please enter valid email..";
    }
    header("Location: /electricityy/signup.php");
}