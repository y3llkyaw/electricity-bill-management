<?php
require "../bootstrap.php";
if($_POST['message']!="" && $_POST['user_id']!=""){
    $message = $_POST['message'];
    $user_id = $_POST['user_id'];

}

$query = "INSERT INTO feedback (message,user_id) VALUES(?,?);";
$statement = $pdo->prepare($query);
$statement->execute([$message,$user_id]);
$_SESSION['feedback_success']="your feedback was sent.";
header("Location: /electricityy/billing.php");