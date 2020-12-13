<?php
include 'connection.php';

if(isset($_POST['name'])){

$names = $_POST['name'];
$qty = $_POST['qty'];
$price = $_POST['u_price'];
$category = $_POST['category'];
$status=$_POST['status'];
$owner = $_POST['owner'];
$desc = $_POST['desc'];
 
    $name = $_FILES['file']['name'];
    $fullpath="http://192.168.43.208/android/images/".$name;
    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
  
    // Select file type
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  
    // Valid file extensions
    $extensions_arr = array("jpg","jpeg","png","gif");
  
    // Check extension
    if( in_array($imageFileType,$extensions_arr) ){
   
       // Insert record
       
       $query = "INSERT INTO `product` (`id`, `p_name`, `p_qty`, `p_Uprice`, `description`, `image`, `shareholder_id`, `category`, `status`) VALUES (NULL, '$names', '$qty', '$price', '$desc','$fullpath','$owner', '$category', '$status');";
       $done = mysqli_query($connection, "$query");
       if ($done) {
           // Upload file
          move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);
          echo "<script>alert('data saved well');window.open('products.php','_self')</script>";
       } else {
    //echo "<script>alert('something went worng');history.go(-1)</script>";
         echo "string".mysqli_error($connection);
       }
    
       
  
    }
   
  }

  
//http://192.168.43.120/android/images/a1.jpg

