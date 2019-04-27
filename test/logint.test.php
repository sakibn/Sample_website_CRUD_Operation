<?php
require 'dbh.test.php';
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
$user_id = "s";
$password ="s";
$result ="";
$stmt =$conn -> prepare("SELECT CUSTOMER_PWD FROM P_CUSTOMER WHERE username=?;");
    /* Bind parameters: s - string, b - blob, i - int, etc */
    $stmt ->bind_param("s", $user_id );
    echo 'working';

    $stmt ->execute();
    $stmt ->bind_result($result);
    echo "\nresult= ".$result;
    echo "\nworking after bind and execute";
    $stmt -> fetch();
    echo "   \nresult= ".$result;
    if($password == $result){
        echo "    verified";
    }
    $stmt ->close();


    //stuff was in the login.inc.php

//echo "working after stmt execute";
//$result = mysqli_stmt_get_result($stmt);
//echo "working after get result";
//echo $result;
//if ($row = mysqli_fetch_assoc($result)) {
//    echo "working after fetch";
//    $pwdCheck = password_verify($pwd, $row['pwd']);
//    echo $pwdCheck;
//    echo "working after password verify";
//    if ($pwdCheck == false) {
//        header("Location: ../index.php?error=wrong_password");
//        exit();
//    } elseif ($pwdCheck == true) {
//        session_start();
//        $_SESSION['username'] = $row['username'];
//        $_SESSION['userId'] = $row['USER_ID'];
//        header("Location: ../index.php?login=success");
//        exit();
//    } else {
//        header("Location: ../index.php?error=wrong_password");
//        exit();
//    }