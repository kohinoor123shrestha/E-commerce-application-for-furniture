<?php
include("../includes/connect.php");
global $con;

if(isset($_GET['delete_user'])){
    $delete_user = $_GET['delete_user'];
    // Display a confirmation dialog using JavaScript
    echo "<script>
            var result = confirm('Are you sure you want to delete this user?');
            if (result) {
                // If user confirms, proceed with deletion
                window.location.href = 'delete_user.php?user_id=$delete_user';
            }
          </script>";
}
?>
