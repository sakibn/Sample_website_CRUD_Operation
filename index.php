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
        <?php if(isset($_SESSION['username'])){
            echo 'you are logged in';
            echo '<ul>'
            echo '<li><a href="database.php">Database/excel</a></li>'
            echo '<li><a href="users.php">User access</a></li>'
            echo '<li><a href="inventory.php">Available Inventory</a></li>'
            echo '<li><a href="reservation.php">Reservation Form</a></li>'
            echo '</ul>'
        }else{
            echo 'you are logged out';
        }
        ?>
    </div>
</section>

<?php
require "footer.php";
?>
</body>
</html>