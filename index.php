<?php
include('includes/connect.php');
include('functions/common_function.php');
session_start();

$search_performed = false;
$category_filter = '';
if (isset($_GET['category'])) {
    $category_filter = $_GET['category'];
}
if (isset($_GET['search_data'])) {
    $search_performed = true;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Furniture Website</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
        .card-img-top {
            width: 100%;
            height: 190px;
            object-fit: contain;
        }
        .card {
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
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10">
                    <?php
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
                    </ul>
                </div>
            </div>
        </div>
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
</html>
