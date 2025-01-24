<?php
session_start();
include('../includes/connect.php');

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];
$get_user = "SELECT * FROM user_table WHERE username='$username'";
$result = mysqli_query($con, $get_user);
$row_fetch = mysqli_fetch_assoc($result);
$user_id = $row_fetch['user_id'];
$get_order_details = "SELECT * FROM user_orders WHERE user_id='$user_id'";
$result_orders = mysqli_query($con, $get_order_details);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My orders</title>
</head>
<body>
    <h1 class="text-center text-dark"><b>My Orders</b></h1>
    <table class="table table-bordered mt-5">
        <thead class="bg-dark text-light">
            <tr class="text-center">
                <th>S.N</th>
                <th>Amount Due</th>
                <th>Total Products</th>
                <th>Invoice Number</th>
                <th>Date</th>
                <th>Complete/Incomplete</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody class="bg-secondary text-light">
            <?php
            $number = 1;
            while ($row_orders = mysqli_fetch_assoc($result_orders)) {
                $order_id = $row_orders['order_id'];
                $amount_due = $row_orders['amount_due'];
                $total_products = $row_orders['total_products'];
                $invoice_number = $row_orders['invoice_number'];
                $order_date = $row_orders['order_date'];
                $order_status = $row_orders['order_status'];
                echo "<tr>
                        <td>$number</td>
                        <td>$amount_due</td>
                        <td>$total_products</td>
                        <td>$invoice_number</td>
                        <td>$order_date</td>
                        <td>Complete/Incomplete</td>
                        <td>$order_status</td>
                    </tr>";
                $number++;
            }
            ?>
        </tbody>
    </table>
</body>
</html>
