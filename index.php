<html>
<head>
<style>
    table, th, td {
        border: 1px solid black;
        text-align: center;
    }
    #c3{
        text-align: center;
        background-color: black;
        color: red;
    }
</style>
</head>
<body>

<?php
require "header.php";
?>
<section id="c3" class="main-container">
    <div class="main-wrapper">
        <h2 style="color: red">Home</h2>
        
        <?php if(isset($_SESSION['username'])): ?>
            <ul>
                <li><a href="database.php">Database/excel</a></li>
                <li><a href="users.php">User access</a></li>
                <li><a href="inventory.php">Available Inventory</a></li>
                <li><a href="reservation.php">Reservation Form</a></li>
            </ul>
        <?php endif; ?>
        
    </div>
</section>
</body>
</html>