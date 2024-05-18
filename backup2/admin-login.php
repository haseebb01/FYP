<?php
session_start();

// Define predefined email and password for admin panel
$admin_credentials = array(
    "admin@123.com" => "admin123",
    "apple@example.com" => "apple123"
);

// Check if the user is already logged in
if (isset($_SESSION["username"])) {
    header("Location: admin_panel.php");
    exit();
}

// Authentication function
function authenticate($username, $password) {
    global $admin_credentials;
    if (array_key_exists($username, $admin_credentials) && $admin_credentials[$username] === $password) {
        return true;
    }
    return false;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])) {
    // Retrieve username and password from the form
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Authenticate user
    if (authenticate($username, $password)) {
        // If authenticated, create a session and redirect to admin panel
        $_SESSION["username"] = $username;
        header("Location: admin.php");
        exit();
    } else {
        // If authentication fails, redirect back to the login page with an error message
        header("Location: admin.php".$_SERVER['PHP_SELF']."?error=invalid_credentials");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/button.css">
    <title>Admin Login</title>
    <style>
        body{
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
        }
        .my-bg-2{
            height: 100vh;
        }
        .login-box{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            max-width: 80%;
        }
        .custom-design{
            border-radius: 50px;
            background-color: #eeee;
            padding: 14px 38px;
            outline: none;
            border: none;
            font-weight: bold;
        }
        input{
            border-radius: 0 !important;
            outline: none !important;
        }
        input:focus {
            outline: 1px solid #528aaf !important; /* Change the color of the focus outline */
            box-shadow: none !important;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 my-bg-2 text-center mt-4">
            <h3>ADMIN PANEL ACCESS</h3>
                <div class="login-box text-center">
                        <h1>Login</h1>
                        <?php
                        if (isset($_GET["error"]) && $_GET["error"] == "invalid_credentials") {
                            echo '<div class="alert alert-danger" role="alert">
                                    Invalid username or password.
                                </div>';
                        }
                        ?>
                        <form id="loginForm" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                            <div class="form-group text-start">
                                <label for="username" class="m-2">Admin Email:</label>
                                <input type="email" class="form-control" id="username" name="username" placeholder="Enter your email">
                            </div>
                            <div class="form-group text-start">
                                <label for="password" class="m-2">Password:</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
                            </div>
                            <button type="submit" class="custom-design mt-4" name="login">Login</button>
                            <!-- <a href="#" class="forgot-password" disabled>Forgot Password?</a> -->
                        </form>
                    </div>
            </div>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
