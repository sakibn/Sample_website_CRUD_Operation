<?php
require 'dbh.test.php';
//echo '<br>working after the require dbh';
$message = '';
$form_data = json_decode(file_get_contents("php://input"));
//$first_name ='hello';
//$last_name ='mello';
//echo '<br>working after the intialized variable';
$first_name =$form_data->EMPLOYEE_FIRST_NAME;
$last_name =$form_data->EMPLOYEE_LAST_NAME;
$first_name = test_input($first_name);
$last_name = test_input($last_name);
//echo $first_name."<br>".$last_name;
$query = $conn->prepare("INSERT INTO P_EMPLOYEES (EMPLOYEE_FIRST_NAME, EMPLOYEE_LAST_NAME) VALUES (?,?);");
$query->bind_param("ss", $first_name, $last_name);
if ($query->execute()) {
    $message = 'Data Inserted';
}
//echo '<br>working after the execute';
$output = array(
    'message' => $message
);
echo json_decode($output);
//echo '<br> working after the json decode';
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
