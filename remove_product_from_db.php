<?php
session_start();
$conn=mysqli_connect("localhost","root","","zomato");
$product_id = $_GET['product_id'];
$user_id=$_SESSION['user_id'];
//insert in database
$query="DELETE FROM `cart` WHERE `product_id`=$product_id AND `user_id`= $user_id";
if (mysqli_query($conn,$query)){
    echo 1;
}

else{
    echo 0;
}
echo $product_id;
?>