<html>
<head>
    <link rel="stylesheet" href="tables.css">
</head>
<body>
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
</body>
</html>