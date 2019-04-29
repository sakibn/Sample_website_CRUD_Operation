<?php
if($_SESSION['cat'] =! 'yeah'){
    header("location: ../home.php?error=ever_felt_like_you_are_in_a_wrong_place?");
};
?>

<nav class="nav flex-column">
    <a class="nav-link" href="customer_accounts.php">Customer Accounts</a>
    <a class="nav-link" href="reservation.php">Reservation Form</a>
</nav>