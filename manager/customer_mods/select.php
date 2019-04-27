<?php
//select.php
//include('database_connection.php');
require 'dbh.test.php';
if($conn->connect_error){
    die("Connection failed: ".$conn->connect_error);
}
$query = "SELECT EMPLOYEE_FIRST_NAME, EMPLOYEE_LAST_NAME FROM P_EMPLOYEES ORDER BY EMPLOYEE_ID DESC";
$result = $conn ->query($query);
$data[]="";
if ($result->num_rows > 0) {
    // output data of each row

    while($row = $result->fetch_assoc()) {
//        echo "UserName: " . $row["USERNAME"]. " - Role " . $row["ROLE"]. "<br>";
        $data[] = $row;
    }
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
