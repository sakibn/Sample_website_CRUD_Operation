<!--https://www.w3schools.com/php/php_form_validation.asp-->
<?php
$user_name = $password ="";
if (isset($_POST['submit'])){
    include_once 'dbh.inc.php';
    $first =$_POST['first'];
}else{
    header("location: ../index.php");
    exit();
}
