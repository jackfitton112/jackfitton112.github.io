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
  5 => "p",
  6 => "l",
  101 => "eng",
  102 => "mafs",
  103 => "doge"

);
$delarray = array (

  1 => "rh",
  2 => "rs",
  3 => "rd",
  4 => "rc",
  5 => "rp",
  6 => "rl",
  101 => "reng",
  102 => "rmafs",
  103 => "rdoge"

);

// Delete Function
if ($response === "delete"){
   $conn->query("UPDATE `emoji` SET `emoji` = '0' WHERE 1");
  exit;
}



//////////////////////////////////DEV////////////////////////////*

function biuldArray(){
  include "db.php";
  $array = array ();
  $sql = "SELECT * FROM `emoji` WHERE 1";
  $results = $conn->query($sql);
  while ($row = $results->fetch_assoc()){
    $array += [$row['name'] => $row['id']];
    $array += ["r".$row['name'] => $row['id']];

  }
  return $array;
}

function insertdata ($key){
  include "db.php";
  $res = $conn->query("SELECT * FROM `emoji` WHERE `id` = {$key}");
  $row = $res->fetch_assoc();
  $count = $row['emoji'] + 1;
  $conn->query("UPDATE `emoji` SET `emoji` = '{$count}' WHERE `emoji`.`id` = {$key}");
}

//delete specific data from DB
function deletedata ($key){
  include "db.php";
  $conn->query("UPDATE `emoji` SET `emoji` = '0' WHERE `emoji`.`id` = {$key};");
  exit;
}




$array = biuldArray();

if ($response != "delete"){

if ($response[0] == "r"){
  $key = $array["{$response}"];
  deletedata($key);
} else {
  $key = $array["{$response}"];
  insertdata($key);
}

}



?>
