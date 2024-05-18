<?php
// Start the session
session_start();

// Include database connection file
include 'db.php';

// Fetch current user's information from the database
if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];
    
    $sql = "SELECT username, email FROM users WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $currentUsername = $row['username'];
        $currentEmail = $row['email'];
    }
    $stmt->close();
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['login'])) {
        // Login logic
        // (existing login code)
    } elseif (isset($_POST['register'])) {
        // Registration logic
        // (existing registration code)
    } elseif (isset($_POST['updateProfile'])) {
        // Update profile logic
        $newUsername = $_POST['username'];
        $newEmail = $_POST['email'];
        $newPassword = $_POST['password'];
        
        // Update user's information in the database
        $sql = "UPDATE users SET username = ?, email = ?, password = ? WHERE user_id = ?";
        $stmt = $conn->prepare($sql);
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        $stmt->bind_param("sssi", $newUsername, $newEmail, $hashedPassword, $userId);
        
        if ($stmt->execute()) {
            // Refresh session variables with updated information
            $_SESSION['username'] = $newUsername;
            $_SESSION['email'] = $newEmail;
            
            echo "Profile updated successfully";
        } else {
            echo "Error updating profile: " . $conn->error;
        }
        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <!-- Your HTML head content here -->
    <style>
        input{
            box-shadow: none !important;
            outline: 1px solid gray !important;
            border: 0px !important;
            border-radius: 0px !important;
        }
               body {
            font-family: Arial, sans-serif;
            color: #333;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        .container {
            margin-top: 50px;
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 50px auto;
        }

        h2 {
            margin-bottom: 30px;
            text-align: center;
            color: #007bff;
        }

        img.profile-pic {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            margin: 0 auto 20px;
            display: block;
            border: 2px solid #007bff;
            cursor: pointer;
            transition: border-color 0.3s ease;
        }

        img.profile-pic:hover {
            border-color: #0056b3;
        }

        input[type="file"] {
            display: none;
        }

        input.form-control {
            border: 2px solid #007bff;
            border-radius: 5px;
            transition: border-color 0.3s ease;
        }

        input.form-control:focus {
            border-color: #0056b3;
        }

        button.btn-custom {
            background-color: #007bff;
            color: #fff;
            width: 100%;
            margin-top: 20px;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button.btn-custom:hover {
            background-color: #0056b3;
        }

        textarea.form-control {
            border: 2px solid #007bff;
            border-radius: 5px;
            transition: border-color 0.3s ease;
        }

        textarea.form-control:focus {
            border-color: #0056b3;
        }

        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
            color: #333;
        }

        .alert-success {
            background-color: #d4edda;
            border-color: #c3e6cb;
            color: #155724;
        }
    </style>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/button.css">
</head>
<body>
    <!-- Your HTML body content here -->

    <div class="container" style="overflow: hidden;">
        <!-- Your HTML content here -->

        <div class="col-md-6 offset-md-3 col-lg-4 offset-lg-4">
            <div class="login-box" data-aos="fade-up">
                <!-- Your existing login form content here -->
            </div>
            <div class="register-box" style="margin-top: 100px;" data-aos="zoom-in">
                <h1 class="text-center">Edit Profile</h1>
                <form id="editProfileForm" method="POST">
                    <label for="username">User Name</label>
                    <input type="text" name="username" class="form-control" value="<?php echo isset($currentUsername) ? $currentUsername : ''; ?>" placeholder="Enter Name">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" value="<?php echo isset($currentEmail) ? $currentEmail : ''; ?>" placeholder="Enter Email">
                    <label for="password">New Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Enter New Password">
                    <button type="submit" name="updateProfile" class="my-3 button-17 btn-block">Update Profile</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Your HTML body content here -->

</body>
</html>
