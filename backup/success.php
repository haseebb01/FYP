<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Payment Successful</title>
  <style>
    /* Your CSS styles go here */
    body {
      font-family: Arial, sans-serif;
      text-align: center;
    }
    .success-message {
      margin-top: 100px;
      font-size: 24px;
    }
  </style>
</head>
<body>

  <div class="success-message">
    <h1>Payment Successful!</h1>
    <p>Thank you for your payment.</p>
    <p>Redirecting you to your page...</p>
  </div>

  <script>
    setTimeout(function() {
      window.location.href = "categorized-product.php";
    }, 3000);
  </script>

</body>
</html>
