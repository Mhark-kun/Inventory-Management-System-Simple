<?php
// Include the database connection file
// This allows us to use the $conn variable
include "connectiondb.php";

// Check if the form was submitted by clizcking the Save button
if (isset($_POST['save'])) {
    // Get form data from input fields
    $item = $_POST['item'];     // Item name
    $category = $_POST['category']; // Item category
    $qty = $_POST['quantity'];   // Item quantity
    $price = $_POST['price'];    // Item price

    // SQL query to insert data into the supplies table
    mysqli_query($conn, "INSERT INTO supplies 
    (item_name, category, quantity, price)
    VALUES ('$item','$category','$qty','$price')");
    // Redirect user back to the main page after saving
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <!-- Page title -->
    <title>Add Supply</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<!-- Page header -->
<div class="header"> 
    <h1>Add School Supply</h1>
    <!-- Reserved area for buttons or extra info -->
    <div class="header-info"> 
    </div> 
</div>

<!-- Form for adding a new supply -->
<!-- method="POST" sends data securely to this same file -->
<form method="POST">

    <!-- Item name input -->
    Item Name: <input type="text" name="item" required><br><br>
    <!-- Category input -->
    Category: <input type="text" name="category" required><br><br>
    <!-- Quantity input (numbers only) -->
    Quantity: <input type="number" name="quantity" required><br><br>
     <!-- Price input (allows decimal values) -->
    Price: <input type="number" step="0.01" name="price" required><br><br>
    <!-- Save button to submit the form -->
    <button name="save">Save</button>
</form>

</body>
</html>
