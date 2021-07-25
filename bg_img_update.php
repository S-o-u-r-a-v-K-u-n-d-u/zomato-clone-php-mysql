<?php
session_start();
$conn=mysqli_connect("localhost","root","","zomato");
$user_id=$_SESSION['user_id'];
$bg_img=$_FILES['bg_img'];

$file_name1=$bg_img['name'];
$file_error1=$bg_img['error'];
$file_tmp1=$bg_img['tmp_name'];

$file_ext1=explode('.',$file_name1);
$file_check1=strtolower(end($file_ext1));//convert into lower case

$fileextsrtored1= array('png','jpg','jpeg');

if(in_array($file_check1,$fileextsrtored1)){

   $destinationfile1='users_profile_img/'.$file_name1;
   move_uploaded_file($file_tmp1,$destinationfile1);
}
else{
   echo"File should be in form jpg or jpeg or png format ";
}
$query="UPDATE `users` SET `background_img`='$destinationfile1' WHERE `user_id`=$user_id";

$result=mysqli_query($conn,$query);

if($result){
  
    header('location:profile.php');
  }
  else{
     header('location:profile.php');
  }

?>

