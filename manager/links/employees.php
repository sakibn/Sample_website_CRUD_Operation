<?php
if(($_SESSION['dog'] =! 2) ){
    header("location: ../home.php?error=ever_felt_like_you_are_in_a_wrong_place?");
};
?>

<nav class="nav flex-column mx-center">
    <a class="nav-link" href="customer_accounts.php">Customer Accounts</a>
    <a class="nav-link" href="reservation.php">Reservation Form</a>
    <a class="nav-link" href="cars.php">Cars</a>
    <a class="nav-link" href="car_model.php">Car Model</a>
</nav>