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
  $data = "1F60A";
}
if ($response == "s"){
  $data = "1F622";
}
if ($response == "d"){
  $data = "1F633";
}
if ($response == "c"){
  $data = "1F610";
}

$conn->query("INSERT INTO `emoji` (`id`, `emoji`) VALUES (NULL, '{$data}')");



 ?>
