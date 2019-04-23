<?php
require 'include/dbh.test.php';

$message = '';

$form_data = json_decode(file_get_contents("php://input"));

$employee_first_name = $form_data->first_name;
$employee_last_name = $form_data->last_name;
$employee_id = $form_data->employee_id;

$statement = $conn->prepare("UPDATE P_EMPLOYEES SET employee_first_name = ?, employee_last_name = ? where EMPLOYEE_ID = ?");
$statement -> bind_param("ssi", $employee_first_name, $employee_last_name, $employee_id);

$statement->execute();

$message = 'User Edited';

$output = array(
    'message' => $message
);

echo json_encode($output);