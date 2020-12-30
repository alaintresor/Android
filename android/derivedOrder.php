<?php
include "connection.php";
$id = $_GET['id'];
$query = "UPDATE `orders` SET `status`='derived' WHERE `id`='$id'";
$done = mysqli_query($connection, "$query");
if ($done) {
    echo "<script>alert('Order maked as Derived');window.open('orders.php','_self');</script>";
} else echo 'Error:' . mysqli_error($connection);
