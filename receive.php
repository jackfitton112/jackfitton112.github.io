<?php

include "db.php";
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Expose-Headers: *");

$data = array();
$result = $conn->query("SELECT * FROM `emoji` WHERE 1");

while ($row = $result->fetch_assoc()){
$data2 = array($row['id'] => $row['emoji']);

array_push($data,$data2);

}


echo json_encode($data);


 ?>
