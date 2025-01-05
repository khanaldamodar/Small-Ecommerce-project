<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Winter-Shop</title>
    <style>
        .banner {
            width: 100%;
            height: 300px;
        }

        .banner img {
            width: 90%;
            height: 100%;
            object-fit: cover;
            margin: 10px 70px;
            align-items: center;
        }

        .populars,
        .sweaters,
        .jacktes {
            margin-top: 30px;
            margin-left: 100px;

        }

        .populars h1,
        .sweaters h1,
        .jacktes h1 {

            margin: 0px 60;
            font-size: 2rem;
            font-weight: 600;

            text-transform: uppercase;

        }

        .popular-products,
        .sweater-products,
        .jacket-products {
            /* display: flex;
            justify-content: center;
            flex-wrap: wrap; */
            overflow: auto;
            white-space: nowrap;
            margin-right: 170px;

        }

        ::-webkit-scrollbar {
            display: none;
        }
    </style>
</head>


<body>
    <?php include_once './includes/userNavbar.php'; ?>
    <div class="container-main">
        <div class="banner">
            <img src="./img/banner.png" alt="">
        </div>

        <div class="populars">
            <h1>Popular Products</h1>
            <div class="popular-products">
                <?php include './includes/popularCard.php'; ?>
               
            </div>

        </div>
        <div class="sweaters">
            <h1>Sweaters</h1>
            <div class="sweater-products">
                <?php include './includes/sweater.php'; ?>
               
            </div>
        </div>
        <div class="jacktes">
            <h1>Jackets</h1>
            <div class="jacket-products">
                <?php include './includes/jacket.php'; ?>
            </div>
        </div>

    </div>
    <?php include './includes/Footer.html'; ?>

</body>

</html>