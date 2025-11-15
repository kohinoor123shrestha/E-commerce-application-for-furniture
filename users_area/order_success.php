<?php
// order_success.php
include('includes/connect.php');
?>
<!doctype html>
<html>
<head><title>Order Success</title></head>
<body>
  <div class="container mt-5">
    <h1>Thank you! Your order was placed.</h1>
    <?php if (isset($_GET['order_id'])): ?>
      <p>Your Order ID: <strong><?= htmlspecialchars($_GET['order_id']) ?></strong></p>
    <?php endif; ?>
    <a href="index.php">Continue shopping</a>
  </div>
</body>
</html>
