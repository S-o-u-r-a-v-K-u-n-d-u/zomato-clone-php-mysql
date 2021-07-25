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
<hr class="m-0 p-0">
<div class="container mt-4">
    <div class="row" style="height:340px;">
        <?php $restaurant = $_GET['rn'];
        $query = "SELECT * FROM `admin` WHERE `name` LIKE '$restaurant' ";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
        echo '
            <img src="' . $row['background_img'] . '" alt="" height="100%" width="100%">'; ?>
    </div>
    <div class="row navbar-static-top">
        <div class="col-8">
            <?php
            $restaurant = $_GET['rn'];

            $query3 = "SELECT * FROM `products` WHERE `restaurant_name`LIKE '$restaurant' ";
            $result3 = mysqli_query($conn, $query3);
            $row3 = mysqli_fetch_assoc($result3);
            $img = $row3['image'];
            echo '<h2 class="mt-2">' . $restaurant . '</h2>
            <p style="font-size: 18px;" class="m-0">' . $row3['catagory'] . '</p>
            <p style="font-size: 18px;" class="m-0">' . $row3['location'] . '</p>'; ?>
        </div>

    </div>

    <div class="row mt-3" style="border-top: 2px solid #ccc;">
        <div class="col-2 mt-2 p-0" style="border-right: 2px solid #ccc;">
            <h3 class="p-2 pl-4 m-0" style="font-size: 20px;color:black">Menu</h3>
            <hr>
            <?php
            $query = "SELECT * FROM `admin` WHERE `name` LIKE '$restaurant' ";
            $result = mysqli_query($conn, $query);
            $i = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $menu = $row['menu'];
                $menu_itm = explode(',', $menu);
                $menu_length = count($menu_itm);
                for ($i = 0; $i <= $menu_length - 1; $i++) {
                    echo ' <a href="" style="text-decoration: none;">
                                <div>
                                 <p class="p-2 pl-4 m-0" style="font-size: 18px;color:black">' . $menu_itm[$i] . '</p>
                                 </div>';
                }
            } ?>

            </a>
        </div>
        <div class="col-10 mt-2 ">
            <h3 style="display: inline;">Order online</h3>
           
            <div class="container-fluid">
                <?php
                for ($i = 0; $i <= $menu_length - 1; $i++) {
                    $x = $menu_itm[$i];
                    echo  '<hr><h4>' . $x . '</h4> ';


                    $query1 = "SELECT * FROM `products` WHERE `name`LIKE '%$x%' AND `restaurant_name`='$restaurant'";
                    $result1 = mysqli_query($conn, $query1);

                    while ($row1 = mysqli_fetch_assoc($result1)) {
                        echo '
                 <div class="row m-3">
                <div class="col-3" style="height: 150px; ">
                    <img src="' . $row1['image'] . '" width="100%" height="100%" alt="" style="border-radius:7px;">
                </div>
                <div class="col-7">
                   <h4 class="m-0">' . $row1['name'] . '</h4>
                   <p class="m-0 pt-2 pb-2">₹' . $row1['price'] . '</p>
                   <small class="m-0 ">' . $row1['details'] . '</small>
                </div>
                <div class="col-2">
                <a href="add_to_cart.php?product_id='.$row1['product_id'].' " class="btn btn-outline-danger"> Add </a>
                </div>
            </div>';
                    }
                }


                ?>

            </div>

        </div>
    </div>
</div>