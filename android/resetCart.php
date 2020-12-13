<?php
$connect=mysqli_connect('localhost','root','','agrmangement');
if(isset($_POST["userId"]))
{
    $query="DELETE FROM `cart` WHERE `cust_id`='{$_POST["userId"]}';";
    $done=mysqli_query($connect,"$query");
    if($done)
    {
        echo "Product moved";
    }
    else
    {
        echo "Error";
    }

}
else echo "Please provide user Id";


?>