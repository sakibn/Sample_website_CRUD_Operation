<?php

if (isset($_POST['login-submit'])) {
    require 'dbh.inc.php';
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
    $uid = test_input($_POST['uid']);
    $pwd = test_input($_POST['pwd']);
    $hash =(hash('sha256', $pwd));
//    echo $uid.$hash;
//    exit();
    if (empty($uid) || empty($pwd)) {
        header("Location: ../index.php?error=emptyfields");
        exit();
    } else {
        $stmt = $conn->prepare("SELECT EMPLOYEE_PWD, ROLE FROM P_EMPLOYEES WHERE EMPLOYEE_USERNAME=?;") or trigger_error($conn->error, E_USER_ERROR);
//        print "userID = " . $uid;
        $stmt->bind_param("s", $uid) or trigger_error($stmt->error, E_USER_ERROR);
//        print "working after the bind";
        $stmt->execute() or trigger_error($stmt->error, E_USER_ERROR);
//        print "working after the execute";
//        echo "\nworking after bind and execute";

//        $stmt->bind_result($result);
//        $stmt->fetch();
        $result = $stmt->get_result()or trigger_error($stmt->error, E_USER_ERROR);
        $data[] = "";
//        echo  '<br>working before the fetch';

        if ($result->num_rows > 0) {
            // output data of each row
//            echo  'working after the condition<br>';
//
            while ($row = $result->fetch_assoc()) {
//        echo "UserName: " . $row["USERNAME"]. " - Role " . $row["ROLE"]. "<br>";
                $data[] = $row;
            }
//            var_dump($data);
//            echo '<br>Password:'.$data[1]["PWD"];
//            exit();
//            echo '<br>getting data<br>';
//            json_encode($row);
//            echo $row;
//            exit();
        }else {
            header("Location: ../index.php?error=emptyfields");
        }
        $stmt->close();
//        echo '<br>working after the condition';
//            echo $data["PWD"];
//        echo "\nresult= " . $result;
//        echo "<br> hash:".$hash;
        if ($hash == $data[1]["EMPLOYEE_PWD"]) {
//            echo "verified";
            session_start();
            $_SESSION['username'] = $uid;
            $_SESSION['dog'] = $data[1]["ROLE"];
            $_SESSION['cat'] = 'yeah';

//            var_dump($_SESSION);
//            exit();
//            $_SESSION['role'] =$role;
//            $_SESSION['userId'] = $row['USER_ID'];
//            if(isset($_SESSION['dog'])&& $_SESSION['dog']==67) {
//                header("Location: ../manager/home.php");
//            }
//            else{
                header("Location: ../index.php");
//            }
            exit();
        }
        else {
            $stmt = $conn->prepare("SELECT CUSTOMER_PWD FROM P_CUSTOMER WHERE CUSTOMER_USERNAME=?;");
//        print "working after the sql";
//            print "userID = " . $uid;
            $stmt->bind_param("s", $uid);
//            print "working after the bind";
            $stmt->execute();
//            print "working after the execute";
            //$result = "";
            $stmt->bind_result($result);
//            echo "\nresult= " . $result;
//            echo "\nworking after bind and execute";
            $stmt->fetch();
            $stmt->close();
            if ($hash == $result) {
//                echo "verified";
                session_start();
                $_SESSION['username'] = $uid;
                $timeout=60;
                setcookie("chair",$_SESSION['username'],time()+$timeout,"/",NULL);
//              $_SESSION['userId'] = $row['USER_ID'];
                //            if(isset($_SESSION['dog'])&& $_SESSION['dog']==67) {
//                header("Location: ../manager/home.php");
//            }
//            else{
//                header("Location: ..index.php");
//            }
                header("Location: ../index.php?login=success");
                exit();
            } else {
//                echo "<br>result: ".$result;
//                echo "<br>hashed: ".$hash;
                header("Location: ../index.php?login=fail-on-customer");
                exit();
            }
        }
    }

} else {
    header("Location: ../index.php");
    exit();
}

function login_redirect($uid)
{

}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}