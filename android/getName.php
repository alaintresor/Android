<?php

include "connection.php";

$id = $_POST['item'];
$quert = "SELECT `full_name` FROM `shareholders` WHERE `id`='$id'";
$data = mysqli_query($connection, "$quert");
$row = mysqli_fetch_array($data);

echo "<option>$row[0]</option>";
