<?php
// Start the session
session_start();

// Include database connection file
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Prepare and execute SQL statement
        $stmt = $conn->prepare("SELECT user_id, password FROM users WHERE username = ? OR email = ?");
        $stmt->bind_param("ss", $username, $username); // Binding username twice to check against both username and email
        $stmt->execute();
        $result = $stmt->get_result();


        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            if (password_verify($password, $row['password'])) {
                $_SESSION['user_id'] = $row['user_id'];
                header("location: categorized-product.php");
                exit; // Ensure script termination after redirection
            } else {
                echo "Incorrect password";
            }
        } else {
            echo "User not found";
        }
        $stmt->close(); // Close prepared statement
    } elseif (isset($_POST['register'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirm-password'];

        // Check if passwords match
        if ($password !== $confirmPassword) {
            echo "Passwords do not match";
            exit;
        }

        // Check if username or email already exists
        $checkUserQuery = "SELECT * FROM users WHERE username='$username' OR email='$email'";
        $checkUserResult = $conn->query($checkUserQuery);
        if ($checkUserResult->num_rows > 0) {
            echo "Username or Email already exists";
            exit;
        }

        // Hash password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert user into database
        $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashed_password')";

        if ($conn->query($sql) === TRUE) {
            echo "Registration successful";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login and Registration Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="login.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="css/button.css">
</head>
<body>
    <div>
        <a href="home.php" class="button-17 text-dark text-decoration-none">Back To Home</a>
    </div>
    <div class="container" style="overflow: hidden;">
        <div class="row">
            <div class="col-md-6 offset-md-3 col-lg-4 offset-lg-4">
                <div class="login-box" data-aos="fade-up">
                    <h1>Login</h1>
                    <form id="loginForm" method="POST">
                        <div class="form-group">
                            <label for="username">UserID/Email:</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username">
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
                        </div>
                        <button type="submit" class="button-17 btn-block" name="login">Login</button>
                        <a href="#" class="forgot-password">Forgot Password?</a>
                        <a href="#" class="register-link">Don't have an account? Register</a>
                    </form>
                </div>
                <div class="register-box" style="margin-top: 100px;" data-aos="zoom-in">
                    <h1>Register</h1>
                    <form id="registerForm" method="POST">
                        <label for="name">User Name</label>
                        <input type="text" name="username" class="form-control" placeholder="Enter Name">
                        <label for="email">*Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Enter Email">
                        <label for="password">*Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Enter Password">
                        <label for="confirm-password">*Confirm Password</label>
                        <input type="password" name="confirm-password" class="form-control" placeholder="Confirm Password">
                        <button type="submit" name="register" class="button-17 btn-block">Register</button>
                        <a href="#" class="login-link">Already have an account? Login</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        AOS.init();
    </script>
</body>
</html>
