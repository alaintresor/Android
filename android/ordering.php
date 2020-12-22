<?php
$connect=mysqli_connect('localhost','root','','agrmangement');
$qty=$_POST["proQty"];
if(isset($_POST["proId"]))
{
    $query1="SELECT * FROM `product` WHERE `id`='{$_POST["proId"]}'";
    $product=mysqli_query($connect,"$query1");
     while ($row=mysqli_fetch_array($product)) {
        $tee=$row['p_qty'];
         if ($_POST["proQty"]>$tee) {
        echo "quantity you entered is not available";
     }else{
        $totalPrice=$_POST["proQty"]*$_POST["proPrice"];
     $query="INSERT INTO `orders` (`id`, `cust_id`, `p_id`, `p_qty`, `p_Uprice`, `total_price`) VALUES (NULL, '{$_POST["userId"]}', '{$_POST["proId"]}', '{$_POST["proQty"]}', '{$_POST["proPrice"]}', '$totalPrice');";
    $done=mysqli_query($connect,"$query");
    if($done)
    {
        $query2="UPDATE `product` SET `p_qty`=p_qty-'{$_POST["proQty"]}' WHERE `id`='{$_POST["proId"]}'";
        $update=mysqli_query($connect,"$query2");
        if($update){
          echo "Product Ordered well!!";   
      }else{
        echo "error while updating";
      }
       
    }
    else
    {
        echo "Error";
    }
     }
     }
    
  

}
else echo "Please provide item Id";


?>