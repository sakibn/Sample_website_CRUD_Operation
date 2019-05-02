<?php
/*//select.php
//include('database_connection.php');
//require 'include/dbh.test.php';
//include ('include/dbh.test.php');
//if($conn->connect_error){
//    die("Connection failed: ".$conn->connect_error);
//}
//$query = "SELECT * from P_EMPLOYEES order by EMPLOYEE_ID ";
//$result = $conn ->query($query);
//$statement = $connect->prepare($query);

//$data[]="";
//if (sta->num_rows > 0) {
//    // output data of each row
//
//    while($row = $result->fetch_assoc()) {
////        echo "UserName: " . $row["USERNAME"]. " - Role " . $row["ROLE"]. "<br>";
//        $data[] = $row;
//    }
//    echo json_encode($data);
//
//}
if($statement->execute()){
    while ($row =$statement->fetch(PDO::FETCH_ASSOC))
    {
        $data[] = $row;
    }
    echo json_encode($data);
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
//}*/

//select.php
//include('database_connection.php');
require 'dbh.inc.php';
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$query = "SELECT * FROM P_CAR_MODEL";
$result = $conn->query($query);
$data[] = "";
if ($result->num_rows > 0) {
    // output data of each row

    while ($row = $result->fetch_assoc()) {
//        echo "UserName: " . $row["USERNAME"]. " - Role " . $row["ROLE"]. "<br>";
        $data[] = $row;
    }
    $conn->close();
    echo json_encode($data);
//    echo json_decode($data);
}