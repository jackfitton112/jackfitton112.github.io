<?php

include "db.php";
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Expose-Headers: *");

$data = array();
$result = $conn->query("SELECT * FROM `emoji` ORDER BY `emoji`.`id` ASC");

while ($row = $result->fetch_assoc()){
$data2 = $row['emoji'];
array_push($data, $data2);


}


echo json_encode($data);


 ?>
