<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "zomato");
if (!empty($_SESSION['user_id'])) {
	$is_loged_in = 1;
} else {
	$is_loged_in = 0;
}

?>
<?php include('include/header.php'); ?>
<hr class="m-0">
<div class="container">
	<div class="row mt-5">
		<div class="card"style="box-shadow: 1px 1px 5px gray;width:600px; margin-left:auto;margin-right:auto;">
			<div class="card-header">
				<h3>Delevary Address</h3>
			</div>
			<div class="card-body">
				<form action="update_address.php" method="POST">
					<?php
					$user_id = $_SESSION['user_id'];
					$query = "SELECT * FROM `order_address` WHERE `user_id` = $user_id";
					$result = mysqli_query($conn, $query);
					$counter=0;
					while ($row = mysqli_fetch_assoc($result)) {
						echo '<div class="mb"><input type="radio" required name="x" class="mr-3" value="' . $row['address_id'] . '">
								' . $row['street_address'] . ' 
								' . $row['landmark'] . '<br>
								' . $row['city'] . ', ' . $row['state'] . ' 
								' . $row['pin'] . '<br>
								' . $row['phone'] . '</div><hr>';
								$counter++;
					}

					?>
					<input type="hidden"  required name="order_id" value="<?php echo $_GET['order_id'] ?>">
				<?php if($counter==0){
					echo '<p class="text-danger"> Add your address first...</p>';
				} 
				else{
					echo'<input type="submit" class="btn btn-danger  text-white" value="Confirm and Proceed">';
				}?>
					
				</form>
			</div>
			<div class="card-footer">
				<a data-toggle="modal" data-target="#exampleModal" class="btn btn-block"><h5>Add New Address</h5></a>
			</div>
		</div>
	</div>
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Add Address</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="update_address_validation.php" method="POST">
						<label>Street Address</label><br>
						<textarea name="street_address" required class="form-control"></textarea><br>
						<label>Landmark</label><br>
						<textarea name="landmark" required class="form-control"></textarea><br>
						<label>City</label><Br>
						<input class="form-control" required type="text" name="city"><br>
						<label>State</label><br>
						<input class="form-control" required type="text" name="state"><br>
						<label>Pincode</label><br>
						<input class="form-control" required type="text" name="pin"><br>
						<label>Contact Number</label><br>
						<input class="form-control" required type="text" name="contact"><br><br>
						<input type="submit" value="Add Address" class="btn-danger btn-lg text-white" name="">
						<input type="hidden" name="order_id" value="<?php echo $_GET['order_id'] ?>">
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
</body>

</html>