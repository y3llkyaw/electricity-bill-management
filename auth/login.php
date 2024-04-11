<?php
require "../bootstrap.php";

// getting user from database
// $db = new DataBase($pdo);
$users = $db->get_all_Users();
// getting data from $_POST request
$email = $_POST['email'];
$password = $_POST['password'];

$loggedIN = false;
foreach ($users as $user) {
    if ($user->email == $email && password_verify($password, $user->password)) {
        $_SESSION['current_user'] = $user;
        $loggedIN = true;
        break;
    }
}
if ($loggedIN) {
    header("Location: /electricityy/billing.php");
} else {
    $_SESSION['login_error'] = "your login credential are incorrect !";
    header("Location: /electricityy/signup.php");
}