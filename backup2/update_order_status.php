<?php 
// Include database connection file
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "my_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Update order statuses
$sql = "UPDATE orders SET order_status = 
        CASE 
            WHEN TIMESTAMPDIFF(SECOND, order_date, NOW()) >= 10 AND order_status = 'Pending' THEN 'order is being ready to ship'
            WHEN TIMESTAMPDIFF(SECOND, order_date, NOW()) >= 20 AND order_status = 'order is being ready to ship' THEN 'order is shipped on the way'
            ELSE order_status
        END";
if ($conn->query($sql) === TRUE) {
    echo "Order statuses updated successfully.";
} else {
    echo "Error updating order statuses: " . $conn->error;
}
?>
