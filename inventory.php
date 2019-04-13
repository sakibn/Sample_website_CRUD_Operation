<!DOCTYPE html>
<html>
<head>
</head>
<body>
<?php
$db=mysqli_connect("localhost","carrental","carrental");

if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($db,"SELECT * FROM P_CARS");

echo "<table border='1'>";
while($row = mysqli_fetch_array($result))
{
    echo "<tr>";
    echo "<td>" . $row['Model'] . "</td>";
    echo "<td>" . $row['Shop Location'] . "</td>";
    echo "<td>" . $row['Mileage'] . "</td>";
    echo "</tr>";
}
echo "</table>";

mysqli_close($db);
?>
</body>
</html>