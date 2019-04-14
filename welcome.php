<!DOCTYPE html>
<html lang="en">
<?php
session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("Location: ../index.php");
    exit;
}
?>
<head>
    <meta charset="UTF-8">
    <title>Welcome!</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="page-header">
        <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to our site.</h1>
    </div>
    <p>
        <!--a href="reset-password.php" class="btn btn-warning">Reset Your Password</a-->
        <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a>
    </p>
    <div class="header">
  <h1>Header</h1>
</div>

<div class="topnav">
  <a href="#">Home</a>
  <a href="#">Inventory</a>
  <a href="#">Reservation</a>
</div>
</body>
</html>