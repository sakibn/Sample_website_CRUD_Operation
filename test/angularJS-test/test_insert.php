<?php
require 'include/dbh.test.php';
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$message = '';

$form_data = json_decode(file_get_contents("php://input"));
$username = 'null';
$password = hash('sha256','LKASDJF');
$dob ='2012-02-01';
$employee_first_name = $form_data->employee_first_name;
$employee_last_name = $form_data->employee_last_name;

$statement = $conn->prepare("insert into P_EMPLOYEES (USERNAME, PWD, EMPLOYEE_FIRST_NAME, EMPLOYEE_LAST_NAME, EMPLOYEE_DOB) VALUES (?, ?, ?, ?, ?);");
$statement -> bind_param("sssss", $username, $password, $employee_first_name, $employee_last_name, $dob);

$statement->execute();

$message = 'Data Inserted';

$output = array(
    'message' => $message
);

echo json_encode($output);

