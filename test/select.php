<?php
//select.php
//include('database_connection.php');
require 'dbh.inc.php';
if()
$query = "SELECT * FROM tbl_sample ORDER BY id DESC";
$statement = $connect->prepare($query);
if($statement->execute())
{
    while($row = $statement->fetch(PDO::FETCH_ASSOC))
    {
        $data[] = $row;
    }
    echo json_encode($data);
}

?>