<?php
require "../../bootstrap.php";

$db->delete_billing($_POST['billing_id']);
$db->deleteBillingInfoByBillingID($_POST['billing_id']);
$_SESSION['success'] = 'Billing is successfully deleted.';
header("Location: /electricityy/admin/user.php");