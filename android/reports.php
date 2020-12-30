<?php
include "connection.php";
$query = "SELECT DISTINCT `month` FROM `orders` ORDER BY `orders`.`id` DESC LIMIT 1";
$data = mysqli_query($connection, "$query");
$month = mysqli_fetch_array($data);

$query2 = "SELECT DISTINCT shareholders.id FROM shareholders,product WHERE shareholders.id=product.shareholder_id  ORDER BY product.id DESC LIMIT 1";

$data2 = mysqli_query($connection, "$query2");
$shareholder = mysqli_fetch_array($data2);

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
                    <li><a href="shareholders.php">ShareHolders</a></li>
                    <li class="active"><a href="#">Reports</a></li>
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
        <br><br>
        <div class="row">
            <div class="col-lg-12">
                <p><b> View Report of:</b><select id="selector" onchange="selectReport(selector.value)">
                        <option>Orders</option>
                        <option>ShareHolder</option>
                    </select></p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="col-md-3 col-sm-3 col-xs-12 ">
                    <p>
                        <h4 class=" header-line">Options</h4>
                    </p>
                    <div class="panel panel-info" id="content">

                    </div>
                </div>
                <div class=" col-md-9 col-sm-9 col-xs-12 ">
                    <h4 class="header-line">Reports</h4>
                    <div class="panel panel-info" id="data">

                    </div>

                </div>
            </div>

        </div>




        <div class="jumbotron text-center" style="margin-bottom:0">
            &copycopyright by Habineza Jean Pierre</p>
        </div>
        <script type="text/javascript">
            // select report
            const selectReport = (item) => {

                $.ajax({
                    url: "selectReport.php",
                    method: "POST",
                    data: {
                        item
                    },
                    success: function(data) {

                        $("#content").html(data);
                        console.log(data);
                    }
                })
                if (item == "Orders") {
                    getData("<?php echo $month[0] ?>");
                } else {
                    getData("<?php echo $shareholder[0] ?>")
                }
            }
            //get ownername for spicific owner
            const getData = (month) => {
                let item = month;
                let reportOf = $("#selector").val();
                $.ajax({
                    url: "getData.php",
                    method: "POST",
                    data: {
                        item,
                        reportOf
                    },
                    success: function(data) {

                        $("#data").html(data);
                        console.log(data);
                    }
                })

            }

            window.onload(selectReport("Orders"), getData("<?php echo $month[0] ?>"));
        </script>
</body>

</html>