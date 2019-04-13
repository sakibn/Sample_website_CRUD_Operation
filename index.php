<html>
<head>
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
        <?php if(!isset($_SESSION['username'])){
                $db=mysqli_connect("localhost","carrental","carrental");

                if (mysqli_connect_errno()){
                    echo "Failed to connect to MySQL: " . mysqli_connect_error();
                }

                $result = mysqli_query($db,"SELECT * FROM P_CUSTOMERS");
                $result2 = mysqli_query($db,"SELECT * FROM P_EMPLOYEES");

                echo "<table border='1'>";
                while($row = mysqli_fetch_array($result)){
                    echo "<tr>";
                    echo "<td>" . $row['Model'] . "</td>";
                    echo "<td>" . $row['Shop Location'] . "</td>";
                    echo "<td>" . $row['Mileage'] . "</td>";
                    echo "</tr>";
                }
                echo "</table>";

                mysqli_close($db);
            }
    </div>
</section>
</body>
</html>