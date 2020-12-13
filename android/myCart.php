<?php
$connect=mysqli_connect('localhost','root','','agrmangement');
if(isset($_POST["userId"]))
{
$query="SELECT * FROM `cart` WHERE `cust_id`='1'";

$data=mysqli_query($connect,"$query");

if(mysqli_num_rows($data))
{
    $result=array();
    while($row=mysqli_fetch_array($data))
    {
     $tem=array();
     $tem['id']=$row[0];
     $tem['proId']=$row[2];
     $tem['proImage']=$row[3];
     $tem['proName']=$row[4];
     $tem['proPrice']=$row[5];
     $tem['proQty']=$row[6];
     $tem['inStock']=$row[7];
     array_push($result,$tem);
    }
    echo json_encode($result);
}else echo "Your Cart is empty";
}
else echo "user id is required!";


?>