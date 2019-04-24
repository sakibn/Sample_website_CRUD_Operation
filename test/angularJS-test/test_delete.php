<?php
require 'include/dbh.test.php';
//if ($conn->connect_error) {
//    die("Connection failed: " . $conn->connect_error);
//}
$message = '';
$form_data = json_decode(file_get_contents("php://input"));
$employee_id = $form_data->EMPLOYEE_ID;
$statement = $conn->prepare("DELETE FROM P_EMPLOYEES WHERE EMPLOYEE_ID = ?;");
//$query= ("UPDATE P_EMPLOYEES SET employee_first_name = :first_name, employee_last_name = :last_name where EMPLOYEE_ID = :id");
$statement -> bind_param("i", $employee_id);

if($statement -> execute())
{
    $message = 'Data Successfully Deleted or did it?';
}

$output = array(
    'message' => $message
);

echo json_encode($output);