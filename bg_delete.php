<?php
$conn=mysqli_connect("localhost","root","","zomato");
session_start();
$user_id=$_SESSION['user_id'];
$query="UPDATE `users` SET `background_img`=NULL WHERE `user_id`=$user_id";
$result=mysqli_query($conn,$query);
if($result){
  
    header('location:profile.php');
  }
  else{
     header('location:profile.php');
  }
?>