<?php
$connect=mysqli_connect('localhost','root','','agrmangement');

$sql="SELECT `fullname`,`email`,`username` FROM `users`";

$data=mysqli_query($connect,"$sql");

$users=array();
while($row=mysqli_fetch_array($data)){
    $temp=array();
    $temp['fullname']=$row[0];
    $temp['email']=$row[1];
    $temp['username']=$row[2];
    array_push($users,$temp);
}

echo json_encode($users);

// echo "ok";

