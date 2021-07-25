<html>


<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="style.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>zomato</title>
    <style>
        .search_bar {
            height: 55px;
            width: 62%;
            display: inline-block;
            border-radius: 5px 5px 5px 5px;
            background-color: white;
            box-shadow: 2px 2px 7px #ccc;

        }

        .location {
            border: none;
            width: 100%;
            border-right: 2px solid #ccc;

        }

        .location :focus,
        textarea:focus,
        select:focus {
            outline: none;
        }

        .user-input {
            border: none;
            width: 100%;


        }

        .user-input:focus,
        textarea:focus,
        select:focus {
            outline: none;
        }

        .delivary:visited {
            color: black;

        }

        .star {
            font-size: x-large;
            width: 25px;
            display: inline-block;
            color: gray;
        }

        .star:last-child {
            margin-right: 0;
        }

        .star:before {
            content: '\2605';
        }

        .star.on {
            color: gold;
        }

        .star.half:after {
            content: '\2605';
            color: gold;
            margin-left: -20px;
            width: 10px;
            position: absolute;
            overflow: hidden;
        }
    </style>
</head>

<body>
    <div class="container-fluid p-2" style="max-width:1000px;">
        <img class="pl-4 mb-3" src="https://b.zmtcdn.com/web_assets/b40b97e677bc7b2ca77c58c61db266fe1603954218.png" alt="" width="13%" height="28px">
        <div class=" container search_bar  ml-3">
            <div class="row">
                <div class=" ml-3 mt-3 mb-3"><i style="font-size: 23px; color:#FF7575;" class="fas fa-map-marker-alt"></i></div>
                <div class=" dropdown col-4 pl-1">
                    <select name="" id="" class="location mr-3 mt-3 mb-3" style="height: 25px; background:none;">location
                        <option value="">Kolkata</option>
                    </select>

                </div>
                <div class=" mr-3 mt-3 mb-3"><i style="font-size: 23px;color:#ccc;" class="fas fa-search"></i></div>

                <div class="col-6 p-0 pt-3">
                    <input type="text" placeholder="Search for resturent,cuisine or dish" class="user-input  p-0">
                </div>
            </div>
        </div>
        <div style="float:right;">
            <?php
            if ($is_loged_in == 1) {
                if (empty($_SESSION['img'])) {
                    echo '
                <div class="dropdown mt-1" style="float:right; ">
                <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"">
                <img src="https://b.zmtcdn.com/images/user_avatars/pizza_2x.png" height="30px" width="30px" alt="" style="background-color:#FFE6B7;border-radius:50%;" > ' . $_SESSION['name'] . '
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="profile.php">Profile</a>
                   <a class="dropdown-item" href="my_orders.php">My orders</a>
                  <a class="dropdown-item" href="logout.php">Log out</a>
                </div>
              </div>';
                } else {
                    echo '
               <div class="dropdown mt-1" style="float:right; ">
               <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"">
               <img src="' . $_SESSION['img'] . '" height="30px" width="30px" alt="" style="border-radius:50%;" ><p style="display:inline"> ' . $_SESSION['name'] . '</p>
               </button>
               <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
               <a class="dropdown-item" href="profile.php">Profile</a>
                <a class="dropdown-item" href="my_orders.php">My orders</a>
               <a class="dropdown-item" href="logout.php">Log out</a>
             </div>
             </div>';
                }
            } else {
                echo '<ul style="display: inline-block; float:right" class="m-0 p-0">
        <a href="" data-target="#login" data-toggle="modal" style="color:black">
            <li style="float:left ;list-style-type:none; font-size:18px" class="mt-3 pl-4 pr-3 mt-3">Log in</li>
        </a>
        <a href="" data-target="#signup" data-toggle="modal" style="color:black">
            <li style="float:right ;list-style-type:none; font-size:18px" class="mt-3  ">Sign up</li>
        </a>
    </ul>';
            }

            ?>
        </div>
    </div>
    <div class="modal fade" id="signup">
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Sign Up</h3>
                <button type="button" class="close" data-dismiss="modal">&times</button>

            </div>
            <div class="modal-body">
                <div class="form-group">
                    <form action="signup_validation.php" method="POST">
                        <label for="">Name</label>
                        <input type="text" class="form-control" placeholder="Name" name="name" required>
                        <label for="" class="mt-3">Email</label>
                        <input type="text" class="form-control" placeholder="Email id " required name="email">
                        <label class="mt-3" for="">Password</label>
                        <input type="password" class="form-control" placeholder="Password" required name="password">
                        <input type="submit" class="btn btn-block btn-danger mt-3" value="Sign Up">


                    </form>

                </div>
            </div>
            <div class="modal-footer">

            </div>
            <div>
                <p class="ml-5 mt-3">Already have an account?<a href="" data-dismiss="modal" data-target="#login" data-toggle="modal"> Log in</a> </p>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="login">
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Log In</h3>
                <button type="button" class="close" data-dismiss="modal">&times</button>

            </div>
            <div class="modal-body">
                <div class="form-group">
                    <form action="login_validation.php" method="POST">
                        <label for="">Email</label>
                        <input type="email" class="form-control" placeholder="Email id " name="email" required>
                        <label class="mt-3" for="">Password</label>
                        <input type="password" class="form-control" placeholder="Password" name="password" required>
                        <input type="submit" class="btn btn-block btn-danger mt-3" value="Log in">

                    </form>
                </div>
            </div>
            <div class="modal-footer">

            </div>
            <div>
                <p class="ml-5 mt-3">New to Zomato? <a href="" data-dismiss="modal" data-target="#signup" data-toggle="modal">Create account</a> </p>
            </div>
        </div>
    </div>

</div>