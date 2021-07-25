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
<div class="container">
    <div class="row" style="max-width: 78%; margin-left:80px;">
        <div class="col-3 p-2" style="border-bottom: 2px solid #FF7575;">
            <img src="https://b.zmtcdn.com/data/o2_assets/c0bb85d3a6347b2ec070a8db694588261616149578.png?output-format=webp" height="60px" width="60px" alt="" style="background-color:#FFE6B7;border-radius:50%;" class="p-2">
            <a href="">
                <h5 class="delivary" style="display: inline-block; color:#FF7575;">Delevary</h5>
            </a>

        </div>
        <div class="col-3 p-2">
            <img src="https://b.zmtcdn.com/data/o2_assets/78d25215ff4c1299578ed36eefd5f39d1616149985.png" height="60px" width="60px" alt="" style="background-color:#F7F7F7;border-radius:50%;" class="p-2">
            <a href="">
                <h5 class="dining_out" style="display: inline-block; color:#ccc;">Dining Out</h5>
            </a>
        </div>
        <div class="col-3 p-2">
            <img src="https://b.zmtcdn.com/data/o2_assets/01040767e4943c398e38e3592bb1ba8a1616150142.png" height="60px" width="60px" alt="" style="background-color:#F7F7F7;border-radius:50%;" class="p-2">
            <a href="">
                <h5 class="nightlife" style="display: inline-block; color:#ccc;">Nightlife</h5>
            </a>
        </div>
        <div class="col-3 p-2 mb-2">
            <img src="https://b.zmtcdn.com/data/o2_assets/54cad8274d3c3ec7129e0808a13b27c31616582882.png" height="60px" width="60px" alt="" style="background-color:#F7F7F7;border-radius:50%;" class="p-2">
            <a href="">
                <h5 class="nutration" style="display: inline-block; color:#ccc;">Nutrition</h5>
            </a>

        </div>

    </div>

</div>
<hr class="m-0">
<div class="container-fluid pt-3 pb-3">
    <div class="container-lg">
        <h3 class="pb-3"><?php echo $_GET['x']; ?> in Kolkata</h3>
        <div class="row">
            <?php
            $food=$_GET['x'];
            $query1 = "SELECT * FROM `products` WHERE `catagory` LIKE '%$food%'";
            $result1 = mysqli_query($conn, $query1);
            while ($row1 = mysqli_fetch_assoc($result1)) {

                echo ' <div class="col-4 card p-0 p-2" style="background: none; border:none;">
                <a href="restaurant.php?rn='.$row1['restaurant_name'].'" style="text-decoration: none;color:black;" >  <div class=" card-img "><img src="' . $row1['image'] . '" width="100%" height="250px" alt="" style="border-radius: 8px;"></div>
                    <div class="card-title pt-2 pl-1">
                        <h5 class="m-0">' . $row1['name'] . '</h5>
                    </div>
                    <div class="card-text" style="font-size: 20px;">';

                if ($row1['rating'] >= 4.8 && $row1['rating'] <= 5) {
                    echo '
                        <span class="fa fa-star star on"></span>
                        <span class="fa fa-star star on"></span>
                        <span class="fa fa-star star on"></span>
                        <span class="fa fa-star star on"></span>
                        <span class="fa fa-star star on "></span> ';
                } else if ($row1['rating'] >= 4.4 && $row1['rating'] <= 4.7) {
                    echo '
                    <span class="fa fa-star star on"></span>
                    <span class="fa fa-star star on"></span>
                    <span class="fa fa-star star on"></span>
                    <span class="fa fa-star star on"></span>
                    <span class="fa fa-star star half"></span> ';
                }

                else if ($row1['rating'] >= 3.8 && $row1['rating'] >= 4 && $row1['rating'] <= 4.3) {
                    echo '
                        <span class="fa fa-star star on"></span>
                        <span class="fa fa-star star on"></span>
                        <span class="fa fa-star star on"></span>
                        <span class="fa fa-star star on"></span>
                        <span class="fa fa-star star"></span> ';
                } else if ($row1['rating'] >= 3.4 && $row1['rating'] <= 3.7) {
                    echo '
                    <span class="fa fa-star star on"></span>
                    <span class="fa fa-star star on"></span>
                    <span class="fa fa-star star on"></span>
                    <span class="fa fa-star star half"></span>
                    <span class="fa fa-star star"></span> ';
                }

                else if ( $row1['rating'] >= 2.8 && $row1['rating'] >= 3 && $row1['rating'] <= 3.3) {
                    echo '
                        <span class="fa fa-star star on"></span>
                        <span class="fa fa-star star on"></span>
                        <span class="fa fa-star star on"></span>
                        <span class="fa fa-star star"></span>
                        <span class="fa fa-star star"></span> ';
                }
                else if ($row1['rating'] >= 2.4 && $row1['rating'] <= 2.7) {
                    echo '
                    <span class="fa fa-star star on"></span>
                    <span class="fa fa-star star on"></span>
                    <span class="fa fa-star star" half></span>
                    <span class="fa fa-star star"></span>
                    <span class="fa fa-star star"></span> ';
                }

                else if ($row1['rating'] >= 1.8 && $row1['rating'] >= 2 && $row1['rating'] <= 2.3) {
                    echo '
                        <span class="fa fa-star star on"></span>
                        <span class="fa fa-star star on"></span>
                        <span class="fa fa-star star"></span>
                        <span class="fa fa-star star"></span>
                        <span class="fa fa-star star"></span> ';
                }
                else if ($row1['rating'] >= 1.4 && $row1['rating'] <= 1.7) {
                    echo '
                    <span class="fa fa-star star on"></span>
                    <span class="fa fa-star star on"></span>
                    <span class="fa fa-star star on"></span>
                    <span class="fa fa-star star on"></span>
                    <span class="fa fa-star star half"></span> ';
                }

                else if ($row1['rating'] >= 1 && $row1['rating'] <= 1.3) {
                    echo '
                        <span class="fa fa-star star on"></span>
                        <span class="fa fa-star star"></span>
                        <span class="fa fa-star star"></span>
                        <span class="fa fa-star star"></span>
                        <span class="fa fa-star star"></span> ';
                }



                echo '' . $row1['rating'] . '</div>
                    <div class="card-text" style="font-size: 20px;">' . $row1['catagory'] . '</div>
                    <div class="card-text" style="font-size: 20px;">₹' . $row1['price'] . '</div></a>
                </div>';
            }

            ?>

        </div>



    </div>

</div>