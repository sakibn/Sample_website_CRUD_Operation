<html>
<head>
<style>
    table, th, td {
        border: 1px solid black;
        text-align: center;
    }
</style>
</head>
<body>
<?php
$con=mysqli_connect("http://128.172.188.107/phpmyadmin/","carrental","carrental","carrental");
// Check connection
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM P_CUSTOMERS");

while($row = mysqli_fetch_array($result))
{

}
echo "</table>";

mysqli_close($con);
?>
    <table>
        <tr>
            <th>User Email</th>
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
<?php require "footer.php";?>
</body>
</html>