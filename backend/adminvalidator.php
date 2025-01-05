<?php
// Start session to track user status
session_start();

// Check if the user is logged in (example: check for user ID in session)
if (!isset($_SESSION['user'])) {
    // User is not logged in, redirect them to the login page
    header("Location: adminlogin.php"); // Replace with your login page URL
    exit(); // Ensure no further script is executed
}

?>
