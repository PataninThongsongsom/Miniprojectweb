<?php
session_start();
if (!isset($_SESSION['username'])) { // ถ้าlogin ไว้แล้ว
    header("location: ./afterlogin.php"); // ให้ redirect ไป หน้าlogin แล้ว
    exit;
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>O'clock</title>
    <link rel="icon" type="image/x-icon" href="./img/logo.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@100;200;300;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    
    <script src="../js/Shop.js"></script>
    <script src="https://kit.fontawesome.com/e08e147dde.js" crossorigin="anonymous"></script>

</head>

<body>
    <!-- <div class="WelcomePage">  
            <h1>Hello,welcome to our website</h1>  
        </div> -->
    <!-- Menu -->

    <nav id="side">
        <h1 id="closeFilter">CLOSE</h1>
        <div id="side-content">
            <h1>Category</h1>
            <div id="category">
                    <input type="checkbox" id="shirt" name="shirt" value="shirt">
                    <label for="shirt">shirt</label>
                    <input type="checkbox" id="Jean" name="Jean" value="Jean">
                    <label for="Jean"> Jean</label>
            </div>
            <h1>Price</h1>
            <div id="Price">
                    <label for="max-price">Max Price : </label>
                    <input type="text">
                    <label for="max-price">Min Price : </label>
                    <input type="text">
            </div>
            <input type="submit" id="submit-filter">
            <!-- <h1>Color</h1> -->
        </div>
    </nav>

    <div class="top-menu">
        <img src="../img/Shadow.png" class="Shadow">
        <nav class="main-nav">
            <ul class="menu-left">
                <a href="../index.php"><img src="../img/logo.png" class="logo"></a>
                <li><a class="Shop" href="">SHOP</a></li>
                <li><a href="./Magazine.php" class="Magazine" href="">MAGAZINE</a></li>
                <li><a class="Custom" href="./Custom.php">CUSTOM YOUR OWN</a></li>
            </ul>
            <div class="menu-right">
                <input type="search" class="searchbox" placeholder="Search Products">
                <a href="../html/cart2.html"><img src="../img/cart.png" class="cart"></a>
                <div class="dropdown">
                        <img src="../img/Login.png" class="login" alt="Login Icon">
                        
                        <div class="dropdown-content" style="left: 1px;">
                            
                            <a href="./profile.php">PROFILE</a>
                            <a href="./logout.php">LOGOUT</a>
                        </div>
                        <p style="text-align: center;">Hi <?php echo $_SESSION['username']; ?></p>
                    </div>
                <!-- <a href="Login.php"><img src="../img/Login.png" class="login"> </a> -->
            </div>
        </nav>
    </div>
    <img class="shop-top-bg" src="../img/shop_img/bg-top2_small.jpg" alt="">

    <div class="Shop-filter">
        <button id="filterBT"class="filterBT">Filter</button>
        <button class="SortBT">Sort by Feature</button>
    </div>

    <div id="image-container">
        <!-- Images will be inserted here -->
    </div>

    <div class="Next-pic">
        <button id="prev-button">Previous</button>
        <button id="next-button">Next</button>
    </div>

</body>

</html>