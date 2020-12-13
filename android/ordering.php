<?php
$connect=mysqli_connect('localhost','root','','agrmangement');
if(isset($_POST["proId"]))
{
    $totalPrice=$_POST["proQty"]*$_POST["proPrice"];
    $query="INSERT INTO `orders` (`id`, `cust_id`, `p_id`, `p_qty`, `p_Uprice`, `total_price`) VALUES (NULL, '{$_POST["userId"]}', '{$_POST["proId"]}', '{$_POST["proQty"]}', '{$_POST["proPrice"]}', '$totalPrice');";
    $done=mysqli_query($connect,"$query");
    if($done)
    {
        echo "Product Ordered well";
    }
    else
    {
        echo "Error";
    }

}
else echo "Please provide item Id";


?>