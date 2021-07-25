<?php
session_start();
$conn=mysqli_connect("localhost","root","","zomato");
$user_id=$_SESSION['user_id'];
$name=$_POST['name'];
$email=$_POST['email'];
$mobile=$_POST['mobile'];
$address=$_POST['address'];

$query="UPDATE `users` SET `user_id`='$user_id',`name`='$name',`email`='$email',`mobile` ='$mobile',`address`='$address' WHERE `user_id`='$user_id'";

$result=mysqli_query($conn,$query);

if($result){
  header('location:profile.php?error=8');
}
else{
   header('location:profile.php?error=9');
}
