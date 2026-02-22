<?php
// Include the database connection file
// This gives access to the $conn variable
include "connectiondb.php";
// Execute an SQL query to get all records from the supplies table
// The result is stored in the $result variable
$result = mysqli_query($conn, "SELECT * FROM supplies");
?>

<!DOCTYPE html>
<html>
<head>
     <!-- Page title shown in the browser tab -->
    <title>Inventory Management System</title>

    <!-- Link to external CSS file for design -->
    <link rel="stylesheet" href="style.css">
</head>
<body>

<!-- Header section -->
<div class="header"> 
    <h1>Supplies Inventory</h1> 
    <!-- Container for buttons or extra info (currently empty) -->
    <div class="header-info"> 
    </div> 
</div>

<!-- Add Item button section -->
<div class="header-info">
    <a href="add.php" class="add-button"> Add Item</a>
</div>
<!-- Table container for styling/layout -->
<div class="table-container">
<table>
<!-- Table header -->
<thead>
<tr>
    <th>No.</th>
    <th>Item Name</th>
    <th>Category</th>
    <th>Quantity</th>
    <th>Price</th>
    <th>Action</th>
</tr>
</thead>

<!-- Table body -->
<tbody>
<!-- Initialize counter for row numbering -->
<?php $count = 1; ?>
<!-- Loop through each row fetched from the database -->
<?php while ($row = mysqli_fetch_assoc($result)) { ?>
<tr>
    <!-- Display row number -->
    <td><?= $count++ ?></td>
    <!-- Display item name from database -->
    <td><?= $row['item_name'] ?></td>
    <!-- Display item category -->
    <td><?= $row['category'] ?></td>
     <!-- Display quantity -->
    <td><?= $row['quantity'] ?></td>
    <!-- Display price with peso sign -->
    <td>₱<?= $row['price'] ?></td>
    <!-- Action buttons -->
    <td class="action">
        <!-- Edit link passing the item ID -->
        <a href="edit.php?id=<?= $row['id'] ?>" class="edit">✏ Edit</a>
        <!-- Delete link passing the item ID -->
        <a href="#" 
            class="delete"
            onclick="openDeleteModal(<?= $row['id'] ?>)">
            Delete
</a>

</a>

    </td>
</tr>
<?php 
// End of while loop
} ?>

</tbody>
</table>
</div>
<!-- Delete Confirmation Modal -->
    <div id="deleteModal" class="modal">
        <div class="modal-content">
            <h2>Confirm Deletion</h2>
                <p>Are you sure you want to delete this item?</p>

            <div class="modal-buttons">
                <button class="btn-cancel" onclick="closeDeleteModal()">No</button>
                <button class="btn-delete" onclick="confirmDelete()">Yes</button>
            </div>
        </div>
    </div>

<!-- Delete confirmation script -->
<script>
    let deleteId = null;

// Open modal and store ID
function openDeleteModal(id) {
    deleteId = id;
    document.getElementById("deleteModal").style.display = "flex";
}

// Close modal
function closeDeleteModal() {
    document.getElementById("deleteModal").style.display = "none";
    deleteId = null;
}

// Confirm delete
function confirmDelete() {
    window.location.href = "delete.php?id=" + deleteId;
}
</script>

</body>
</html>
