<?php
require "../bootstrap.php";

$billingId = $_POST['billing_id'];
$user_id = $_POST['user_id'];
$credit = $_POST['credit'];
$address = $_POST['address'];
$noc = $_POST['noc'];   
$exp = $_POST['exp'];
$cvv = $_POST['cvv'];

if ($billingId != "" && $user_id != "" && $credit != "" && $address != "" && $noc != "" && $exp != "" && $cvv != "") {
    $db->create_billingInfo($billingId, $user_id, $credit, $address, $noc, $exp, $cvv);
    $db->updatePaid($billingId);
    $_SESSION['payment_success'] = "successfully paid";
    header("Location: /electricityy/billing.php");
} else {
    $_SESSION['payment_error'] = "payment failed, please fill all fields";
    header("Location: /electricityy/billing.php");
}