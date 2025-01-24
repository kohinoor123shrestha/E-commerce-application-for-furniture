<?php
function getproducts(){
    global $con;
    if(!isset($_GET['category'])){
        $select_query="SELECT * FROM `products` ORDER BY RAND() LIMIT 0,10"; //random order wise product will be displayed
        $result_query=mysqli_query($con,$select_query);
        echo '<div class="row">';
        while($row=mysqli_fetch_assoc($result_query)){
            $product_id=$row['product_id'];
            $product_title=$row['product_title'];
            $product_description=$row['product_description'];
            $product_image1=$row['product_image1'];
            $product_price=$row['product_price'];
            $category_id=$row['category_id'];

            echo "<div class='col-md-3 mb-5 '>
            <div class='card'>
                <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                <div class='card-body'>
                    <h5 class='card-title'>$product_title</h5>
                    <p class='card-text'>$product_description</p>
                    <a href='index.php?add_to_cart=$product_id' class='btn btn-success'>Add to cart</a>
                
                    <a href='single_product.html' class='btn btn-secondary'>View more</a>
                </div>
            </div>
        </div>";

        }
        echo '</div>';
    }
}
function get_unique_categories(){
    global $con;
    if(isset($_GET['category'])){
        $category_id=$_GET['category'];
        $select_query="SELECT * FROM `products` WHERE category_id=$category_id";
        $result_query=mysqli_query($con,$select_query);
        $num_of_rows=mysqli_num_rows($result_query);
        if($num_of_rows==0){
            echo"<h2 CLASS= 'text-center text-danger'><b>NO FURNITURE ITEMS AVAILABLE.</b> </h2>";
        }

        echo '<div class="row">';
        while($row=mysqli_fetch_assoc($result_query)){
            $product_id=$row['product_id'];
            $product_title=$row['product_title'];
            $product_description=$row['product_description'];
            $product_image1=$row['product_image1'];
            $product_image1=$row['product_image1'];
            $product_price=$row['product_price'];
            $category_id=$row['category_id'];

            echo '<div class="col-md-3 mb-2">
            <div class="card">
                <img src="./admin_area/product_images/'.$product_image1.'" class="card-img-top" alt="">
                <div class="card-body">
                    <h5 class="card-title">'.$product_title.'</h5>
                    <p class="card-text">'.$product_description.'</p>
                    <a href="index.php?add_to_cart='.$product_id.'" class="btn btn-success">Add to cart</a>
                    <a href="#" class="btn btn-secondary">View more</a>
                </div>
            </div>
        </div>';
        
        }
        echo '</div>';
    }
}

//displaying categories in sidenav
function getcategories(){
    global $con;
    $select_categories= "SELECT * FROM `categories`";
    $result_categories=mysqli_query($con,$select_categories);
    while($row_data=mysqli_fetch_assoc($result_categories)){
        $category_title=$row_data['category_title'];
        $category_id=$row_data['category_id'];
        echo '<li class="nav-item">
                <a href="index.php?category='.$category_id.'" class="nav-link text-light">'.$category_title.'</a> 
              </li>';
    }
}

 function viewmore(){
    global $con;
    if (isset($_GET['product_id'])) {
        $product_id = $_GET['product_id'];
    
        // Fetch product details from the database based on product_id
        $con = mysqli_connect("localhost", "root", "", "furnijoy");
        if ($con) {
            $query = "SELECT * FROM `products` WHERE product_id = $product_id";
            $query_run = mysqli_query($con, $query);
    
            if (mysqli_num_rows($query_run) > 0) {
                $item = mysqli_fetch_assoc($query_run);
                $product_image1 = $item['product_image1'];
                $product_title = $item['product_title'];
                $product_description = $item['product_description'];
                
                echo "<div class='col-md-3 mb-5 '>
                <div class='card'>
                    <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                    <div class='card-body'>
                        <h5 class='card-title'>$product_title</h5>
                        <p class='card-text'>$product_description</p>
                        <a href='index.php?add_to_cart=$product_id' class='btn btn-success'>Add to cart</a>
                        <a href='single_product.html' class='btn btn-secondary'>View more</a>
                    </div>
                </div>
            </div>";
    
            }
            echo '</div>';
            }
        }
    }


//  get ip address 
function getIPAddress() {  
    //whether ip is from the shared internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }   
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }   
    else {  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}

function cart(){
    if (isset($_GET['add_to_cart'])){
        global $con;
        $get_ip_add = getIPAddress();  
        $get_product_id=$_GET['add_to_cart'];

        $select_query="select * from  `cart_details` where ip_address='$get_ip_add' and product_id= $get_product_id";
        $result_query=mysqli_query($con,$select_query);
        $num_of_rows=mysqli_num_rows($result_query);
        if($num_of_rows>0){
            echo "<script>alert ('Item is already added to cart.')</script>";
            // echo '<div class="alert alert-warning" role="alert">This item is already present inside the cart.</div>';
            echo "<script>window.open ('index.php','_self') </script>"; // corrected script tag
        }
        else{
            $insert_query="insert into `cart_details` (product_id, ip_address,quantity) 
            values($get_product_id, '$get_ip_add' ,'0')";
            $result_query=mysqli_query($con,$insert_query); // corrected variable name
            echo "<script>alert ('Item is successfully added to cart.')</script>"; // corrected script tag
            echo "<script>window.open ('index.php','_self')</script>"; // corrected script tag
        }
    }
}



function cart_item() {
    if(isset($_SESSION['cart_items']) && is_array($_SESSION['cart_items'])) {
        // Count the number of items in the cart
        return count($_SESSION['cart_items']);
    } else {
        // If cart is empty, return 0
        return 0;
    }
}


    
    function total_cart_price(){
    global $con;
    $get_ip_add=getIPAddress();
    $total_price=0;
    $cart_query="select * from `cart_details` where ip_address='$get_ip_add'";
    $result=mysqli_query($con,$cart_query);
    
    while($row=mysqli_fetch_array($result)){
        $product_id=$row['product_id'];
        $select_products="select * from `products` where product_id='$product_id'";
        $result_products=mysqli_query($con,$select_products);
        while($row_product_price=mysqli_fetch_array($result_products)){
        $product_price=array($row_product_price['product_price']); //[200,300]
        $product_values=array_sum($product_price);// 500
        $total_price+=$product_values; //500

        }



    }
    echo $total_price;
}


//get user oder details
    

?>
