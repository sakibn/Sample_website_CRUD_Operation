<?php
require 'include/dbh.test.php';
//if ($conn->connect_error) {
//    die("Connection failed: " . $conn->connect_error);
//}
$message = '';
$form_data = json_decode(file_get_contents("php://input"));

$statement = $conn->prepare("DELETE FROM P_EMPLOYEES WHERE EMPLOYEE_LAST_NAME = ?;");
//$query= ("UPDATE P_EMPLOYEES SET employee_first_name = :first_name, employee_last_name = :last_name where EMPLOYEE_ID = :id");
$statement -> bind_param("s", $employee_last_name);

if($statement -> execute())
{
    $message = 'Data Successfully Deleted';
}

$output = array(
    'message' => $message
);

echo json_encode($output);