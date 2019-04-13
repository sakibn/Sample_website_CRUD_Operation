<!DOCTYPE html>
<html>
<head>
</head>
<body>
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
<?php   function deleteUser(){
            if(isset($_POST['btn_delete'])){
                $username = mysql_real_escape_string($_POST['username_delete']);
                $sql = mysql_query("DELETE FROM employees WHERE username = '$username'");
                if($sql){
                    echo "account deleted";
                }
            }
        }
</body>
</html>