<?php
$dbServerName="localhost";
$dbUserName="carrental";
$dbPassword="carrental";

// Create connection
$conn = mysqli_connect($dbServerName, $dbUserName, $dbPassword);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$stid = oci_parse($conn, 'SELECT * FROM employees');
oci_execute($stid);
echo "<table border='1'>\n";
while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
    echo "<tr>\n";
    foreach ($row as $item) {
        echo " <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
    }
    echo "</tr>\n";
}
echo "</table>\n";



// Close the Oracle connection
oci_close($conn);
