<?php

include "db.php";
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Expose-Headers: *");


$result = $conn->query("SELECT * FROM `emoji`");
$num = $result->num_rows - 1;
$i = 0;
$data = "[";

while ($row = $result->fetch_assoc()){
  $r = $row['emoji'];
  $data .= "\"{$r}\"";
  $i = $i +1;

  if ($i == $num){
    $data .= "";
    break;
  }
    $data .= ",";
}

$data .= "]";
echo $data;




 ?>
