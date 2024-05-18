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
    <title>Admin Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f5f5f5;
            font-family: Arial, sans-serif;
        }

        .container {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-container {
            max-width: 400px;
            background-color: #fff;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .login-container h1 {
            font-size: 24px;
            margin-bottom: 20px;
            text-align: center;
        }

        .form-control {
            border-radius: 5px;
            padding-left: 40px;
        }

        .login-btn {
            background-color: #528aaf;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            transition: background-color 0.3s;
            width: 100%;
        }

        .login-btn:hover {
            background-color: #407393;
        }

        .forgot-password {
            text-align: center;
            margin-top: 20px;
        }

        .forgot-password a {
            color: #666;
            text-decoration: none;
        }

        .forgot-password a:hover {
            color: #333;
        }

        .form-icon {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            left: 15px;
            color: #666;
        }

        .admin-icon {
            font-size: 60px;
            color: #528aaf;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="login-container">
            <div class="text-center mb-4">
                <i class="fas fa-user-shield admin-icon"></i>
                <h1>Admin Panel Login</h1>
            </div>
            <?php
            if (isset($_GET["error"]) && $_GET["error"] == "invalid_credentials") {
                echo '<div class="alert alert-danger" role="alert">
                        Invalid username or password.
                    </div>';
            }
            ?>
            <form id="loginForm" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="position-relative mb-3">
                    <label for="username" class="form-label">Admin Email:</label>
                    <input type="email" class="form-control" id="username" name="username" placeholder="Enter your email">
                    <i class="fas fa-envelope form-icon"></i>
                </div>
                <div class="position-relative mb-3">
                    <label for="password" class="form-label">Password:</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
                    <i class="fas fa-lock form-icon"></i>
                </div>
                <button type="submit" class="login-btn" name="login">Login</button>
                <div class="forgot-password">
                    <a href="#" class="text-muted">Forgot Password?</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
