<?php
require 'dbh.inc.php';
if($_SESSION['cat'] =! 'yeah'|| isset($_SESSION['cat'])){
    header("location: ../index.php?error=ever_felt_like_you_are_in_a_wrong_place?");
    exit();
};
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
$conn->close();
$output = array(
    'message' => $message,
);

echo json_encode($output);

