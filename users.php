<html>
<head>
</head>
<?php require "dbh.inc.php";?>
<body>

    <table>
        <th>User Email</th>
        <th>Account Type</th>
        <th>Permissions</th>
        <th>Actions</th>
            <td><input type="button" value="edit permissions" onclick=editPermissions()/> </td>
            <td><input type="button" value="delete user" onclick=deleteUser()/> </td>
    </table>

<?php require "footer.php";?>
</body>
</html>