<?php
include('../includes/connect.php');

$user_session_name = isset($_SESSION['username']) ? $_SESSION['username'] : '';
$select_query = "SELECT * FROM `user_table` WHERE username='$user_session_name'";
$result_query = mysqli_query($con, $select_query);
$row_fetch = mysqli_fetch_assoc($result_query);
if ($row_fetch) {
    $user_id = $row_fetch['user_id'];
    $username = $row_fetch['username'];
    $user_email = $row_fetch['user_email'];
    $user_address = $row_fetch['user_address'];
    $user_contact = $row_fetch['user_contact'];
}

if (isset($_POST['user_update'])){
    $update_id = $user_id;
    $username = $_POST['user_username'];
    $user_email = $_POST['user_email'];
    $user_address = $_POST['user_address'];
    $user_contact = $_POST['user_contact'];

    // Update query
    $update_data = "update `user_table` set username='$username', user_email='$user_email', user_address='$user_address', user_contact='$user_contact' WHERE user_id='$update_id'";
    $result_query_update = mysqli_query($con, $update_data);
    if($result_query_update){
        echo "<script>alert ('Data updated successfully')</script>";
         echo "<script> window.open('profile.php','_self')</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Edit account</title>
</head>
<body>
    <h1 class="text-center text-sucess mb-4"><b>Edit Account</h1></b>
    <form action="" method="post" class="text-center">
        <div class="form-outline mb-4">
            <input type="text" class="form-control w-50 m-auto" name="user_username" placeholder="Username" value="<?php echo isset($username) ? $username : ''; ?>">
        </div>
        <div class="form-outline mb-4">
            <input type="email" class="form-control w-50 m-auto" name="user_email" placeholder="Email" value="<?php echo isset($user_email) ? $user_email : ''; ?>">
        </div>
        <div class="form-outline mb-4">
            <input type="text" class="form-control w-50 m-auto" name="user_address" placeholder="Address" value="<?php echo isset($user_address) ? $user_address : ''; ?>">
        </div>
        <div class="form-outline mb-4">
            <input type="text" class="form-control w-50 m-auto" name="user_contact" placeholder="Contact" value="<?php echo isset($user_contact) ? $user_contact : ''; ?>">
        </div>
        <input type="submit" name="user_update" class="btn mb-3 px-3" value="Update" style="background-color:#5dbea3">
    </form>

</body>
</html>
