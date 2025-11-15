<?php 
include('../includes/connect.php');
include('../functions/common_function.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
</head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
        body{
            overflow:hidden;
        }
    </style>
<body>
    <div class="container-fluid">
<br><h1 class="text-center mb-5"><b> Admin Registration </b></h1>
<div class="row d-flex justify-content-left">
    <div class="col-lg-6">
        <img src="../images/admin.jpg" alt="Admin Registration" class="img-fluid">
    </div>
    <div class="col-lg-6 col-xl-4">
       <form action="" method="post">
        <div class="form-outline mb-4"><br><br>
            <label for="username" class="form-label"> Username</label>
            <input type="text" id="username" name="username" placeholder="Enter your username" required="required" class="form-control">
        </div>
        <div class="form-outline mb-4">
            <label for="email" class="form-label">Email</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" required="required" class="form-control">
        </div>
        <div class="form-outline mb-4">
            <label for="password" class="form-label">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required="required" class="form-control">
        </div>
        <div class="form-outline mb-4">
            <label for="confirm_password" class="form-label">Confirm Password</label>
            <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm your password" required="required" class="form-control">
        </div>
        <div>
            <input type="submit" class=" py-2 px-3 border-0" style="background-color:#5dbea3" name="admin_registration" value="Register">
            <p class="mt-2 pt-1 mb-0"><span style="font-weight: bold;">Don't you have an account?<a href="admin_login.php" class="text-danger" style="font-weight: bold;"> Login</a></span></p>
        </div>
                   

       </form>
    </div>
</div>
    </div>
    
</body>
</html>
<?php
if (isset($_POST['admin_registration'])) { 
    $admin_username = $_POST['username']; 
    $admin_email = $_POST['email']; 
    $admin_password = $_POST['password'];
    $confirm_password = $_POST['confirm_password']; 
    if ($admin_password != $confirm_password) {
        echo "<script>alert('Passwords don\'t match.')</script>";
    } else {
        $hash_password = password_hash($admin_password, PASSWORD_DEFAULT);
        $select_query = "SELECT * FROM `admin_table` WHERE username='$admin_username' OR admin_email='$admin_email'";
        $result = mysqli_query($con, $select_query);
        $rows_count = mysqli_num_rows($result);
        if ($rows_count > 0) {
            echo "<script>alert('Username or email already exists.')</script>";
        } else {
            $insert_query = "INSERT INTO `admin_table` (username, admin_email, admin_password) VALUES ('$admin_username', '$admin_email', '$hash_password')";
            $sql_execute = mysqli_query($con, $insert_query);
            
            if ($sql_execute) {
                echo "<script>alert('Registered successfully.')</script>";
            } else {
                echo "<script>alert('Error registering.')</script>";
            }
        }
    }
}
?>