<?php
session_start();
$conn=mysqli_connect("localhost","root","","zomato");
if(!empty($_GET['product_id'])){
$product_id = $_GET['product_id'];
$user_id = $_SESSION['user_id'];
//insert in database
$query="INSERT INTO `cart` VALUES (NULL,$user_id,$product_id,1)";
if (mysqli_query($conn,$query)){
  header('location:cart.php');
}
else{
  header('location:index.php');
}}
else{
   header('location:index.php');
}?>