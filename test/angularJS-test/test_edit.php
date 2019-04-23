<?php
require 'include/dbh.test.php';
//include 'include/dbh.test.php';

$message = '';
$form_data = json_decode(file_get_contents("php://input"));

$employee_first_name = $form_data->EMPLOYEE_FIRST_NAME;
$employee_last_name = $form_data->EMPLOYEE_LAST_NAME;
$employee_id = $form_data->EMPLOYEE_ID;

//$data = array(
//    ':first_name' => $form_data->EMPLOYEE_FIRST_NAME,
//    ':last_name' => $form_data->EMPLOYEE_LAST_NAME,
//    ':id' => $form_data->EMPLOYEE_ID
//);

$statement = $conn->prepare("UPDATE P_EMPLOYEES SET employee_first_name = ?, employee_last_name = ? where EMPLOYEE_ID = ?;");
//$query= ("UPDATE P_EMPLOYEES SET employee_first_name = :first_name, employee_last_name = :last_name where EMPLOYEE_ID = :id");
$statement -> bind_param("ssi", $employee_first_name, $employee_last_name, $employee_id);

//$statement= $connect->prepare($query);
if($statement -> execute())
{
    $message = 'Data Successfully Edited';
}
//$statement->bind_result($result);
//$statement->fetch();
$output = array(
    'message' => $message
);

echo json_encode($output);