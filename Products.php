<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gas Cylinder Delivery | Home</title>
    <link rel="stylesheet" href="Products.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700&display=swap">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <style>
.product-card {
    position: relative;
    border-radius: 10px;
    overflow: hidden;
    height: 320px;
}

.product-image {
    width: 100%;
    height: 100%;
    filter: blur(5px);
    transition: filter 0.3s ease;
}

.product-card:hover .product-image {
    filter: blur(0);
}

.product-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.5); /* Adjust the opacity as needed */
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    padding: 20px;
    text-align: center;
    color: white;
    transition: background 0.3s ease;
}

.product-card:hover .product-overlay {
    background: rgba(0, 0, 0, 0.7); /* Adjust the hover opacity as needed */
}

.product-overlay h2,
.product-overlay p {
    margin-bottom: 10px;
}

    </style>
    <link rel="stylesheet" href="css/button.css">
</head>
<body>
<section class="services">
    <div class="container">
    <div>
            <a href="home.php" class="button-17 text-dark text-decoration-none">Back To Home</a>
        </div>
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
                    <div class="col-md-4" data-aos="zoom-in-up">
                        <div class="product-card">
                            <img src="<?php echo $row['product_image']; ?>" alt="Product Image" class="product-image">
                            <div class="product-overlay">
                                <h2><?php echo $row['product_name']; ?></h2>
                                <p><?php echo $row['product_description']; ?></p>
                                <button class="button-17" onclick="window.location.href='categorized-product.php'">Order Now!</button>
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



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.2/js/bootstrap.min.js"></script>

    <script>
        function loginFirst() {
            window.location.href = "login.php";
            alert("Login First!");
        }
    </script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>    
</body>
</html>
