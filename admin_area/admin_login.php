<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Login</title>
</head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<style>
body{
overflow:hidden;
}
</style>
<body>
<div class="container-fluid">
<br><h1 class="text-center mb-5"><b>Admin Login </b></h1>
<div class="row d-flex justify-content-left">
<div class="col-lg-6">
<img src="../images/adminnn.jpg" alt="Admin Registration" class="img-fluid">
</div>
    <div class="col-lg-6 col-xl-4">
       <form action="" method="post">
        <div class="form-outline mb-4"><br><br><br>
            <label for="email" class="form-label"> Email</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" required="required" class="form-control">
        </div>
        <div class="form-outline mb-4">
            <label for="password" class="form-label">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required="required" class="form-control">
        </div>
        <div>
            <input type="submit" class=" py-2 px-3 border-0" style="background-color:#5dbea3" name="admin_login" value="Login">
            <p class="mt-2 pt-1 mb-0"><span style="font-weight: bold;">Don't have an account?<a href="admin_registration.php" class="text-danger" style="font-weight: bold;">Register</a></span></p>
        </div>
       </form>
    </div>
</div>
</div>    
</body>
</html>
<?php
include("../includes/connect.php");
include("../functions/common_function.php");
@session_start(); 
if(isset($_POST['admin_login'])){
    $admin_email=$_POST['email'];
    $admin_password=$_POST['password'];
    $select_query="select * from `admin_table` where admin_email='$admin_email'";
    $result=mysqli_query($con,$select_query);
    $row_count=mysqli_num_rows($result);
    $row_data=mysqli_fetch_assoc($result);
  if($row_count> 0){
    $_SESSION['email']=$admin_email;
   if(password_verify($admin_password,$row_data['admin_password'])){
    if($row_count==1){
        $_SESSION['email']=$admin_email;
        echo "<script> alert('Login Successful.')</script>";
        echo "<script> window.open('index.php','_self')</script>" ;
    }
  else{
    echo "<script> alert('Invalid Credentials.')</script>";
  }
}
  else{
    echo "<script> alert('Invalid Credentials.')</script>";
  }
 }
}
?>



