<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile Management</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #ffffff;
            background-image: url('backg.png'); /* Update the URL accordingly */
        }

        .container {
            margin-top: 50px;
        }

        h2 {
            margin-bottom: 20px;
        }

        img.profile-pic {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .custom-file-input {
            cursor: pointer;
        }

        .btn-custom {
            background-color: #007bff;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Manage Your Profile</h2>

        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" class="form-control" id="username" placeholder="Enter your new username" />
        </div>

        <div class="form-group">
            <label for="profilePic">Profile Picture:</label>
            <br>
            <img src="assets/images/profileicon.png" alt="Profile Picture" class="profile-pic">
            <label class="btn btn-primary mt-2">
                Choose File <input type="file" class="d-none" id="profilePic">
            </label>
        </div>

        <div class="form-group">
            <label for="oldPassword">Old Password:</label>
            <input type="password" class="form-control" id="oldPassword" placeholder="Enter your old password">
            <label for="newPassword">New Password:</label>
            <input type="password" class="form-control" id="newPassword" placeholder="Enter your new password">
        </div>

        <div class="form-group">
            <label for="deliveryAddress">Delivery Address:</label>
            <textarea class="form-control" id="deliveryAddress" rows="3" placeholder="Enter your new delivery address"></textarea>
        </div>

        <button type="button" class="btn btn-custom" onclick="confirmChanges()">Save Changes</button>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        function confirmChanges() {
            if (confirm("Are you sure you want to save changes?")) {
                alert("Changes saved!");
                window.location.href = "userdashboard.php";
            }
        }
    </script>
</body>
</html>
