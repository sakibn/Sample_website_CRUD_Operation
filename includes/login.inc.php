<?php
$row=[];
if (isset($_POST['login-submit'])) {
    require 'dbh.inc.php';
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
    $uid = test_input($_POST['uid']);
    $pwd = test_input($_POST['pwd']);

    if (empty($uid) || empty($pwd)) {
        header("Location: ../index.php?error=emptyfields");
        exit();
    } else {
        $stmt = $conn-> prepare("SELECT pwd FROM P_CUSTOMER WHERE username=?;");
//        print "working after the sql";
        print "userID = ".$uid;
        $stmt->bind_param("s", $uid);
        print "working after the bind";
        $stmt->execute();
        print "working after the execute";
        $result = "";
        $stmt->bind_result($result);
        echo "\nresult= ".$result;
        echo "\nworking after bind and execute";
        $stmt->fetch();
        if ($pwd == $result) {
            echo "verified";
            session_start();
            $_SESSION['username'] = $uid;
//            $_SESSION['userId'] = $row['USER_ID'];
            header("Location: ../index.php?login=success");
            $stmt->close();
            exit();
        } else {
            header("Location: ../index.php?login=fail");
            $stmt->close();
            exit();
        }
    }

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
