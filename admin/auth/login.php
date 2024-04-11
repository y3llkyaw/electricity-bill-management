<?php
require "../../bootstrap.php";
// dd($_POST);
$admins = $db->get_all_admins();
$email = $_POST['email'];
$password = $_POST['password'];
$isAdmin = false;
foreach ($admins as $admin) {
    if ($email == $admin->email && $password == $admin->password) {
        $_SESSION['current_admin'] = $admin;
        $isAdmin = true;
        break;
    }
}

if($isAdmin){
    header("Location: /electricityy/admin/user.php");
}else{
    $_SESSION['login_fail'] = "admin credential are incorrect!";
    header("Location: /electricityy/admin/index.php");
}


