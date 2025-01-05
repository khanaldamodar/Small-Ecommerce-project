<div class="sidebar">
    <h2>WinterShop</h2>
    <ul>
      
        <li><a href="./addProducts.php">Add Products</a></li>
        <li><a href="./productList.php">Product List</a></li>
        <li><a href="profile.php">Profile</a></li>
    </ul>
    <div class="logout">
        <a href="logout.php">Logout</a>
    </div>
</div>

<style>
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: poppins;
    }
    .sidebar {
        width: 200px;
        height: 100vh;
        background-color: #f8f9fa;
        padding: 15px;
        box-shadow: 2px 0 5px rgba(0,0,0,0.1);
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        align-items: center;
        padding: 50px 10px;
    }
    .sidebar h2 {
        text-align: center;
        margin-bottom: 20px;
    }
    .sidebar ul {
        list-style-type: none;
        padding: 0;
    }
    .sidebar ul li {
        margin: 10px 0;
    }
    .sidebar ul li a {
        text-decoration: none;
        color: #333;
        display: block;
        padding: 10px;
        border-radius: 4px;
        transition: background-color 0.3s;
    }
    .sidebar ul li a:hover {
        background-color: #007bff;
        color: #fff;
    }
    .logout {
        
    }
    .logout a {
        text-decoration: none;
        color: #dc3545;
        padding: 10px;
        border-radius: 4px;
        transition: background-color 0.3s;
    }
    .logout a:hover {
        background-color: #dc3545;
        color: #fff;
    }
</style>