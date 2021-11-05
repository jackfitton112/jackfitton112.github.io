<?php

include "db.php";
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");


$result = $conn->query("SELECT * FROM `emoji`");
$data = "{";

while ($row = $result->fetch_assoc()){
  $r = hexdec($row['emoji']);
  $data .= "[\"&#{$r}\"],";
}

$data .= "}";
json_encode ($data);
header ("emoji:".$data);




 ?>
