<?php
if($_SESSION['cat'] =!'yeah'){
    header("location: ../home.php?error=ever_felt_like_you_are_in_a_wrong_place?");
    exit();
};
require 'dbh.inc.php';
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$message = '';

$form_data = json_decode(file_get_contents("php://input"));
//$username = 'null';
$username = $form_data->CUSTOMER_USERNAME;
$password = $form_data->CUSTOMER_PWD;
$customer_first_name = $form_data->CUSTOMER_FIRST_NAME;
$customer_last_name = $form_data->CUSTOMER_LAST_NAME;
$dln = $form_data-> DRIVERS_LICENSE_NUMBER;
$number = $form_data-> CUSTOMER_PHONE_NUMBER;
$age = $form_data-> CUSTOMER_AGE;
$street = $form_data -> CUSTOMER_STREET;
$city = $form_data -> CUSTOMER_CITY;
$state = $form_data -> CUSTOMER_STATE;
$zip = $form_data -> CUSTOMER_ZIP;

$password = hash('sha256',$password);
$role =2;

//if (!preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$dln)) {
//    exit;
//}
if (!preg_match('/^\w{5,}$/', $username)) {
    exit();
}
$statement = $conn->prepare("insert into P_CUSTOMER (CUSTOMER_USERNAME, CUSTOMER_PWD, DRIVERS_LICENSE_NUMBER, CUSTOMER_FIRST_NAME, CUSTOMER_LAST_NAME, CUSTOMER_PHONE_NUMBER,
                        CUSTOMER_AGE, CUSTOMER_STREET, CUSTOMER_CITY, CUSTOMER_STATE, CUSTOMER_ZIP) VALUES (?,?,?,?,?,?,?,?,?,?,?);"); // TODO DOES ROLE BELONG IN THIS QUERY/TABLE
$statement -> bind_param("ssisssisssi", $username, $password, $dln, $customer_first_name, $customer_last_name, $number, $age, $street, $city, $state, $zip);

if($statement->execute()){
    $message = 'Data Inserted';
}
$output = array(
    'message' => $message,
//    'username' =>$username,
//    'password' =>$password,
//    'first' => $employee_first_name,
//    'last' => $employee_last_name,
//    'DOB' => $dob,
//    'street' => $street,
//    'city' => $city,
//    'state' =>$state,
//    'zip' => $zip,
//    'salary' =>$salary,
);

echo json_encode($output);

