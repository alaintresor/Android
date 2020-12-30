<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
  header('location:index.html');
  exit;
}
include "connection.php";
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <title>Farm Admin</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="style.css" rel="stylesheet">
  <link href="assets/css/font-awesome.css" rel="stylesheet">
  <!-- Bootstrap -->
  <link href="assets/css/bootstrap.css" rel="stylesheet">
  <!-- Slick slider -->
  <link rel="stylesheet" type="text/css" href="assets/css/slick.css">
  <!-- Date Picker -->
  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-datepicker.css">
  <!-- Gallery Lightbox -->
  <link href="assets/css/magnific-popup.css" rel="stylesheet">
  <!-- Theme color -->
  <link id="switcher" href="assets/css/theme-color/default-theme.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    .fakeimg {
      height: 200px;
      background: #aaa;
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <!-- <a class="navbar-brand" href="#">Talkapp</a> -->
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
          <li class="active"><a href="home.php">Home</a></li>
          <li><a href="orders.php">Orders</a></li>
          <li><a href="products.php">Products</a></li>
          <li><a href="shareholders.php">ShareHolders</a></li>
          <li><a href="reports.php">Reports</a></li>
          <li><a href="admin_change_password.php">modify password</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li class=""><a href="logout.php">Logout</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container">
    <div class="row">
      <br><br><br><br>
      <div class="col-sm-3 text-center" style="border: 2px solid cyan">
        <br>
        <img src="images/new_orders.png" width="80" alt="">
        <h3>New Orders</h3>
        <br>

        <p style="color: grey;font-size: 35px">
          <?php
          $orders = mysqli_fetch_array(mysqli_query($connection, "SELECT COUNT(id) FROM orders WHERE `status`='pending'"));
          echo $orders[0];
          ?>
        </p>

        <br>
      </div>
      <div class="col-sm-1 text-center">

      </div>
      <div class="col-sm-3 text-center" style="border: 2px solid cyan">
        <br>
        <img src="images/products.png" width="80" alt="">
        <h3>Available Products</h3>
        <br>
        <p style="color: grey;font-size: 35px">
          <?php
          $orders = mysqli_fetch_array(mysqli_query($connection, "SELECT COUNT(id) FROM product WHERE `status`='available'"));
          echo $orders[0];
          ?>
        </p>

        <br>
      </div>
      <div class="col-sm-1 text-center">

      </div>
      <div class="col-sm-3 text-center" style="border: 2px solid cyan">
        <br>
        <img src="images/toBook.png" width="80" alt="">
        <h3>Products to Book</h3>
        <br>
        <p style="color: grey;font-size: 35px">
          <?php
          $orders = mysqli_fetch_array(mysqli_query($connection, "SELECT COUNT(id) FROM product WHERE `status`='unavailable'"));
          echo $orders[0];
          ?>
        </p>

        <br>
      </div>


    </div>
  </div>
  <div class="container">
    <div class="row">
      <br><br><br><br>
      <div class="col-sm-3 text-center" style="border: 2px solid cyan">
        <br>
        <img src="images/derived.png" width="80" alt="">
        <h3>Derived Orders</h3>
        <br>
        <p style="color: grey;font-size: 35px">
          <?php
          $orders = mysqli_fetch_array(mysqli_query($connection, "SELECT COUNT(id) FROM orders WHERE `status`='derived'"));
          echo $orders[0];
          ?>
        </p>

        <br>
      </div>
      <div class="col-sm-1 text-center">

      </div>
      <div class="col-sm-3 text-center" style="border: 2px solid cyan">
        <br>
        <img src="images/customers.png" width="80" alt="">
        <h3>Customers</h3>
        <br>
        <p style="color: grey;font-size: 35px">
          <?php
          $users = mysqli_fetch_array(mysqli_query($connection, "SELECT COUNT(id) FROM users "));
          echo $users[0];
          ?>
        </p>

        <br>
      </div>
      <div class="col-sm-1 text-center">

      </div>
      <div class="col-sm-3 text-center" style="border: 2px solid cyan">
        <br>
        <img src="images/shareholders.png" width="80" alt="">
        <h3>Shareholders</h3>
        <br>
        <p style="color: grey;font-size: 35px">
          <?php
          $orders = mysqli_fetch_array(mysqli_query($connection, "SELECT COUNT(id) FROM shareholders "));
          echo $orders[0];
          ?>
        </p>

        <br>
      </div>



    </div>
  </div>
  <br><br>
  <div class="jumbotron text-center footer" style="margin-bottom:120">
    &copycopyright by Habineza Jean Pierre</p>
  </div>
</body>

</html>