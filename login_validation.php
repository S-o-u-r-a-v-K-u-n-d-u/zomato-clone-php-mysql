<?php
session_start();
//1.connect to database
$conn=mysqli_connect("localhost","root","","zomato");
//2.fetch input from html
$email=$_POST['email'];
$password=$_POST['password'];
//3.run query
$query="SELECT * FROM `users` WHERE `email` LIKE '$email' AND `password` LIKE '$password'";
$result=mysqli_query($conn,$query);
$result_arr=mysqli_fetch_assoc($result);
$num_rows=mysqli_num_rows($result);
//to check the email and password
if($num_rows==1){
    $_SESSION['user_id']=$result_arr['user_id'];
    $_SESSION['name']=$result_arr['name'];
    $_SESSION['img']=$result_arr['profile_img'];
header('location:index.php');//to print this in index page
}
else {
header('location:index.php?error=0');//to print this to index page
}
?>