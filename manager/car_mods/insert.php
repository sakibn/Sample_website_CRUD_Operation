<?php
require 'dbh.inc.php';
//if($_SESSION['cat'] =! 'yeah'){
//    header("location: ../index.php?error=ever_felt_like_you_are_in_a_wrong_place?insert");
//    exit();
//};
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$message = '';

$form_data = json_decode(file_get_contents("php://input"));
//$username = 'null';
$model = $form_data->MODEL;
$shop_id = $form_data->SHOP_ID;
$mileage =$form_data->MILEAGE;

$statement = $conn->prepare("insert into P_CAR (MODEL, SHOP_ID, MILEAGE ) VALUES (?,?,?);");
$statement -> bind_param("sii", $model, $shop_id, $mileage);

if($statement->execute()){
    $message = 'Data Inserted';
}
$output = array(
    'message' => $message,
//    'model' => $model,
//    'shop_id'=> $shop_id,
//    'mileage' => $mileage
);

echo json_encode($output);

