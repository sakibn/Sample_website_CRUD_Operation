<?php
require 'dbh.inc.php';
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
);

echo json_encode($output);

