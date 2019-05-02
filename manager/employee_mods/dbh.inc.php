
<?php
if($_SESSION['dog'] =!67){
    header("location: ../home.php?error=ever_felt_like_you_are_in_a_wrong_place?");
};
$conn = mysqli_connect("localhost", "carrental", "carrental", "carrental");

if(!$conn){
    die("Connection failed". mysqli_connect_error());
}