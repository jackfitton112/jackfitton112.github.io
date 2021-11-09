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
  6 => "",
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
  6 => "",
  101 => "reng",
  102 => "rmafs",
  103 => "rdoge"

);

// Delete Function
if ($response === "delete"){
   $conn->query("UPDATE `emoji` SET `emoji` = '0' WHERE 1");
  exit;
}


// Functions

//insert data to DB
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



// Checks response and calls correct function
if ($token == $check || $dev === "1"){


    if (strpos($response, "r") !== false){
        $key = array_search($response, $delarray);
        var_dump($key);
        deletedata($key);
      } else {
        $key = array_search($response, $array);
        insertdata($key);
      }
}

?>
