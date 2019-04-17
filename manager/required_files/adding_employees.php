<?php
if(!defined('MyConst')) {
    header("location: ../../index.php");
//    die('Direct access not permitted');
}
if(isset($_POST['sign-submit'])){
    require '../../includes/dbh.inc.php';
    echo "working";
}

