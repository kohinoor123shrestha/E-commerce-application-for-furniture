<?php
session_start();

// Destroy all session data
session_unset();
session_destroy();

// Redirect to login page
echo "<script>alert('You have been logged out successfully!');</script>";
echo "<script>window.open('../users_area/user_login.php','_self');</script>";
exit();
?>
