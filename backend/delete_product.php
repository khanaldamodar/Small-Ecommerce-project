<?php
include "../config.php";
include "adminvalidator.php";

// Check if product ID is provided in the URL
if (isset($_GET['id'])) {
    $productId = $_GET['id'];
    // Prepare DELETE query to remove the product
    $sql = "DELETE FROM products WHERE id = $productId";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        // Redirect to the product list page after successful deletion
        header("Location: productList.php"); // Change this to your actual product list page URL
        exit();
    } else {
        echo "Error: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
