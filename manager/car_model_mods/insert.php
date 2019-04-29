<?php
require 'dbh.inc.php';
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$message = '';

$form_data = json_decode(file_get_contents("php://input"));
//$username = 'null';
$model = $form_data->MODEL;
$brand = $form_data->BRAND;
$production_year = $form_data->PRODUCTION_YEAR;
$color = $form_data-> COLOR;

$statement = $conn->prepare("insert into P_CAR_MODEL (MODEL, BRAND, PRODUCTION_YEAR, COLOR ) VALUES (?,?,?,?);");
$statement -> bind_param("ssss", $model, $brand, $production_year, $color);

if($statement->execute()){
    $message = 'Data Inserted';
}
$output = array(
    'message' => $message,
);

echo json_encode($output);
