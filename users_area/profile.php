<?php
include('../includes/connect.php');
include('../functions/common_function.php');
session_start();
<<<<<<< HEAD
cart(); // function to update cart items

if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
    echo "<script>alert('Please login first!');</script>";
    echo "<script>window.open('../users_area/user_login.php','_self');</script>";
    exit();
}

// Fetch logged-in user details
$username_session = $_SESSION['username'];
$get_user = "SELECT * FROM user_table WHERE username='$username_session'";
$result_user = mysqli_query($con, $get_user);
$row_user = mysqli_fetch_assoc($result_user);

$user_id = $row_user['user_id'];
$username = $row_user['username'];
$user_email = $row_user['user_email'];
$user_address = $row_user['user_address'];
$user_number = $row_user['user_contact'];
=======
>>>>>>> 6e4f40550381a4dbd824b89a996bab9889e8c448
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<<<<<<< HEAD
    <title>My Profile - FurniJoy</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        body {
            background-color: #f4f4f4;
        }
        .profile-sidebar {
            background-color: #5dbea3;
            color: #fff;
            min-height: 100vh;
            padding-top: 30px;
            border-radius: 0 10px 10px 0;
        }
        .profile-sidebar h2 {
            text-align: center;
            margin-bottom: 30px;
        }
        .profile-sidebar .nav-link {
            color: #fff;
            font-weight: 500;
            margin: 5px 0;
        }
        .profile-sidebar .nav-link:hover {
            background-color: #519c8e;
            border-radius: 5px;
        }
        .profile-card {
            background-color: #fff;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }
        .profile-card h4 {
            color: #5dbea3;
        }
        .profile-card i {
            color: white;
            margin-right: 10px;
        }
        .profile-card .btn {
            margin: 5px;
        }
        .navbar-custom {
            background-color: #A07855FF;
        }
        .navbar-custom .nav-link {
            color: #fff !important;
        }
        .navbar-secondary {
            background-color: #D4B996FF;
        }
    </style>
</head>
<body>
    <div class="container-fluid p-0">
        <!-- First child -->
       <!-- 🌟 Updated Navbar (with FurniJoy logo on the left) -->
<nav class="navbar navbar-expand-lg navbar-light" style="background-color:#A07855FF; padding: 15px 20px;">
  <div class="container-fluid">

    <!-- Logo / Brand -->
    <a class="navbar-brand text-white font-weight-bold" href="../index.php" style="font-size: 1.8rem;">
      <i class="fa-solid fa-couch"></i> FurniJoy
    </a>

    <!-- Toggler -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
      data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
      aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navbar Links -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-4 me-auto mb-2 mb-lg-0">
        <li class="nav-item"><a class="nav-link text-white" href="../index.php">Home</a></li>
        <li class="nav-item"><a class="nav-link text-white" href="./users_area/profile.php">My account</a></li>
        <li class="nav-item"><a class="nav-link text-white" href="../contact.php">Contact</a></li>
        <li class="nav-item">
          <a class="nav-link text-white" href="../cart.php">
            <i class="fa-solid fa-cart-shopping"></i>
            <sup><?php cart_item(); ?></sup>
          </a>
        </li>
      </ul>

      <!-- Search -->
      <form class="ml-auto" action="../search_product.php" method="get">
        <div class="input-group">
          <input class="form-control" type="search" placeholder="Search" aria-label="Search" name="search_data">
          <div class="input-group-append">&nbsp;
            <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_product">
          </div>
        </div>
      </form>
    </div>
  </div>
</nav>

<!-- Secondary Navbar -->
<nav class="navbar navbar-expand-lg navbar-secondary" style="background-color:#D4B996FF;">
  <ul class="navbar-nav ml-auto">
    <li class="nav-item">
      <a class="nav-link text-dark" href="#">Welcome <?php echo $_SESSION['username']; ?></a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-dark" href="logout.php">Logout</a>
    </li>
  </ul>
</nav>



    <div class="row mt-4">
        <!-- Sidebar -->
        <div class="col-md-3 profile-sidebar">
            <h2>Your Profile</h2>
            <ul class="nav flex-column text-center">
                <li class="nav-item"><a class="nav-link" href="user_orders.php"><i class="fa-solid fa-box"></i> My Orders</a></li>
                <li class="nav-item"><a class="nav-link" href="logout.php"><i class="fa-solid fa-right-from-bracket"></i> Logout</a></li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="col-md-9 p-4">
            <?php
            // Include different sections based on query
            if (isset($_GET['edit_account'])) {
                include('edit_account.php');
            } elseif (isset($_GET['my_orders'])) {
                include('user_orders.php');
            } elseif (isset($_GET['delete_account'])) {
                include('delete_account.php');
            } else {
                // Default: Show profile info
                echo '
                <div class="profile-card mx-auto">
                    <h4 class="text-center mb-4"><b> Your Details </b></h4>
                    <ul class="list-group list-group-flush">
                    
                        <li class="list-group-item"><i class="fa-solid fa-envelope"></i> <b>Username:</b> ' . htmlspecialchars($username) . '</li>
                        <li class="list-group-item"><i class="fa-solid fa-envelope"></i> <b>Email:</b> ' . htmlspecialchars($user_email) . '</li>
                        <li class="list-group-item"><i class="fa-solid fa-map-marker-alt"></i> <b>Address:</b> ' . htmlspecialchars($user_address) . '</li>
                        <li class="list-group-item"><i class="fa-solid fa-phone"></i> <b>Phone:</b> ' . htmlspecialchars($user_number) . '</li>
                    </ul>
                    <div class="text-center mt-4">
                        <a href="profile.php?edit_account" class="btn btn-success"><i class="fa-solid fa-pen"></i> Edit Profile</a>
                        <a href="profile.php?delete_account" class="btn btn-danger"><i class="fa-solid fa-trash"></i> Delete Account</a>
                    </div>
                </div>';
            }
            ?>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
=======
    <title>Furniture Website</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<style>
    .profile-section {
            background-color: #5dbea3; /* Dark grey */
            color: #FFFFFF; /* White text */
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .profile-section h4 {
            margin-bottom: 20px;
            color: #FFFFFF; /* White text */
        }

        .profile-section .nav-item {
            padding: 10px 30px;
        }

        .profile-section .nav-link {
            color: white; /* White text */
        }

        .profile-section .nav-link:hover {
            color: #D4B996FF; /* Light brown on hover */
        }
</style>

<body>
    <div class="container-fluid p-0">
        <!-- Navbar -->
    <div class="container-fluid p-0">
        <!-- First child -->
        <nav class="navbar navbar-expand-lg navbar-light" style="background-color:#A07855FF; padding: 20px 0;">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="/php%20code/index.phpindex.php">Home</a>
                        </li>&nbsp;&nbsp;
                        <li class="nav-item">
                            <a class="nav-link" href="./profile.php">My account</a>
                        </li>&nbsp;&nbsp;
                        <li class="nav-item">
                            <a class="nav-link" href="./users_area/user_registration.php">Register</a>
                        </li>&nbsp;&nbsp;
                        <li class="nav-item">
                            <a class="nav-link" href="contact.php">Contact</a> 
                        </li>&nbsp;&nbsp;
                        <li class="nav-item">
                        <a class='nav-link' href='cart.php'><i class='fa-solid fa-cart-shopping'><sup>&nbsp;<?php cart_item();?> </sup></i></a>

                        </li>&nbsp;&nbsp;
                
                    </ul>
                    <form class="ml-auto" action="search_product.php" method="get">
    <div class="input-group">
        <input class="form-control" type="search" placeholder="Search" aria-label="Search" name="search_data">
        <div class="input-group-append">&nbsp;
            <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_product">
        </div>
    </div>
</form>
                </div>
            </div>
        </nav>
        <nav class="navbar navbar-expand-lg navbar-dark" style="background-color:#D4B996FF;">
            <ul class="navbar-nav me-auto">
            <?php
                  if(!isset($_SESSION['username'])){
                    echo " <li class='nav-item'>
                    <a class='nav-link' href='#'>Welcome User</a>
                </li>";
                }
                else{
                    echo "<li class='nav-item'>
                    <a class='nav-link' href='#'>Welcome ".$_SESSION['username']."</a>
                </li>";
                }
                if(!isset($_SESSION['username'])){
                    echo "<li class='nav-item'>
                    <a class='nav-link' href='./users_area/user_login.php'>Login</a>
                </li>";
                }
                else{
                    echo "<li class='nav-item'>
                    <a class='nav-link' href='./users_area/logout.php'>Logout</a>
                </li>";
                }
                ?>
            </ul>
        </nav>
        <?php
        cart();
        ?>
        <div class="bg-light" style="height:100px;">
            <h3 class="text-center font-weight-bold"
                style="font-size: 3.5rem; background-color: #cfcfc4;padding:15px; color:#6f4e37">FurniJoy</h3>
        </div>
        <br>
       
        <div class="row">
        <div class="col-md-2 p-0">
            <div class="profile-section">
                <h1 class="text-center"><b>Your Profile</b></h1>
                <ul class="navbar-nav text-center">
                <!-- <li class="nav-item">
                        <a class="nav-link" href="profile.php">Pending Orders</a>
                    </li> -->
                    
                    <li class="nav-item">
                        <a class="nav-link" href="profile.php?edit_account">Edit Account</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="/php%20code/cartt.php">My Orders</a>


                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="profile.php?delete_account">Delete Account</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-10">
       <?php
       get_user_order_details();
       if(isset($_GET['edit_account'])){
        include('edit_account.php');
       }
       if(isset($_GET['my_orders'])){
        include('user_orders.php');
       }
       if(isset($_GET['delete_account'])){
        include('delete_account.php');
       }
        ?>
                
            </div>
        </div>

        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
            crossorigin="anonymous"></script>
</body>

>>>>>>> 6e4f40550381a4dbd824b89a996bab9889e8c448
</html>
