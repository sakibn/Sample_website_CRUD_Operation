<!--https://www.w3schools.com/php/php_form_validation.asp-->
<?php
$user_name = $password ="";
if ($_SERVER['submit'] == 'POST'){
    include_once 'dbh.inc.php';
    $user_name =$_POST['username'];
    $password =$_POST['password'];
    echo $user_name;
    echo $password;
}else{
    header("location: ../index.php");
    exit();
}
