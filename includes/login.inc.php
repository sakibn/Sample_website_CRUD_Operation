<?php

if (isset($_POST['login-submit'])) {
    require 'dbh.inc.php';

    $uid = test_input($_POST['uid']);
    $pwd = test_input($_POST['pwd']);

    if (empty($uid) || empty($pwd)) {
        header("Location: ../index.php?error=emptyfields");
        exit();
    } else {

        $sql = "SELECT * FROM P_CUSTOMER WHERE username=?;";
        $stmt = mysqli_stmt_init($conn); //initialized stmt
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../index.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $uid);
            mysqli_stmt_execute($stmt);
            echo "working after stmt execute";
            $result = mysqli_stmt_get_result($stmt);
            echo "working after get result";
            echo $result;
            if ($row = mysqli_fetch_assoc($result)) {
                echo "working after fetch";
                $pwdCheck = password_verify($pwd, $row['pwd']) ;
                echo $pwdCheck;
                echo "working after password verify";
                if($pwdCheck ==false){
                    header("Location: ../index.php?error=wrong_password");
                    exit();
                }elseif ($pwdCheck ==true){
                    session_start();
                    $_SESSION['username'] =$row['username'];
                    $_SESSION['userId'] =$row['USER_ID'];
                    header("Location: ../index.php?login=success");
                    exit();
                }else{
                    header("Location: ../index.php?error=wrong_password");
                    exit();
                }
            } else {
                header("Location: ../index.php");
                exit();
            }
        }
    }
} else {
    header("Location: ../index.php");
    exit();
}

mysqli_close($conn);
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
