<?php

//select.php
//include('database_connection.php');
require 'dbh.inc.php';
if($conn->connect_error){
    die("Connection failed: ".$conn->connect_error);
}
//if(isset($_SESSION['cat'])){
//    header("location: ../index.php?error=ever_felt_like_you_are_in_a_wrong_place?");
//    exit();
//};
$query = "SELECT * FROM P_CUSTOMER ORDER BY CUSTOMER_ID DESC";
$result = $conn ->query($query);
$data[]="";
if ($result->num_rows > 0) {
    // output data of each row

    while($row = $result->fetch_assoc()) {
//        echo "UserName: " . $row["USERNAME"]. " - Role " . $row["ROLE"]. "<br>";
        $data[] = $row;
    }
    unset($data[0]);
    echo json_encode($data);
//    echo json_decode($data);
}

//$conn->close();
//$statement = $connect->prepare($query);
//if($statement->execute())
//{
//    while($row = $statement->fetch(PDO::FETCH_ASSOC))
//    {
//        $data[] = $row;
//    }
//    echo json_encode($data);
//}
