<?php
$connect=mysqli_connect('localhost','root','','agrmangement');
$query="SELECT * FROM `product`";
$data=mysqli_query($connect,"$query");

$results=array();
while($row=mysqli_fetch_array($data)){
    $temp=array();
    $temp['id']=$row[0];
    $temp['name']=$row[1];
    $temp['qty']=$row[2];
    $temp['price']=$row[3];
    $temp['description']=$row[4];
    $temp['image']=$row[5];
    array_push($results,$temp);
}
echo json_encode($results);

?>