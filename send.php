<?php

include "db.php";
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");

$response = $_GET['id'];
$token = $_GET['token'];
$dev = $_GET['dev'];

$check = md5(gmdate("H:i"));

$array = array (

  1 => "h",
  2 => "s",
  3 => "d",
  4 => "c",
  101 => "eng",
  102 => "mafs",
  103 => "doge"

);




// Functions
function insertdata ($key){

  include "db.php";
  $res = $conn->query("SELECT * FROM `emoji` WHERE `id` = {$key}");
  $row = $res->fetch_assoc();
  $count = $row['emoji'] + 1;
  $conn->query("UPDATE `emoji` SET `emoji` = '{$count}' WHERE `emoji`.`id` = {$key}");


}

function deletedata ($key){

  include "db.php";
  $conn->query("UPDATE `emoji` SET `emoji` = '0' WHERE `emoji`.`id` = {$key};");
  exit;

}



$pos = strpos($response, "r");
$key = array_search($response, $array);




//checks

if ($pos == true || $response !== "delete"){
  if($check == $token || $dev == 1){
    $response = trim($response, "r");
    $key = array_search($response, $array);
    deletedata($key);
  }
}
if ($pos == false && $response !== "delete"){
  if($check == $token || $dev == 1){
    insertdata($key);
  }
}

if ($response == "delete"){
    $conn->query("UPDATE `emoji` SET `emoji` = '0' WHERE 1");
    exit;
}





















/*

if ($token == $check || $response == "delete" || $dev == "1"){

if ($response == "delete"){
  $conn->query("UPDATE `emoji` SET `emoji` = '0' WHERE 1");
  exit;
}



if ($response == "h"){
  $res = $conn->query("SELECT * FROM `emoji` WHERE `id` = 1");
  $row = $res->fetch_assoc();
  $count = $row['emoji'] + 1;
  $conn->query("UPDATE `emoji` SET `emoji` = '{$count}' WHERE `emoji`.`id` = 1");

}
if ($response == "s"){
  $res = $conn->query("SELECT * FROM `emoji` WHERE `id` = 2");
  $row = $res->fetch_assoc();
  $count = $row['emoji'] + 1;
  $conn->query("UPDATE `emoji` SET `emoji` = '{$count}' WHERE `emoji`.`id` = 2;");

}
if ($response == "d"){
  $res = $conn->query("SELECT * FROM `emoji` WHERE `id` = 3");
  $row = $res->fetch_assoc();
  $count = $row['emoji'] + 1;
  $conn->query("UPDATE `emoji` SET `emoji` = '{$count}' WHERE `emoji`.`id` = 3");


}
if ($response == "c"){
  $res = $conn->query("SELECT * FROM `emoji` WHERE `id` = 4");
  $row = $res->fetch_assoc();
  $count = $row['emoji'] + 1;
  $conn->query("UPDATE `emoji` SET `emoji` = '{$count}' WHERE `emoji`.`id` = 4");


}

if ($response == "eng"){
  $res = $conn->query("SELECT * FROM `emoji` WHERE `id` = 101");
  $row = $res->fetch_assoc();
  $count = $row['emoji'] + 1;
  $conn->query("UPDATE `emoji` SET `emoji` = '{$count}' WHERE `emoji`.`id` = 101");

}
if ($response == "mafs"){
  $res = $conn->query("SELECT * FROM `emoji` WHERE `id` = 102");
  $row = $res->fetch_assoc();
  $count = $row['emoji'] + 1;
  $conn->query("UPDATE `emoji` SET `emoji` = '{$count}' WHERE `emoji`.`id` = 102");

}
if ($response == "doge"){
  $res = $conn->query("SELECT * FROM `emoji` WHERE `id` = 103");
  $row = $res->fetch_assoc();
  $count = $row['emoji'] + 1;
  $conn->query("UPDATE `emoji` SET `emoji` = '{$count}' WHERE `emoji`.`id` = 103");

}
if ($response == "rh"){
  $conn->query("UPDATE `emoji` SET `emoji` = '0' WHERE `emoji`.`id` = 1;");
  exit;
}
if ($response == "rs"){
  $conn->query("UPDATE `emoji` SET `emoji` = '0' WHERE `emoji`.`id` = 2;");
  exit;
}
if ($response == "rd"){
  $conn->query("UPDATE `emoji` SET `emoji` = '0' WHERE `emoji`.`id` = 3;");
  exit;
}
if ($response == "rc"){
  $conn->query("UPDATE `emoji` SET `emoji` = '0' WHERE `emoji`.`id` = 4;");
  exit;
}
if ($response == "reng"){
  $conn->query("UPDATE `emoji` SET `emoji` = '0' WHERE `emoji`.`id` = 101;");
  exit;
}
if ($response == "rmafs"){
  $conn->query("UPDATE `emoji` SET `emoji` = '0' WHERE `emoji`.`id` = 102;");
  exit;
}
if ($response == "rdoge"){
  $conn->query("UPDATE `emoji` SET `emoji` = '0' WHERE `emoji`.`id` = 103;");
  exit;
}



} else {
  exit;
}

*/


 ?>
