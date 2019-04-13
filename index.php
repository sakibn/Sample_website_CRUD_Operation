<html>
<head>
</head>
<body>
    <ul>
        <a href="header.php">haha</a>
    </ul>

<?php
require "header.php";
?>
<section class="main-container">
    <div class="main-wrapper">
        <h2>Home</h2>
        <?php
        if(isset($_SESSION['username'])){
            echo 'you are logged in';
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