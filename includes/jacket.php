<style>
  * {
    font-family: poppins;
  }

  .container {
    margin: 30px;
    width: 220px;
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

  .btn {
    background-color: #fff;
    color: black;
    border: 2px solid #000;
    padding: 5px 0px;
    cursor: pointer;
    transition: background 0.3s ease;
    border-radius: 20px;
    width: 130px;
    font-weight: 600;
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

<?php
include "./config.php";
$sql = "SELECT * FROM products where category = 'Jacket'";
$result = mysqli_query($conn, $sql);

?>
<?php
if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    echo "
    <div class='container'>
        <div class='product'>
            <div class='product-image'>
                <img src='./backend/".$row['primaryimg']."' alt='".$row['pname']."' /> 
                
            </div>

            <div class='product-details'>
                <div class='name-price'>
                    <p class='name'>".$row['pname']."</p>
                    <p class='price'>Rs.".$row['price']."</p>
                </div>
                <p class='desc'>".$row['description']."</p>

                <button class='btn'>Add to Cart</button>
            </div>
        </div>
    </div>
";

  }
}

?>