<html>
<head>
<title>Yo Noid!</title>
</head>
<body>

<?php
require "header.php";
?>
<section class="main-container">
    <div class="main-wrapper">
        <h2>Home</h2>
        <?php if(isset($_SESSION['username'])): ?>
            <p>you are logged in or something like that</p>
            <ul>
                <li><a href="database.php">Database/excel</a></li>
                <li><a href="users.php">User access</a></li>
                <li><a href="inventory.php">Available Inventory</a></li>
                <li><a href="reservation.php">Reservation Form</a></li>
            </ul>
        <?php else: ?>
            <p>you are logged out</p>
        
        <?php endif; ?  >
    </div>
</section>

<?php
require "footer.php";
?>
</body>
</html>