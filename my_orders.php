<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "zomato");
if (!empty($_SESSION['user_id'])) {
    $is_loged_in = 1;
} else {
    $is_loged_in = 0;
}
$user_id=$_SESSION['user_id'];
?>
<?php include('include/header.php'); ?>
<hr class="m-0">
<div class="container">
    <h3 class=" mt-5">My Orders</h3>
    <?Php 
    $query="SELECT * FROM `orders` WHERE `user_id`=$user_id";
    $result=mysqli_query($conn,$query);
   while($row=mysqli_fetch_assoc($result)){
      $address_id= $row['address'];
      $order_id=$row['order_id'];
      $query2="SELECT * FROM `order_details` o JOIN `products` a ON o.`product_id` = a.`product_id` WHERE  o.`order_id`='$order_id'";
      $result2=mysqli_query($conn,$query2);
      while($row2=mysqli_fetch_assoc($result2)){

      echo'<div class="row p-3 mt-3" style="width:100%;box-shadow: 1px 1px 5px gray; margin-left:auto;margin-right:auto;">
      <div class="col-2"><img src="'.$row2['image'].'" height="100%" width="100%" alt=""></div>
      <div class="col-8">
          <h3>'.$row2['restaurant_name'].'</h3>
          <p class="m-0"><b>Order Number:</b> '.$row['order_id'].'</p>
          <p class="m-0"><b>Item:</b>'.$row2['quantity'].'x'.$row2['name'].'</p>
          <p class="m-0"><b>Total Amount:</b> ₹'.$row['amount'].'</p>
          <p class="m-0"><b>Order On:</b> '.$row['date'].'</p>
      </div>
      <div class="col-2">
          <button class="btn btn-outline-danger" style="margin-top:80%" data-toggle="modal" data-target="#exampleModal'.$row['order_id'].'">Order Details</button>

          <div class="modal fade" id="exampleModal'.$row['order_id'].'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Order Details</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body">
                          <h4>'.$row2['restaurant_name'].'</h4>
                          <hr>
                          <p><b>Order Number:</b> '.$row['order_id'].' </p>
                          <p><b>Total Amount:</b> ₹'.$row['amount'].'</p>
                          <p><b>Items:</b> '.$row2['quantity'].'x'.$row2['name'].'</p>
                          <p><b>Payment:</b> '.$row['payment_method'].' </p>
                          <p><b>Order On:</b> '.$row['date'].'</p>';
                          $address_id=$row['address'];
                        $query3="SELECT * FROM `order_address` WHERE `address_id`= $address_id";
                        $result3=mysqli_query($conn,$query3);
                         while($row3=mysqli_fetch_assoc($result3)){
                          echo '<p><b>Phone No:</b> '.$row3['phone'].'</p> 
                          <p><b>Address:</b> '.$row3['street_address'].','.$row3['landmark'].','.$row3['city'].','.$row3['state'].'</p>
                          <p><b>Delevary status</b>: Pending</p>';}
                          echo'
                        
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>';
      }
   }

?>
</div>