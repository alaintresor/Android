<?php
include 'connection.php';
$names = $_POST['name'];
$qty = $_POST['qty'];
$price = $_POST['u_price'];
$category = $_POST['category'];
$owner = $_POST['owner'];
$desc = $_POST['desc'];
//http://192.168.43.120/android/images/a1.jpg

$query = "INSERT INTO `product` VALUES('','$names','$qty','$price','$desc','http://192.168.43.120/android/images/a1.jpg','$owner')";
$done = mysqli_query($connection, "$query");
if ($done) {
    echo "<script>alert('data saved well');window.open('products.php','_self')</script>";
} else {
    //echo "<script>alert('something went worng');history.go(-1)</script>";
    echo "string".mysqli_error($connection);
}
