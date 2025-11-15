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
    <div class="container mt-5">
        <h1 class="text-center text-success mb-4"><b>Edit Account</b></h1>
        <form action="" method="post" class="mx-auto" style="max-width: 600px;">

            <div class="form-group row mb-3">
                <label for="user_username" class="col-sm-3 col-form-label text-right font-weight-bold">Username:</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="user_username" name="user_username" 
                           value="<?php echo isset($username) ? htmlspecialchars($username) : ''; ?>">
                </div>
            </div>

            <div class="form-group row mb-3">
                <label for="user_email" class="col-sm-3 col-form-label text-right font-weight-bold">Email:</label>
                <div class="col-sm-9">
                    <input type="email" class="form-control" id="user_email" name="user_email" 
                           value="<?php echo isset($user_email) ? htmlspecialchars($user_email) : ''; ?>">
                </div>
            </div>

            <div class="form-group row mb-3">
                <label for="user_address" class="col-sm-3 col-form-label text-right font-weight-bold">Address:</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="user_address" name="user_address" 
                           value="<?php echo isset($user_address) ? htmlspecialchars($user_address) : ''; ?>">
                </div>
            </div>

            <div class="form-group row mb-4">
                <label for="user_contact" class="col-sm-3 col-form-label text-right font-weight-bold">Contact:</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="user_contact" name="user_contact" 
                           value="<?php echo isset($user_contact) ? htmlspecialchars($user_contact) : ''; ?>">
                </div>
            </div>

            <div class="text-center">
                <input type="submit" name="user_update" class="btn text-white px-4 py-2" 
                       value="Update" style="background-color:#5dbea3;">
            </div>
        </form>
    </div>
</body>
</html>

