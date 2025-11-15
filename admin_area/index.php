<?php
include('../includes/connect.php');
include('../functions/common_function.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
        .product_img {
            width: 30%;
            object-fit: contain;
        }

        .button-group {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            margin-top: 20px;
        }
        .button-group button {
            margin: 5px;
        }  
             
</style>
</head>
<body>
<div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #A07855FF; padding: 2px 0;">
        <div class="container-fluid">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="#" class="nav-link">Welcome Admin</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="bg-light" style="height:100px;">
        <h3 class="text-center font-weight-bold" style="font-size: 3.5rem; background-color:#D4B996FF ;padding:17px; color:#6f4e37">FurniJoy</h3>
    </div>
    <div class="col-md-12 p-3 d-flex justify-content-center align-items-center" style="background-color:#C7D3D4FF">
    <div class="button-group">
        <button class="btn" style="background-color:  #5dbea3;"><a href="index.php?insert_product" class="nav-link text-light"> Insert Product</a></button>
        <button class="btn" style="background-color:  #5dbea3;"><a href="index.php?view_products" class="nav-link text-light"> View Products</a></button>
        <button class="btn" style="background-color:  #5dbea3;"><a href="index.php?insert_category" class="nav-link text-light"> Insert Categories</a></button>
        <button class="btn" style="background-color:  #5dbea3;"><a href="index.php?view_categories" class="nav-link text-light"> View Categories</a></button>
        <button class="btn" style="background-color:  #5dbea3;"><a href="index.php?list_users" class="nav-link text-light"> View Users</a></button>
        <button class="btn" style="background-color:  #5dbea3;"><a href="admin_login.php" class="nav-link text-light"> Logout</a></button>
    </div>
</div>
    <div class="container my-3">
        <?php
        if(isset($_GET['insert_product'])){
            include ('insert_product.php');
        }

        if(isset($_GET['insert_category'])){
            include ('insert_categories.php');
        }
        if(isset($_GET['view_categories'])){
            include ('view_categories.php');
        }
        if(isset($_GET['edit_category'])){
            include ('edit_category.php');
        }
        if(isset($_GET['delete_category'])){
            include ('delete_category.php');
        }
        if(isset($_GET['list_users'])){
            include ('list_users.php');
        }
        if(isset($_GET['view_products'])){
            include ('view_products.php');
        }
        if(isset($_GET['edit_products'])){
            include ('edit_products.php');
        }
        if(isset($_GET['delete_products'])){
            include ('delete_products.php');
        }
        if(isset($_GET['delete_user'])){
            include ('delete_user.php');
        }
        if(isset($_GET['edit_users'])){
            include ('edit_users.php');
        }
        if(isset($_GET['list_orders'])){
            include ('list_orders.php');
        }
        ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>


