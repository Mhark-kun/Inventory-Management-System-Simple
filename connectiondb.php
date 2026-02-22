<?php
// Create a connection to the MySQL database
// mysqli_connect(host, username, password, database_name)
$conn = mysqli_connect("localhost", "root", "", "inventory_db");

// Check if the connection failed
// If $conn is false, the connection did not succeed
if (!$conn) {
    
    // Stop the script and display an error message
    die("Database connection failed");
}
?>
 