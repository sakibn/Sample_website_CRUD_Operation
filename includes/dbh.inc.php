<?php
$dbServerName="localhost/xe";
$dbUserName="V00778622";
$dbPassword="V00778622";
$dbServerName="";

$conn = oci_connect('V00778622', 'V00778622', 'localhost/xe');
if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}
else{
    print "connected";
}

//$stid = oci_parse($conn, 'SELECT * FROM employees');
//oci_execute($stid);
//echo "<table border='1'>\n";
//while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
//    echo "<tr>\n";
//    foreach ($row as $item) {
//        echo "    <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
//    }
//    echo "</tr>\n";
//}
//echo "</table>\n";
//


// Close the Oracle connection
oci_close($conn);
