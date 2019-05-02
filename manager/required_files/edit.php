<?php
if($_SESSION['dog'] =!67){
    header("location: ../home.php?error=ever_felt_like_you_are_in_a_wrong_place?");
};
require 'dbh.inc.php';
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//include 'include/dbh.test.php';

$message = '';
$form_data = json_decode(file_get_contents("php://input"));
$employee_id = $form_data->EMPLOYEE_ID;
$username = $form_data->USERNAME;
$pwd = $form_data->PWD;
$employee_first_name = $form_data->EMPLOYEE_FIRST_NAME;
$employee_last_name = $form_data->EMPLOYEE_LAST_NAME;
$dob = $form_data-> EMPLOYEE_DOB;
$error = "working after form_data";
/*$employee_id = '49';
$username = 'yolo';
$pwd = '49';
$employee_first_name = 'yolo';
$employee_last_name ='yolo';*/
//echo 'working after the variable<br>';
//$data = array(
//    ':first_name' => $form_data->EMPLOYEE_FIRST_NAME,
//    ':last_name' => $form_data->EMPLOYEE_LAST_NAME,
//    ':id' => $form_data->EMPLOYEE_ID
//);
$statement = $conn->prepare("SELECT PWD FROM P_EMPLOYEES WHERE EMPLOYEE_ID=?");
$statement->bind_param("i", $employee_id);
$statement->execute();
$statement->bind_result($result);
$statement->fetch();
$statement->close();
$error = $result." ".$pwd;
//echo 'working after the fetch';
//echo $result;
if ($result == $pwd) {
    $error ='working after the if condition';
//    echo 'working right after the if statement '.$result.'  '.$pwd;fg
    $statement = $conn->prepare("UPDATE P_EMPLOYEES SET EMPLOYEE_FIRST_NAME = ?, EMPLOYEE_LAST_NAME = ?, USERNAME = ?, EMPLOYEE_DOB= ? WHERE EMPLOYEE_ID = ?;");
//    echo 'working after the prepare';
//    ini_set('display_errors', 1);
//    ini_set('display_startup_errors', 1);
//    error_reporting(E_ALL);
//$query= ("UPDATE P_EMPLOYEES SET employee_first_name = :first_name, employee_last_name = :last_name where EMPLOYEE_ID = :id");
    $statement -> bind_param('ssssi', $employee_first_name, $employee_last_name, $username, $dob, $employee_id);
//    echo 'working after the binding';
//$statement= $connect->prepare($query);
    if ($statement->execute()) {
        $message = 'Data Successfully Edited without password';
    }
//    echo 'working after the pwd statement';
} else {
//    echo 'working after the else statement';
    $pwd = hash('sha256', $pwd);
    $statement = $conn->prepare("UPDATE P_EMPLOYEES SET employee_first_name = ?, employee_last_name = ?, USERNAME =?, PWD =?, EMPLOYEE_DOB =? where EMPLOYEE_ID = ?;");
//$query= ("UPDATE P_EMPLOYEES SET employee_first_name = :first_name, employee_last_name = :last_name where EMPLOYEE_ID = :id");
    $statement->bind_param("sssssi", $employee_first_name, $employee_last_name, $username, $pwd, $dob, $employee_id);

//$statement= $connect->prepare($query);
    if ($statement->execute()) {
        $message = 'Data Successfully Edited';
    }
}

//$statement->bind_result($result);
//$statement->fetch();
$output = array(
    'error' => $error,
    'message' => $message,
    'username' => $username,
    'password' => $pwd,
    'first name' => $employee_first_name,
    'last Name' => $employee_last_name,
    'id' => $employee_id
);

echo json_encode($output);