<?php
include('includes/connect.php');
include('functions/common_function.php');
session_start();
<<<<<<< HEAD
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Your Cart - FurniJoy</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link rel="stylesheet" href="style.css">

  <style>
    body {
      background-color: #f8f9fa;
      font-family: 'Poppins', sans-serif;
    }

    .cart-container {
      background: #fff;
      border-radius: 15px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
      padding: 30px;
      margin-top: 40px;
      margin-bottom: 60px;
    }

    .table th {
      background-color: #A07855FF;
      color: white;
    }

    .table td {
      vertical-align: middle;
    }

    .product-image {
      width: 90px;
      height: 90px;
      border-radius: 10px;
      object-fit: contain;
      background-color: #f5f5f5;
      padding: 5px;
    }

    .btn-update {
      background-color: #5dbea3;
      color: white;
      border: none;
    }

    .btn-update:hover {
      background-color: #4aa58d;
    }

    .btn-remove {
      background-color: #dc3545;
      color: white;
      border: none;
    }

    .btn-remove:hover {
      background-color: #c82333;
    }

    .btn-info, .btn-success {
      border-radius: 25px;
      padding: 8px 20px;
      font-weight: 500;
    }

    .subtotal-box {
      background-color: #D4B996FF;
      border-radius: 12px;
      padding: 20px;
      color: #000;
      font-size: 1.2rem;
      font-weight: 500;
      box-shadow: 0 3px 10px rgba(0,0,0,0.1);
    }

    h2.text-info {
      font-weight: 700;
      color: #A07855FF !important;
    }

    @media (max-width: 768px) {
      .table th, .table td {
        font-size: 0.9rem;
      }
      .btn {
        font-size: 0.8rem;
        padding: 5px 10px;
      }
    }
  </style>
</head>

<body>
  <div class="container-fluid p-0">
    <!-- 🌟 Navbar (unchanged) -->
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color:#A07855FF; padding: 15px 20px;">
      <div class="container-fluid">
        <a class="navbar-brand text-white font-weight-bold" href="../index.php" style="font-size: 1.8rem;">
          <i class="fa-solid fa-couch"></i> FurniJoy
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
          aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
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
          <a class="nav-link text-dark" href="#">
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
  </div>

  <!-- 🛒 Cart Section -->
  <div class="container cart-container">
    <h2 class="text-center text-info mb-4"><i class="fa-solid fa-cart-shopping"></i> Your Shopping Cart</h2>

    <form action="" method="post">
      <table class="table table-hover text-center align-middle">
        <?php
        global $con;
        $get_ip_add = getIPAddress();
        $total_price = 0;
        $cart_query = "SELECT * FROM cart_details WHERE ip_address='$get_ip_add'";
        $result = mysqli_query($con, $cart_query);
        $result_count = mysqli_num_rows($result);

        if ($result_count > 0) {
          echo "
          <thead>
            <tr>
              <th>Product</th>
              <th>Image</th>
              <th>Quantity</th>
              <th>Total</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
          ";

          while ($row = mysqli_fetch_array($result)) {
            $product_id = $row['product_id'];
            $quantity = $row['quantity'];
            $select_products = "SELECT * FROM products WHERE product_id='$product_id'";
            $result_products = mysqli_query($con, $select_products);

            while ($row_product_price = mysqli_fetch_array($result_products)) {
              $product_price = $row_product_price['product_price'];
              $product_title = $row_product_price['product_title'];
              $product_image1 = $row_product_price['product_image1'];
              $product_total = $product_price * $quantity;
              $total_price += $product_total;

              echo "
              <tr>
                <td><b>$product_title</b></td>
                <td><img src='admin_area/product_images/$product_image1' class='product-image'></td>
                <td>
                  <input type='number' name='qty[$product_id]' value='$quantity' min='1' class='form-control text-center w-50 mx-auto'>
                </td>
                <td><strong>Rs.$product_total</strong></td>
                <td>
                  <input type='submit' value='Update' name='update_cart' class='btn btn-update btn-sm'>
                  <input type='submit' value='Remove' name='remove_cart[$product_id]' class='btn btn-remove btn-sm'>
                </td>
              </tr>
              ";
            }
          }
        } else {
          echo "<h3 class='text-center text-danger mt-4'>Your Cart is Empty!</h3>";
        }
        ?>
        </tbody>
      </table>

      <?php if ($result_count > 0): ?>
        <div class="d-flex justify-content-between align-items-center mt-4">
          <div class="subtotal-box">
            Subtotal: <span class="text-dark font-weight-bold">Rs. <?php echo $total_price; ?></span>
          </div>
          <div>
            <a href="index.php" class="btn btn-info mr-2">Continue Shopping</a>
            <a href="../users_area/checkout.php" class="btn btn-success">Checkout</a>
          </div>
        </div>
      <?php else: ?>
        <div class="text-center mt-4">
          <a href="index.php" class="btn btn-info">Continue Shopping</a>
        </div>
      <?php endif; ?>
    </form>

    <?php
    // Update quantity
    if (isset($_POST['update_cart'])) {
      foreach ($_POST['qty'] as $product_id => $qty) {
        $update_cart = "UPDATE cart_details SET quantity=$qty WHERE product_id=$product_id AND ip_address='$get_ip_add'";
        mysqli_query($con, $update_cart);
      }
      echo "<script>window.open('cart.php','_self')</script>";
    }

    // Remove item
    if (isset($_POST['remove_cart'])) {
      foreach ($_POST['remove_cart'] as $product_id => $val) {
        $delete_query = "DELETE FROM cart_details WHERE product_id=$product_id AND ip_address='$get_ip_add'";
        mysqli_query($con, $delete_query);
      }
      echo "<script>window.open('cart.php','_self')</script>";
    }
    ?>
  </div>
=======
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
        
        .card-img-top {
            height: 250px;
            object-fit: cover;
        }
        .card {
            margin-bottom: 20px; 
        }
        .cart_img{
    width:120x;
    height:120px;
    object-fit:contain;


}
    
    </style>
</head>

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
                            <a class="nav-link" href="index.php">Home</a>
                        </li>&nbsp;&nbsp;
                        <li class="nav-item">
                            <a class="nav-link" href="./users_area/profile.php">My Account</a>
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
                style="font-size: 3.5rem; background-color:#C7D3D4FF;padding:15px; color:#6f4e37">FurniJoy</h3>
        </div>
        <br>
        <div class="container">
            <div class="row">
                <form action="" method="post" >
                <table class="table table-bordered text-center">
                    <?php 
                    global $con;
                    $get_ip_add=getIPAddress();
                    $total_price=0;
                    $cart_query="select * from `cart_details` where ip_address='$get_ip_add'";
                    $result=mysqli_query($con,$cart_query);
                    $result_count=mysqli_num_rows($result);
                    if($result_count>0){
                        echo"<thead class='bg-dark text-light'>
                        <tr>
                            <th>Product Title</th>
                            <th>Product Image</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                            <th>Remove</th>
                            <th colspan='2'> Operations</th>

                        </tr>
                    </thead>
                    <tbody>";
                    
                    while($row=mysqli_fetch_array($result)){
                        $product_id=$row['product_id'];
                        $select_products="select * from `products` where product_id='$product_id'";
                        $result_products=mysqli_query($con,$select_products);
                        while($row_product_price=mysqli_fetch_array($result_products)){
                        $product_price=array($row_product_price['product_price']); //[200,300]
                        $product_values=array_sum($product_price);// 500
                        $price_table=$row_product_price['product_price'];
                        $product_title=$row_product_price['product_title'];
                        $product_image1= $row_product_price['product_image1'];
                        $total_price+=$product_values; //500
                
                  
                    ?>
                        <tr>
                            <td><?php echo $product_title?></td>
                            <td> <img src="./admin_area/product_images/<?php echo $product_image1?>" alt="" class="cart_img"></td>
                            <td> <input type="text" name="qty" id="" class="form-input w-50"></td>
                            <?php  
                            $get_ip_add=getIPAddress();
                            if(isset($_POST['update_cart'])){
                                $quantities=$_POST['qty'];
                                $update_cart="update `cart_details` set quantity= $quantities where ip_address='$get_ip_add'";
                                $result_products_quantity=mysqli_query($con,$update_cart);
                                $total_price=$total_price * $quantities;

                            }
                            
                            ?>
                            <td> Rs.<?php echo $price_table ?>/-</td>
                            <td> <input type="checkbox" name="remove item[]" value="<?php echo $product_id?>"></td>
                            <td>
                                <input type="submit" value="Update Cart" class="bg-success px-3 border-0 p-2 mx-4" name="update_cart"> 
                                <input type="submit" value="Remove Cart" class="bg-danger px-3 border-0 p-2 mx-4" name="remove_cart">  
                            </td>

                        </tr>
                        <?php 

                             }
                            }
                        }
                        else{
                            echo '<div class="alert alert-warning" role="alert">Cart is empty!</div>';
                        }
                            ?>
                    </tbody>
                </table>
                
                <!-- subtotal -->
                <div class="d-flex">
                    <?php
                     $get_ip_add=getIPAddress();

                     $cart_query="select * from `cart_details` where ip_address='$get_ip_add'";
                     $result=mysqli_query($con,$cart_query);
                     $result_count=mysqli_num_rows($result);
                     if($result_count>0){
                        echo "<h4 class='px-3'><strong>Subtotal: </strong><strong >Rs. $total_price/- </strong></h4>
                        <input type='submit' value='Continue Shopping' class='px-3 border-0 p-2 mx-4' style='background-color:#5dbea3' name='continue_shopping'>
                        <button class='p-3 py-2 border-0' style='background-color:#C7D3D4FF'><a href='./users_area/checkout.php' class='text-dark text-decoration-none'>Checkout</a></button>";
                    
                     }
                     else{
                        echo"<input type='submit' value='Continue Shopping' class='px-3 border-0 p-2 mx-4' style='background-color:#5dbea3' name='continue_shopping'>";
                      
                      
                
                    }
                    if (isset($_POST['continue_shopping'])){
                        echo"<script>window.open('index.php','_self')</script>";

                    }
                    
                    ?>
                    
                </div>
            </div>
        </div>
        </form>

       <!--  function to remove item -->
       <?php 
  
    function remove_cart_item(){
        global $con;
        if(isset($_POST['remove_cart'])){
            foreach($_POST['remove_item'] as $remove_id){
                echo $remove_id;
                $delete_query = "DELETE FROM `cart_details` WHERE product_id=$remove_id";
                $run_delete = mysqli_query($con, $delete_query);
                if($run_delete){
                    // Item successfully removed
                    echo"<script> window.open('cart.php','_self')</script>"; // Return true indicating success
                } 
                }
            }
        }
       echo $remove_item=remove_cart_item();
        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
            crossorigin="anonymous"></script>
>>>>>>> 6e4f40550381a4dbd824b89a996bab9889e8c448
</body>
</html>
