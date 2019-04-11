<?php
require 'includes/dbh.inc.php';
//$username = $_POST['username'];
//$password = $_POST['pwd'];
//$r_pass = $_POST['r-pwd'];
//$first = $_POST['first'];
//$last = $_POST['last'];
$username = "test";
$password ="test";
$first ="test";
$last ="test";

    if (!isset($username) || isset($username) =='') {
//        header("location: ../registration.php?error=emptyfields%username=" . $username . "&first=" . $first . "&last" . $last);
    echo $username.$password.$first.$last;
        exit();}else{
        echo "working";
    }

//    } elseif (!preg_match("/^[a-zA-Z0-9*$/", $username)) {
//        header("location: ../registration.php?error=invalidusername%first=" . $first . "&last" . $last);
//        exit();
//    } elseif ($password !== $r_pass) {
//        header("location: ../registration.php?error=passwordcheck%username=" . $username . "&first=" . $first . "&last" . $last);
//        exit();
//    } else {
//$sql = "select username from P_CUSTOMER where username=?";
//$stmt = mysqli_stmt_init($conn);
//if (!mysqli_stmt_prepare($stmt, $sql)) {
//header("location: ../registration.php?error=sqlerror");
//exit();
//} else {
//mysqli_stmt_bind_param($stmt, "s", $username);
//mysqli_stmt_execute($stmt);
//mysqli_stmt_store_result($stmt);
//$resultCheck = mysqli_stmt_num_rows($stmt);
//if ($resultCheck > 0) {
//header("location: ../registration.php?error=invalidusername%first=" . $first . "&last" . $last);
//exit();
//} else {
//$sql = "insert into P_CUSTOMER (username, pwd, CUSTOMER_F_NAME, CUSTOMER_L_NAME) values (?,?,?,?)";
//$stmt = mysqli_stmt_init($conn);
//if (!mysqli_stmt_prepare($stmt, $sql)) {
//header("location: ../registration.php?error=sqlerror");
//exit();
//} else {
////                    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
//
//if(!mysqli_stmt_bind_param($stmt, "ssss", $username, $password, $first, $last)){
//echo "error in binding";
//}
//if(!mysqli_stmt_execute($stmt)){
//echo "error in executing";
//}
//mysqli_stmt_store_result($stmt);
//header("location: ../registration.php?signup=success");
//exit();
//}
//}
//}
////    }
//echo "working";
//mysqli_stmt_close($stmt);
//mysqli_close($conn);