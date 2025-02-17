

<?php 
require 'functions/functions.php';
session_start();

// Check whether user is logged in or not
if (!isset($_SESSION['user'])) {
    header("location:index.php");
    exit();  // It's good practice to use exit after a redirect
}

$user = $_SESSION['user'];
session_destroy();  // Destroy the session

// Start a new session and restore the user
session_start();
$_SESSION['user'] = $user;

$conn = connect();
ob_start(); 
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Home</title>
    <link rel="icon" href="images/logo.png" type="image/x-icon" />

    <style>
        body {
            margin: 0;
            padding: 0;
            color: red;
        }

        ul {
            list-style-type: none;
            background-color: blue;
            height: 40px;
            width: 100%;
        }

        a {
            text-decoration: none;
            font-size: 25px;
            color: white;
            position: relative;
            top: 4px;
        }

        li {
            display: inline;
            font-size: 15px;
            padding: 38px;
            margin-left: 20px;
            position: relative;
            left: 70px;
        }

        p {
            text-align: justify;
            max-width: 1000px;
            max-height: 80px;
            position: absolute;
            left: 60px;
            font-size: 20px;
            top: 350px;
            margin-left: 95px;
        }

        h6 {
            position: relative;
            top: 180px;
            left: 60px;
            font-size: 20px;
            margin-left: 95px;
        }

        .bloodquery {
            position: relative;
            top: 160px;
            left: 60px;
            font-size: 20px;
            margin-left: 95px;
        }

        .carousel-inner > .item > img,
        .carousel-inner > .item > a > img {
            width: 70%;
            margin: auto;
        }

        .ongoingcamps {
            position: relative;
            top: 180px;
            left: 60px;
            font-size: 20px;
            margin-left: 95px;
        }

        .saap {
            position: relative;
            top: 160px;
            left: 60px;
            font-size: 20px;
            margin-left: 40px;
            color: black;
        }

        footer {
            position: relative;
            bottom: 10;
        }

        @media (max-height: 100px) {
            footer { position: static; }
            header { padding-top: 20px; }
        }

        .footer-distributed {
            background-color: #2c292f;
            box-sizing: border-box;
            width: 100%;
            text-align: left;
            font: bold 16px sans-serif;
            padding: 20px 20px 20px 20px;
            margin-top: 100px;
            height: 220px;
        }

        .footer-distributed .footer-left,
        .footer-distributed .footer-center,
        .footer-distributed .footer-right {
            display: inline-block;
            vertical-align: bottom;
        }

        .footer-distributed .footer-left {
            width: 100%;
            height: 100px;
        }

        .footer-distributed h3 {
            color: #ffffff;
            font: normal 36px 'Cookie', cursive;
            margin: 0;
        }

        .footer-distributed .footer-left img {
            width: 30%;
            height: 20px;
        }

        .footer-distributed h3 span {
            color: #e0ac1c;
        }

        .footer-distributed .footer-links {
            color: #ffffff;
            margin: 20px 0 12px;
        }

        .footer-distributed .footer-links a {
            display: inline-block;
            line-height: 1.8;
            text-decoration: none;
            color: inherit;
        }

        .footer-distributed .footer-company-name {
            color: #8f9296;
            font-size: 10px;
            font-weight: normal;
            margin: 0;
        }

        .footer-distributed .footer-center {
            width: 30%;
            height: 20px;
        }

        .footer-distributed .footer-center {
            background-color: #33383b;
            color: #ffffff;
            font-size: 25px;
            width: 10px;
            height: 10px;
            border-radius: 50%;
            text-align: center;
            line-height: 20px;
            margin: 10px 15px;
            vertical-align: middle;
        }

        .footer-distributed .footer-center i.fa-envelope {
            font-size: 17px;
            line-height: 20px;
        }

        .footer-distributed .footer-center p {
            display: inline-block;
            color: #ffffff;
            vertical-align: middle;
            margin: 0;
        }

        .footer-distributed .footer-center p span {
            display: block;
            font-weight: normal;
            font-size: 14px;
            line-height: 20px;
        }

        .footer-distributed .footer-center p a {
            color: #e0ac1c;
            text-decoration: none;
        }

        .footer-distributed .footer-right {
            width: 30%;
        }

        .footer-distributed .footer-company-about {
            line-height: 20px;
            color: #92999f;
            font-size: 13px;
            font-weight: normal;
            margin: 0;
        }

        .footer-distributed .footer-company-about span {
            display: block;
            color: #ffffff;
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .footer-distributed .footer-icons {
            margin-top: 25px;
        }

        .footer-distributed .footer-icons a {
            display: inline-block;
            width: 35px;
            height: 35px;
            cursor: pointer;
            background-color: #33383b;
            border-radius: 2px;
            font-size: 20px;
            color: #ffffff;
            text-align: center;
            line-height: 35px;
            margin-right: 3px;
            margin-bottom: 5px;
        }

        .footer-distributed .footer-left,
        .footer-distributed .footer-center,
        .footer-distributed .footer-right {
            display: block;
            width: 100%;
            margin-bottom: 40px;
            text-align: center;
        }

        .footer-distributed .footer-center i {
            margin-left: 0;
        }
    </style>
</head>

<body>
    <div>
        <p style="text-align: center; font-size: 30px; font-family: cursive; color: blue; margin-left: 585px; margin-top: -362px;">Welcome Admin</p>

        <br><br>
        <ul>
            <li><a href="user.php" style="font-size: 20px;">Patient Details</a></li>
            <li><a href="bloodupdate.php" style="font-size: 20px;">Update Blood Details For Patient</a></li>
            <li><a href="camps.html" style="font-size: 20px;">Update Details for Donator</a></li>
            <li><a href="viewrequest.php" style="font-size: 20px;">See Who Request for Blood</a></li>
            <li><a href="logout.php" style="font-size: 20px;">Logout</a></li>
        </ul>

        <center>
            <img src="homepage.png" alt="" height="300px" width="500px">
            <br><br><br><br><br>
            <p style="color: blue; font-style: italic; margin-top: 120px;">Blood is essential to life. Blood circulates through our body and delivers essential substances like oxygen and nutrients to the body’s cells. It also transports metabolic waste products away from those same cells. There is no substitute for blood. It cannot be made or manufactured. Generous blood donors are the only source of blood for patients in need of a blood

