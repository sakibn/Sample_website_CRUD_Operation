<?php
//$username = $password = $r_pass = $first = $last = "";
if (isset($_POST['signup-submit'])) {
    require 'dbh.inc.php';
    $username = test_input($_POST['username']);
    $password = test_input($_POST['pwd']);
    $r_pass = test_input($_POST['r_pwd']);
//    $credit_card = test_input($_POST['card']);
    $license = test_input($_POST['license']);
    $name = test_input($_POST['names']);
    $phone = test_input($_POST['phone']);
    $age = test_input($_POST['age']);
    $street = test_input($_POST['street']);
    $city = test_input($_POST['city']);
    $state = test_input($_POST['state']);
    $zip = test_input($_POST['zip']);
    if (empty($username) || empty($password) || empty($name) || empty($phone) || empty($age) || empty($street) || empty($city) || empty($state) || empty($zip)) {
        header("Location: ../registration.php?error=emptyfields");
        exit();
    }
    if (!preg_match('/^\w{5,}$/', $username)) {
        header("Location: ../registration.php?error=invalidusername");
        exit();
    }
    if ($password !== $r_pass) {
        header("location: ../registration.php?error=passwordcheck");
        exit();
    }
    $hash = hash('sha256', $password);
    $sql = "select USER_NAME from P_CUSTOMER where USER_NAME=?";
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
            $sql = "insert into P_CUSTOMER (USER_NAME, PWD, DRIVER_LICENSE_NUMBER, CUSTOMER_NAME, CUSTOMER_PHONE_NUMBER, 
                        CUSTOMER_AGE, CUSTOMER_STREET, CUSTOMER_CITY, CUSTOMER_STATE, CUSTOMER_ZIP) values (?,?,?,?,?,?,?,?,?,?)";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("location: ../registration.php?error=sqlerror");
                exit();
            } else {
//                    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

                if (!mysqli_stmt_bind_param($stmt, "ssssiisssi", $username, $hash, $license, $name, $phone, $age, $street, $city, $state, $zip)) {
                    echo "error in binding";
                }
                if (!mysqli_stmt_execute($stmt)) {
                    echo "error in executing";
                }
                mysqli_stmt_store_result($stmt);
                mysqli_stmt_close($stmt);
                header("location: ../registration.php?signup=success");
                exit();
            }

        }
    }
//        }


} else {
    header("Location: ../index.php");
    exit();
}
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

