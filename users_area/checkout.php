<?php
include('../includes/connect.php');
include('../functions/common_function.php');
session_start();

// Calculate total cart price
// Assuming total_cart_price() returns the total price
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Furniture Website - Payment</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
        .profile-section {
            background-color: #f9f9f9;
            /* Dark grey */
            color:black;
            /* White text */
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .profile-section h5 {
            color: black;
            /* White text */
            margin-top: 0;
        }

        .order-details {
            background-color: #f9f9f9;
            /* Light grey */
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .form-control:focus {
            border-color: #5dbea3;
            box-shadow: none;
        }

        .btn-success {
            background-color: #5dbea3;
            border-color: #5dbea3;
        }

        .btn-success:hover {
            background-color: #4ca682;
            border-color: #4ca682;
        }

        .btn-success:focus {
            background-color: #3c7f5a;
            border-color: #3c7f5a;
            box-shadow: none;
        }
    </style>
</head>

<body><br>
<H1 style="text-align: center;"><b>Payment Options</b></H1>
<br>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-7">
                <div class="profile-section">
                    <h5>Basic Details</h5>
                    <hr>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="fw-bold">Name</label>
                            <input type="text" name="name" id="name" required placeholder="Enter your name" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="fw-bold">Email</label>
                            <input type="email" name="email" id="email" required placeholder="Enter your email" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="fw-bold">Phone</label>
                            <input type="text" name="phone" id="phone" required placeholder="Enter your contact" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="fw-bold">Pin Code</label>
                            <input type="text" name="pincode" id="pincode" required placeholder="Enter your pincode" class="form-control">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="fw-bold">Address</label>
                            <textarea name="address" id="address" required class="form-control" rows="5"></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-5">
                <div class="order-details">
                    <h5>Order Details</h5>
                    <hr>
                    <h5>Total Price: <span class="float-end fw-bold">Rs.<?= $total_price = total_cart_price(); ?></span></h5>
                    <div>
                        <input type="hidden" name="payment_mode" value="COD">
                        <button type="submit" name="placeOrderBtn" class="btn btn-success w-100">Confirm and Place Order | COD</button>
                    </div>
                    <div id="paypal-button-container" class="mt-3"></div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://www.paypal.com/sdk/js?client-id=AS5peBGb9d-GQzV4U7fXciXpD5OA0CoLoXBRdiEdK6Jnt0qYggi0xND170DAmuApMK11zjdvF5tNjcL2"></script>
    <script>
        var name = $('#name').val();
        var email = $('#email').val();
        var phone = $('#phone').val();
        var pincode = $('#pincode').val();
        car address = $('#address').val();
    </script>
    <script>
        window.paypal.Buttons({
            onclick: function() {
                var name = $('#name').val();
                var email = $('#email').val();
                var phone = $('#phone').val();
                var pincode = $('#pincode').val();
                var address = $('#address').val();

                if (name.trim() === '') {
                    alert("Name is required");
                    return false;
                }
                if (email.trim() === '') {
                    alert("Email is required");
                    return false;
                }
                if (phone.trim() === '') {
                    alert("Phone is required");
                    return false;
                }
                if (pincode.trim() === '') {
                    alert("Pincode is required");
                    return false;
                }
                if (address.trim() === '') {
                    alert("Address is required");
                    return false;
                }
            },
            async createOrder() {
                try {
                    const response = await fetch("/api/orders", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                        },
                        // use the "body" param to optionally pass additional order information
                        // like product ids and quantities
                        body: JSON.stringify({
                            cart: [{
                                id: "YOUR_PRODUCT_ID",
                                quantity: "YOUR_PRODUCT_QUANTITY",
                            }, ],
                        }),
                    });

                    const orderData = await response.json();

                    if (orderData.id) {
                        return orderData.id;
                    } else {
                        const errorDetail = orderData?.details?.[0];
                        const errorMessage = errorDetail ?
                            `${errorDetail.issue} ${errorDetail.description} (${orderData.debug_id})` :
                            JSON.stringify(orderData);

                        throw new Error(errorMessage);
                    }
                } catch (error) {
                    console.error(error);
                    resultMessage(`Could not initiate PayPal Checkout...<br><br>${error}`);
                }
            },
            async onApprove(data, actions) {
                try {
                    const response = await fetch(`/api/orders/${data.orderID}/capture`, {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                        },
                    });

                    const orderData = await response.json();
                    // Three cases to handle:
                    //   (1) Recoverable INSTRUMENT_DECLINED -> call actions.restart()
                    //   (2) Other non-recoverable errors -> Show a failure message
                    //   (3) Successful transaction -> Show confirmation or thank you message

                    const errorDetail = orderData?.details?.[0];

                    if (errorDetail?.issue === "INSTRUMENT_DECLINED") {
                        // (1) Recoverable INSTRUMENT_DECLINED -> call actions.restart()
                        // recoverable state, per https://developer.paypal.com/docs/checkout/standard/customize/handle-funding-failures/
                        return actions.restart();
                    } else if (errorDetail) {
                        // (2) Other non-recoverable errors -> Show a failure message
                        throw new Error(`${errorDetail.description} (${orderData.debug_id})`);
                    } else if (!orderData.purchase_units) {
                        throw new Error(JSON.stringify(orderData));
                    } else {
                        // (3) Successful transaction -> Show confirmation or thank you message
                        // Or go to another URL:  actions.redirect('thank_you.html');
                        const transaction =
                            orderData?.purchase_units?.[0]?.payments?.captures?.[0] ||
                            orderData?.purchase_units?.[0]?.payments?.authorizations?.[0];
                        resultMessage(
                            `Transaction ${transaction.status}: ${transaction.id}<br><br>See console for all available details`,
                        );
                        console.log(
                            "Capture result",
                            orderData,
                            JSON.stringify(orderData, null, 2),
                        );
                    }
                } catch (error) {
                    console.error(error);
                    resultMessage(
                        `Sorry, your transaction could not be processed...<br><br>${error}`,
                    );
                }
            },
        }).render("#paypal-button-container");
    </script>
</body>

</html>
