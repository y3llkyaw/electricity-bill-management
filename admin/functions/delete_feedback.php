<?php
require "../../bootstrap.php";

$db->solve_feedback($_POST['id']);
$_SESSION['success'] = 'feedback was selected to solve.';
header("Location: /electricityy/admin/contact.php");