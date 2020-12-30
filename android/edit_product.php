<?php
include 'connection.php';
$query2 = "SELECT * FROM `shareholders`";
$data2 = mysqli_query($connection, "$query2");

//get informations for selected product
$id = $_GET['id'];
$query = "SELECT * FROM `product` WHERE `id`='$id'";
$data = mysqli_query($connection, "$query");
$productInfo = mysqli_fetch_array($data);

//updating product data
if (isset($_POST['done'])) {
    $name = $_POST['name'];
    $qty = $_POST['qty'];
    $uPrice = $_POST['u_price'];
    $desc = $_POST['desc'];
    $status = $_POST['status'];
    $category = $_POST['category'];
    $owner = $_POST['owner'];

    $query3 = "UPDATE `product` SET `p_name`='$name',`p_qty`='$qty',`p_Uprice`='$uPrice',`description`='$desc',`shareholder_id`='$owner',`category`='$category',`status`='$status' WHERE `id`='$id'";
    $isDone = mysqli_query($connection, "$query3");
    if ($isDone) {
        echo "<script>alert('Product updated well');window.open('products.php','_self');</script>";
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
                    <h4 class=" header-line text-center">Edit Product Information</h4>
                </p>
                <div class="panel panel-info">
                    <div class="panel-heading">
                        Product Info
                    </div>
                    <div class="panel-body">
                        <form method="post" action="#" enctype='multipart/form-data'>

                            <div class="form-group">
                                <label for="firstname">Product name:</label>
                                <input type="text" class="form-control" value="<?php echo $productInfo[1] ?>" required='' name="name" placeholder="Enter product name">
                            </div>
                            <div class="form-group">
                                <label for="firstname">Product Quantity:</label>
                                <input type="text" class="form-control" value="<?php echo $productInfo[2] ?>" required='' name="qty" placeholder="Enter product qty">
                            </div>
                            <div class="form-group">
                                <label for="firstname">Product Unit price:</label>
                                <input type="text" class="form-control" value="<?php echo $productInfo[3] ?>" required='' name="u_price" placeholder="Enter product U/P">
                            </div>
                            <div class="form-group">
                                <label for="firstname">Product Description:</label>
                                <textarea name="desc" class="form-control" placeholder="Enter Description"><?php echo $productInfo[4] ?></textarea>

                            </div>
                            <!-- <div class="form-group">
                                <label for="firstname">Product Image:</label>
                                <input type="file" class="form-control" required='' name="file">
                            </div> -->
                            <div class="form-group">
                                <label for="gender">Status:</label>
                                <select class="form-control" name="status">
                                    <option class="disabled">......</option>
                                    <option value="available">Available</option>
                                    <option value="unavailable">Unavailable</option>

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="gender">Category:</label>
                                <select class="form-control" name="category">
                                    <option class="disabled">......</option>
                                    <option value="IMBOGA">IMBOGA</option>
                                    <option value="IMBUTO">IMBUTO</option>
                                    <option value="IBIRIBWA">IBIRIBWA</option>
                                    <option value="AMATUNGO">AMATUNGO</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="gender">Owner Id:</label>
                                <select class="form-control" name="owner" id="ownerId" onchange="getOwner();">
                                    <option class="disabled">......</option>
                                    <?php
                                    while ($row = mysqli_fetch_array($data2)) {
                                        echo "<option>$row[0]</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="gender">Owner Name:</label>
                                <select class="form-control" id="name">
                                    <option class="disabled">......</option>

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
                                        <a href="products.php"> <input type="button" class="btn btn-warning from-control" value="Cancel"></a>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script type="text/javascript">
        //get ownername for spicific owner
        const getOwner = () => {
            let item = $("#ownerId").val();

            $.ajax({
                url: "getName.php",
                method: "POST",
                data: {
                    item
                },
                success: function(data) {

                    $("#name").html(data);
                    console.log(data);
                }
            })

        }
    </script>
</body>

</html>