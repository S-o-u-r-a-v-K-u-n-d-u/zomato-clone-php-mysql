<?php
/*
1.connect tob the database
2.resive user inpu from registration_form.php
3.run sql query and add tha user to our database
*/
//step1:
$conn=mysqli_connect("localhost","root","","zomato");
//step2:
$name=$_POST['name'];
$email=$_POST['email'];
$password=$_POST['password'];
//step3:
$query="INSERT INTO `users`(`user_id`, `name`, `email`, `password`) VALUES(NULL,'$name','$email','$password')";
//check if the user already registered
$query1="SELECT*FROM users WHERE email LIKE '$email'";
$result=mysqli_query($conn,$query1);
$num_rows=mysqli_num_rows($result);
if($num_rows==0){//run sql
    if(mysqli_query($conn,$query)){
        header('location:index.php?error=1');
    }else {
        header('location:index.php?error=0');}}//to print error in registration page
else {
            header('location:index.php?error=2');//to print error in registration page
        }
?>