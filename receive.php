<?php

include "db.php";
//set utf8mb4 thing in for //
mysqli_set_charset($conn, 'utf8mb4');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Expose-Headers: *");



$config = $_GET['config'];
$update = $_GET['update'];


if ($config == 1){
      $send = array ();
      $array = array();
      $result = $conn->query("SELECT * FROM `emoji` ORDER BY `emoji`.`id` ASC");
      while ($row = $result->fetch_assoc()){

        $array[$row['name']] = array(
          "txt" => $row['txt'],
          "color" => $row['color'],
          "gname" => $row['gname'],
          "img" => $row['img'],
          "scale" => ["w" => $row['scalew'], "h" => $row['scaleh']],
          "toast" => $row['toast'],
          "num" => $row['emoji']
        );}
        echo json_encode($array,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);




}

elseif ($update == 1) {


        $result = $conn->query("SELECT * FROM `emoji` ORDER BY `emoji`.`id` ASC");
        $array = array();
        while ($row = $result->fetch_assoc()){


          $array += [

            $row['name'] => ["num" => $row['emoji'],]
          ];






        }

          echo json_encode($array,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
} else {







$data = array();
$result = $conn->query("SELECT * FROM `emoji` ORDER BY `emoji`.`id` ASC");

while ($row = $result->fetch_assoc()){
$data2 = $row['emoji'];
array_push($data, $data2);


}


echo json_encode($data);
}

 ?>
