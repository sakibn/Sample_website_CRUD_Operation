<?php
define('MyConst', TRUE);
require "header_footer/header.php";
//require "";
//I created this if condition so that both manager and employee can come in here
if($_SESSION['cat']!= 'yeah'){
    header("location: ../index.php?error=ever_felt_like_you_are_in_a_wrong_place?");
}
//var_dump($_SESSION);
if ($_SESSION['dog'] =67 && $_SESSION['dog'] != 2){
    include ('links/manager.php');
}elseif ($_SESSION['dog'] =2)
    include ('links/employees.php')
?>


<?php
require "header_footer/footer.php";
?>

