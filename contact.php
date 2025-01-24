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











