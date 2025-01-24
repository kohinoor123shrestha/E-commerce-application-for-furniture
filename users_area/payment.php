<?php
include("../includes/connect.php");
include("../functions/common_function.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<style>
    img{
        width:100%;
        margin: auto;
        display: block;


    }
</style>

<body>
    <!--  php code to access user_id -->
    <?php
    $user_ip=getIPAddress();
    $get_user="select * from `user_table` where user_ip='$user_ip'";
    $result=mysqli_query($con,$get_user);
    $run_query=mysqli_fetch_array($result);
    $user_id= $run_query['user_id'];


    ?>
    <div class="container">
        <h2 class="text-center text-info"> Payment Options</h2>
        <div class="row d-flex justify-content-center align-items-center my-5" >
            <div class="col-md-6">
            <a href="https://www.paypal.com" target="_blank"><img src="../images/all.jpg" alt=""></a>
            </div>  
            <div class="col-md-6">
            <a href="order.php?user_id=<?php echo $user_id?>" ><h2 class="text-center">Pay Offline</a></h2>
            </div>    
        </div>
    </div>
    
</body>
</html>
    