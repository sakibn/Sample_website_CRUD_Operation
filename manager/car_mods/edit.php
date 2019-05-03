<?php
require 'dbh.inc.php';
if($_SESSION['cat'] =! 'yeah'){
    header("location: ../index.php?error=ever_felt_like_you_are_in_a_wrong_place?edit");
    exit();
};
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//include 'include/dbh.test.php';

$message = '';
$form_data = json_decode(file_get_contents("php://input"));
$registration_number = $form_data->REGISTRATION_NUMBER;
$model = $form_data->MODEL;
$shop = $form_data->SHOP_ID;
$mileage = $form_data->MILEAGE;

    $statement = $conn->prepare("UPDATE P_CAR SET MODEL = ?, SHOP_ID=?, MILEAGE=? WHERE REGISTRATION_NUMBER=?; ");

    $statement -> bind_param('siii',$model,$shop,$mileage,$registration_number );

    if ($statement->execute()) {
        $message = 'Data Successfully Edited';
    }
$statement->close();
$output = array(
    'message' => $message,
//    'registration: ' => $registration_number,
//    'model: '=>$model,
//    'shop: '=>$shop,
//    'mileage: '=>$mileage
);

echo json_encode($output);
exit();