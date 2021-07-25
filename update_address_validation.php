<?php
session_start();
$conn=mysqli_connect("localhost","root","","zomato"); 
$street_address=$_POST['street_address'];
$landmark=$_POST['landmark'];
$city=$_POST['city'];
$state=$_POST['state'];
$pin=$_POST['pin'];
$contact=$_POST['contact'];
$user_id = $_SESSION['user_id'];
$order_id = $_POST['order_id'];
// update the payment mode in orders table
// confirm the order --> order status --> success(1)
$query = "INSERT INTO `order_address`(`address_id`, `user_id`, `street_address`, `landmark`, `city`, `state`, `pin`, `phone`) VALUES (NULL,'$user_id ','$street_address','$landmark','$city','$state','$pin','$contact')";
if(mysqli_query($conn,$query)){
    header('location:show_address.php?order_id='.$order_id.'');
	}else{
		header('location:show_address.php');
	}
