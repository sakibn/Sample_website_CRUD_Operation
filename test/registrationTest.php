<?php
echo "before submit";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require 'includes/dbh.inc.php';
    $username = test_input($_POST['username']);
    $password = test_input($_POST['pwd']);
    $r_pass = test_input($_POST['r-pwd']);
    $first = test_input($_POST['first']);
    $last = test_input($_POST['last']);
    echo "before username";
    echo $username;
//    if (!isset($username) || isset($username) == 'null' || !isset($password) || isset($password) == 'null' || isset($r_pass) == 'null' || !isset($r_pass) || !isset($first) || isset($first) == 'null' || !isset($last) || isset($last) == 'null') {
//        header("location: ../registration.php?error=emptyfield1%first=" . $first . "&last" . $last);
//        exit();
//    } else if (!preg_match("/^[a-zA-Z0-9*$/", $username)) {
//        header("location: ../registration.php?error=invalidusername%first=" . $first . "&last" . $last);
//        exit();
//    }
}
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}