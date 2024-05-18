<?php
// Start the session
session_start();

// Check if user is not logged in, redirect to login page
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
// Check if the session variables are set
if (isset($_SESSION['username']) && isset($_SESSION['profilePicUrl'])) {
    $username = $_SESSION['username'];
    $profilePicUrl = $_SESSION['profilePicUrl'];
} else {
    // Redirect back to the profile management page if session variables are not set
    header("Location: profile.php");
    exit;
}
// Include database connection file
include 'db.php';

// Fetch user details from the database
$user_id = $_SESSION['user_id'];
$stmt = $conn->prepare("SELECT username FROM users WHERE user_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $username = $row['username'];
} else {
    // Redirect to login if user details not found
    header("Location: login.php");
    exit;
}
$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="Products.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body{
            background-color: #28537e;
        }
        .modal-content {
            margin-top: 50px;
        }
        .modal-footer {
            justify-content: center;
        }
        .user-profile {
            text-align: center;
        }

        .user-profile img {
            border-radius: 50%;
            width: 150px;
            height: 150px;
            margin-bottom: 15px;
        }

        .user-profile p {
            font-size: 20px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2>Welcome, <?php echo $username; ?>!</h2>
        <div class="alert alert-success" role="alert">
            You are now logged in.
            <div class="user-profile">
        <p><?php echo $username; ?></p>
    </div>
        </div>
        <div class="btn-group" role="group">
            <a href="profile.php" class="btn btn-primary">Manage Profile</a>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#rateListModal">
                View Rate List
            </button>
            <a href="logout.php" class="btn btn-danger">Logout</a> <!-- Added Logout button -->
        </div>
    </div>

    <section class="services">
    <div class="container">
        <h2 class="services-title">Our Products</h2>
        <div class="row">
            <?php
            // Include database connection file
            include 'db.php';

            // Fetch products from the database
            $sql = "SELECT * FROM products";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Loop through each product and generate HTML
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <div class="col-md-4" style="cursor: pointer;">
                        <div class="card">
                            <div class="" style="height: 200px;">
                                <img src="<?php echo $row['product_image']; ?>" class="w-100 h-100 card-img-top" alt="Product Image">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row['product_name']; ?></h5>
                                <p class="card-text" style="color:black;"><?php echo $row['product_description']; ?></p>
                                <a href="categorized-product.php" class="btn btn-primary">Buy Products</a>
                            </div>
                        </div>
                    </div>
                <?php }
            } else {
                echo "No products found.";
            }
            ?>
        </div>

    </div>
</section>









    <!-- Modal -->
<div class="modal fade " id="rateListModal" tabindex="-1" role="dialog" aria-labelledby="rateListModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="rateListModalLabel">Gas Cylinder Rate List</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body m-5">
                <h5>Commercial Purpose:</h5>
                <ul>
                    <li>Small Cylinder: $10</li>
                    <li>Medium Cylinder: $15</li>
                    <li>Large Cylinder: $20</li>
                </ul>
                <h5>Residence Purpose:</h5>
                <ul>
                    <li>Small Cylinder: $8</li>
                    <li>Medium Cylinder: $12</li>
                    <li>Large Cylinder: $16</li>
                </ul>
            </div>
            <div class="modal-footer">
                Payment by hand acceptable.
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        function showSelectedProduct() {
            var selectedProduct = document.getElementById("productDropdown").value;
            if (selectedProduct === "product1") {
                window.location.href = "residence.php";
            } else if (selectedProduct === "product2") {
                window.location.href = "commercial.php";
            } else {
                alert("Please select a product before submitting.");
            }
        }
    </script>
</body>
</html>
