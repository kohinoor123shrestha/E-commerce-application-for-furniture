<!-- to connect to the database -->
<?php
$con=mysqli_connect('localhost','root','','furnijoy');
if(!$con){
    die (mysqli_error($con));
}

?>



