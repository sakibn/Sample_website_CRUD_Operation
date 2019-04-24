<?php
require 'include/dbh.test.php';
//include 'include/dbh.test.php';

$message = '';
$form_data = json_decode(file_get_contents("php://input"));
$username = $form_data->USERNAME;
$pwd = $form_data->PWD;
$employee_first_name = $form_data->EMPLOYEE_FIRST_NAME;
$employee_last_name = $form_data->EMPLOYEE_LAST_NAME;
$employee_id = $form_data->EMPLOYEE_ID;

//$data = array(
//    ':first_name' => $form_data->EMPLOYEE_FIRST_NAME,
//    ':last_name' => $form_data->EMPLOYEE_LAST_NAME,
//    ':id' => $form_data->EMPLOYEE_ID
//);
$statement = $conn ->prepare("SELECT PWD FROM P_EMPLOYEES WHERE EMPLOYEE_ID=?");
$statement ->bind_param("i", $employee_id);
$statement ->execute();
$statement ->bind_result($result);
$statement ->fetch();
if($result == $pwd){
    $statement = $conn->prepare("UPDATE P_EMPLOYEES SET employee_first_name = ?, employee_last_name = ?, USERNAME =? where EMPLOYEE_ID = ?;");
//$query= ("UPDATE P_EMPLOYEES SET employee_first_name = :first_name, employee_last_name = :last_name where EMPLOYEE_ID = :id");
    $statement -> bind_param("sssi", $employee_first_name, $employee_last_name,$username, $employee_id);
//$statement= $connect->prepare($query);
    if($statement -> execute())
    {
        $message = 'Data Successfully Edited without password';
    }
}else{
    $pwd = hash('sha256',$pwd);
    $statement = $conn->prepare("UPDATE P_EMPLOYEES SET employee_first_name = ?, employee_last_name = ?, USERNAME =?, PWD =? where EMPLOYEE_ID = ?;");
//$query= ("UPDATE P_EMPLOYEES SET employee_first_name = :first_name, employee_last_name = :last_name where EMPLOYEE_ID = :id");
    $statement -> bind_param("ssssi", $employee_first_name, $employee_last_name,$username, $pwd, $employee_id);

//$statement= $connect->prepare($query);
    if($statement -> execute())
    {
        $message = 'Data Successfully Edited';
    }
}

//$statement->bind_result($result);
//$statement->fetch();
$output = array(
    'message' => $message
);

echo json_encode($output);