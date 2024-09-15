<?php
require_once 'connection.php';

session_start();

// Check if the user is already logged in, redirect to adminhome.php if true
if (isset($_SESSION['user'])) {
    header("location: adminhome.php");
    exit();
}

// Output buffering to ensure headers can be sent after HTML content
ob_start(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="icon" href="images/logo.png" type="image/x-icon">
    <style type="text/css">
        body {
            margin: 5%;
            color: #6a6f8c;
            font: 600 16px/18px 'Open Sans', sans-serif;
        }
        *, :after, :before { box-sizing: border-box }
        .clearfix:after, .clearfix:before { content: ''; display: table }
        .clearfix:after { clear: both; display: block }
        a { color: inherit; text-decoration: none }

        .login-wrap {
            width: 100%;
            margin: auto;
            max-width: 400px;
            min-height: 560px;
            position: relative;
            box-shadow: 0 12px 15px 0 rgba(1,0,0,.24), 0 17px 50px 0 rgba(0,0,0,.19);
        }
        .login-html {
            width: 100%;
            height: 12%;
            position: absolute;
            padding: 60px 40px 500px 63px;
            background-color: blue;
        }
        .login-html .tab {
            font-size: 25px;
            margin-right: 34px;
            padding-bottom: 11px;
            margin: 24px 0 15px 0;
            display: inline-block;
            border-bottom: 9px solid transparent;
            text-transform: uppercase;
        }
        .login-html .sign-in:checked + .tab {
            color: #d5e2dc;
            border-color: #969eab;
        }
        .login-form {
            min-height: 355px;
            position: relative;
            perspective: 1000px;
            transform-style: preserve-3d;
        }
        .login-form .group {
            margin-bottom: 8px;
        }
        .login-form .group .label,
        .login-form .group .input,
        .login-form .group .button {
            width: 100%;
            color: #121311;
            display: block;
        }
        .login-form .group .input,
        .login-form .group .button {
            border: none;
            padding: 15px 20px;
            border-radius: 2px;
            background: rgba(255, 255, 255, 1);
        }
        .login-form .group .label {
            color: #3eeac1;
            font-size: 17px;
        }
        .login-form .group .button {
            background: green;
            color: white;
        }
        .hr {
            height: 2px;
            margin: 60px 0 50px 0;
            background: rgba(255, 255, 255, 2);
        }
        .foot-lnk {
            text-align: center;
        }
    </style>
</head>

<body>

<p style="text-align: center; font-size: 55px; font-weight: bold; color: #969eaB">ADMINISTRATION LOGIN</p>

<div class="login-wrap">
    <div class="login-html">
        <form action="" method="post">
            <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Admin Login</label>

            <div class="login-form">
                <div class="sign-in-htm">
                    <div class="group">
                        <label for="user" class="label">Username</label>
                        <input id="user" type="text" class="input" name="user" required>
                    </div>
                    <div class="group">
                        <label for="pass" class="label">Password</label>
                        <input id="pass" type="password" class="input" data-type="password" name="pass" required>
                    </div>
                    <div class="group">
                        <input id="check" type="checkbox" class="check" checked>
                        <label for="check"><span class="icon"></span> Keep me Signed in</label>
                    </div>
                    <div class="group">
                        <input type="submit" class="button" name="sub" value="Sign In">
                        <br>
                        <a href="../index.php" style="color: white; background-color: green;">Back to Home</a>
                        <br>
                    </div>
                </div>
            </div>
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['sub'])) {
            $user = test_input($_POST['user']);
            $pass = test_input($_POST['pass']);

            $q = $db->prepare("SELECT * FROM admin WHERE user = :user AND pass = :pass");
            $q->bindParam(':user', $user);
            $q->bindParam(':pass', $pass);
            $q->execute();

            $res = $q->fetch(PDO::FETCH_OBJ);
            if ($res) {
                $_SESSION['user'] = $user;
                header("Location: adminhome.php");
                exit();
            } else {
                echo "<script>alert('Wrong username or password');</script>";
            }
        }

        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        ?>

        <div class="hr"></div>
        <div class="foot-lnk">
            <a href="forgot.html"></a>
        </div>
    </div>
</div>

</body>
</html>
