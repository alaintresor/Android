<?php
include 'connection.php';
$names = $_POST['names'];
$tel = $_POST['tel'];
$id = $_POST['id'];
$gender = $_POST['gender'];


$query = "INSERT INTO `shareholders` VALUES('$id','$names','$tel','$gender')";
$done = mysqli_query($connection, "$query");
if ($done) {
    echo "<script>alert('data saved well');window.open('shareholders.php','_self')</script>";
} else {
    //echo "<script>alert('something went worng');history.go(-1)</script>";
    echo "string".mysqli_error($connection);
}
