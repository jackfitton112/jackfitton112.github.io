<?php

include "db.php";
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");

$response = $_GET['id'];

if ($response == "delete"){
  $conn->query("UPDATE `emoji` SET `emoji` = '0' WHERE `emoji`.`id` = 4 OR `id` = 3 OR `id` = 2 OR `id` = 1 OR `id` = 5");
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



 ?>
