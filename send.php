<?php

include "db.php";
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");

$response = $_GET['id'];

if ($response == "delete"){
  $conn->query("DELETE FROM `emoji` WHERE 1");
  exit;
}


if ($response == "h"){
  $data = "1";
}
if ($response == "s"){
  $data = "2";
}
if ($response == "d"){
  $data = "3";
}
if ($response == "c"){
  $data = "4";
}

$conn->query("INSERT INTO `emoji` (`id`, `emoji`) VALUES (NULL, '{$data}')");



 ?>
