<!DOCTYPE html>
<html lang="en">
<head>
<<<<<<< HEAD
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>USER LOGIN</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
</head>

<body>
  <div class="container-fluid">
    <h1 class="text-center mb-5"><br><b>User Login</b></h1>
    <div class="row d-flex justify-content-left">
      <div class="col-lg-5">
        <img src="../images/userr.jpg" alt="User Login" class="img-fluid">
      </div>

      <div class="col-lg-6 col-xl-4">
        <form action="" method="post">
          <div class="form-outline mb-4"><br><br>
            <label for="user_username" class="form-label"> Username</label>
            <input type="text" id="user_username" class="form-control" placeholder="Enter your username" autocomplete="off" required name="user_username"/>
          </div>

          <div class="form-outline mb-4">
            <label for="user_email" class="form-label"> Email</label>
            <input type="email" id="user_email" class="form-control" placeholder="Enter your email" autocomplete="off" required name="user_email"/>
          </div>

          <div class="form-outline mb-4">
            <label for="user_password" class="form-label"> Password</label>
            <input type="password" id="user_password" class="form-control" placeholder="Enter your password" autocomplete="off" required name="user_password"/>
          </div>

          <div class="mt-4 pt-2">
            <input type="submit" value="Login" class="py-2 px-3 border-0 text-white" style="background-color:#5dbea3" name="user_login">
            <p class="mt-2 pt-1 mb-0">
              <span style="font-weight: bold;">Don't have an account?
                <a href="user_registration.php" class="text-danger" style="font-weight: bold;">Register</a>
              </span>
            </p>
          </div>
        </form>
      </div>
    </div>
  </div>
=======
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USER LOGIN</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>
    <div class="container-fluid ">
        <h1 class="text-center mb-5"><br> <b>User Login </b></h1>
        <div class="row d-flex justify-content-left">
    <div class="col-lg-5">
        <img src="../images/userr.jpg" alt="User Login" class="img-fluid">
    </div>
            <div class="col-lg-6 col-xl-4">
             <form action="" method="post" >
                <div class="form-outline mb-4"><br><br>
                        <label for="user_username" class="form-label"> Username</label>
                        <input type="text" id="user_username" class="form-control" placeholder="Enter your username" autocomplete="off" required="required" name="user_username"/>
                    </div>
                    <div class="form-outline mb-4">
                        <label for="user_email" class="form-label"> Email</label>
                        <input type="email" id="user_email" class="form-control" placeholder="Enter your email" autocomplete="off" required="required" name="user_email"/>
                    </div>
                    <div class="form-outline mb-4">
                        <label for="user_password" class="form-label"> Password</label>
                        <input type="password" id="user_password" class="form-control" placeholder="Enter your password" autocomplete="off" required="required" name="user_password"/>
                    </div>
                    <div class="mt-4 pt-2">
                        <input type="submit" value="Login" class=" py-2 px-3 border-0 " style="background-color:#5dbea3" name="user_login">
                        <p class="mt-2 pt-1 mb-0"><span style="font-weight: bold;">Don't have an account ? <a href="user_registration.php" class="text-danger" style="font-weight: bold;"> Register</a></span></p>
                    </div>
                </form> 
            </div>
        </div>
    </div>
>>>>>>> 6e4f40550381a4dbd824b89a996bab9889e8c448
</body>
</html>

<?php
include("../includes/connect.php");
include("../functions/common_function.php");
<<<<<<< HEAD
session_start(); 

if (isset($_POST['user_login'])) {
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];

    $select_query = "SELECT * FROM `user_table` WHERE user_email='$user_email'";
    $result = mysqli_query($con, $select_query);
    $row_count = mysqli_num_rows($result);

    if ($row_count > 0) {
        $row_data = mysqli_fetch_assoc($result);
        $user_ip = getIPAddress();

        // ✅ Get user info from database
        $db_username = $row_data['username'];
        $db_password = $row_data['user_password'];

        // ✅ Verify password
        if (password_verify($user_password, $db_password)) {

            // ✅ Set both username and email to session
            $_SESSION['user_email'] = $user_email;
            $_SESSION['username'] = $db_username;

            // ✅ Check if user has items in cart
            $check_cart = "SELECT * FROM `cart_details` WHERE ip_address='$user_ip'";
            $cart_result = mysqli_query($con, $check_cart);
            $row_count_cart = mysqli_num_rows($cart_result);

            echo "<script>alert('Login Successful!')</script>";

            // Redirect logic
            if ($row_count_cart == 0) {
                echo "<script>window.open('../index.php','_self')</script>";
            } else {
                echo "<script>window.open('../cart.php','_self')</script>";
            }

        } else {
            echo "<script>alert('Invalid password!')</script>";
        }
    } else {
        echo "<script>alert('Email not found!')</script>";
    }
}
?>
=======
@session_start(); 
if(isset($_POST['user_login'])){
    $user_username=$_POST['user_username'];
    $user_email=$_POST['user_email'];
    $user_password=$_POST['user_password'];
    $select_query="select * from `user_table` where user_email='$user_email'";
    $result=mysqli_query($con,$select_query);
    $row_count=mysqli_num_rows($result);
    $row_data=mysqli_fetch_assoc($result);
    $user_ip=getIPAddress();

    //cart item
    $select_query_cart="select * from `cart_details` where ip_address='$user_ip'";
    $select_cart=mysqli_query($con,$select_query_cart);
    $row_count_cart=mysqli_num_rows($select_cart);
  if($row_count> 0){
    $_SESSION['user_email']=$user_email;
   if(password_verify($user_password,$row_data['user_password'])){
    if($row_count==1 and $row_count_cart==0){
        $_SESSION['user_email']=$user_email;
        echo "<script> alert('Login Successful.')</script>";
        echo "<script> window.open('../index.php','_self')</script>" ;
    }
    else{
        $_SESSION['username']=$user_username;
        echo "<script> alert('Login Successful.')</script>";
        echo "<script> window.open ('../index.php','_self')</script>" ;
    }

  }
  else{
    echo "<script> alert('Invalid Credentials.')</script>";
  }
}
  else{
    echo "<script> alert('Invalid Credentials.')</script>";
  }
}


?>

>>>>>>> 6e4f40550381a4dbd824b89a996bab9889e8c448
