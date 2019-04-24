<?php
require 'include/dbh.test.php';
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$employee_id = '49';
$username = 'yolo';
$pwd = '49';
$employee_first_name = 'yolo';
$employee_last_name ='yolo';

$statement = $conn->prepare("UPDATE P_EMPLOYEES SET EMPLOYEE_FIRST_NAME = ?, EMPLOYEE_LAST_NAME =?, USERNAME=? WHERE EMPLOYEE_ID= ?;");
$statement -> bind_param('sssi',$employee_first_name, $employee_last_name, $username, $employee_id);
echo 'working';