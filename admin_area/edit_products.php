<?php
include("../includes/connect.php");
global $con;
if(isset($_GET['edit_products'])){
    $edit_id=$_GET['edit_products'];
    $get_data="select * from `products` where product_id='$edit_id'";
    $result=mysqli_query($con, $get_data);
    $row=mysqli_fetch_assoc($result);
    $product_title=$row['product_title'];
    $product_description=$row['product_description'];
    $category_id=$row['category_id'];
    $product_image1=$row['product_image1'];
    $product_image2=$row['product_image2'];
    $product_image3=$row['product_image3'];
    $product_price=$row['product_price'];
    $status=$row['status'];
    $select_category="select * from `categories` where category_id=$category_id ";
    $result_category=mysqli_query($con, $select_category);
    $row_category=mysqli_fetch_assoc($result_category);
    $category_title=$row_category['category_title'];
}
?>
<div class="container mt-5">
    <h1 class="text-center text-dark">Edit Products</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-outline w-50 mb-4 m-auto">
            <label for="product_title" class="form-label">Product Title</label>
            <input type="text" id="product_title" value="<?php echo $product_title ?>" name="product_title" class="form-control" required="required">
        </div>
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="description" class="form-label">Product Description</label>
            <input type="text" name="description" id="description" value="<?php echo $product_description?>" class="form-control" placeholder="Enter product description" autocomplete="off" required="required">
        </div>
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_category" class="form-label">Product Categories</label>
            <select name="product_category" class="form-control">
                <option value="<?php echo $category_id ?>"><?php echo $category_title ?></option>
                <?php 
                $select_category_all = "SELECT * FROM `categories`";
                $result_category_all = mysqli_query($con, $select_category_all);
                while($row_category_all = mysqli_fetch_assoc($result_category_all)) {
                    $category_title_option = $row_category_all['category_title'];
                    $category_id_option = $row_category_all['category_id'];
                    if ($category_id_option != $category_id) {
                        echo "<option value='$category_id_option'>$category_title_option</option>";
                    }
                }
                ?>
            </select>
        </div>
        <br>
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_image1" class="form-label">Product Image 1</label>
            <div class="d-flex">
                <input type="file" name="product_image1" id="product_image1" class="form-control w-90 m-auto">
                <img src="./product_images/<?php echo $product_image1 ?>" alt="" class="product_img">  
            </div>
        </div>
        <br>
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_image2" class="form-label">Product Image 2</label>
            <div class="d-flex">
                <input type="file" name="product_image2" id="product_image2" class="form-control w-90 m-auto">
                <img src="./product_images/<?php echo $product_image2 ?>" alt="" class="product_img">  
            </div>
        </div>
        <br>
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_image3" class="form-label">Product Image 3</label>
            <div class="d-flex">
                <input type="file" name="product_image3" id="product_image3" class="form-control w-90 m-auto">
                <img src="./product_images/<?php echo $product_image3 ?>" alt="" class="product_img">  
            </div>
        </div>
        <br>
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_price" class="form-label">Product Price</label>
            <input type="text" name="product_price" id="product_price"  value="<?php echo $product_price ?>" class="form-control" placeholder="Enter product price" required="required">
        </div>
        <div class="form-outline mb-4 w-50 m-auto">
            <input type="submit" name="edit_product" class="btn btn-success mb-3 px-3" style="background-color:#5dbea3" value="Update product">
        </div>
    </form>
</div>
<?php
if(isset($_POST['edit_product'])){
    $product_title=$_POST['product_title'];
    $product_description=$_POST['description'];
    $product_category=$_POST['product_category'];
    $product_price=$_POST['product_price'];

    // Check if any images are uploaded
    $product_image1 = isset($_FILES['product_image1']['name']) ? $_FILES['product_image1']['name'] : $product_image1;
    $product_image2 = isset($_FILES['product_image2']['name']) ? $_FILES['product_image2']['name'] : $product_image2;
    $product_image3 = isset($_FILES['product_image3']['name']) ? $_FILES['product_image3']['name'] : $product_image3;

    $temp_image1 = isset($_FILES['product_image1']['tmp_name']) ? $_FILES['product_image1']['tmp_name'] : null;
    $temp_image2 = isset($_FILES['product_image2']['tmp_name']) ? $_FILES['product_image2']['tmp_name'] : null;
    $temp_image3 = isset($_FILES['product_image3']['tmp_name']) ? $_FILES['product_image3']['tmp_name'] : null;

    if(empty($product_title) || empty($product_description) || empty($product_category) || empty($product_price)){
        echo "<script>alert('Please fill all the available fields')</script>";
        exit();
    } else {
        if($temp_image1){
            move_uploaded_file($temp_image1, "./product_images/$product_image1");
        }
        if($temp_image2){
            move_uploaded_file($temp_image2, "./product_images/$product_image2");
        }
        if($temp_image3){
            move_uploaded_file($temp_image3, "./product_images/$product_image3");
        }

        $update_products = "update `products` set product_title='$product_title', product_description='$product_description', category_id='$product_category', ";
        if($product_image1){
            $update_products .= "product_image1='$product_image1', ";
        }
        if($product_image2){
            $update_products .= "product_image2='$product_image2', ";
        }
        if($product_image3){
            $update_products .= "product_image3='$product_image3', ";
        }
        $update_products .= "product_price='$product_price', date=NOW() where product_id=$edit_id";

        $result_update=mysqli_query($con,$update_products);
        if($result_update){
            echo"<script> alert('Product updated successfully.') </script>";
            echo"<script> window.open('index.php?view_products.php','_self') </script>";
        }
    }
}
?>
