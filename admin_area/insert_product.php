<?php 
include ('../includes/connect.php');
if(isset($_POST['insert_product'])){ 
    $product_title = $_POST['product_title'];
    $description = $_POST['description'];
    $product_category = $_POST['product_category'];
    $product_price = $_POST['product_price'];
    $product_status = 'true';

    $product_image1 = $_FILES['product_image1']['name'];
    $product_image2 = $_FILES['product_image2']['name'];
    $product_image3 = $_FILES['product_image3']['name'];


    $temp_image1 = $_FILES['product_image1']['tmp_name'];
    $temp_image2 = $_FILES['product_image2']['tmp_name'];
    $temp_image3 = $_FILES['product_image3']['tmp_name'];

    
    if(empty($product_title) || empty($description) || empty($product_category) || empty($product_price) || empty($product_image1) || empty($product_image2) || empty($product_image3)){
        echo "<script>alert('Please fill all the available fields')</script>";
        exit();
    } else {
        move_uploaded_file($temp_image1, "./product_images/$product_image1");
        move_uploaded_file($temp_image2, "./product_images/$product_image2");
        move_uploaded_file($temp_image3, "./product_images/$product_image3");

        $insert_products = "INSERT INTO `products` (product_title, product_description, category_id, product_image1, product_image2, product_image3, product_price, date, status) VALUES ('$product_title', '$description', '$product_category', '$product_image1', '$product_image2', '$product_image3', '$product_price', NOW(), '$product_status')";
        $result_query = mysqli_query($con, $insert_products);
        if($result_query){
            echo "<script>alert('Successfully inserted the products.')</script>";
        }
    }
}
?>
        <h1 class="text-center"><B>Insert  Products</b></h1><br>
       
        <form method="post" enctype="multipart/form-data">
      
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_title" class="form-label">Product Title</label>
                <input type="text" name="product_title" id="product_title" class="form-control" placeholder="Enter product title" autocomplete="off" required="required"> <br>
            </div>
          
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="description" class="form-label"> Product Description</label>
                <input type="text" name="description" id="description" class="form-control" placeholder="Enter product description" autocomplete="off" required="required"><br>
            </div>

            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_category" id="product_category" class="form-control">
                    <option value="">Select a category</option>
                    <?php
                    $select_query = "SELECT * FROM `categories`";
                    $result_query = mysqli_query($con, $select_query);
                    while($row = mysqli_fetch_assoc($result_query)){
                        $category_title = $row['category_title'];
                        $category_id = $row['category_id'];
                        echo "<option value='$category_id'>$category_title</option>";
                    }
                    ?>
                </select>
            </div> <br>
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image1" class="form-label"> Product Image 1</label>
                <input type="file" name="product_image1" id="product_image1" class="form-control" required="required">
            </div> <br>
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image2" class="form-label"> Product Image 2</label>
                <input type="file" name="product_image2" id="product_image2" class="form-control" required="required">
            </div> <br>
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image3" class="form-label"> Product Image 3</label>
                <input type="file" name="product_image3" id="product_image3" class="form-control" required="required">
            </div> <br>
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_price" class="form-label"> Product Price</label>
                <input type="text" name="product_price" id="product_price" class="form-control" placeholder="Enter product price" required="required"> <br>
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
               <input type="submit" name="insert_product" class="btn  mb-3 px-3" value="Insert products " style="background-color:#5dbea3">
            </div>
        </form>
    </div>
</body>
</html>
