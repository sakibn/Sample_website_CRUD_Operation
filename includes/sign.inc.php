<?php
if (isset($_POST['singup-submit'])){
    require 'dbh.inc.php';
    $username=$_POST['username'];
    $password=$_POST['pwd'];
    $first=$_POST['first'];
    $last=$_POST['last'];

    if(empty($username) || empty($password) || empty($first) || empty($last)){
        header("location: ../registration.php?error=emptyfields%username=".$username
        ."&first=".$first."&last".last);
        exit();
    }
    elseif (){
        header("location: ../registration.php?error=invalidusername%username=".$username
            ."&first=".$first."&last".last);
    }
}