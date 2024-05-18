<?php
// Include database connection file
include 'db.php';
session_start();

// Check if the user is not logged in, redirect to login page
if (!isset($_SESSION["username"])) {
    header("Location: admin-login.php");
    exit();
}

// Check if user ID is set in the POST request
if(isset($_POST['delete_user'])) {
    // Sanitize the user ID
    $user_id = $_POST['user_id'];

    // Prepare SQL statement to delete associated orders
    $delete_orders_sql = "DELETE FROM orders WHERE user_id = '$user_id'";

    // Execute the SQL query to delete associated orders
    if ($conn->query($delete_orders_sql) === TRUE) {
        // Proceed with deleting the user
        $delete_user_sql = "DELETE FROM users WHERE user_id = '$user_id'";
        if ($conn->query($delete_user_sql) === TRUE) {
            $success_message = "User and associated orders deleted successfully.";
        } else {
            $error_message = "Error deleting user: " . $conn->error;
        }
    } else {
        $error_message = "Error deleting associated orders: " . $conn->error;
    }
}

if (isset($_POST['mark_delivered'])) {
    $order_id = $_POST['order_id'];
    // Update SQL query to mark order as delivered
    $update_sql = "UPDATE orders SET delivered = 1 WHERE order_id = '$order_id'";
    if ($conn->query($update_sql) === TRUE) {
        $success_message = "Order marked as delivered successfully.";
    } else {
        $error_message = "Error marking order as delivered: " . $conn->error;
    }
}

$sql = "SELECT * FROM contact_us";
$result = $conn->query($sql);


// Query to count total products
$sql = "SELECT COUNT(*) AS total_products FROM products";
$result = $conn->query($sql);
$total_products = ($result->num_rows > 0) ? $result->fetch_assoc()['total_products'] : 0;

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all required fields are filled
    if (isset($_POST['productName']) && isset($_POST['productDescription']) && isset($_FILES['productImage'])) {
        $productName = $_POST['productName'];
        $productDescription = $_POST['productDescription'];

        // Upload product image
        $targetDirectory = "product_images/";
        $targetFile = $targetDirectory . basename($_FILES["productImage"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["productImage"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            echo "";
            $uploadOk = 0;
        }

        // Check if file already exists
        if (file_exists($targetFile)) {
            echo "";
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["productImage"]["size"] > 500000) {
            echo "file is too large.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif") {
            echo "JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "";
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["productImage"]["tmp_name"], $targetFile)) {
                // Insert product details into database
                $sql = "INSERT INTO products (product_name, product_description, product_image) 
                        VALUES ('$productName', '$productDescription', '$targetFile')";
                if ($conn->query($sql) === TRUE) {
                    echo "New product added successfully.";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    } else {
        echo "";
    }
}

// Query to count total contact form submissions
$sql_contact_count = "SELECT COUNT(*) AS total_contact FROM contact_us";
$result_contact_count = $conn->query($sql_contact_count);
$total_contact = ($result_contact_count->num_rows > 0) ? $result_contact_count->fetch_assoc()['total_contact'] : 0;


// Function to mark order as delivered
function markAsDelivered($order_id) {
    global $conn;
    // Update the order status to mark it as delivered
    $sql = "UPDATE orders SET delivered = 1 WHERE order_id = '$order_id'";
    if ($conn->query($sql) === TRUE) {
        return true; // Successfully marked as delivered
    } else {
        return false; // Failed to mark as delivered
    }
}

// Fetch total number of users
$sql_count = "SELECT COUNT(*) AS total_users FROM users";
$result_count = $conn->query($sql_count);
$total_users = ($result_count->num_rows > 0) ? $result_count->fetch_assoc()['total_users'] : 0;

// Query to count total orders
$sql = "SELECT COUNT(*) AS total_orders FROM orders";
$result = $conn->query($sql);
$total_orders = ($result->num_rows > 0) ? $result->fetch_assoc()['total_orders'] : 0;

// Fetch users from the database
$sql = "SELECT * FROM users";
$result = $conn->query($sql);
?>




<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <title>Admin Panel</title>
        <link rel="stylesheet" href="css/admin.css">
    </head>
    <body>
        <div class="header">
            <div class="left">
                <a href="#" id="small-none">Admin Panel</a>
            </div>
            <div class="right">
                <i></i>
                <a href="logout.php">Logout</a>
            </div>
        </div>

        <div id="sidebar">
            <ul>
                <li>
                    <a href="#" onclick="showData('productss')"><i class="fas fa-cogs"></i>Add Products</a>
                </li>
                <li>
                    <a href="#" onclick="showData('users')"><i class="fas fa-blog"></i>Manage Users</a>
                </li>
                <li>
                    <a href="#" onclick="showData('order')"><i class="fas fa-cog"></i>order</a>
                </li>
                <li>
                    <a href="#" onclick="showData('contact')"><i class="fas fa-truck"></i>contact</a>
                </li>
            </ul>
        </div>

        <div id="content">
            <h1>Admin Panel</h1>
            <div class="data-container">
                <div class="main-counter">


                    <div class="counter">
                        <p id="count"><?php echo $total_users; ?></p>
                        <p>Total Users</p>
                    </div>

                    <div class="counter">
                        <p id="count"><?php echo $total_orders; ?></p>
                        <p>total orders</p>
                    </div>

                    <div class="counter">
                        <p id="count"><?php echo $total_products; ?></p>
                        <p>Total Products</p>
                    </div>

                    <div class="counter">
                        <p id="count"><?php echo $total_contact; ?></p>
                        <p>contact</p>
                    </div>

                </div>
            </div>




            <div id="productss" class="data-container products-data-container" style="display: none;">
                <h2 style="color: #528aaf;">Products</h2>
                <form method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="productName">Product Name:</label>
                        <input type="text" class="form-control" id="productName" name="productName" required>
                    </div>
                    <div class="form-group">
                        <label for="productDescription">Product Description:</label>
                        <textarea class="form-control" id="productDescription" name="productDescription" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="productImage">Product Image:</label>
                        <input type="file" class="form-control-file" id="productImage" name="productImage" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Product</button>
                </form>
            </div>


            <!-- users -->







            <div id="users" class="data-container" style="display: none;">
                <h2 style="color: #528aaf;">Manage Users</h2>
                
                <h2 style="color: #528aaf;">Users</h2>
            <?php if(isset($success_message)) echo "<div class='alert alert-success'>$success_message</div>"; ?>
            <?php if(isset($error_message)) echo "<div class='alert alert-danger'>$error_message</div>"; ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>User ID</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Display users in table format
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['user_id'] . "</td>";
                            echo "<td>" . $row['username'] . "</td>";
                            echo "<td>" . $row['email'] . "</td>";
                            echo "<td>
                                    <form method='POST' action=''>
                                        <input type='hidden' name='user_id' value='" . $row['user_id'] . "'>
                                        <button type='submit' class='btn btn-danger' name='delete_user' onclick=\"return confirm('Are you sure you want to delete this user?')\">Delete</button>
                                    </form>
                                  </td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4'>No users found</td></tr>";
                    }
                    ?>
                </tbody>
            </table>

            </div>



            <div id="order" class="data-container" style="display: none;">
                <h2 style="color: #528aaf;">order</h2>
                <h4>Orders List</h4>
                <div class="table-responsive">
                    <table class="table">
                        <!-- Table headers -->
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>User ID</th>
                                <th>Purpose</th>
                                <th>Size</th>
                                <th>Quantity</th>
                                <th>Area</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <!-- Table body -->
                        <tbody>
                            <?php
                            // Fetch orders from the database
                            $sql = "SELECT * FROM orders";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>{$row['order_id']}</td>";
                                    echo "<td>{$row['user_id']}</td>";
                                    echo "<td>{$row['purpose']}</td>";
                                    echo "<td>{$row['size']}</td>";
                                    echo "<td>{$row['quantity']}</td>";
                                    echo "<td>{$row['area']}</td>";
                                    echo "<td>{$row['address']}</td>";
                                    echo "<td>{$row['phone']}</td>";
                                    echo "<td>";
                                    // Display mark as delivered button if not delivered
                                    if ($row['delivered'] != 1) {
                                        echo "<form method='post'>";
                                        echo "<input type='hidden' name='order_id' value='{$row['order_id']}'>";
                                        echo "<button type='submit' class='btn btn-success' name='mark_delivered'>Mark Delivered</button>";
                                        echo "</form>";
                                    } else {
                                        echo "Delivered";
                                    }
                                    echo "</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='9'>No orders found.</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <?php if(isset($error_message)) echo "<div class='alert alert-danger'>$error_message</div>"; ?>

            </div>






            <div id="contact" class="data-container" style="display: none;">
                <h2 style="color: #528aaf;">Contact Form Submissions</h2>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Subject</th>
                                <th>Message</th>
                                <th>Submission Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Fetch contact form submissions from the database
                            $sql_contact = "SELECT * FROM contact_us";
                            $result_contact = $conn->query($sql_contact);

                            if ($result_contact->num_rows > 0) {
                                while ($row = $result_contact->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>{$row['id']}</td>";
                                    echo "<td>{$row['name']}</td>";
                                    echo "<td>{$row['email']}</td>";
                                    echo "<td>{$row['subject']}</td>";
                                    echo "<td>{$row['message']}</td>";
                                    echo "<td>{$row['submission_time']}</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='6'>No contact form submissions found.</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div id="track" class="data-container" style="display: none;">
                <h2 style="color: #528aaf;">track</h2>

            </div>




        </div>

        <div class="toggler" onclick="toggleSidebar()"></div>

        <script>
            function toggleSidebar() {
                var sidebar = document.getElementById("sidebar");
                if (sidebar.style.display === "none" || window.getComputedStyle(sidebar).display === "none") {
                    sidebar.style.display = "block";
                } else {
                    sidebar.style.display = "none";
                }
            }

            function showData(section) {
                if (window.innerWidth <= 768) {
                    toggleSidebar(); // Close the sidebar when a link is clicked on small screens
                }
                document.querySelectorAll(".data-container").forEach(function (el) {
                    el.style.display = "none";
                });
                document.getElementById(section).style.display = "block";
            }
        </script>
    </body>
</html>
