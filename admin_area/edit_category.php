<?php
include("../includes/connect.php");
global $con;
if(isset($_GET['edit_category'])){
    $edit_category=$_GET['edit_category'];
    $get_categories="select * from  `categories` where category_id=$edit_category";
    $result=mysqli_query($con,$get_categories);
    $row=mysqli_fetch_assoc($result);
    $category_title= $row["category_title"];
}
if(isset($_POST['edit_cat'])){ 
    $cat_title=$_POST['category_title'];
    $update_query="update `categories` set category_title='$cat_title' where category_id=$edit_category";
    $result_cat=mysqli_query($con,$update_query);
    if($result_cat){
        echo"<script>alert('Category has been updated successfully.')</script>";
        echo"<script>window.open('./index.php?view_categories','_self')</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Category</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-3">
       <h1 class="text-center">Edit Category</h1> 
       <form action="" method="post" class="text-center mx-auto w-50">
        <div class="form-outline mb-4">
            <br><br><label for="category_title" class="form-label">Category Title</label><br>
            <input type="text" name="category_title" id="category_title" class="form-control" required="required" value='<?php echo $category_title;?>'>
        </div>
        <input type="submit" value="Update Category" class="btn btn-success px-3 mb-3" style="background-color:#5dbea3" name="edit_cat">

       </form>
    </div>
</body>
</html>

