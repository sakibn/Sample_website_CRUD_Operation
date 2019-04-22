<?php
//select.php
//include('database_connection.php');
require 'include/dbh.test.php';
if($conn->connect_error){
    die("Connection failed: ".$conn->connect_error);
}
$query = "SELECT EMPLOYEE_ID, EMPLOYEE_FIRST_NAME, EMPLOYEE_LAST_NAME FROM P_EMPLOYEES ORDER BY EMPLOYEE_ID DESC";
$result = $conn ->query($query);
$data[]="";
if ($result->num_rows > 0) {
    // output data of each row

    while($row = $result->fetch_assoc()) {
//        echo "UserName: " . $row["USERNAME"]. " - Role " . $row["ROLE"]. "<br>";
        $data[] = $row;
    }
    echo json_encode($data);

}

$conn->close();
//$statement = $connect->prepare($query);
//if($statement->execute())
//{
//    while($row = $statement->fetch(PDO::FETCH_ASSOC))
//    {
//        $data[] = $row;
//    }
//    echo json_encode($data);
//}
