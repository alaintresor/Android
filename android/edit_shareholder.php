<?php
include 'connection.php';
$query2 = "SELECT * FROM `shareholders`";
$data2 = mysqli_query($connection, "$query2");

//get informations for selected product
$oldId = $_GET['id'];
$query = "SELECT * FROM `shareholders` WHERE `id`='$oldId'";
$data = mysqli_query($connection, "$query");
$shareholderInfo = mysqli_fetch_array($data);

//updating product data
if (isset($_POST['done'])) {
    $name = $_POST['names'];
    $tel = $_POST['tel'];
    $newId = $_POST['id'];
    $gender = $_POST['gender'];

    $query3 = "UPDATE `shareholders` SET `full_name`='$name',`phone_number`='$tel',`Gender`='$gender',`id`='$newId' WHERE `id`='$oldId'";
    $isDone = mysqli_query($connection, "$query3");
    if ($isDone) {
        echo "<script>alert('Product updated well');window.open('shareholders.php','_self');</script>";
    } else echo "Error" . mysqli_error($connection);
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

            <div class="col-md-2 col-sm-2 col-xs-12 ">
            </div>
            <div class="col-md-8 col-sm-8 col-xs-12 ">
                <p>
                    <h4 class=" header-line text-center">Edit Shareholder Information</h4>
                </p>
                <div class="panel panel-info">
                    <div class="panel-heading">
                        ShareHolder Info
                    </div>
                    <div class="panel-body">
                        <form method="post" action="#">

                            <div class="form-group">
                                <label for="firstname">Full Name:</label>
                                <input type="text" class="form-control" value="<?php echo $shareholderInfo[1] ?>" required='' name="names" placeholder="Enter full name">
                            </div>
                            <div class="form-group">
                                <label for="firstname">Tel:</label>
                                <input type="text" class="form-control" value="<?php echo $shareholderInfo[2] ?>" required='' name="tel" placeholder="Enter Tel">
                            </div>
                            <div class="form-group">
                                <label for="firstname">ID Number:</label>
                                <input type="text" class="form-control" value="<?php echo $shareholderInfo[3] ?>" required='' maxlength="16" minlength="16" name="id" placeholder="Enter ID NUMBER">
                            </div>
                            <div class="form-group">
                                <label for="gender">Gender:</label>
                                <select class="form-control" name="gender">
                                    <option class="disabled">......</option>
                                    <option>male</option>
                                    <option>female</option>
                                </select>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 text-center">
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-primary from-control" value="Save Change" name="done">
                                    </div>
                                </div>
                                <div class="col-lg-6 text-center">
                                    <div class="form-group">
                                        <a href="shareholders.php"> <input type="button" class="btn btn-warning from-control" value="Cancel"></a>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>

</html>