<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>
V-haul
    </title>
    <link rel="stylesheet" href="css/login_registration.css">
</head>
<body>
<header>
    <nav>
        <div class="main-wrapper">
            <ul>
                <li><a href="index.php">Home</a></li>
            </ul>
            <div class="nav-login">
                <form action="includes/login.inc.php" method="post">
                    <input type="text" name="uid" placeholder="Username">
                    <input type="password" name="pwd" placeholder="Password">
                    <button type="submit" name="login-submit">Login</button>
                </form>
                <a href="registration.php">Registration</a>
            </div>
        </div>
    </nav>
</header>