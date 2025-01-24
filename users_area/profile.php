<?php
include('../includes/connect.php');
include('../functions/common_function.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

</html>
