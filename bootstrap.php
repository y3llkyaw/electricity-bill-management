<?php
require "dbconnect.php";
require "functions.php";
session_start();
$pdo = getPDO();
$db = new DataBase($pdo);