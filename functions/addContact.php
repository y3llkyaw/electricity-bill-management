<?php
require "../bootstrap.php";
if ($_POST['name'] != "" && $_POST['email'] != "" && $_POST['message'] != "") {
    $db->createContact($_POST['name'], $_POST['email'], $_POST['message']);
    $_SESSION['contact_success'] = "your message has been sent.";
    header("location: /electricityy/index.php");
} else {
    $_SESSION['contact_fail'] = "please fill all fields";
    header("location: /electricityy/index.php");
}