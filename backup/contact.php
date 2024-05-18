<?php
// Include your database connection file
include 'db.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Prepare and execute SQL query to insert the form data into the database
    $sql = "INSERT INTO contact_us (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";
    if ($conn->query($sql) === TRUE) {
        // Data inserted successfully
        $success_message = "Form submitted successfully.";
    } else {
        // Error occurred while inserting data
        $error_message = "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="css/button.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .btn-send {
            background-color: #007bff; /* Set the background color to blue */
            color: #ffffff;
        }
        .form-control:focus {
            outline: none;
            box-shadow: none;
        }
        input{
            border-radius: 0px !important;
        }
        form{
            /* max-width: 400px; */
            background-color: rgba(0, 0, 0, 0.1);
            padding: 20px;
            backdrop-filter: blur(20px);
        }
        textarea{
            border-radius: 0px !important;
        }
        body {
            position: absolute;
            left: 50%;
            transform: translate(-50%,-50%);
            top: 50%;
            min-width: 500px;
            background: url(./assets/images/contact-cylinder.jpg);
            background-position: top 10px center;
            background-size: cover;
        }
        .bold {
            font-weight: 600;
        }

        @media screen and (max-width: 425px) {
            body {
                min-width: unset;
            }
            form {
                padding: 20px;
            }
            .container {
                width: 320px;
            }
        }
    </style>
</head>
<body>
    
    <div class="container mt-5">
       

        <?php
        // Display success or error message
        if (isset($success_message)) {
            echo "<div class='alert alert-success'>$success_message</div>";
        } elseif (isset($error_message)) {
            echo "<div class='alert alert-danger'>$error_message</div>";
        }
        ?>

        <form method="post">
        <div>
            <a href="home.php" class="button-17 text-dark text-decoration-none">Back To Home</a>
        </div>
             <h2 class="text-center text-white">Contact Us</h2>
            <div class="form-group">
                <label for="name" class="text-white bold">Name:</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required>
            </div>
            <div class="form-group">
                <label for="email" class="text-white bold">Email:</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
            </div>
            <div class="form-group">
                <label for="subject" class="text-white bold">Subject:</label>
                <input type="text" class="form-control" id="subject" name="subject" placeholder="Enter the subject" required>
            </div>
            <div class="form-group">
                <label for="message" class="text-white bold">Message:</label>
                <textarea class="form-control" id="message" name="message" rows="4" placeholder="Enter your message" required></textarea>
            </div>
            <div class="text-center">
                <button type="submit" class="button-17">Send Message</button>
            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
