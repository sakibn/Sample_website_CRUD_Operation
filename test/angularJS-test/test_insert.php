<?php
require 'include/dbh.test.php';
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$message = '';

$form_data = json_decode(file_get_contents("php://input"));
//$username = 'null';
$password = hash('sha256','LKASDJF');
$dob ='2012-02-01';
$username = $form_data->USERNAME;
$employee_first_name = $form_data->EMPLOYEE_FIRST_NAME;
$employee_last_name = $form_data->EMPLOYEE_LAST_NAME;

$statement = $conn->prepare("insert into P_EMPLOYEES (USERNAME, PWD, EMPLOYEE_FIRST_NAME, EMPLOYEE_LAST_NAME, EMPLOYEE_DOB) VALUES (?, ?, ?, ?,?);");
$statement -> bind_param("sssss", $username, $password, $employee_first_name, $employee_last_name, $dob);

if($statement->execute()){
    $message = 'Data Inserted';
}
$output = array(
    'message' => $message,
    'username' => $username,
    'firstname' => $employee_first_name,
    'lastname' => $employee_last_name
);

echo json_encode($output);

