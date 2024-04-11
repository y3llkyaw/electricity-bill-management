<?php
if (!isset($_SESSION['current_user']) || $_SESSION['current_user'] === "") {
    header("Location: signup.php");
    exit;
}
?>