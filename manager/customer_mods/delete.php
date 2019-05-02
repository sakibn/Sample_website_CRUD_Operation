<?php
if($_SESSION['cat'] =!'yeah'){
    header("location: ../home.php?error=ever_felt_like_you_are_in_a_wrong_place?");
    exit();
};
require 'dbh.inc.php';
//if ($conn->connect_error) {
//    die("Connection failed: " . $conn->connect_error);
//}
$message = '';
$form_data = json_decode(file_get_contents("php://input"));
$customer_id = $form_data->CUSTOMER_ID;
$statement = $conn->prepare("DELETE FROM P_CUSTOMER WHERE CUSTOMER_ID = ?;");
//$query= ("UPDATE P_EMPLOYEES SET employee_first_name = :first_name, employee_last_name = :last_name where EMPLOYEE_ID = :id");
$statement -> bind_param("s", $customer_id);

if($statement -> execute())
{
    $message = 'Data Successfully Deleted or did it?';
}

$output = array(
    'message' => $message
);

echo json_encode($output);