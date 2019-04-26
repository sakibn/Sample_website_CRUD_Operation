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
    if (empty($uid) || empty($pwd)) {
        header("Location: ../index.php?error=emptyfields");
        exit();
    } else {
        $stmt = $conn->prepare("SELECT PWD, ROLE FROM P_EMPLOYEES WHERE USERNAME=?;") or trigger_error($conn->error, E_USER_ERROR);
//        print "userID = " . $uid;
        $stmt->bind_param("s", $uid) or trigger_error($stmt, E_USER_ERROR);
//        print "working after the bind";
        $stmt->execute() or trigger_error($stmt->error, E_USER_ERROR);
//        print "working after the execute";
//        echo "\nworking after bind and execute";
//        $stmt->bind_result($result);
//        $stmt->fetch();
        ($result = $stmt->get_result()) or trigger_error($stmt->error, E_USER_ERROR);
        $data[] = "";
//        echo  '<br>working before the fetch';
        if ($result->num_rows > 0) {
            // output data of each row
            echo  'working after the condition<br>';
            var_dump($result);
            while ($row = $result->fetch_assoc()) {
//        echo "UserName: " . $row["USERNAME"]. " - Role " . $row["ROLE"]. "<br>";
                $data[] = $row;
            }
//            echo '<br>getting data<br>';
            json_encode($row);
            echo $row;
            exit();
        }else{
            echo 'not working';
            exit();
        }
        echo '<br>working after the condition';
            echo $data[0];
//        echo "\nresult= " . $result;
//        echo "<br> hash:".$hash;
        if ($hash == $data[0]) {
//            echo "verified";
            session_start();
            $_SESSION['username'] = $uid;
//            $_SESSION['role'] =$role;
//            $_SESSION['userId'] = $row['USER_ID'];
            header("Location: index.php?login=success"); // TODO it wont go to the page i want it to
            $stmt->close();
            exit();
        } else {
            $stmt = $conn->prepare("SELECT pwd FROM P_CUSTOMER WHERE username=?;");
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
            if ($hash == $result) {
//                echo "verified";
                session_start();
                $_SESSION['username'] = $uid;
//              $_SESSION['userId'] = $row['USER_ID'];
                header("Location: ../index.php?login=success");
                $stmt->close();
                exit();
            } else {
//                echo "<br>result: ".$result;
//                echo "<br>hashed: ".$hash;
                header("Location: ../index.php?login=fail-on-customer");
                $stmt->close();
                exit();
            }
        }
    }

} else {
    header("Location: ../welcome.php");
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