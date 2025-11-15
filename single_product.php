<?php
include('includes/connect.php');
include('functions/common_function.php');
session_start();
cart();

// GET product id
if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];

    $query = "SELECT * FROM products WHERE product_id = $product_id";
    $run = mysqli_query($con, $query);
    $item = mysqli_fetch_assoc($run);

    $product_title = $item['product_title'];
    $product_description = $item['product_description'];
    $product_price = $item['product_price'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $product_title; ?> - FurniJoy</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        .small-img-group{display:flex;justify-content:center;}
        .small-img-col{flex-basis:33.33%;cursor:pointer;overflow:hidden;}
        .single-product input[type=number]{width:70px;height:40px;padding-left:10px;font-size:16px;margin-right:10px;}
        .btn-cart{background-color:#5dbea3;color:white;border:none;}
        .btn-cart:hover{background-color:#4aa889;color:white;}
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

<!-- product section -->
<section class="container single-product my-5 pt-3">
    <div class="row">
        <div class="col-lg-5 col-md-6 col-sm-12">
            <?php
            $q_img = "SELECT product_image1, product_image2, product_image3 FROM products WHERE product_id=$product_id";
            $ri = mysqli_query($con,$q_img);
            $imgs = mysqli_fetch_assoc($ri);

            echo "<img class='img-fluid w-100 pb-1' src='./admin_area/product_images/{$imgs['product_image1']}' id='mainImg'><br><br>";
            echo "<div class='small-img-group'>
                    <div class='small-img-col'><img src='./admin_area/product_images/{$imgs['product_image2']}' width='100%' class='small-img' onclick='changeImage(this)'></div>&nbsp;&nbsp;
                    <div class='small-img-col'><img src='./admin_area/product_images/{$imgs['product_image3']}' width='100%' class='small-img' onclick='changeImage(this)'></div>
                  </div>";
            ?>
        </div>

        <div class="col-lg-6 col-md-12 col-sm-12">
            <h2 class="py-3"><?php echo $product_title; ?></h2>
            <h5>Rs.<?php echo $product_price; ?>/-</h5>

            <form method="post" action="">
                <input type="number" name="product_qty" value="1" min="1">
                <button type="submit" name="add_to_cart" class="btn btn-cart">Add to Cart</button>
            </form>

            <h4 class="mt-5 mb-3">Product Details</h4>
            <span><?php echo $product_description; ?></span>
        </div>
    </div>
</section>

<script>
function changeImage(img){
    document.getElementById("mainImg").src = img.src;
}
</script>

</body>
</html>

<?php
// ADD TO CART FIX
if(isset($_POST['add_to_cart'])){
    $ip = getIPAddress();
    $qty = $_POST['product_qty'];

    $check = mysqli_query($con,"SELECT * FROM cart_details WHERE product_id='$product_id' AND ip_address='$ip'");
    
    if(mysqli_num_rows($check)>0){
        mysqli_query($con,"UPDATE cart_details SET quantity = quantity + $qty WHERE product_id='$product_id' AND ip_address='$ip'");
    }else{
        mysqli_query($con,"INSERT INTO cart_details (product_id, ip_address, quantity) VALUES ('$product_id','$ip','$qty')");
    }

    echo "<script>alert('Item added to cart successfully!');</script>";
    echo "<script>window.location='single_product.php?product_id=$product_id';</script>";
}
?>
