<!DOCTYPE html>
<html>
<head>
<style>
* {
  box-sizing: border-box;
}

body {
  margin: 0;
}

/* Style the header */
.header {
  background-color: #f1f1f1;
  padding: 20px;
  text-align: center;
}

/* Style the top navigation bar */
.topnav {
  overflow: hidden;
  background-color: #333;
}

/* Style the topnav links */
.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

/* Change color on hover */
.topnav a:hover {
  background-color: #ddd;
  color: black;
}
</style>
</head>
<body>
<div class="header">
  <h1>Inventory</h1>
</div>

<div class="topnav">
  <a href="index.php">Home</a>
  <a href="reservation.php">Reservation</a>
</div>
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