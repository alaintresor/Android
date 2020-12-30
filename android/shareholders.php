<?php
include 'connection.php';
$query = "SELECT * FROM `shareholders`";
$data = mysqli_query($connection, "$query");
$query2 = "SELECT * FROM `categories`";
$sql = "SELECT * FROM `authors`";

$data2 = mysqli_query($connection, "$query2");
$data3 = mysqli_query($connection, "$sql");
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
          <li><a href="home.php">Home</a></li>
          <li><a href="orders.php">Orders</a></li>
          <li><a href="products.php">Products</a></li>
          <li class="active"><a href="#">ShareHolders</a></li>
          <li><a href="reports.php">Reports</a></li>
          <li><a href="admin_change_password.php">modify password</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li class=""><a href="logout.php">Logout</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <br> <br> <br> <br>
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12"">
        <div class=" col-md-8 col-sm-8 col-xs-12 "">
        <h4 class="header-line">Manage Shareholders</h4>
        <div class="panel panel-info">
          <div class="panel-heading">
            List of Shareholders
          </div>
          <div class="panel-body">

            <table class="table table-striped table-hover">
              <tbody>
                <thead>
                  <tr>
                    <th>Full name</th>
                    <th>Tel</th>
                    <th>Id</th>
                    <th>Gender</th>
                  </tr>
                </thead>
                <?php while ($row = mysqli_fetch_array($data)) { ?>
                  <tr>
                    <td><?php echo $row[1]; ?></td>
                    <td><?php echo $row[2]; ?></td>
                    <td><?php echo $row[0]; ?></td>
                    <td><?php echo $row[3]; ?></td>
                    <td></td>
                    <td align='right'><a href='edit_shareholder.php?id=<?php echo $row[0]; ?>'> Edit</a></td>
                    <td align='right'> <a href='deleteShareholder.php?id=<?php echo $row[0]; ?>'> Delete</a></td>
                  </tr>
                <?php  }  ?>
              </tbody>
            </table>
            <img src="">
          </div>
        </div>

      </div>

      <div class="col-md-4 col-sm-4 col-xs-12 "">
<p><h4 class=" header-line"> Add new ShareHolder</h4>
        </p>
        <div class="panel panel-info">
          <div class="panel-heading">
            ShareHolder Info
          </div>
          <div class="panel-body">
            <form method="post" action="add_shareholder.php">

              <div class="form-group">
                <label for="firstname">Full Name:</label>
                <input type="text" class="form-control" required='' name="names" placeholder="Enter full name">
              </div>
              <div class="form-group">
                <label for="firstname">Tel:</label>
                <input type="text" class="form-control" required='' name="tel" placeholder="Enter Tel">
              </div>
              <div class="form-group">
                <label for="firstname">ID Number:</label>
                <input type="text" class="form-control" required='' maxlength="16" name="id" placeholder="Enter ID NUMBER">
              </div>
              <div class="form-group">
                <label for="gender">Gender:</label>
                <select class="form-control" name="gender">
                  <option class="disabled">......</option>
                  <option>male</option>
                  <option>female</option>
                </select>
              </div>

              <div class="form-group">
                <input type="submit" class="btn btn-primary from-control" value="Add" name="done">
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>

  </div>




  <div class="jumbotron text-center" style="margin-bottom:0">
    &copycopyright by Habineza Jean Pierre</p>
  </div>

</body>

</html>