<?php
session_start();
include "./config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];

    // Assuming you have a `cart` table with columns: id, user_id, product_id, quantity
    $user_id = $_SESSION['user_id']; // Get the logged-in user's ID
    $sql = "INSERT INTO cart (user_id, product_id, quantity) VALUES ('$user_id', '$product_id', 1)";

    if (mysqli_query($conn, $sql)) {
        echo "Product added to cart!";
        header("Location: products.php"); // Redirect back to the products page
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
