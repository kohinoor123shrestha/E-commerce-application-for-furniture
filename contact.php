<?php
include('includes/connect.php');
include('functions/common_function.php');
session_start();
?>
<<<<<<< HEAD
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
=======

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <style>

.small-img-group{
   display: flex;
   justify-content:center;

 }
 .small-img-col{
    flex-basis:33.33%;
    cursor:pointer;
    overflow:hidden;

 }
 .single-product input{
    width: 50px;
    height: 40px;
    padding-left: 10px;
    font-size: 16px;
    margin-right: 10px;
    

 }

        .btn-primary {
            background-color:#5dbea3; /* Primary button color */
            border-color: #5dbea3; /* Border color same as background */
       
        }
    


</style>

    </style>
</head>
<body>
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
        <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Us</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> <!-- Font Awesome for icons -->
  <style>
    body {
      background-color: #C7D3D4FF;
    }
    .container {
      max-width: 800px;
      margin: 50px auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    h1 {
      text-align: center;
      color: #333;
    }
    .contact-info {
      margin-top: 20px;
    }
    .contact-info div {
      margin-bottom: 20px;
    }
    .contact-info i {
      margin-right: 10px;
    }
    .contact-info h1 {
      font-size: 18px;
      color: #333;
    }
    .contact-info a {
      color: #5dbea3;
      text-decoration: none;
    }
    .contact-info a:hover {
      text-decoration: underline;
    }
 
  </style>
</head>
<body><br>
<h1><b>Contact Us</b></h1>
    </nav>
  </div>
  <div class="container">
    <div class="contact-info">
      <div style="display: flex; align-items: center;">
        <i class="fas fa-phone fa-2x"></i>
        <h1>Phone: <a href="tel:+1234567890">+977 9842525219</a></h1>
      </div><br>
      <div style="display: flex; align-items: center;">
        <i class="fas fa-envelope fa-2x"></i>
        <h1>Email: <a href="mailto:info@example.com">furnijoy@gmail.com</a></h1>
      </div><br>
      <div style="display: flex; align-items: center;">
        <i class="fas fa-map-marker-alt fa-2x"></i>
        <h1>Address: 1234/56, Sahayog Marga, Anamnagar, Kathmandu</h1>
      </div>
    </div>
  </div>
</body>
</html>

        
      
</body>
</html>











>>>>>>> 6e4f40550381a4dbd824b89a996bab9889e8c448
