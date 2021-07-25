<?php
session_start();
date_default_timezone_set('Asia/Kolkata');
$order_date = date("Y/m/d h/i");
$order_id = uniqid();
//echo $order_id;
$user_id = $_SESSION['user_id'];
$conn = mysqli_connect("localhost", "root", "", "zomato");
$query1 = "SELECT * FROM `cart` c JOIN `products` p ON c.`product_id` = p.`product_id` WHERE  c.`user_id` =$user_id";
$result1 = mysqli_query($conn, $query1);
$amount=0;
while ($row = mysqli_fetch_assoc($result1)) {
    $amount = $amount + $row['price']* $row['quantity'];
    echo $amount;
} 

$query = "INSERT INTO `orders` VALUES ('$order_id',$user_id,'$order_date','pending','0',$amount ,'address')";
$row= mysqli_query($conn,$query);
if ($row) {
    $query2= "SELECT * FROM `cart` c JOIN `products` p ON c.`product_id` = p.`product_id` WHERE  c.`user_id` =$user_id";
$result2 = mysqli_query($conn, $query2);
while ($row2= mysqli_fetch_assoc($result2)) {
 $product_id=$row2['product_id'];
 $quantity=$row2['quantity'];
 $query3="INSERT INTO `order_details` VALUES (NULL,'$order_id',$product_id,$quantity)";
 mysqli_query($conn, $query3);
 header('location:show_address.php?order_id='.$order_id.'');
}
    
} else {
    echo "failed";
    
}  
?>