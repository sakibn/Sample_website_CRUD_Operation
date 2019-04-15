<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="tables.css">
</head>
<body>
<div class="header">
  <h1>Users</h1>
</div>

<div class="topnav">
  <a href="index.php">Home</a>
  <a href="inventory.php">Inventory</a>
  <a href="reservation.php">Reservation</a>
</div>

<hr>

<?php
$db=mysqli_connect("localhost","carrental","carrental");

if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($db,"SELECT * FROM P_CUSTOMERS");
$result2 = mysqli_query($db,"SELECT * FROM P_EMPLOYEES");

echo "<table border='1'>";
while($row = mysqli_fetch_array($result))
{
    echo "<tr>";
    echo "<td>" . $row['Username'] . "</td>";
    echo "<td>" . $row['Account Type'] . "</td>";
    echo "<td>" . $row['Permissions'] . "</td>";
    echo "<td>" . $row['Actions'] . "</td>";
    echo "</tr>";
}
echo "</table>";

mysqli_close($db);
?>
    <table>
        <tr>
            <th>Username</th>
            <th>Account Type</th>
            <th>Permissions</th>
            <th>Actions</th>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td><input type="button" value="edit permissions" onclick=editPermissions()/>
            <input type="button" value="delete user" onclick=deleteUser()/> </td>
        </tr>
    </table>
    <?php   function editPermissions(){
            //
        } ?>
<?php
        function addUser(){
            if(isset($_POST['btn_add'])){
                $username = mysql_real_escape_string($_POST['username_add']);
                $sql = mysql_query("INSERT VALUES INTO customers($username, $pwd, $role");
                if($sql){
                    echo "account added";
                }
            }
        }

?>
<?php   function deleteUser(){
            if(isset($_POST['btn_delete'])){
                $username = mysql_real_escape_string($_POST['username_delete']);
                $sql = mysql_query("DELETE FROM employees WHERE username = '$username'");
                if($sql){
                    echo "account deleted";
                }
            }
        }
?>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>