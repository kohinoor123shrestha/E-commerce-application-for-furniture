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
  <title>Contact - FurniJoy</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link rel="stylesheet" href="style.css">

  <style>
    body {
      background-color: #f8f6f3;
      font-family: 'Poppins', sans-serif;
    }

    /* Page heading */
    .page-title {
      font-size: 3rem;
      font-weight: 700;
      color: #6f4e37;
      background-color: #C7D3D4FF;
      padding: 20px;
      text-align: center;
      border-radius: 8px;
      margin: 20px auto;
      width: fit-content;
    }

    /* Contact section */
    .contact-container {
      max-width: 900px;
      margin: 50px auto;
      background: #ffffff;
      border-radius: 15px;
      box-shadow: 0px 6px 18px rgba(0, 0, 0, 0.1);
      padding: 40px 30px;
    }

    .contact-header {
      text-align: center;
      margin-bottom: 40px;
    }

    .contact-header h2 {
      font-weight: 700;
      color: #A07855FF;
    }

    .contact-info {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-around;
      margin-bottom: 40px;
    }

    .contact-card {
      background-color: #f0e6dc;
      border-radius: 12px;
      padding: 25px 20px;
      width: 260px;
      text-align: center;
      transition: all 0.3s ease;
      box-shadow: 0 4px 10px rgba(0,0,0,0.05);
    }

    .contact-card:hover {
      transform: translateY(-5px);
      background-color: #e5d1b8;
    }

    .contact-card i {
      color: #6f4e37;
      font-size: 2rem;
      margin-bottom: 10px;
    }

    .contact-card h5 {
      font-weight: 600;
      color: #333;
    }

    .contact-card p, .contact-card a {
      color: #555;
      text-decoration: none;
      font-size: 15px;
    }

    .contact-card a:hover {
      color: #6f4e37;
      text-decoration: underline;
    }

    /* Contact form */
    .contact-form {
      background-color: #f8f2ec;
      border-radius: 12px;
      padding: 30px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.05);
    }

    .contact-form h4 {
      color: #6f4e37;
      font-weight: 600;
      margin-bottom: 20px;
    }

    .form-control:focus {
      border-color: #A07855FF;
      box-shadow: 0 0 5px rgba(160,120,85,0.3);
    }

    .btn-custom {
      background-color: #A07855FF;
      border: none;
      color: white;
      font-weight: 600;
      transition: background 0.3s;
    }

    .btn-custom:hover {
      background-color: #8c6748;
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

<!-- 🌟 Contact Section -->
<div class="contact-container">
  <div class="contact-header">
    <h2>Get in Touch with Us</h2>
    <p class="text-muted">We’d love to hear from you! Reach out through any of the options below.</p>
  </div>

  <div class="contact-info">
    <div class="contact-card">
      <i class="fas fa-phone"></i>
      <h5>Phone</h5>
      <p><a href="tel:+9779842525219">+977 9842525219</a></p>
    </div>
    <div class="contact-card">
      <i class="fas fa-envelope"></i>
      <h5>Email</h5>
      <p><a href="mailto:furnijoy@gmail.com">furnijoy@gmail.com</a></p>
    </div>
    <div class="contact-card">
      <i class="fas fa-map-marker-alt"></i>
      <h5>Address</h5>
      <p>1234/56, Sahayog Marga,<br>Anamnagar, Kathmandu</p>
    </div>
  </div>

</body>
</html>
