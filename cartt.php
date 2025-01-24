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
        <h1 style="text-align: center;"><B> MY ORDERS </h1> </B> <br>
        <div class="container">
        <div class="row justify-content-center"style="width: 100%;>
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
                            <th>Total Price</th>
                            

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
                     if($result_count>0)
                        echo "<h4 class='px-3'><strong>Subtotal: </strong><strong >Rs. $total_price/- </strong></h4>"
            
                    
                     
     
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
</body>
</html>
