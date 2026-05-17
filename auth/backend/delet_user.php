<?php
// Database connection
require_once __DIR__ . '/../../env_loader.php';

$conn = new mysqli(
    getenv('DB2_HOST') ?: 'localhost',
    getenv('DB2_USERNAME'),
    getenv('DB2_PASSWORD'),
    getenv('DB2_NAME')
);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Define the mobile numbers to be preserved
$preserved_numbers = "'12345', '9876543210'";

// SQL query to delete all rows except the ones with the preserved mobile numbers
$sql = "DELETE FROM users WHERE mobile NOT IN ($preserved_numbers)";

// Execute the query
if ($conn->query($sql) === TRUE) {
    echo "Records deleted successfully.";
} else {
    echo "Error deleting records: " . $conn->error;
}

// Close the connection
$conn->close();
?>
