<?php
require 'dbh.inc.php';
if($_SESSION['cat'] =! 'yeah'){
    header("location: ../index.php?error=ever_felt_like_you_are_in_a_wrong_place?delete");
    exit();
};
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$message = '';
$form_data = json_decode(file_get_contents("php://input"));
$registration_number = $form_data->REGISTRATION_NUMBER;
$statement = $conn->prepare("DELETE FROM P_CAR WHERE REGISTRATION_NUMBER = ?;");
//$query= ("UPDATE P_EMPLOYEES SET employee_first_name = :first_name, employee_last_name = :last_name where EMPLOYEE_ID = :id");
$statement -> bind_param("i", $registration_number);

if($statement -> execute())
{
    $message = 'Data Successfully Deleted';
}
$statement->close();
$output = array(
    'message' => $message
);

echo json_encode($output);
exit();