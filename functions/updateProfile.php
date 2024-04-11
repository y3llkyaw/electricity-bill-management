<?php
require "../bootstrap.php";

$id = $_POST['id'];
$email = $_POST['email'];
$name = $_POST['name'];
$password = $_POST['current_password'];
$new_password = $_POST['new_password'];
$confirm_new_password = $_POST['confirm_new_password'];

$user = $db->get_User($id)[0];

if (password_verify($password, $user->password)) {
    $db->update_user($id, $email, $name);
    
    if ($_POST['new_password'] != "" && $_POST['confirm_new_password'] != "") {
        if ($new_password == $confirm_new_password) {
            $db->updatePassword($id, $new_password);
        }
    }
    $_SESSION['current_user'] = $db->get_User($id)[0];
    header("Location: /electricityy/index.php");
} else {
    $_SESSION['error'] = 'your current is password is wrong!';
    header("Location: /electricityy/index.php");

}