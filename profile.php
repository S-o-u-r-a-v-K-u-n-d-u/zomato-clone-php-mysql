<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "zomato");
if (!empty($_SESSION)) {
  $is_loged_in = 1;
} else {
  $is_loged_in = 0;
}
?>
<?php
$user_id = $_SESSION['user_id'];

$query = "SELECT * FROM `users` WHERE `user_id`=$user_id";
$result = mysqli_query($conn, $query);
$result_array = mysqli_fetch_assoc($result);
$_SESSION['name'] = $result_array['name'];
$email = $result_array['email'];
$mobile = $result_array['mobile'];
$address = $result_array['address'];
$profile_img = $result_array['profile_img'];
$_SESSION['img'] = $profile_img;

$bg_img = $result_array['background_img'];
?>
<?php include('include/header.php'); ?>
<hr class="m-0 p-0">
<style>
  .bg {
    background-image: url(<?php
                          if ($bg_img == NULL) {
                            echo 'https://b.zmtcdn.com/data/cover_images/9cd5458e248169a07f47b6d4e4982fa01548143928.jpeg';
                          } else {
                            echo $bg_img;
                          }
                          ?>);
    background-size: 100% 220px;
    width: 100%;
    height: 220px;
    background-repeat: no-repeat;
  }

  .profile_img {
    width: 90%;
    height: 150px;
    background-position: center;
    border-radius: 50%;
    border: 5px solid white;
    background-repeat: no-repeat;
    float: left;
  }

  .username {
    float: left;
    color: white;
  }

  .edit {
    float: right;

  }

  .popup {
    background-image: url(<?php
                          if ($bg_img == NULL) {
                            echo 'https://b.zmtcdn.com/data/cover_images/9cd5458e248169a07f47b6d4e4982fa01548143928.jpeg';
                          } else {
                            echo $bg_img;
                          }
                          ?>);
    height: 300px;
    background-repeat: no-repeat;
    background-size: 100% 300px;
  }

  .bg_img_input {
    margin-left: 45%;
    margin-top: -120;
    border-radius: 50%;
    background: rgb(85, 85, 85);
    background: radial-gradient(circle, rgba(85, 85, 85, 0.5441526952577906) 0%, rgba(0, 0, 0, 0.4881302862942052) 100%);
  }

  .p_img_input {
    border-radius: 50%;
    margin-top: -115px;
    margin-left: 9%;
    background: rgb(85, 85, 85);
    background: radial-gradient(circle, rgba(85, 85, 85, 0.5441526952577906) 0%, rgba(0, 0, 0, 0.4881302862942052) 100%);


  }

  .effects:hover{
    background: rgb(255, 255, 255);
    background: linear-gradient(90deg, rgba(255, 255, 255, 0.5441526952577906) 0%, rgba(255, 0, 40, 0.24163168685442926) 100%);
    border-left: 2px solid #D2122E;
  }
  .effects:visited{
    background: rgb(255, 255, 255);
    background: linear-gradient(90deg, rgba(255, 255, 255, 0.5441526952577906) 0%, rgba(255, 0, 40, 0.24163168685442926) 100%);
    border-left: 2px solid #D2122E;
  }
  
</style>
<div class="container">
  <div class="row bg m-0 p-2 ">
    <div class="col-2 pt-4 pb-4 pr-0">
      <?php
      if ($profile_img == NULL) {
        echo ' <img class="profile_img" src="https://b.zmtcdn.com/images/user_avatars/pizza_2x.png" >';
      } else {
        echo '<img class="profile_img " src="' . $profile_img . '">';
      }
      ?>
    </div>
    <div class="col-3 pl-0">
      <?php
      echo '<h5 class="username mt-4 pt-5">' . $_SESSION['name'] . '</h5>';
      ?>
    </div>
    <div class="col-7">
      <button data-target="#edit" data-toggle="modal" class=" edit btn btn-danger mt-5"><i class="far fa-edit" style="font-size: 10px;"></i> Edit profile</button>
    </div>
    <div class="modal fade" id="edit">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h3>Edit profile</h3>
            <button type="button" class="close" data-dismiss="modal">&times</button>

          </div>
          <div class=" modal-body p-0">
            <div class="popup container-fluid p-5 ">
              <?php
              if ($profile_img == NULL) {
                echo ' <img style="border-radius:50%;border:3px solid white;"src="https://b.zmtcdn.com/images/user_avatars/pizza_2x.png" width="25%"height="90%" >';
              } else {
                echo '<img style="border-radius:50%;border:3px solid white;" src="' . $profile_img . '" width="25%"height="90%">';
              }
              ?>
              <div class="dropdown">
                <button class="p_img_input btn text-light p-2" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-camera m-2"></i>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <label for="p_img" class="dropdown-item">Change Profile image</label>
                  <a class="dropdown-item" href="p_img_delete.php">Delete</a>
                </div>
              </div>
              <div class="dropdown">
                <button class="bg_img_input btn text-light p-2" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-camera m-2"></i>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <label for="b_img" class="dropdown-item">Change Background image</label>
                  <a class="dropdown-item" href="bg_delete.php">Delete</a>
                </div>
              </div>
              <form action="img_update.php" method="POST" enctype="multipart/form-data">
                <input type="file" id="p_img" style="display:none" name="profile_img" onchange='this.form.submit()' accept="image/*">
              </form>
              <form action="bg_img_update.php" method="POST" enctype="multipart/form-data">
                <input type="file" id="b_img" style="display:none" name="bg_img" onchange='this.form.submit()' accept="image/*">
              </form>
            </div>
            <div class=" p-3">
              <form action="edit.php" method="POST" enctype="multipart/form-data">
                <label for="">Full name</label>
                <input type="text" value="<?php echo '' . $_SESSION['name'] . ''; ?>" placeholder="Full name" class="form-control" name="name">
                <label for="" class="mt-3">Email id</label>
                <input type="email" class="form-control" value="<?php echo '' . $email . ''; ?>" placeholder="Email id" name="email">
                <label for="" class="mt-3">Phone number</label>
                <input type="tel" class="form-control" value="<?php echo '' . $mobile . ''; ?>" placeholder="Phone Number" name="mobile">
                <label for="" class="mt-3">Address</label>
                <input type="text" class="form-control" value="<?php echo '' . $address . ''; ?>" placeholder="Type your address here" name="address">
                <label for="" class="mt-3">Description</label>
                <textarea name="" id="" cols="100%" rows="1" class="form-control" placeholder="Description"></textarea>
                <p class="mt-4">Tell us something about yourself (150 characters remaining)</p>
                <input class=" edit btn  btn-danger m-4 pl-5 pr-5 f-right" type="submit" value=" Update">

              </form>
              <button class="edit btn  btn-outline-danger m-4  pl-5 pr-5" data-dismiss="modal">Cancel </button>
            </div>
            <div>

              <?php
              if (!empty($_GET)) {
                if ($_GET['error'] == 9) {
                  echo '<p style="color:red">Failed</p>';
                } elseif ($_GET['error'] == 8) {
                  echo '<p style="color:green">Update succesfull</p>';
                }
              }

              ?>
            </div>

          </div>

        </div>
      </div>
    </div>
  </div>
  
</div>


</html>