<?php
// developement function
function dd($data)
{
  echo '<pre>';
  echo die(var_dump($data));
}

function getPDO()
{
  try {
    $pdo = new PDO("mysql:host=localhost;dbname=original", "root", "");
    return $pdo;
  } catch (PDOException $e) {
    return $e->getMessage();
  }
}