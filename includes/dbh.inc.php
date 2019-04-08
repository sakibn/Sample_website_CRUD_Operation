<?php
$dbServerName="localhost/xe";
$dbUserName="V00778622";
$dbPassword="V00778622";
$dbServerName="";
$conn = oci_connect($dbUserName, $dbPassword, $dbServerName);
if (!$conn) {
    $m = oci_error();
    echo $m['message'], "\n";
    exit;
}
else {
    print "Connected to Oracle!";
}
// Close the Oracle connection
oci_close($conn);
?>