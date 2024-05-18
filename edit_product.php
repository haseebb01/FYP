<?php
include 'db.php';
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: admin-login.php");
    exit();
}


if (!isset($_GET['id'])) {
    header("Location: admin-panel.php"); 
    exit();
}

$product_id = $_GET['id'];

$sql = "SELECT * FROM products WHERE product_id = '$product_id'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {

    header("Location: admin-panel.php");
    exit();
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['productName']) && isset($_POST['productDescription'])) {
        $productName = $_POST['productName'];
        $productDescription = $_POST['productDescription'];

  
        $sql_update = "UPDATE products SET product_name = '$productName', product_description = '$productDescription' WHERE product_id = '$product_id'";
        if ($conn->query($sql_update) === TRUE) {
            $success_message = "Product updated successfully.";
        } else {
            $error_message = "Error updating product: " . $conn->error;
        }
    } else {
        $error_message = "Please fill all the required fields.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link rel="stylesheet" href="css/button.css">
    <style>
        input,textarea{
            border: 0px !important;
            border-radius: 0px !important;
            outline: 1px solid lightgray !important;
            box-shadow: none !important;
        }
        .container{
            width: 320px !important;
        }
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(rgba(0,0,0,0.55),rgba(0,0,0,0.55)),url("./assets/images/backcom.webp");
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .header {
            background-color: #007bff;
            color: #fff;
            padding: 15px;
            text-align: center;
        }

        .container {
            max-width: 800px;
            margin: auto;
            padding: 20px;
            background-color: rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            backdrop-filter: blur(20px);
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-label {
            font-weight: bold;
        }

        .form-control {
            margin-bottom: 15px;
            padding: 10px;
            border: 1px solid #ced4da;
            border-radius: 5px;
            width: 100%;
            box-sizing: border-box;
        }

        textarea.form-control {
            height: 100px;
            resize: vertical;
        }

        .button-17 {
            display: block;
            width: 100%;
            padding: 10px;
            /* background-color: #007bff; */
            /* color: white; */
            border: none;
            /* border-radius: 5px; */
            cursor: pointer;
            /* font-size: 16px; */
            transition: background-color 0.3s;
        }

        .alert {
            margin-top: 20px;
            padding: 15px;
            border-radius: 5px;
        }

        .alert-success {
            background-color: #d4edda;
            border-color: #c3e6cb;
            color: #155724;
        }

        .alert-danger {
            background-color: #f8d7da;
            border-color: #f5c6cb;
            color: #721c24;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-white">Edit Product</h2>
        <?php if(isset($success_message)) echo "<div class='alert alert-success'>$success_message</div>"; ?>
        <?php if(isset($error_message)) echo "<div class='alert alert-danger'>$error_message</div>"; ?>
        <form method="post">
            <div class="mb-3">
                <label for="productName" class="form-label text-white">Product Name</label>
                <input type="text" class="form-control" id="productName" name="productName" value="<?php echo $row['product_name']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="productDescription" class="form-label text-white">Product Description</label>
                <textarea class="form-control" id="productDescription" name="productDescription" rows="3" required><?php echo $row['product_description']; ?></textarea>
            </div>
            <button type="submit" class="button-17">Update Product</button>
        </form>
    </div>
</body>
</html>
