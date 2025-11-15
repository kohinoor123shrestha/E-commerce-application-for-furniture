<?php
include('includes/connect.php');
include('functions/common_function.php');
session_start();
<<<<<<< HEAD

=======
>>>>>>> 6e4f40550381a4dbd824b89a996bab9889e8c448
$search_performed = false;
$category_filter = '';
if (isset($_GET['category'])) {
    $category_filter = $_GET['category'];
}
if (isset($_GET['search_data'])) {
    $search_performed = true;
}
?>
<<<<<<< HEAD

=======
>>>>>>> 6e4f40550381a4dbd824b89a996bab9889e8c448
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Furniture Website</title>
<<<<<<< HEAD
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
=======
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
>>>>>>> 6e4f40550381a4dbd824b89a996bab9889e8c448
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
        .card-img-top {
<<<<<<< HEAD
            width: 100%;
=======
            width:100%;
>>>>>>> 6e4f40550381a4dbd824b89a996bab9889e8c448
            height: 190px;
            object-fit: contain;
        }
        .card {
<<<<<<< HEAD
            margin-bottom: 20px;
        }
        .btn-add {
            background-color: #5dbea3;
            color: white;
            border: none;
        }
        .btn-add:hover {
            background-color: #4aa58d;
        }
=======
            margin-bottom: 20px; 
        }
        
>>>>>>> 6e4f40550381a4dbd824b89a996bab9889e8c448
    </style>
</head>

<body>
<<<<<<< HEAD
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
      <a class="nav-link text-dark" href="#" text-align="center">
  <?php
  if (isset($_SESSION['username'])) {
      echo "Welcome <b>" . htmlspecialchars($_SESSION['username']) . "</b>!";
  } else {
      echo "Welcome Guest!";
  }
  ?>
</a>

    </li> &nbsp;
    <li class="nav-item">
      <a class="nav-link text-white" href="logout.php">Logout</a>
    </li>
  </ul>
</nav>
<br>
=======
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
                            <a class="nav-link" href="index.php">Home</a>
                        </li>&nbsp;&nbsp;
                        <?php 
                        if (isset($_SESSION ['username'])){
                            echo"<li class='nav-item'>
                            <a class='nav-link' href='./users_area/profile.php'>My account</a> </li>";

                        }
                        else{
                            echo"<li class='nav-item'>
                            <a class='nav-link' href='./users_area/user_registration.php'>Register</a> </li>";

                        }
                        ?>

                        <li class="nav-item">
                            <a class="nav-link" href="./users_area/user_registration.php">Register</a>
                        </li>&nbsp;&nbsp;
                        <li class="nav-item">
                            <a class="nav-link" href="contact.php">Contact</a> 
                        </li>&nbsp;&nbsp;
                        <li class="nav-item">
                            <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"><sup>&nbsp;<?php cart_item();?> </sup></i></a>
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
                style="font-size: 3.5rem; background-color:#C7D3D4FF;padding:15px; color:#6f4e37">FurniJoy</h3>
        </div>
        <br>

>>>>>>> 6e4f40550381a4dbd824b89a996bab9889e8c448
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10">
                    <?php
<<<<<<< HEAD
                    $query = "SELECT * FROM `products`";
                    if ($search_performed) {
                        $filtervalues = $_GET['search_data'];
                        $query .= " WHERE product_title LIKE '%$filtervalues%'";
                    } elseif ($category_filter) {
                        $query .= " WHERE category_id = $category_filter";
                    }
                    $query .= " ORDER BY RAND() LIMIT 0,12";
                    $query_run = mysqli_query($con, $query);

                    if (mysqli_num_rows($query_run) > 0) {
                        echo '<div class="row">';
                        while ($item = mysqli_fetch_assoc($query_run)) {
                            $product_image1 = $item['product_image1'];
                            $product_title = $item['product_title'];
                            $product_description = $item['product_description'];
                            $product_id = $item['product_id'];
                            $product_price = $item['product_price'];

                            echo "
                            <div class='col-md-4 mb-2'>
                                <div class='card'>
                                    <br>
                                    <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                                    <div class='card-body'>
                                        <h4 class='card-title'><b>$product_title</b></h4>
                                        <p class='card-text'>$product_description</p>
                                        <h5 class='card-text'>Rs.$product_price/-</h5>
                                        <form method='get' action='index.php'>
                                            <input type='hidden' name='add_to_cart' value='$product_id'>
                                        <div class ='another-section'>
                                            <button type='submit' class='btn btn-add'>Add to Cart</button>
                                        </form> 
                                        <a href='single_product.php?product_id=$product_id' class='btn btn-secondary text-dark border-0' style='background-color:#C7D3D4FF'>View more</a>
                                    </div>
                                    </div>
                                </div>
                            </div>";
                        }
                        echo '</div>';
                    } else {
                        echo '<div class="alert alert-warning" role="alert">No products found!</div>';
                    }
                    ?>
                </div>

                <!-- Sidebar -->
                <div class="col-md-2 container-fluid" style="background-color:#D4B996FF;position: sticky; top: 20px; height: fit-content;">
                    <ul class="navbar-nav me-auto text-center">
                        <li class="nav-item">
                            <a href="#" class="nav-link text-light" style="background-color:#A07855FF;">
                                <h5>Categories</h5>
                            </a>
                        </li>
                        <?php getcategories(); ?>
=======
                    $con = mysqli_connect("localhost", "root", "", "furnijoy");
                    if ($con) {
                        $query = "SELECT * FROM `products` ";
                        // Check if search is performed or a category filter is applied
                        if ($search_performed) {
                            $filtervalues = $_GET['search_data'];
                            $query .= " WHERE product_title LIKE '%$filtervalues%'";
                        } elseif ($category_filter) {
                            $query .= " WHERE category_id = $category_filter";
                        }
                        $query .= " ORDER BY RAND() LIMIT 0,9 ";
                        $query_run = mysqli_query($con, $query);

                        if (mysqli_num_rows($query_run) > 0) {
                            echo '<div class="row">';
                            while ($item = mysqli_fetch_assoc($query_run)) {
                                $product_image1 = $item['product_image1'];
                                $product_title = $item['product_title'];
                                $product_description = $item['product_description'];
                                $product_id = $item['product_id'];
                                $product_price=$item['product_price'];

                                echo "<div class='col-md-4 mb-2'>
                                        <div class='card'>
                                           <br> <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                                            <div class='card-body'>
                                                <h4 class='card-title'><b>$product_title</b></h4>
                                                <p class='card-text'>$product_description</p>
                                                <h5 class='card-text'>Rs.$product_price/-</h5>
                                                <a href='index.php?add_to_cart=$product_id' class='btn'style='background-color:#5dbea3'>Add to cart</a>
                                                <a href='single_product.php?product_id=$product_id' class='btn btn-secondary text-dark border-0' style='background-color:#C7D3D4FF' >View more</a>
                                            </div>
                                        </div>
                                    </div>";
                            }
                            echo '</div>';
                        } else {
                            echo '<div class="alert alert-warning" role="alert">No products found!</div>';
                        }
                    } else {
                        echo "Failed to connect to MySQL: " . mysqli_connect_error();
                    }
                    if (isset($_GET['product_id'])) {
                        $product_id = $_GET['product_id'];
                    
                        // Fetch product details from the database based on product_id
                        $con = mysqli_connect("localhost", "root", "", "furnijoy");
                        if ($con) {
                            $query = "SELECT * FROM `products` WHERE product_id = $product_id";
                            $query_run = mysqli_query($con, $query);
                    
                            if (mysqli_num_rows($query_run) > 0) {
                                $item = mysqli_fetch_assoc($query_run);
                                $product_image1 = $item['product_image1'];
                                $product_title = $item['product_title'];
                                $product_description = $item['product_description'];
                                // Add more fields as needed
                                ?>
                                <section class="single-product my-1 pt-9">
                                    <div class="row">
                                        <div class="col-lg-5 col-md-6 col-sm-12">
                                            <img class="img-fluid w-100 pb-1" src="" id="mainImg" alt="">
                                            <div class="small-img-group">
                                                <div class="small-img-col">
                                                    <img src="" width="100%" class="small-img" onclick="changeImage(this)" alt="">
                                                </div>
                                                <div class="small-img-col">
                                                    <img src="/images/" width="100%" class="small-img" onclick="changeImage(this)" alt="">
                                                </div>
                                            </div>
                                        </div>
                    
                                        <div class="col-lg-6 col-md-12 col-sm-12">
                                            <h2 class="py-4"><?php echo $product_title; ?></h2>
                                            <h5>Rs.98000/</h5>
                                            <h5>Rs. <?php echo $product_price; ?>/</h5>
                                            <!-- Add to cart button and other actions can be added here -->
                                            <h4 class="mt-5 mb-5">Product Details</h4>
                                            <span><?php echo $product_description; ?></span>
                                        </div>
                                    </div>
                                </section>
                                <script>
                                    function changeImage(img) {
                                        var mainImg = document.getElementById("mainImg");
                                        var tempSrc = mainImg.src;
                                        mainImg.src = img.src;
                                        img.src = tempSrc;
                                
                                    }
                                </script>
                                <?php
                             $ip = getIPAddress();  
                             echo 'User Real IP Address - '.$ip;  
                            }
                        }
                    }
                    ?>
                </div>
                <!-- Sidenav -->
                <div class="col-md-2 container-fluid " style="background-color:#D4B996FF;">
                    <ul class="navbar-nav me-auto text-center">
                        <li class="nav-item" >
                            <a href="#" class="nav-link text-light" style="background-color:#A07855FF;">
                                <h5>Categories</h5>
                            </a>
                        </li>  

                        <?php
                        getcategories() ;

                        ?>
>>>>>>> 6e4f40550381a4dbd824b89a996bab9889e8c448
                    </ul>
                </div>
            </div>
        </div>
<<<<<<< HEAD
    </div>

<?php
// ✅ Improved Add-to-cart logic — stays on same page
if (isset($_GET['add_to_cart'])) {
    $product_id = $_GET['add_to_cart'];
    $get_ip_add = getIPAddress();

    $check_query = "SELECT * FROM cart_details WHERE product_id='$product_id' AND ip_address='$get_ip_add'";
    $check_result = mysqli_query($con, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        // Increase quantity if exists
        $update_query = "UPDATE cart_details SET quantity = quantity + 1 WHERE product_id='$product_id' AND ip_address='$get_ip_add'";
        mysqli_query($con, $update_query);
        echo "<script>alert('Quantity updated in your cart!');</script>";
        echo "<script>window.location='index.php';</script>";
    } else {
        // Insert new
        $insert_query = "INSERT INTO cart_details (product_id, ip_address, quantity) VALUES ('$product_id', '$get_ip_add', 1)";
        mysqli_query($con, $insert_query);
        echo "<script>alert('Item added to your cart!');</script>";
        echo "<script>window.location='index.php';</script>";
    }
}
?>
</body>
=======
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
            crossorigin="anonymous"></script>
</body>

>>>>>>> 6e4f40550381a4dbd824b89a996bab9889e8c448
</html>
