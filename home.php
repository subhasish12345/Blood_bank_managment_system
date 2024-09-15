<?php 
require 'functions/functions.php';
session_start();

if (!isset($_SESSION['user'])) {
    header("location:index.php");
    exit();
}

$user = $_SESSION['user'];
session_destroy();
session_start();
$_SESSION['user'] = $user;

ob_start(); 
$conn = connect();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Bank</title>
    <link rel="icon" href="images/logo.png" type="image/x-icon"> 
    <style type="text/css">
        body {
            margin: 0;
            padding: 0;
            color: red;
            font-family: Arial, sans-serif;
        }
        ul {
            list-style-type: none;
            background-color: blue;
            height: 40px;
            width: 98%;
            margin: 0;
            padding: 0;
        }
        a {
            text-decoration: none;
            font-size: 20px;
            color: white;
            padding: 10px;
            display: inline-block;
        }
        li {
            display: inline;
            padding: 10px;
        }
        p {
            text-align: justify;
            max-width: 1000px;
            margin: 20px auto;
            font-size: 20px;
        }
        .bloodquery, .ongoingcamps, .saap {
            margin: 20px auto;
            font-size: 20px;
            color: black;
        }
        footer {
            background-color: blue;
            color: white;
            text-align: center;
            padding: 10px;
            position: relative;
            bottom: 0;
            width: 100%;
        }
        @media (max-height: 100px) {
            footer {
                position: static;
            }
        }
        .footer-distributed {
            background-color: blue;
            color: white;
            padding: 20px;
            text-align: left;
        }
        .footer-distributed h3 {
            color: #ffffff;
            font: normal 36px 'Cookie', cursive;
            margin: 0;
        }
        .footer-distributed .footer-left {
            width: 100%;
        }
        .footer-distributed .footer-company-name {
            color: #8f9296;
            font-size: 10px;
            font-weight: normal;
            margin: 0;
        }
    </style>
</head>
<body>    
    <ul>
        <li><a href="camps.php">Camps</a></li>
        <li><a href="blooddetails.php">Blood Details</a></li>
        <li><a href="profile.php">Profile</a></li>
        <li><a href="viewrequest.php">View Request</a></li>
        <li><a href="about.html">About Us</a></li>
        <li><a href="contact.html">Contact Us</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>

    <center>
        <img src="images/blood.png" alt="save blood" height="400px" width="600px">
    </center>

    <p>Blood is essential to life. Blood circulates through our body and delivers essential substances like oxygen and nutrients to the body’s cells. It also transports metabolic waste products away from those same cells. There is no substitute for blood. It cannot be made or manufactured. Generous blood donors are the only source of blood for patients in need of a blood transfusion.</p>

    <footer class="footer-distributed">
        <div class="footer-left">
            <h3>Copyright @ 2024 Blood Bank Management System</h3>
        </div>
    </footer>
</body>
</html>
