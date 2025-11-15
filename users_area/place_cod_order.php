<?php
header('Content-Type: application/json');
include('../includes/connect.php');
include('../functions/common_function.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'error' => 'Invalid request']);
    exit;
}

// Get form data
$name    = mysqli_real_escape_string($con, $_POST['name'] ?? '');
$email   = mysqli_real_escape_string($con, $_POST['email'] ?? '');
$phone   = mysqli_real_escape_string($con, $_POST['phone'] ?? '');
$pincode = mysqli_real_escape_string($con, $_POST['pincode'] ?? '');
$address = mysqli_real_escape_string($con, $_POST['address'] ?? '');

if (!$name || !$email || !$phone || !$pincode || !$address) {
    echo json_encode(['success' => false, 'error' => 'Missing buyer info']);
    exit;
}

$ip = getIPAddress();
$cart_q = mysqli_query($con, "SELECT * FROM cart_details WHERE ip_address='$ip'");
if (mysqli_num_rows($cart_q) === 0) {
    echo json_encode(['success' => false, 'error' => 'Cart is empty']);
    exit;
}

// Calculate total
$total_price = total_cart_price();
$invoice_number = mt_rand();

// Insert order
mysqli_query($con, "INSERT INTO user_orders (user_id, amount_due, invoice_number, total_products, order_date, order_status) 
    VALUES (NULL, $total_price, $invoice_number, ".mysqli_num_rows($cart_q).", NOW(), 'completed')");

$order_id = mysqli_insert_id($con);

// Save items
while ($r = mysqli_fetch_assoc($cart_q)) {
    $product_id = (int)$r['product_id'];
    $qty = (int)$r['quantity'];
    $p = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM products WHERE product_id=$product_id"));
    if (!$p) continue;
    $title = mysqli_real_escape_string($con, $p['product_title']);
    $price = (float)$p['product_price'];
    mysqli_query($con, "INSERT INTO order_items (order_id, product_id, product_title, product_price, quantity) 
        VALUES ($order_id, $product_id, '$title', $price, $qty)");
}

// Clear cart
mysqli_query($con, "DELETE FROM cart_details WHERE ip_address='$ip'");

// Return JSON response
echo json_encode(['success' => true, 'order_id' => $order_id]);
