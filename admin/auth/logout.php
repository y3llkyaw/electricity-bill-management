<?php 
session_start();
unset($_SESSION['current_admin']);
header("Location: /electricityy/admin/index.php");   