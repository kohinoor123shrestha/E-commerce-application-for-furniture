<?php
include('includes/connect.php');
include('functions/common_function.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Search Products - FurniJoy</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<link rel="stylesheet" href="style.css">
<style>
.card-img-top{width:100%;height:190px;object-fit:contain;}
.card{margin-bottom:20px;}
.btn-add{background-color:#5dbea3;color:white;border:none;}
.btn-add:hover{background-color:#4aa58d;}
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

<!-- same layout as index -->
<div class="container-fluid">
    <div class="row">

        <div class="col-md-10">

            <h3 class="text-center text-info mb-4">
                Results for "<?php echo $_GET['search_data'];?>"
            </h3>

            <div class="row">
            <?php
            if(isset($_GET['search_data'])){
                $search_value = $_GET['search_data'];
                $q = "SELECT * FROM products WHERE product_title LIKE '%$search_value%' OR product_description LIKE '%$search_value%'";
                $run = mysqli_query($con,$q);

                if(mysqli_num_rows($run)==0){
                    echo "<h3 class='text-center text-danger'>No products found</h3>";
                }

                while($p = mysqli_fetch_assoc($run)){
                    echo "
                    <div class='col-md-4 mb-2'>
                        <div class='card'>
                            <br>
                            <img src='./admin_area/product_images/".$p['product_image1']."' class='card-img-top'>
                            <div class='card-body'>
                                <h4 class='card-title'><b>".$p['product_title']."</b></h4>
                                <p class='card-text'>".$p['product_description']."</p>
                                <h5 class='card-text'>Rs.".$p['product_price']."/-</h5>

                                <a href='index.php?add_to_cart=".$p['product_id']."' class='btn btn-add'>Add to Cart</a>
                                <a href='single_product.php?product_id=".$p['product_id']."' class='btn btn-secondary text-dark border-0'
                                 style='background-color:#C7D3D4FF'>View more</a>
                            </div>
                        </div>
                    </div>";
                }
            }
            ?>
            </div>

        </div>

        <!-- SIDEBAR CATEGORIES EXACT LIKE INDEX -->
        <div class="col-md-2 container-fluid" style="background-color:#D4B996FF;">
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

</body>
</html>
