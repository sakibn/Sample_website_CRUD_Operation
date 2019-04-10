<?php
require "header.php";
?>
<section class="main-container">
    <div class="main-wrapper">
        <h2>SignUp</h2>
        <form class="sign_up-form">
            <input type="text" name="username" placeholder="Username">
            <input type="password" name="pwd" placeholder="Password">
            <input type="text" name="first" placeholder="Firstname">
            <input type="text" name="last" placeholder="Lastname">

            <button type="submit" name="singup-submit">Register</button>
        </form>
    </div>
</section>

<?php
require "footer.php";
?>
