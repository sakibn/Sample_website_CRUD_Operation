<?php
require 'include/dbh.test.php';
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$message = '';

$form_data = json_decode(file_get_contents("php://input"));

$employee_first_name   = $form_data->first_name;
$employee_last_name   = $form_data->last_name;

$statement = $conn->prepare("INSERT INTO P_EMPLOYEES (employee_first_name, employee_last_name) VALUES (?,?)");
$statement -> bind_param("ss", $employee_first_name, $employee_last_name);

$statement->execute();

$message = 'Data Inserted';

$output = array(
    'message' => $message
);

echo json_encode($output);

