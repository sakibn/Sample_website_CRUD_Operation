<?php
define('MyConst', TRUE);
require "header_footer/header.php";
//require "";
if($_SESSION['dog']!= 4567 ){
    header("location: ../index.php?error=wrong_place");
}
?>
<section class="main-container">
    <div class="main-wrapper">
        <h2>Add new Employee</h2>
        <form method="POST" class="sign_up-form" action=required_files/adding_trash.php >
            <input  type="text"      name="username"    placeholder="Username">
            <input  type="password"  name="pwd"         placeholder="Password">
            <input  type="password"  name="pwd_r"       placeholder="Retype Password">
            <input  type="text"      name="first"       placeholder="Firstname">
            <input  type="text"      name="last"        placeholder="Lastname">
            <button type="submit"    name="signup-submit">Register</button>
        </form>
    </div>
</section>

<?php
require "header_footer/footer.php";
?>

