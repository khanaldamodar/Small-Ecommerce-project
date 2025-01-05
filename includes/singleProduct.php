<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Name</title>
    <style>
        * {
            font-family: poppins;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .fullpage {
            height: 95vh;
            display: flex;
            justify-content: space-between;
            overflow: hidden;
            padding: 20px;
            /* position: fixed;
            top: 10; */

        }

        .images {
            /* background-color: green; */
            display: flex;
            /* flex-wrap: wrap; */
            flex-direction: column;
            justify-content: center;
            /* align-items: center; */
            width: 55%;
        }

        .small-images {
            padding: px 40px 0px 0px;
            margin-top: 50px;
            display: flex;
            justify-content: center;

            gap: 10px;
        }

        .bottom-image {
            margin-top: 0px;
            width: 15vh;
            height: 12vh;
            border-radius: 5px;
            margin: 10px;
        }

        .main {
            width: 90%;
            height: auto;
            border-radius: 5px;
        }

        .product-details {
            /* background-color: yellow; */
            padding-top: 20px;
            padding-right: 20px;
            border-radius: 5px;
            display: flex;
            flex-direction: column;
            gap: 20px;

            /* align-items: center; */
        }

        .product-detail {
            font-size: 1rem;
            color: rgb(48, 45, 45);
        }

        .price {
            font-size: 1.5rem;
            color: rgb(48, 45, 45);
            font-weight: bold;
        }

        .price-info {
            font-size: 0.8rem;
            color: rgb(48, 45, 45);
            text-transform: capitalize;
        }

        .product-color {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .colors {
            display: flex;
            gap: 30px;
        }

        .colors button {
            height: 40px;
            width: 40px;
            padding: 10px 20px;
            border: none;
            border-radius: 50%;
            cursor: pointer;
        }

        .total-products {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .quantity {
            padding: 0 10px;
            width: 120px;
            height: 40px;
            background-color: #dadada;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 20px;
            border-radius: 20px;
            /* border: 1px solid black; */
        }

        .quantity button,
        .quantity span {
            background: none;
            border: none;
            color: #000;
            font-size: 1.2rem;
            cursor: pointer;
            background-color: #dadada;
        }

        .quantity-container {
            display: flex;
            /* justify-content: center; */
            align-items: center;
            gap: 20px;
        }

        .left-items {
            font-size: 0.8rem;
            color: #000;
            font-weight: 600;
            width: 120px;
        }

        .action {
            display: flex;
            gap: 20px;
            padding-top: 20px;
        }

        .action button {
            padding: 6px 30px;
            border: none;
            border-radius: 20px;
            cursor: pointer;
            /* background-color: #dadada; */
            transition: 0.2 ease-in-out;
        }

        .action button:hover {
            background-color: #dadada;
        }

        .product-name {
            font-size: 1.3rem;
            color: rgb(48, 45, 45);
            font-weight: bold;
            padding: 3px;
        }

        .product-description {
            font-size: 1rem;
            color: rgb(112, 94, 94);
            font-weight: bold;
            padding-top: 9px;
        }

        .product-detail {
            font-size: 0.8rem;
            font-weight: 500;
            padding-top: 9px;

        }
    </style>
</head>

<body>
    <p style="margin-left: 90px; padding-top: 10px; "><em>Home / Category / Product Name</em></p>
    <div class="fullpage">
        <div class="images">
            <img class="main" src="img/1.jpg" alt="Product Image">
            <div class="small-images">
                <img class="bottom-image" src="img/1.jpg" alt="Product Image">
                <img class="bottom-image" src="img/2.jpg" alt="Product Image">
                <img class="bottom-image" src="img/3.jpg" alt="Product Image">
                <img class="bottom-image" src="img/4.jpg" alt="Product Image">
            </div>
        </div>
        <div class="product-details">

            <div>
                <h1 class="product-name">Product Name</h1>
                <p class="product-description">Description : </p>
                <p class="product-detail">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quod.</p>
            </div>
            <hr style="height:2px; border-width:0;color:rgb(177, 177, 177);background-color:rgb(238, 238, 238); width:500px;">
            <div class="price-detail">
                <p class="price">Rs. 100</p>
                <p class="price-info">best price in the market for now.</p>
            </div>
            <hr style="height:2px; border-width:0;color:rgb(177, 177, 177);background-color:rgb(238, 238, 238); width:500px;">
            <div class="product-color">
                <h2>Choose a Color</h2>
                <div class="colors">
                    <button style="background-color: aliceblue;"></button>
                    <button style="background-color: aqua;"></button>
                    <button style="background-color: blanchedalmond;"></button>
                    <button style="background-color: rgb(10, 114, 76);"></button>
                    <button style="background-color: rgb(47, 34, 84);"></button>
                </div>
            </div>
            <hr style="height:2px; border-width:0;color:rgb(177, 177, 177);background-color:rgb(238, 238, 238); width:500px;">
            <div class="total-products">
                <h2>Quantity</h2>
                <div class="quantity-container">
                    <div class="quantity">
                        <button>-</button>
                        <span>1</span>
                        <button>+</button>
                    </div>
                    <div class="left-items">
                        <p>only <span style="color: rgb(230, 130, 9);">12 items</span> Left! Don't miss out!</p>
                    </div>
                </div>
                <div class="action">
                    <button style="color: green; font-weight: 700; background-color: white; border: 1px solid green;">Add to Cart</button>
                    <button style="background-color: green; color: white;">Buy Now</button>
                </div>
            </div>

        </div>
</body>

</html>