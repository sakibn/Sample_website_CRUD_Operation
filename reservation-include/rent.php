<?php

if(isset($_POST['rent_submit']) ){
    $car = test_input($_POST['car']);
    $username=$_COOKIE['chair'];
//    var_dump($username);
////    var_dump($car);
////    var_dump($_COOKIE[]);
//    exit();

//    var_dump($car);
    if(empty($car)){
        header("Location: ../index.php?error=emptyfields");
        exit();
    }
    require 'dbh.inc.php';
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
    $stmt = $conn->prepare("CALL ADD_RESERVATION(?, ?);")
                or trigger_error($conn->error, E_USER_ERROR);
    $stmt->bind_param('si', $username,$car)
            or trigger_error($conn->error, E_USER_ERROR);
    if($stmt->execute()){
        echo '<button onclick="goBack()">Go Back</button>';
    }else {
        trigger_error($conn->error, E_USER_ERROR);
    }
}else {
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
?>

<script>
function goBack() {
  window.history.back();
}
</script>