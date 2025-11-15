<?php
include('../includes/connect.php');
include('../functions/common_function.php');
session_start();
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Checkout - FurniJoy</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    /* keep your styling or paste previous styles */
  </style>
</head>
<body>
  <div class="container mt-5">
    <h1 class="text-center">Payment Options</h1>
    <form id="checkoutForm">
      <div class="row mt-4">
        <div class="col-md-7">
          <div class="card p-3">
            <h5>Basic Details</h5>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label>Name</label>
                <input id="name" name="name" class="form-control" required>
              </div>
              <div class="form-group col-md-6">
                <label>Email</label>
                <input id="email" name="email" type="email" class="form-control" required>
              </div>
              <div class="form-group col-md-6">
                <label>Phone</label>
                <input id="phone" name="phone" class="form-control" required>
              </div>
              <div class="form-group col-md-6">
                <label>Pincode</label>
                <input id="pincode" name="pincode" class="form-control" required>
              </div>
              <div class="form-group col-12">
                <label>Address</label>
                <textarea id="address" name="address" class="form-control" rows="4" required></textarea>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-5">
          <div class="card p-3">
            <h5>Order Details</h5>
            <hr>
            <h5>Total Price: <span class="float-end"><strong>Rs. <?= total_cart_price(); ?></strong></span></h5>
            <div class="mt-3">
              <!-- COD: simple form post to place order -->
              <button id="placeCod" type="button" class="btn btn-success w-100 mb-2">Confirm and Place Order | COD</button>

              <!-- PayPal button container -->
              <div id="paypal-button-container"></div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>

  <!-- PayPal SDK: use your client-id here (sandbox/live) -->
 <script src="https://www.paypal.com/sdk/js?client-id=AbnnB1cwRzdrm41Wz21Hj2S8mNTXyOeHgi0PEJr80Gvb6e6HB8Ab34EVc0ubvSdCXlu-2-EcXkExrUe3&currency=USD"></script>


  <script>
    // ================= COD flow =================
    $('#placeCod').on('click', function() {
      // basic validation
      var data = {
        name: $('#name').val().trim(),
        email: $('#email').val().trim(),
        phone: $('#phone').val().trim(),
        pincode: $('#pincode').val().trim(),
        address: $('#address').val().trim(),
      };
      if (!data.name || !data.email || !data.phone || !data.pincode || !data.address) {
        alert('All fields are required for COD');
        return;
      }

      // submit to server-side script to place COD order
      $.post('place_cod_order.php', data, function(resp) {
        if (resp.success) {
          alert('Order placed successfully (COD). Order ID: ' + resp.order_id);
          window.location.href = 'order_success.php?order_id=' + resp.order_id;
        } else {
          alert('Could not place order: ' + (resp.error || 'Unknown error'));
        }
      }, 'json').fail(function() {
        alert('Server error placing order.');
      });
    });

    // ================= PayPal Buttons =================
    paypal.Buttons({
      onClick: function() {
        // client-side validation before creating PayPal order
        if (!$('#name').val().trim() || !$('#email').val().trim() || !$('#phone').val().trim() || !$('#pincode').val().trim() || !$('#address').val().trim()) {
          alert('Please fill all buyer details before proceeding to PayPal.');
          return false;
        }
      },

      createOrder: function(data, actions) {
        // call server to create a PayPal order and save draft order
        var payload = {
          name: $('#name').val().trim(),
          email: $('#email').val().trim(),
          phone: $('#phone').val().trim(),
          pincode: $('#pincode').val().trim(),
          address: $('#address').val().trim()
        };
        return fetch('../api/create_paypal_order.php', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
          },
          body: new URLSearchParams(payload).toString()
        }).then(function(res) {
          return res.json();
        }).then(function(data) {
          if (data.id) return data.id;
          return Promise.reject(data);
        });
      },

      onApprove: function(data, actions) {
        // capture on server and finalize DB
        return fetch('../api/capture_paypal_order.php', {
          method: 'POST',
          body: JSON.stringify({ orderID: data.orderID }),
          headers: {
            'Content-Type': 'application/json'
          }
        }).then(function(res) {
          return res.json();
        }).then(function(orderData) {
          if (orderData.status === 'success' || orderData.local_order_id) {
            // redirect or show success
            window.location.href = 'order_success.php?order_id=' + orderData.local_order_id;
          } else {
            alert('Payment failed or could not be captured.');
            console.error(orderData);
          }
        });
      },

      onError: function(err) {
        console.error('PayPal Buttons error', err);
        alert('An error occurred with PayPal: ' + err);
      }

    }).render('#paypal-button-container');
  </script>
</body>
</html>
