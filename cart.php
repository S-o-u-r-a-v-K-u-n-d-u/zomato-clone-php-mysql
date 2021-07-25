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
    <h1 class="mt-5">Cart</h1>
    <div class="row">
        <div class="col-8">
            <?php
           $conn = mysqli_connect("localhost", "root", "", "zomato");
            $user_id = $_SESSION['user_id'];
            $query = "SELECT * FROM cart c JOIN products p ON c.product_id = p.product_id WHERE  c.user_id =$user_id";
            $result = mysqli_query($conn, $query);
            $counter = 0;
            $amount = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $amount = $amount + $row['price'] * $row['quantity'];
                echo ' <div class="card" id="product_card' . $row['product_id'] . '">
            <div class="row">
            <div class="col-2">
            <img src="' . $row['image'] . ' " alt="" width="100%" height="100px">
            </div>
            <div class="col-6">
             <h5>' . $row['name'] . '</h5>
             <p>Rs <span id="price' . $row['product_id'] . '">' . $row['price'] . '</span></p>
              </div>
              <div class="col-4 mt-4">
              <button class="btn btn-danger btn-sm plus_one" data-id="' . $row['product_id'] . '"><b>-</b></button>
              <span class="ml-1 mr-1" id="quantity' . $row['product_id'] . '"><b>' . $row['quantity'] . '</b></span>
              <button class="btn btn-danger btn-sm plus_one" data-id="' . $row['product_id'] . '"><b>+</b></button>
              </div>

            </div>
            </div>';
                $counter++;
            }
            if ($counter == 0) {
                echo '<h4> You have no items in your cart</h4>';
            } else {
                echo ' <hr>
              <h5 style="display: inline;">Total Amount: Rs  <span id="total">' . $amount . '</span></h5>
              <a href="place_order.php" class="btn btn-lg btn-danger" style="float: right;">Checkout</a>';
            }

            ?>


        </div>
    </div>
</div>


<script type="text/javascript">
    $('.plus_one').click(function() {
                //find the if + or -
                var sign = $(this).text();


                //1. update the quantity in the database for the perticuler product 
                //fetch the perticuler product id
                var product_id = $(this).attr('data-id');
                var quantity = $('#quantity' + product_id).text();
                var price = Number($('#price' + product_id).text());
                var total = Number($('#total').text());
                $.ajax({
                    url: 'update_product_quantity.php?product_id=' + product_id + '&quantity=' + quantity + '&sign='+ sign,
                    method: 'GET',
                    success: function(data) {
                        if (sign === '+') {
                            $('#quantity' + product_id).text(Number(quantity) +1);
                            $('#total').text(total + price);
                        }
                         else if(sign === '-'){
                            $('#quantity' + product_id).text(Number(quantity) - 1);
                            $('#total').text(total - price);
                            //if total quantity =0 
                            if ((Number(quantity) - 1) === 0){
                                // remove the product from the database
                                $.ajax({
                                        url: 'remove_product_from_db.php?product_id=' + product_id,
                                        method: 'GET',
                                        success:function(data){
                                             // remove the product from the ui
                                            $('#product_card' + product_id).remove();
                                        },

                                       error:function(error){
                                        console.log(error);
                                    }
                                })
                                }
                            }


                            },
                            error: function(error) {
                                console.log(error);
                            }
                        })
                    //2. increse the counter value 
                    //3. update the total value  


                })
</script>
</body>

</html>