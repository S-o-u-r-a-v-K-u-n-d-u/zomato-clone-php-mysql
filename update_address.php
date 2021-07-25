<?php
session_start();
$conn=mysqli_connect("localhost","root","","zomato"); 
$order_id = $_POST['order_id'];
$address=$_POST["x"];
$user_id = $_SESSION['user_id'];
$query = "UPDATE `orders` SET `address`='$address' WHERE `order_id`='$order_id'";
if(mysqli_query($conn,$query)){
    header('location:payment_mode.php?order_id='.$order_id.'');
	}else{
		header('location:show_address.php');
	}
?>	
