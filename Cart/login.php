<?php
$connect=mysqli_connect('localhost','root','','agrmangement');
// $db = new DataBase();
// if (isset($_POST['username']) && isset($_POST['password'])) {
//     if ($db->dbConnect()) {
//         if ($db->logIn("users", $_POST['username'], $_POST['password'])) {

//             echo "Login Success";
//         } else echo "Username or Password wrong";
//     } else echo "Error: Database connection";
// } else echo "All fields are required";



$query="SELECT `id` FROM `users` WHERE `username`='{$_POST['username']}' AND `password`='{$_POST['password']}'";
$data=mysqli_query($connect,"$query");
if(mysqli_num_rows($data)){
    $row=mysqli_fetch_array($data);
    $userId=$row[0];
        echo $userId;
}
else
{
    echo "Username or Password wrong";
}
?>