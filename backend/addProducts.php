<?php include "adminvalidator.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <!-- <link rel="stylesheet" href="styles.css"> -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
        }

        .menu {
            height: 100vh;
            position: fixed;
        }

        .container {
            width: 50%;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 8px;
            font-weight: bold;
        }

        input,
        textarea,
        button, select {
            margin-bottom: 15px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        textarea {
            resize: vertical;
        }

        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <div class="menu">
        <?php include "../includes/sidebar.php"; ?>
    </div>
    <div class="container">
        <h2>Add a Product</h2>
        <form id="addProductForm" action="productdata.php" method="POST" enctype="multipart/form-data">
            <label for="pname">Product Name:</label>
            <input type="text" id="pname" name="pname" required>

            <!-- <label for="category">Category:</label>
            <input type="text" id="category" name="category" required> -->
            <?php
            include "../config.php";
            $sql = "SELECT * FROM categories";
            $result = mysqli_query($conn, $sql);
            ?>
            <label for="category">Category</label>
            <select name="category" id="category">
                <option value="">Select Category</option>
                <?php
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value=" . $row['category'] . ">" . $row['category'] . "</option>";
                    }
                }

                ?>

            </select>

            <label for="description">Description:</label>
            <textarea id="description" name="description" required></textarea>

            <label for="price">Price:</label>
            <input type="number" id="price" name="price" step="0.01" required>

            <label for="quantity">Quantity:</label>
            <input type="number" id="quantity" name="quantity" required>

            <label for="color">Color:</label>
            <input type="text" id="color" name="color" required>

            <label for="primaryimg">Primary Image:</label>
            <input type="file" id="primaryimg" name="primaryimg" accept="image/*" required>

            <label for="pic2">Second Image:</label>
            <input type="file" id="pic2" name="pic2" accept="image/*">

            <label for="pic3">Third Image:</label>
            <input type="file" id="pic3" name="pic3" accept="image/*">

            <button type="submit" name="submit">Add Product</button>
        </form>
    </div>

    <script>
        document.getElementById('addProductForm').addEventListener('submit', function(event) {
            let pname = document.getElementById('pname').value.trim();
            if (pname === '') {
                alert('Product name cannot be empty');
                event.preventDefault();
            }
        });
    </script>
</body>

</html>