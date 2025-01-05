<?php include "adminvalidator.php";

// Include the database connection
include "../config.php";

// Start session (if needed for admin authentication)


// Check if the product ID is provided in the URL
if (isset($_GET['id'])) {
    $productId = $_GET['id'];

    // Fetch product details based on the product ID
    $sql = "SELECT * FROM products WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $productId);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if the product exists
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Product not found.";
        exit();
    }

    // Close the database connection
    $stmt->close();
}

// Function to handle file uploads
function uploadImage($file, $uploadDir) {
    $targetFile = $uploadDir . basename($file["name"]);
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if file is an image
    $check = getimagesize($file["tmp_name"]);
    if ($check === false) {
        return null; // Not an image
    }

    // Check file size (5MB max)
    if ($file["size"] > 5000000) {
        return null; // Exceeds file size limit
    }

    // Allow certain file formats
    $allowedFormats = ['jpg', 'jpeg', 'png', 'gif'];
    if (!in_array($imageFileType, $allowedFormats)) {
        return null; // Invalid file format
    }

    // Try to upload the file
    if (move_uploaded_file($file["tmp_name"], $targetFile)) {
        return $targetFile; // Successfully uploaded
    } else {
        return null; // Upload failed
    }
}

// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Get the product ID from the hidden field
    $id = $_POST['id'];

    // Get form input data
    $pname = $_POST['pname'];
    $category = $_POST['category'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $color = $_POST['color'];

    // Handle image uploads
    $primaryimg = $_FILES['primaryimg']['name'] ? $_FILES['primaryimg'] : null;

    // File upload path
    $uploadDir = 'uploads/';

    // Upload primary image if exists
    if ($primaryimg) {
        $primaryimgPath = uploadImage($primaryimg, $uploadDir);
    } else {
        // Retain old image if no new image is uploaded
        $primaryimgPath = isset($_POST['current_primaryimg']) ? $_POST['current_primaryimg'] : '';
    }

    // Update product in the database
    $sql = "UPDATE products SET pname = ?, category = ?, description = ?, price = ?, quantity = ?, color = ?, primaryimg = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssi", $pname, $category, $description, $price, $quantity, $color, $primaryimgPath, $id);

    if ($stmt->execute()) {
        // Success, redirect to the product list or show a success message
        header("Location: productList.php");
        exit();
    } else {
        // Error
        echo "Error updating product: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product: <?php echo $row['pname']; ?></title>
    <style>
        /* Basic Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Body */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7fa;
            color: #333;
            display: flex;
            /* justify-content: center; */
            /* align-items: center; */
            min-height: 100vh;
        }
        .menu {
            height: 100vh;
            position: fixed;
        }

        /* Form Container */
        .form-container {
            /* align-self: center; */
            background-color: #fff;
            width: 90%;
            max-width: 800px;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            margin-left: 500px;
        }

        .form-container h2 {
            text-align: center;
            font-size: 2rem;
            color: #333;
            margin-bottom: 20px;
        }

        /* Form Group */
        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 8px;
            color: #555;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
            background-color: #fafafa;
            transition: border 0.3s ease;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            border: 1px solid #4CAF50;
            outline: none;
        }

        /* Textarea Style */
        textarea {
            resize: vertical;
            min-height: 100px;
        }

        /* File Inputs */
        input[type="file"] {
            padding: 5px;
            border: 1px solid #ddd;
            background-color: #fafafa;
            border-radius: 5px;
            font-size: 1rem;
        }

        .current-image {
            margin-top: 10px;
            text-align: center;
        }

        .current-image img {
            border-radius: 8px;
            border: 1px solid #ddd;
            max-width: 100%;
        }

        /* Button Styles */
        .form-actions {
            text-align: center;
        }

        .btn {
            background-color: #4CAF50;
            color: #fff;
            font-size: 1.1rem;
            padding: 12px 30px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #45a049;
        }

        /* Media Queries for Responsive Design */
        @media screen and (max-width: 768px) {
            .form-container {
                width: 95%;
                padding: 20px;
            }

            .form-container h2 {
                font-size: 1.6rem;
            }

            .form-group input,
            .form-group textarea {
                font-size: 0.95rem;
            }
        }
    </style>
</head>

<body>
    <div class="menu">
        <?php include "../includes/sidebar.php"; ?>
    </div>
    <div class="form-container">
        <h2>Edit Product: <?php echo $row['pname']; ?></h2>
        <form action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

            <div class="form-group">
                <label for="pname">Product Name:</label>
                <input type="text" id="pname" name="pname" value="<?php echo $row['pname']; ?>" required>
            </div>

            <div class="form-group">
                <label for="category">Category:</label>
                <input type="text" id="category" name="category" value="<?php echo $row['category']; ?>" required>
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea id="description" name="description" required><?php echo $row['description']; ?></textarea>
            </div>

            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" id="price" name="price" value="<?php echo $row['price']; ?>" step="0.01" required>
            </div>

            <div class="form-group">
                <label for="quantity">Quantity:</label>
                <input type="number" id="quantity" name="quantity" value="<?php echo $row['quantity']; ?>" required>
            </div>

            <div class="form-group">
                <label for="color">Color:</label>
                <input type="text" id="color" name="color" value="<?php echo $row['color']; ?>" required>
            </div>

            <div class="form-group">
                <label for="primaryimg">Primary Image:</label>
                <input type="file" id="primaryimg" name="primaryimg" accept="image/*">
                <div class="current-image">
                    <!-- <img src="<?php echo $row['primaryimg']; ?>" alt="Current Image" width="100"> -->
                    <input type="hidden" name="current_primaryimg" value="<?php echo $row['primaryimg']; ?>">

                </div>
            </div>

         

           

            <div class="form-actions">
                <button type="submit" name="submit" class="btn">Update Product</button>
            </div>
        </form>
    </div>
</body>

</html>
