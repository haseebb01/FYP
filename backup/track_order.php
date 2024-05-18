<?php
// Include database connection file
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "my_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if order ID is provided
if (isset($_POST['order_id'])) {
    $order_id = $_POST['order_id'];

    // Retrieve order details from the database
    $sql = "SELECT * FROM orders WHERE order_id = '$order_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $order = $result->fetch_assoc();

        // Update order status if necessary
        $sql_update = "UPDATE orders SET order_status = 
                        CASE 
                            WHEN TIMESTAMPDIFF(SECOND, order_date, NOW()) >= 10 AND order_status = 'Pending' THEN 'order is being ready'
                            WHEN TIMESTAMPDIFF(SECOND, order_date, NOW()) >= 0 AND order_status = 'order is being ready' THEN 'on the way'
                            WHEN TIMESTAMPDIFF(SECOND, order_date, NOW()) >= 30 AND order_status = 'on the way' THEN 'At your city'
                            ELSE order_status
                        END
                        WHERE order_id = '$order_id'";
        $conn->query($sql_update);
        
        // Check if the order status is 'At your city'
        if ($order['order_status'] == 'At your city') {
            echo '<script>window.onload = function() { setTimeout(function() { window.location.href = "categorized-product.php"; }, 5000); }</script>';
        }
    } else {
        echo "Order not found.";
        exit;
    }
} else {
    echo "Order ID not provided.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Track Order</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Add your custom styles here */
    </style>
</head>
<body>
    <div class="container">
        <h2>Order Details</h2>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Order ID: <?php echo $order['order_id']; ?></h5>
                <p class="card-text"><strong>Purpose:</strong> <?php echo ucfirst($order['purpose']); ?></p>
                <p class="card-text"><strong>Size:</strong> <?php echo ucfirst($order['size']); ?></p>
                <p class="card-text"><strong>Quantity:</strong> <?php echo $order['quantity']; ?></p>
                <p class="card-text"><strong>Area:</strong> <?php echo $order['area']; ?></p>
                <p class="card-text"><strong>Address:</strong> <?php echo $order['address']; ?></p>
                <p class="card-text"><strong>Phone:</strong> <?php echo $order['phone']; ?></p>
                <p class="card-text"><strong>Payment Method:</strong> <?php echo ucfirst($order['payment_method']); ?></p>
                <p class="card-text"><strong>Price:</strong> <?php echo $order['price']; ?></p>
                <p class="card-text"><strong>Status:</strong> <span id="order-status"><?php echo $order['order_status']; ?></span></p>
            </div>
        </div>
    </div>

    <script>
        // Function to refresh the page every 5 seconds
        setInterval(function(){
            location.reload();
        }, 5000); // 5000 milliseconds = 5 seconds
    </script>
</body>
</html>
