<?php
//$username = $password = $r_pass = $first = $last = "";
if (isset($_POST['signup-submit'])) {
    require 'dbh.inc.php';
    $username = test_input($_POST['username']);
    $password = test_input( $_POST['pwd']);
    $r_pass = test_input($_POST['r-pwd']);
    $first = test_input($_POST['first']);
    $last = test_input($_POST['last']);
    echo $password;
    echo $r_pass;
//    if (empty($username) || empty($password) || empty($r_pass) || empty($first) || empty($last)) {
//        header("location: ../registration.php?error=emptyfield");
//        exit();
//    }
//    if (!preg_match("/^[a-zA-Z0-9*$/", $username)) {
//        header("location: ../registration.php?error=invalidusername");
//        exit();
//    }
//    if ($password !== $r_pass) {
//        header("location: ../registration.php?error=passwordcheck");
//        exit();
//    }
    $hash =hash('sha256', $password);
    $sql = "select username from P_CUSTOMER where username=?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../registration.php?error=sqlerror");
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $resultCheck = mysqli_stmt_num_rows($stmt);
        if ($resultCheck > 0) {
            header("location: ../registration.php?error=invalidusername%first=" . $first . "&last" . $last);
            exit();
        } else {
            $sql = "insert into P_CUSTOMER (username, pwd, CUSTOMER_F_NAME, CUSTOMER_L_NAME) values (?,?,?,?)";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("location: ../registration.php?error=sqlerror");
                exit();
            } else {
//                    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

                if (!mysqli_stmt_bind_param($stmt, "ssss", $username, $hash, $first, $last)) {
                    echo "error in binding";
                }
                if (!mysqli_stmt_execute($stmt)) {
                    echo "error in executing";
                }
                mysqli_stmt_store_result($stmt);
                header("location: ../registration.php?signup=success");
                exit();
            }
        }
    }
//        }

    mysqli_stmt_close($stmt);
} else {
//    header("Location: ../index.php");
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

