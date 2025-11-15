<?php 
session_start();
include('../includes/connect.php');
include('../functions/common_function.php'); // ensure cart_item() is available

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];
$get_user = "SELECT * FROM user_table WHERE username='$username'";
$result = mysqli_query($con, $get_user);
$row_fetch = mysqli_fetch_assoc($result);
$user_id = $row_fetch['user_id'];

// Fetch orders for this user
$get_order_details = "SELECT * FROM user_orders WHERE user_id='$user_id' ORDER BY order_date DESC";
$result_orders = mysqli_query($con, $get_order_details);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>My Orders - FurniJoy</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<style>
  .secondary-navbar a {
      text-decoration: none;
  }
  .secondary-navbar .nav-link {
      color: #333;
  }
</style>
</head>
<body>

<!-- Primary Navbar -->
<nav class="navbar navbar-expand-lg navbar-light" style="background-color:#A07855FF; padding: 15px 20px;">
  <div class="container-fluid">
    <a class="navbar-brand text-white font-weight-bold" href="../index.php" style="font-size: 1.8rem;">
      <i class="fa-solid fa-couch"></i> FurniJoy
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse"
      data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
      aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-4 me-auto mb-2 mb-lg-0">
        <li class="nav-item"><a class="nav-link text-white" href="../index.php">Home</a></li>
        <li class="nav-item"><a class="nav-link text-white" href="./profile.php">My account</a></li>
        <li class="nav-item"><a class="nav-link text-white" href="../contact.php">Contact</a></li>
        <li class="nav-item">
          <a class="nav-link text-white" href="../cart.php">
            <i class="fa-solid fa-cart-shopping"></i>
            <sup><?php echo cart_item(); ?></sup>
          </a>
        </li>
      </ul>

      <!-- Search -->
      <form class="form-inline ml-auto" action="../search_product.php" method="get">
        <div class="input-group">
          <input class="form-control" type="search" placeholder="Search" aria-label="Search" name="search_data">
          <div class="input-group-append">
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

<!-- Orders Table -->
<div class="container mt-5">
    <h1 class="text-center text-dark mb-4"><b>My Orders</b></h1>
    <table class="table table-bordered table-striped">
        <thead class="bg-dark text-light text-center">
            <tr>
                <th>S.N</th>
                <th>Total Amount (Rs.)</th>
                <th>Payment Mode</th>
                <th>Order Date</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody class="text-center">
            <?php
            if(mysqli_num_rows($result_orders) > 0){
                $number = 1;
                while ($row_orders = mysqli_fetch_assoc($result_orders)) {
                    $total_price = htmlspecialchars($row_orders['total_price']);
                    $payment_mode = htmlspecialchars($row_orders['payment_mode']);
                    $order_date = htmlspecialchars($row_orders['order_date']);
                    $order_status = $row_orders['order_status'];

                    $status_text = ($order_status == 'pending') ? 'Incomplete' : 'Complete';

                    echo "<tr>
                            <td>$number</td>
                            <td>Rs. $total_price</td>
                            <td>$payment_mode</td>
                            <td>$order_date</td>
                            <td>$status_text</td>
                        </tr>";
                    $number++;
                }
            } else {
                echo "<tr><td colspan='5'>No orders found.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
