<?php
require "header.php";
?>
<section class="main-container">
    <div class="main-wrapper">
        <h2>SignUp</h2>
        <form method="POST" class="sign_up-form" action=includes/sign.inc.php >
            <input type="text" name="username" placeholder="Username Alphanumeric 4>length<11" required minlength="5" maxlength="10">
            <input type="password" name="pwd" placeholder="Password" required>
            <input type="password" name="r_pwd" placeholder="Retype Password" required>
            <input type="text" name="names" placeholder="Name" required>
            <input type="text" name="phone" placeholder="Phone Number (Unique)" minlength="10" maxlength="10" required>
            <input type="text" name="license" placeholder="Driver-license-number (Unique)" required>
            <input type="number" name="age" placeholder="Age (in number)" minlength="2" maxlength="3" required>
            <input type="text" name="street" placeholder="Address: Street" required>
            <input type="text" name="city" placeholder="Address: City" required>
            <input type="text" name="state" placeholder="Address: State" required>
            <input type="number" name="zip" placeholder="Address: zip" minlength="5" maxlength="5" required>
            <button type="submit" name="signup-submit">Register</button>
        </form>
    </div>
</section>

<?php
require "footer.php";
?>
