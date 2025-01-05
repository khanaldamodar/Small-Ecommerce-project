<style>
    *{
        font-family: Poppins;
    }
    .header{ 
        /* background-color: #333; */
        color: #000000;
        text-align: center;
        border-radius: 10px;
    }
    nav{
        padding: 0px 30px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-size: 15px;
        font-weight: 500;
        flex-wrap: wrap;
    }
    .logo h1{
        margin: 0;
    }
    .nav-links{
        list-style: none;
        padding: 0;
        display: flex;
        gap: 3rem;
    }
    .user-action ul{
        list-style: none;
        padding: 0;
        display: flex;
        gap: 40px;
    }
    .nav-links  li{
        cursor: pointer;
    }
    
    .nav-links  li a, .user-action ul li a{
        text-decoration: none;
        color: #000000;
    }
    .nav-links  li a:hover, .user-action ul li a:hover{
        color: #666;
    }
   
    

</style>
<div class="header">
    <nav>
        <div class="logo">
            <h1>Winter-Shop</h1>
        </div>
        <ul class="nav-links">
            <li><a href="index.php">Dashboard</a></li>
            <li><a href="products.php">Products</a></li>
            <li><a href="blogs.php">Blogs</a></li>
            <li><a href="about.php">About</a></li>
        </ul>
        <div class="user-action">
            <ul>
                <li>Cart</li>
                <li><a href="login.php">Sign-In</a></li>
            </ul>
            
        </div>
    </nav>
</div>
