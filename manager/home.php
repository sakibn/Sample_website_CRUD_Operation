<?php
require "header_footer/header.php";
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
require "header_footer/footer.php";
?>

