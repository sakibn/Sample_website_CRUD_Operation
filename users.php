<!DOCTYPE html>
<html>
<head>
</head>
<?php require "dbh.inc.php";?>
<body>
<form name="my_form" method="post" action= addUser()>
    User Name: <input type="text" name="username_add" placeholder="username"><br />
    <input type="submit" name="btn_add" value="Add User" />
</form>
    <table>
        <th>User Email</th>
        <th>Account Type</th>
        <th>Permissions</th>
        <th>Actions</th>
            <td><input type="button" value="edit permissions" onclick=editPermissions()/> </td>
            <td><input type="button" value="delete user" onclick=deleteUser()/> </td>
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
<?php require "footer.php"?>
</body>
</html>