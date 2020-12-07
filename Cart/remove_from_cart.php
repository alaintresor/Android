<?php
$connect=mysqli_connect('localhost','root','','agrmangement');
if(isset($_POST["itemId"]))
{
    $query="DELETE FROM `cart` WHERE `id`='{$_POST["itemId"]}';";
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
else echo "Please provide item Id";


?>