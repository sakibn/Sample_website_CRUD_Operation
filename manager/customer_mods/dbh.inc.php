
<?php
if($_SESSION['cat'] =! 'yeah'|| isset($_SESSION['cat'])){
    header("location: ../index.php?error=ever_felt_like_you_are_in_a_wrong_place?");
    exit();
};
$conn = mysqli_connect("localhost", "carrental", "carrental", "carrental");

if(!$conn){
    die("Connection failed". mysqli_connect_error());
}