<?php
//if(!defined('MyConst')) {
//    header("location: ../../index.php");
////    die('Direct access not permitted');
//}

if(isset($_POST['signup-submit'])){

    require 'dbh.inc.php';

    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
    $username =     test_input($_POST['username']);
    $password =     test_input($_POST['pwd']);
    $r_pass =       test_input($_POST['pwd_r']);
    $first =        test_input($_POST['first']);
    $last =         test_input($_POST['last']);
//    echo $username.$password.$first.$last;
    if (empty($username) || empty($password) || empty($r_pass) || empty($first) || empty($last)) {
        header("Location: ../home.php?error=Houston,we_got_a_problem");
        exit();
    }
    if ($password !== $r_pass) {
        header("location: ../home.php?error=passwordcheck%username=" . $username . "&first=" . $first . "&last" . $last);
        exit();
    }

//    echo $username;
    $stmt = $conn->prepare("SELECT USERNAME FROM P_EMPLOYEES WHERE lower(USERNAME=?);");
    $stmt -> bind_param("s", $username);
//    echo 'username: '.$username;
    $stmt-> execute();

    $stmt->bind_result($result);
    $stmt -> fetch();
//    echo $result;
//    echo "result is ".$result;
//    echo "username is ".$username;
    if($username == $result){
        echo 'verified';
        header("Location: ../home.php?user-already-exist");
    }else {
        echo "working after the else";
        $pwd =  hash('sha256',$password);
        $stmt = $conn->prepare("INSERT INTO P_EMPLOYEES (USERNAME, PWD, ROLE, EMPLOYEE_FIRST_NAME, EMPLOYEE_LAST_NAME) VALUES (?,?,?,?,?);");
        $role= 2;
        $stmt -> bind_param("ssiss", $username, $pwd,$role, $first, $last);
        $stmt->execute();
        $stmt->bind_result($result);
        $stmt->fetch();
//        echo $result;
//        echo "<br> working after the fetch";
        header("Location: ../home.php?Its_a_succes");
    }
}


function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
