<?php 
include('../includes/connect.php');
include('../functions/common_function.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USER REGISTRATION</title>
    <!--bootstrap css link-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  
<body>
    <div class="container-fluid ">
        <h1 class="text-center mb-5"><br><b>New User Registration</b> </h1>
        <div class="row d-flex justify-content-left">
    <div class="col-lg-5">
        <img src="../images/user.jpg" alt="Admin Registration" class="img-fluid">
    </div>
            <div class="col-lg-6 col-xl-4">
             <form action="" method="post" >
                <div class="form-outline mb-4"><br>
                    <label for="user_username" class="form-label"> Username</label>
                    <input type="text"id="user_username" class="form-control" placeholder="Enter your username" autocomplete="off" required="required" name="user_username"/>
                </div>
                <div class="form-outline mb-4">
                    <label for="user_email" class="form-label"> Email</label>
                    <input type="email"id="user_email" class="form-control" placeholder="Enter your email" autocomplete="off" required="required" name="user_email"/>
                </div>
                <div class="form-outline mb-4">
                    <label for="user_password" class="form-label"> Password</label>
                    <input type="password"id="user_password" class="form-control" placeholder="Enter your password" autocomplete="off" required="required" name="user_password"/>
                </div>
                <div class="form-outline mb-4">
                    <label for="conf_user_password" class="form-label">Confirm Password</label>
                    <input type="password"id="conf_user_password" class="form-control" placeholder="Confirm your password" autocomplete="off" required="required" name="conf_user_password"/>
                </div>
                <div class="form-outline mb-4">
                    <label for="user_address" class="form-label"> Address</label>
                    <input type="text"id="user_address" class="form-control" placeholder="Enter your address" autocomplete="off" required="required" name="user_address"/>
                </div>
                <div class="form-outline mb-4">
                    <label for="user_contact" class="form-label"> Contact</label>
                    <input type="text"id="user_contact" class="form-control" placeholder="Enter your contact number" autocomplete="off" required="required" name="user_contact"/>
                </div>
                <div class="mt-4 pt-2">
                    <input type="submit" value="Register" class="py-2 px-3 border-0 " style="background-color:#5dbea3" name="user_register">
                    <p class="mt-2 pt-1 mb-0"><span style="font-weight: bold;">Already have an account?<a href="user_login.php" class="text-danger" style="font-weight: bold;"> Login</a></span></p>
                </div>  
             </form>
            </div>
        </div>

    </div>   
</body>
</html>
<!-- php code -->
<?php

if (isset($_POST['user_register'])) {
    $user_username = $_POST['user_username'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $hash_password=password_hash( $user_password, PASSWORD_DEFAULT);
    $conf_user_password= $_POST ['conf_user_password'];
    $user_address = $_POST['user_address'];
    $user_contact = $_POST['user_contact'];
    $user_ip=getIPAddress();

    
    $select_query = "SELECT * FROM `user_table` WHERE username='$user_username' or user_email='$user_email'";
    $result = mysqli_query($con, $select_query);
    $rows_count = mysqli_num_rows($result);
    if ($rows_count > 0) {
        echo "<script>alert('Username already exists.')</script>";
    } else if($user_password!= $conf_user_password) {
        echo "<script>alert('Passwords don\'t match.')</script>"; 
        echo "<script>window.open('user_registration.php','_self')</script>"; 
    }
    else {
        $insert_query = "INSERT INTO `user_table` (username, user_email, user_password,user_ip,user_address,  user_contact) VALUES ('$user_username', '$user_email', '$hash_password','$user_ip', '$user_address', '$user_contact')";
        $sql_execute = mysqli_query($con, $insert_query);

        if ($sql_execute) {
            echo "<script>alert('Registered successfully')</script>";
            echo "<script>window.open('user_login.php','_self')</script>";
        } else {
            echo "<script>alert('Error registering.')</script>";
        }
    }
}
?>


