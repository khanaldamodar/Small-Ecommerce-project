<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <style>
         ::-webkit-scrollbar {
            display: none;
        }
        .product-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding-top: 50px;
        }

        .categories {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 50px;
        }

        .categories button {
            padding: 10px 14px;
            border: none;
            background-color: #f1f1f1;
            color: black;
            cursor: pointer;
            border-radius: 30px;
            font-weight: 600;
        }

        .categories button:hover {
            background-color: #ddd;
        }

        .categories button.active {
            background-color: #666;
            color: white;
        }

        .all-products {
            /* display: flex; */
            /* justify-content: center; */
            /* align-items: center; */
            /* gap: 20px; */
            /* flex-wrap: wrap; */
            margin-top: 30px;
            display: grid;
            grid-template-columns: auto auto auto auto;
        }
    </style>
</head>

<body>
    <?php include './includes/userNavbar.php'; ?>
    
    <div class="product-container">
        <div class='categories'>
            <button class="category-button" data-category="All">All</button>
        <?php
        include "./config.php";
        $sql = "SELECT * FROM categories";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result)>0){
            while($row = mysqli_fetch_assoc($result)){
                echo "<button class='category-button' data-category='".$row['category']."'>".$row['category']."</button>";
            
        }
    }
    ?>
        </div>
        <div class="all-products">
            

                <?php include './includes/allProduct.php'; ?>
            
        </div>


    </div>
    <?php include './includes/Footer.html'; ?>

    
        <script>
    document.querySelectorAll('.category-button').forEach(button => {
        button.addEventListener('click', function () {
            const category = this.getAttribute('data-category');
            const queryString = `?category=${encodeURIComponent(category)}`;
            window.location.href = window.location.pathname + queryString;
        });
    });
</script>
   
</body>

</html>