<?php
session_start();
if(!isset($_SESSION['loggedin'])|| ($_SESSION['loggedin']) !== true){
   
}
include 'connection.php';
$query = "SELECT * FROM `admin`";
$data = mysqli_query($connection, "$query");
while ($row = mysqli_fetch_array($data)) {
    $username = $row[1];
     $password = $row[2];
}
if (isset($_POST['save'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "UPDATE `admin` SET `email`='$username',`password`='$password'";
    $done = mysqli_query($connection, "$sql");
    if ($done) {
        echo "<script>alert('data updated well');window.open('admin_change_password.php','_self')</script>";
    } else {
        echo "noo";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Farmers</title>
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

    </style>
</head>

<body>

    <br> <br> <br> <br>
    <div class="container">
        <div class="row">

            <div class="col-md-4 col-sm-4 col-xs-12 ">
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12 ">
                <p>
                    <h4 class=" header-line">Edit information</h4>
                </p>
                <div class="panel panel-info">
                    <div class="panel-heading">
                        Admin Info
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post" action="#">
                            <div class="form-group">
                                <label>Username</label>
                                <?php
                                echo "
                                <input class='form-control' value='$username' type='text' name='username' autocomplete='off' required />
                                 </div>
                                 ";
                                ?>
                                 <label>Password</label>
                                <?php
                                echo "
                                <input class='form-control' value='$password' type='text' name='password' autocomplete='off' required />
                                 </div>
                                 ";
                                ?>
                            <button type="submit" name="save" class="btn btn-info" >Update </button>

                                <a href="home.php"> <button type="button" style="margin-left:5.3cm;" name="create" class="btn btn-warning">back home </button></a>
                                
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>






</body>

</html>