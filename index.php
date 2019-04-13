<html>
<head>
<style>
    table, th, td {
        border: 1px solid black;
        text-align: center;
    }
    main-container{
        text-align: center;
        background-color: black;
        color: red;
        border: 1px, white;
    }
</style>
</head>
<body>

<?php
require "header.php";
?>
<section class="main-container">
    <div class="main-wrapper">
        <h2>Home</h2>
        
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