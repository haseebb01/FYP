<?php
session_start();

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

// Check if user is not logged in, redirect to login page
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

// Update the SQL query to fetch orders from the database to include the status column
$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM orders WHERE user_id = '$user_id'";
$order_result = $conn->query($sql);
$orders = [];
if ($order_result->num_rows > 0) {
    while ($row = $order_result->fetch_assoc()) {
        $orders[] = $row;
    }
}

// Fetch user details from the database
$sql = "SELECT * FROM users WHERE user_id = '$user_id'";
$result = $conn->query($sql);
if ($result->num_rows == 1) {
    $user = $result->fetch_assoc();
} else {
    // Redirect to login page if user not found
    header("Location: login.php");
    exit;
}

// Logout functionality
if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: login.php");
    exit;
}
// Delete order functionality
if (isset($_POST['deleteOrder'])) {
    $order_id = $_POST['order_id'];
    $delete_sql = "DELETE FROM orders WHERE order_id = '$order_id' AND user_id = '$user_id'";
    if ($conn->query($delete_sql) === TRUE) {
        header("Location: categorized-product.php");
        exit;
    } else {
        $error_message = "Error deleting order: " . $conn->error;
    }
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['addToCart'])) {
        $purpose = $_POST['purpose'];
        $size = $_POST['size'];
        $quantity = $_POST['quantity'];
        $area = $_POST['area'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $payment_method = $_POST['payment_method']; // Get selected payment method

        // Calculate price based on purpose and size
        $price = 0;
        if ($purpose == 'commercial') {
            if ($size == 'small') {
                $price = 10;
            } elseif ($size == 'medium') {
                $price = 15;
            } elseif ($size == 'large') {
                $price = 20;
            }
        } elseif ($purpose == 'residence') {
            if ($size == 'small') {
                $price = 8;
            } elseif ($size == 'medium') {
                $price = 12;
            } elseif ($size == 'large') {
                $price = 16;
            }
        }

        // Adjust price if payment method is 'card'
        if ($payment_method == 'card') {
            $price += 2; // Add $2 for card payment
        }

        // Generate tracker ID
        $tracker_id = uniqid();

        // Calculate total price
        $total_price = $price * $quantity;

        // Insert order into database along with payment method and tracker ID
        $sql = "INSERT INTO orders (user_id, purpose, size, quantity, area, address, phone, payment_method, price, tracker_id) 
                VALUES ('$user_id', '$purpose', '$size', '$quantity', '$area', '$address', '$phone', '$payment_method', '$total_price', '$tracker_id')";
        if ($conn->query($sql) === TRUE) {
            $success_message = "Cylinder added to cart successfully.";
            echo "<script>
            window.location.href='stripe/index.php?price=100';
            </script>";
        } else {
            $error_message = "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gas Cylinder Selection</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url(assets/images/backcom.webp);
            padding: 20px;
        }

        .container {
            max-width: 1200px;
            background-color: #e0e0e0;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 0 auto;
        }

        h2 {
            color: #333;
            margin-bottom: 20px;
        }

        label {
            margin-bottom: 5px;
        }

        select,
        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box;
        }

        button {
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Welcome "<?php echo $user['username']; ?>" to Order Place</h2>
        <!-- Display user details -->
        <div class="row">
            <div class="col-md-12 mb-5 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">User Details</h5>
                        <p class="card-text"><strong>User ID:</strong> <?php echo $user['user_id']; ?></p>
                        <p class="card-text"><strong>Email:</strong> <?php echo $user['email']; ?></p>
                    </div>
                </div>
            </div>
        </div>

        <h3>Add Cylinder to Cart</h3>
        <form method="post">
            <!-- Your existing form fields -->
            <div class="form-group">
                <label for="tracker_id">Tracker ID:</label>
                <input type="text" id="tracker_id" name="tracker_id" class="form-control" value="<?php echo uniqid(); ?>" readonly>
            </div>
            <div class="form-group">
                <label for="purpose">Select For Purpose:</label>
                <select id="purpose" name="purpose" class="form-control" required>
                    <option value="">Select Purpose</option>
                    <option value="residence">Residence</option>
                    <option value="commercial">Commercial</option>
                </select>
            </div>
            <div class="form-group">
                <label for="size">Select Size:</label>
                <select id="size" name="size" class="form-control" required>
                    <option value="">Select Size</option>
                    <option value="2kg">2kg</option>
                    <option value="6kg">6kg</option>
                    <option value="12kg">12kg</option>
                </select>
            </div>
            <div class="form-group">
                <label for="quantity">Quantity:</label>
                <input type="number" id="quantity" name="quantity" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="area">Area:</label>
                <select id="area" name="area" class="form-control" required>
                    <option value="">Select Area</option>
                    <option value="Farid Town">Farid Town</option>
                    <option value="Shadman Town">Shadman Town</option>
                    <option value="Barkat Town">Barkat Town</option>
                    <option value="Global Villas">Global Villas</option>
                </select>
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" id="address" name="address" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="tel" id="phone" name="phone" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Select Payment Method:</label><br>
               
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Welcome "<?php echo $user['username']; ?>" to Order Place</h2>
        <!-- Display user details -->
        <div class="row">
            <div class="col-md-12 mb-5 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">User Details</h5>
                        <p class="card-text"><strong>User ID:</strong> <?php echo $user['user_id']; ?></p>
                        <p class="card-text"><strong>Email:</strong> <?php echo $user['email']; ?></p>
                    </div>
                </div>
            </div>
        </div>

        <h3>Add Cylinder to Cart</h3>
        <form method="post">
            <!-- Your existing form fields -->
            <div class="form-group">
                <label for="tracker_id">Tracker ID:</label>
                <input type="text" id="tracker_id" name="tracker_id" class="form-control" value="<?php echo uniqid(); ?>" readonly>
            </div>
            <div class="form-group">
                <label for="purpose">Select For Purpose:</label>
                <select id="purpose" name="purpose" class="form-control" required>
                    <option value="">Select Purpose</option>
                    <option value="residence">Residence</option>
                    <option value="commercial">Commercial</option>
                </select>
            </div>
            <div class="form-group">
                <label for="size">Select Size:</label>
                <select id="size" name="size" class="form-control" required>
                    <option value="">Select Size</option>
                    <option value="2kg">2kg</option>
                    <option value="6kg">6kg</option>
                    <option value="12kg">12kg</option>
                </select>
            </div>
            <div class="form-group">
                <label for="quantity">Quantity:</label>
                <input type="number" id="quantity" name="quantity" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="area">Area:</label>
                <select id="area" name="area" class="form-control" required>
                    <option value="">Select Area</option>
                    <option value="Farid Town">Farid Town</option>
                    <option value="Shadman Town">Shadman Town</option>
                    <option value="Barkat Town">Barkat Town</option>
                    <option value="Global Villas">Global Villas</option>
                </select>
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" id="address" name="address" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="tel" id="phone" name="phone" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Select Payment Method:</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="payment_method" id="payByCard" value="card" required>
                    <label class="form-check-label" for="payByCard">Pay by Card</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="payment_method" id="payByHand" value="hand" required>
                    <label class="form-check-label" for="payByHand">Pay by Hand</label>
                </div>
            </div>
            <button type="submit" name="addToCart" class="btn btn-primary">Add to Cart</button>
            <?php if(isset($success_message)) echo "<div class='alert alert-success mt-3'>$success_message</div>"; ?>
            <?php if(isset($error_message)) echo "<div class='alert alert-danger mt-3'>$error_message</div>"; ?>
        </form>

        <!-- Display user's orders -->
        <h3>My Orders</h3>
        <?php if (!empty($orders)) : ?>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Tracker ID</th>
                            <th>Purpose</th>
                            <th>Size</th>
                            <th>Quantity</th>
                            <th>Area</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Payment Method</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($orders as $order) : ?>
                            <tr>
                                <td><?php echo $order['order_id']; ?></td>
                                <td><?php echo $order['tracker_id']; ?></td>
                                <td><?php echo ucfirst($order['purpose']); ?></td>
                                <td><?php echo ucfirst($order['size']); ?></td>
                                <td><?php echo $order['quantity']; ?></td>
                                <td><?php echo $order['area']; ?></td>
                                <td><?php echo $order['address']; ?></td>
                                <td><?php echo $order['phone']; ?></td>
                                <td><?php echo ucfirst($order['payment_method']); ?></td>
                                <td><?php echo $order['price']; ?></td>
                                <td>
                                    <?php
                                    if ($order['delivered'] == 1) {
                                        echo '<span style="color: green;">Delivered</span>';
                                    } else {
                                        echo '<span style="color: red;">Pending</span>';
                                    }
                                    ?>
                                </td>
                                <td>
                                    <form method="post" style="display: inline;">
                                        <input type="hidden" name="order_id" value="<?php echo $order['order_id']; ?>">
                                        <button type="submit" name="deleteOrder" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this order?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php else : ?>
            <p>No orders found.</p>
        <?php endif; ?>
    </div>
</body>
</html>



<!-- HTML !-->

/* CSS */
