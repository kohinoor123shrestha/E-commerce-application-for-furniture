<?php
include("../includes/connect.php");
global $con;
if(isset($_GET['delete_products'])){
    $delete_products = $_GET['delete_products'];
    $delete_query = "Delete from `products` where product_id=$delete_products";
    $result=mysqli_query($con,$delete_query);
    if($result){
        echo"<script>alert('Product has been deleted successfully.')</script>";
        echo"<script>window.open('./index.php?view_products','_self')</script>";
    }
}
?>
