<!DOCTYPE html>
<html lang="en">
<head xmlns="http://www.w3.org/1999/html">
    <meta charset="UTF-8">
    <title>V-HAUL</title>
    <link rel="stylesheet" href="css/login_registration.css">
<!--    //This page was written with the help of https://youtu.be/GAOBXGPuKqo-->
</head>
<body>


<div class="login-page">
    <div class="form">
<!--        <form class="register-form" action="includes/sign.inc.php" method="POST">-->
<!--            <label>-->
<!--                <input type="text" placeholder="name"/>-->
<!--                <input type="password" placeholder="password"/>-->
<!--                <input type="email" placeholder="email id"/>-->
<!--                <button>Create</button>-->
<!--            </label>-->
<!--            <p class="message">Already Registered? <a href="">Login here</a></p>-->
<!--        </form>-->
        <form method="post" action="includes/sign.inc.php">
            <label>
                <input type="text" placeholder="username"/>
                <input type="password" placeholder="password"/>
                <button>Login</button>
            </label>
            <p class="message">Not Registered? <a href=registration.html>Register</a></p>
        </form>
    </div>
</div>
</body>
</html> 