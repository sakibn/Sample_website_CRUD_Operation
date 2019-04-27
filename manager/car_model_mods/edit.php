<?php
require 'dbh.inc.php';
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//include 'include/dbh.test.php';

$message = '';
$form_data = json_decode(file_get_contents("php://input"));
$model = $form_data->MODEL;
$brand = $form_data->BRAND;
$year = $form_data->PRODUCTION_YEAR;
$color = $form_data->COLOR;


    $statement = $conn->prepare("UPDATE P_CAR_MODEL SET BRAND=?, PRODUCTION_YEAR=?, COLOR=? WHERE MODEL = ?;");

    $statement -> bind_param('ssss',$brand,$year,$color, $model );

    if ($statement->execute()) {
        $message = 'Data Successfully Edited without password';
    }
$output = array(
    'message' => $message,
);

echo json_encode($output);