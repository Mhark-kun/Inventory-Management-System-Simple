<?php
// Include the database connection file
// This gives access to the $conn variable
include "connectiondb.php";

// Get the ID from the URL (delete.php?id=1)
$id = $_GET['id'];
// SQL query to delete the record with the given ID
mysqli_query($conn, "DELETE FROM supplies WHERE id=$id");

// Redirect back to the main page after deleting
header("Location: index.php");
?>
