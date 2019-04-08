<?php
if (isset($_POST['submit'])){
    include_once 'dbh.inc.php';
    $first =$_POST['first'];
}else{
    header("location: ../index.php");
    exit();
}