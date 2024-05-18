<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gas Cylinder Shop</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #ffffff;
            background-image: url(assets/images/payment.png);
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: rgba(255, 255, 255, 0.1);
            padding: 20px;
            border-radius: 10px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .payment-button {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="payment-method">
        <h3>Payment Method</h3>
        <form>
            <div class="container">
                <div class="form-group">
                    <label for="paymentMethod">Choose Payment Method:</label>
                    <select class="form-control" id="paymentMethod">
                        <option value="mastercard">Mastercard</option>
                        <option value="visa">Visa</option>
                        <option value="cash">Cash on Delivery</option>
                    </select>
                </div>
            </div>

            <div class="container mt-5" id="cardDetails">
                <div class="form-group">
                    <label for="cardNumber">Card Number:</label>
                    <input type="text" class="form-control" id="cardNumber" placeholder="Enter card number" />
                </div>
                <div class="form-group">
                    <label for="expiryDate">Expiry Date:</label>
                    <input type="text" class="form-control" id="expiryDate" placeholder="MM/YYYY" />
                </div>
                <div class="form-group">
                    <label for="cvv">CVV:</label>
                    <input type="text" class="form-control" id="cvv" placeholder="Enter CVV" />
                </div>
            </div>

            <button type="button" class="btn btn-primary payment-button" onclick="submitOrder()">Submit Payment</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        function submitOrder() {
            var paymentMethod = document.getElementById("paymentMethod").value;
            if (paymentMethod === "cash") {
                window.location.href = "trackingorder.php";
                alert("Order placed successfully! Thank you for your purchase.");
            } else {
                var cardNumber = document.getElementById("cardNumber").value;
                var expiryDate = document.getElementById("expiryDate").value;
                var cvv = document.getElementById("cvv").value;

                // Perform validation for card details
                if (cardNumber === "" || expiryDate === "" || cvv === "") {
                    alert("Please fill in all the required fields.");
                } else {
                    window.location.href = "trackingorder.php";
                    alert("Payment submitted successfully! Thank you for your purchase.");
                }
            }
        }

        document.getElementById("paymentMethod").addEventListener("change", function () {
            var cardDetails = document.getElementById("cardDetails");
            cardDetails.style.display = this.value === "cash" ? "none" : "block";
        });
    </script>
</body>
</html>
