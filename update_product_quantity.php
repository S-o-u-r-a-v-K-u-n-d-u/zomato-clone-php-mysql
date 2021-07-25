<?php
session_start();
$conn=mysqli_connect("localhost","root","","zomato");
$product_id = $_GET['product_id'];
$user_id=$_SESSION['user_id'];
$quantity=$_GET['quantity'];
$sign=$_GET['sign']; 

if($sign =='-'){
    $quantity = $quantity - 1;
}else{
    $quantity = $quantity + 1;
}

//insert in database
$query="UPDATE `cart` SET `quantity` = $quantity WHERE `user_id`=$user_id AND `product_id` = $product_id";
if (mysqli_query($conn,$query)){
    echo 1;
}

else{
    echo 0;
}
?>