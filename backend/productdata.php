<?php include "adminvalidator.php";
require "../config.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {

    // Collect data from form
    $pname = $_POST['pname'];
    $category = $_POST['category'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $color = $_POST['color'];

    // Handle file uploads
    $target_dir = "uploads/";
    $primaryimg = $target_dir . basename($_FILES["primaryimg"]["name"]);
    $pic2 = isset($_FILES["pic2"]) ? $target_dir . basename($_FILES["pic2"]["name"]) : null;
    $pic3 = isset($_FILES["pic3"]) ? $target_dir . basename($_FILES["pic3"]["name"]) : null;

    // Move uploaded files to the server
    move_uploaded_file($_FILES["primaryimg"]["tmp_name"], $primaryimg);
    if ($pic2) move_uploaded_file($_FILES["pic2"]["tmp_name"], $pic2);
    if ($pic3) move_uploaded_file($_FILES["pic3"]["tmp_name"], $pic3);

    // Prepare SQL statement to insert the product
    $sql = "INSERT INTO products (pname, category, description, price, quantity, color, primaryimg, pic2, pic3) 
            VALUES ('$pname', '$category', '$description', '$price', '$quantity', '$color', '$primaryimg', '$pic2', '$pic3')";

    if ($conn->query($sql) === TRUE) {
        echo "New product added successfully!";
        header("location: productList.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
