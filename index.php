<?php
    session_start();
    include "functions/header.php";
?>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="bootstrap-theme.min.css">
         
  <style>
    body { 
      margin: 0; 
      padding: 0; 
    }
    
    .navbar {
      border-radius: 0;
      margin-bottom: 0;
    }
    
    .logo-icon {
      width: 60px;
    }
    
    .navbar-brand>img {
      float: left;
      margin: -15px 0 0 0;
    }
    
    .navbar-inverse {
      background-color: blue;
      border-color: blue;
    }
    
    .navbar-inverse .navbar-brand,
    .navbar-inverse .navbar-nav>li>a {
      color: #ffffff;
    }
    
    .navbar-nav>li>.dropdown-menu {
      background: blue;
    }
    
    .navbar-inverse .navbar-nav>.open>a,
    .navbar-inverse .navbar-nav>.open>a:focus,
    .navbar-inverse .navbar-nav>.open>a:hover {
      background-color: #740202;
    }
    
    .dropdown-menu>li>a {
      color: #fff;
      padding: 12px 20px;
    }
    
    .dropdown-menu>li>a:focus,
    .dropdown-menu>li>a:hover {
      background-color: #740202;
    }
    
    .cover {
      height: 300px;
      background: url(../images/cover.jpg);
      background-attachment: fixed;
    }
    
    .banner img {
      width: 100%;
      height: 400px;
    }
    
    .footer {
      background: blue;
      height: 20px;
    }
    
    .copyright {
      background: #000;
      color: #fff;
      padding: 15px 0;
    }
    
    .input-group:hover {
      text-decoration: none;
    }
    
    .error {
      color: red;
    }
    
    .spacer {
      height: 20px;
    }
    
    .modal-dialog {
      width: 500px;
      margin: 30px auto;
    }
    
    .heading-reg {
      font-family: 'Varela Round';
      padding: 10px;
      text-align: center;
      color: #ae0202;
    }
    
    .banner-try {
      background: blue;
      color: #fff;
      padding: 20px;
      margin: 40px 0;
      width: 100%;
    }
    
    .error-image {
      margin-top: 40px;
      width: 100%;
    }
    
    .col-md-6 img {
      width: 180px;
    }
    
    .icon-col {
      text-align: center;
      margin-top: -30px;
    }
    
    .request {
      background: #191919;
      padding: 10px;
      color: #fff;
      margin: 10px;
      transition: 0.2s;
      cursor: pointer;
      box-shadow: 4px 4px 8px -2px #ae0202;
    }
    
    .request:hover {
      transform: scale(1.02);
    }
    
    .blood {
      font-size: 7em;
    }
    
    .col-md-5.contact {
      padding: 20px;
      font-size: 18px;
    }
    
    .myTable td {
      padding: 5px;
    }
    
    td.table_row {
      color: #adadad;
    }
    
    .sbutton {
      width: 100%;
      margin-top: 25px;
    }
    
    .main-section h2 {
      font-size: 40px;
      font-family: 'Varela Round';
      color: blue;
    }
    
    .main-section p {
      letter-spacing: 1px;
      line-height: 23px;
      text-align: justify;
    }
    
    .note {
      font-size: 16px;
    }
    
    .sidebar {
      padding: 30px;
    }
    
    .sidebar img {
      width: 100%;
    }
    
    .carousel-inner > .item > img,
    .carousel-inner > .item > a > img {
      width: 70%;
      margin: auto;
    }
  </style>
</head>

<body>

<marquee scrollamount="5" onmouseover="this.stop();" onmouseout="this.start();">
  <b><i>Hi, Welcome to our Online Blood Bank Management System Website. Save Lives. Join the Red Cross.</i></b>
</marquee>

<section>
  <br>
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    
    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="images/donation1.jpg" alt="Chania" width="460" height="345">
      </div>
      <div class="item">
        <img src="images/donation2.jpg" alt="Chania" width="460" height="345">
      </div>
      <div class="item">
        <img src="images/donation3.jpg" alt="Flower" width="460" height="345">
      </div>
      <div class="item">
        <img src="images/donation4.jpg" alt="Blood" width="460" height="345">
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</section>

<!-- Description Section -->
<div class="container">
  <div class="col-md-8 main-section">
    <h2>Our Mission</h2>
    <p>The Philippine Red Cross will provide a sustained and effective humanitarian service committed to building resilient communities, run by well-trained and dedicated staff and volunteers imbued with integrity, equipped with the necessary logistics, and making maximum use of information technology.</p>
    <p class="note"><strong>The blood you donate gives someone another chance at life. One day, that someone may be a close relative, a friend, a loved one, or even you.</strong></p>
    <div class="spacer"></div>
  </div>
  <div class="col-md-4">
    <div class="sidebar">
      <img src="images/homepage.png" alt="Blood Donation"/>
    </div>
  </div>
</div>

<!-- Sign Up Modal -->
<div class="modal fade" id="SignUpModal" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Sign Up</h4>
      </div>
      <div class="modal-body">
        <form method="POST" action="classes/register.php" onsubmit="return Validate()">
          <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input id="email" name="username" type="email" class="form-control" placeholder="Email">
          </div>
          <br>
          <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
            <input id="password" name="password" type="password" class="form-control" placeholder="Password">
          </div>
          <br>
          <div class="input-group">
            <span class="
