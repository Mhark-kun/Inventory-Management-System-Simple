<?php
// Include the database connection file
include "connectiondb.php";

// Get the ID from the URL (edit.php?id=1)
$id = $_GET['id'];

// SQL query to fetch the specific record using the ID
$result = mysqli_query($conn, "SELECT * FROM supplies WHERE id=$id");

// Fetch the result as an associative array
$row = mysqli_fetch_assoc($result);

// Check if the Update button was clicked
if (isset($_POST['update'])) {
    // Get updated values from the form               
    $item = $_POST['item'];          // Item name
    $category = $_POST['category'];  // Item category
    $qty = $_POST['quantity'];       // Item quantity
    $price = $_POST['price'];        // Item price

    // SQL query to update the selected record
    mysqli_query($conn, "UPDATE supplies SET
        item_name='$item',
        category='$category',
        quantity='$qty',
        price='$price'
        WHERE id=$id");
    // Redirect back to the main page after updating
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Supply</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<!-- Page header -->
<div class="header"> 
    <h1>Edit School Supply</h1> 
    <div class="header-info"> 
    </div> 
</div>
<!-- Edit form -->
<form method="POST">
    <!-- Item name field (pre-filled with existing data) -->
    Item Name: <input type="text" name="item" value="<?= $row['item_name'] ?>"><br><br>
    <!-- Category field -->
    Category: <input type="text" name="category" value="<?= $row['category'] ?>"><br><br>
    <!-- Quantity field -->
    Quantity: <input type="number" name="quantity" value="<?= $row['quantity'] ?>"><br><br>
    <!-- Price field -->
    Price: <input type="number" step="0.01" name="price" value="<?= $row['price'] ?>"><br><br>

    <!-- Update button to submit the form -->
    <button name="update">Update</button>
</form>

</body>
</html>
