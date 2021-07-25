<?php
session_start();
$conn=mysqli_connect("localhost","root","","zomato");
$user_id=$_SESSION['user_id'];
$profile_img=$_FILES['profile_img'];

$file_name=$profile_img['name'];
$file_error=$profile_img['error'];
$file_tmp=$profile_img['tmp_name'];


//to check the file extaintion
$file_ext=explode('.',$file_name);
$file_check=strtolower(end($file_ext));//convert into lower case

$fileextsrtored= array('png','jpg','jpeg');

if(in_array($file_check,$fileextsrtored)){

   $destinationfile='users_profile_img/'.$file_name;
   move_uploaded_file($file_tmp,$destinationfile);
}
else{
   echo"File should be in form jpg or jpeg or png format ";
}


$query="UPDATE `users` SET `profile_img`=' $destinationfile'  WHERE `user_id`=$user_id";

$result=mysqli_query($conn,$query);

if($result){
  
    header('location:profile.php');
  }
  else{
     header('location:profile.php');
  }

?>