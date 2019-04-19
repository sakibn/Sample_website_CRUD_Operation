<?php
require 'dbh.test.php';
$sql = "select username from P_CUSTOMER where username=?";
$stmt = mysqli_stmt_init($conn);
$password ='manager';
$pwd = test_input( hash('sha256',$password));
echo $pwd;
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}