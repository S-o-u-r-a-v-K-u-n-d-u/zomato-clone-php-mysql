<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "zomato");
if (!empty($_SESSION['user_id'])) {
	$is_loged_in = 1;
} else {
	$is_loged_in = 0;
}

?>
<html>

<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="style.css">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<title>zomato</title>
	<hr class="m-0">
</head>

<body>
<div class="row mt-2">
			<h1 style="margin-left:auto;margin-right:auto">Order Summary</h1>
		</div>
		<hr>
	<div class="container">
		
		
		<div class="row mt-5"><img style="margin-left:auto;margin-right:auto" src="https://lh3.googleusercontent.com/proxy/yRaRcrDQA80ZB396IxvsMzjJ7GVkdBMOSTsnwPjVs1pvfT7GqK6kRf3uf7-IsghzxorW9QnSk66QblxWTevjwyCcyq82FlvZTuTKTMHN2gbQnwO8g5fdTXJiPxkX8R4MsucWoiWnxQBGk8PWmGRFdHSkBQgp-aTONUq0cr6fh_WaWimgxRHG" alt=""></div>
		<h3 style="text-align:center" class="mt-5">Super! your order has been confirmed </h3>
		<h5 style="text-align:center" class="mt-3">Your food will reach you within 30 mins</h5>
		<div class="row mt-5" style="background-color: #ccc;">
			<h3 class="m-3 pl-5">CONTACT ZOMATO</h3>
		</div>
		<a href=""  class="row" style="text-decoration: none; color:gray" >
			<h4 class="m-3 pl-5">Chat With Zomato Support</h4>
		</a>
		<div class="row " style="background-color: #ccc;">
			<h3 class="m-3 pl-5">ORDER DETAILS</h3>
		</div>
		<?php
		$order_id=$_GET['order_id'];
		$query="SELECT * FROM `orders` o JOIN `order_address` a ON o.`user_id` = a.`user_id` WHERE  o.`order_id`='$order_id'";
		$result=mysqli_query($conn,$query);
		$row=mysqli_fetch_assoc($result);
		?>
		<h5 class="pl-5 pt-3">ORDER NUMBER</h5>
		<h5 class="pl-5 text-muted"><?php echo $order_id; ?></h5>
		<hr>
		<h5 class="pl-5 pt-3">PAYMENT</h5>
		<h5 class="pl-5 text-muted">Paid: Using <?php echo $row['payment_method']; ?></h5>
		<hr>
		<h5 class="pl-5 pt-3">DATE</h5>
		<h5 class="pl-5 text-muted"><?php echo $row['date']; ?></h5>
		<hr>
		<h5 class="pl-5 pt-3">PHONE NUMBER</h5>
		<h5 class="pl-5 text-muted"><?php echo $row['phone']; ?></h5>
		<hr>
		<a href="my_orders.php" class="btn btn-danger btn-block p-2 mb-5"><h5>Go to your Orders</h5></a>
	</div>
</body>

</html>