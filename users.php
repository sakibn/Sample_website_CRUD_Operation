<html>
<head>
    table, th, td {
        border: 1px solid black;
        text-align: center;
    }
</head>
<body>
    <table>
        <tr>
            <th>User Email</th>
            <th>Account Type</th>
            <th>Permissions</th>
            <th>Actions
                <td><input type="button" value="edit permissions" onclick=editPermissions()/> </td>
                <td><input type="button" value="delete user" onclick=deleteUser()/> </td>
            </th>
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