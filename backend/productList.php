<?php  include "adminvalidator.php";?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <style>
        body {
            font-family: poppins;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            
        }
        .product-table{
            width: 80%;
            margin: 20px 250px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .menu{
            height: 100vh;
            position: fixed;
        }
        table {
            width: 1200px;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 18px;
            text-align: center;

        }

        table th,
        table td {
            padding: 12px;
            border: 1px solid #ddd;
        }

        table th {
            background-color: #f2f2f2;
        }

        table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        table tr:hover {
            background-color: #f1f1f1;
        }
        .table-img{
            width: 70px;
        }
        .edit-btn, .delete-btn{
            border: 1px solid black;
            padding: 5px 30px;
            color: white;
            font-weight: 600;
            border-radius: 10px;
            text-decoration: none;
        }
        .edit-btn{
            background-color: blue;
            
        }
        .delete-btn{
            background-color: red;

        }
        .edit-btn:hover, .delete-btn:hover{
            opacity: 0.6;
        }

    </style>

</head>

<body>
    <div class="menu">
        <?php include '../includes/sidebar.php'; ?>
    </div>
<?php
// Database connection
include '../config.php';

// Fetch data from productlist table
$sql = "SELECT id, pname, category, quantity, price, primaryimg FROM products";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    echo " <div class='product-table'> <table border='1'>
            <tr>
                <th>S.N</th>
                <th>Picture</th>
                <th>Name</th>
                <th>Total Quantity</th>
                <th>Total Price</th>
                <th>Action</th>
            </tr>";
    $serialNumber = 1;
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $serialNumber++ . "</td>
                <td><img class='table-img' src='" . $row['primaryimg'] . "' alt='" . $row['pname'] . "'></td> 
                <td>" . $row["pname"] . "</td>
                <td>" . $row["quantity"] . "</td>
                <td>" . $row["price"] . "</td>
                <td>
                <a href='edit_product.php?id=" . $row['id'] . "' class='edit-btn'>Edit</a>
<a href='delete_product.php?id=" . $row['id'] . "' class='delete-btn' onclick='return confirm(\"Are you sure you want to delete this product?\")'>Delete</a>
                    </td>
              </tr>";
    }
    echo "</table> </div>";
} else {
   
}

$conn->close();
?>

</body>

</html>

