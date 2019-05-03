<?php
require 'dbh.inc.php';
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//if($_SESSION['cat'] != 'yeah'){
//    var_dump($_SESSION['cat']);
////    header("location: ../index.php?error=ever_felt_like_you_are_in_a_wrong_place?select");
//    exit();
//}
$query = "SELECT * FROM P_CAR";
$result = $conn->query($query);
$data[] = "";
if ($result->num_rows > 0) {
    // output data of each row

    while ($row = $result->fetch_assoc()) {
//        echo "UserName: " . $row["USERNAME"]. " - Role " . $row["ROLE"]. "<br>";
        $data[] = $row;
    }
    unset($data[0]);
    $conn->close();
    echo json_encode($data);
    //API Url
//    $url = 'http://128.172.188.107/~V00778622/manager/cars.php';
//    $content = json_encode($data);
//
//    $curl = curl_init($url);
//    curl_setopt($curl, CURLOPT_HEADER, false);
//    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
//    curl_setopt($curl, CURLOPT_HTTPHEADER,
//        array("Content-type: application/json"));
//    curl_setopt($curl, CURLOPT_POST, true);
//    curl_setopt($curl, CURLOPT_POSTFIELDS, $content);
//
//    $json_response = curl_exec($curl);
//
//    $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
//
//    if ( $status != 201 ) {
//        die("Error: call to URL $url failed with status $status, response $json_response, curl_error " . curl_error($curl) . ", curl_errno " . curl_errno($curl));
//    }
//
//
//    curl_close($curl);
//
//    $response = json_decode($json_response, true);

}