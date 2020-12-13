<?php
$connect=mysqli_connect('localhost','root','','agrmangement');

if(isset($_POST["status"])){
$query="SELECT * FROM `product` WHERE `status`='{$_POST["status"]}' ORDER BY `id` DESC LIMIT 10";
$data=mysqli_query($connect,"$query");
if($data)
{
$results=array();
while($row=mysqli_fetch_array($data)){
    $temp=array();
    $temp['id']=$row[0];
    $temp['name']=$row[1];
    $temp['qty']=$row[2];
    $temp['price']=$row[3];
    $temp['description']=$row[4];
    $temp['image']=$row[5];
    $temp['category']=$row[7];
    array_push($results,$temp);
}
echo json_encode($results);
}
else echo "Error: Database connection";
}else echo "Please provide status";

?>