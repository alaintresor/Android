<?php
$connect=mysqli_connect('localhost','root','','agrmangement');

if(isset($_POST['userId']))
{

    $query="INSERT INTO `cart` (`id`, `cust_id`, `pro_id`, `pro_image`, `pro_name`, `pro_price`, `pro_qt`) VALUES (NULL, '{$_POST["userId"]}', '{$_POST["proId"]}', '{$_POST["proImage"]}', '{$_POST["proName"]}', '{$_POST["proPrice"]}', '{$_POST["proQty"]}');";
    $data=mysqli_query($connect,"$query");
    if($data)
    {
        echo "Your Product add into you Cart";
    }
    else
    {
        echo "error";
    }

}
else
{
echo "all data are neccesary";
}


?>