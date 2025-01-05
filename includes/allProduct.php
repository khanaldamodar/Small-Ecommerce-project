<style>
    * {
        font-family: poppins;
    }

    .container {
        margin: 30px;
        width: 250px;
        height: auto;
        box-shadow: -2px 6px 9px 10px #ededed;
        border-radius: 6px;
        overflow: hidden;

        display: inline-block;
        text-align: center;
        padding: 14px;
        text-decoration: none;
    }

    .product-image {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .product {
        display: flex;
        align-items: center;
        flex-direction: column;

        gap: 1px;
    }

    .product-details {
        display: flex;
        flex-direction: column;
        flex-wrap: wrap;
        gap: 10px;

        line-height: 12px;
        /* padding: 20px; */
    }

    img {
        width: 200px;
        height: 250px;
        border-radius: 5px;
    }

    .name {
        font-size: 18px;
        font-weight: bold;
        text-transform: capitalize;
    }

    .desc {
        font-size: 13px;
        width: 200px;
        overflow-y: scroll;
        text-overflow: ellipsis;
    }

    .btns {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .btn {
        background-color: #fff;
        color: black;
        border: 2px solid #000;
        padding: 5px 0px;
        cursor: pointer;
        transition: background 0.3s ease;
        border-radius: 20px;
        width: 100px;
        font-weight: 500;
        margin-left: 20px;
    }

    .price {
        font-size: 14px;
        color: #b12704;
        /* text-align: center; */
    }

    .btn:hover {
        background: #dadada;
    }

    .name-price {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 10px;
    }
</style>
<!-- <style>
    .product {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin: 15px;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 8px;
        background-color: #fff;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    .product-image img {
        width: 150px;
        height: 150px;
        object-fit: cover;
    }

    .product-details {
        text-align: center;
        margin-top: 10px;
    }

    .product-details .name {
        font-weight: bold;
        font-size: 1.1rem;
    }

    .product-details .price {
        color: #666;
        font-size: 1rem;
    }
</style> -->






<?php
include "./config.php";

// Get the category parameter from the URL
$category = isset($_GET['category']) ? mysqli_real_escape_string($conn, $_GET['category']) : '';

// Build the SQL query based on the selected category
if ($category == "All") {
    $sql = "SELECT * FROM products";
} elseif ($category) {
    $sql = "SELECT * FROM products WHERE category = '$category'";
} elseif (!$category) {
    $sql = "SELECT * FROM products";
} else {
    $sql = "SELECT * FROM products"; // Show all products if no category is selected
}

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "
        <div class='container'>
        <div class='product'>
            <div class='product-image'>
                <img src='./backend/" . $row['primaryimg'] . "' alt='" . $row['pname'] . "' />
            </div>
            <div class='product-details'>
                <p class='name'>" . $row['pname'] . "</p>
                <p class='price'>Rs. " . $row['price'] . "</p>
            </div>
            <p class='desc'>" . $row['description'] . "</p>
            <div class='btns'>
                    <form action='addToCart.php' method='POST'>
                        <input type='hidden' name='product_id' value='" . $row['id'] . "'>
                        <button class='btn' type='submit'>Add to Cart</button>
                    </form>
                    <a href='productDetails.php?id=" . $row['id'] . "' class='btn'>Details</a>
                </div>

            

        </div>
        </div>
        ";
    }
} else {
    echo "<p>No products found in this category.</p>";
}
?>