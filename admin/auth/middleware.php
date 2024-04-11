<?php
if(!isset($_SESSION['current_admin'])){
    header("location: index.php");
}
