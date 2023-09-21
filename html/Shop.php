<?php
if (isset($_SESSION['username'])) { // ถ้าlogin ไว้แล้ว
    header("location: ../php/afterlogin.php"); // ให้ redirect ไป หน้าlogin แล้ว
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
        <script src="../js/app.js"></script>
        <script src="https://kit.fontawesome.com/e08e147dde.js" crossorigin="anonymous"></script>
        
    </head>
    <body>
        <!-- <div class="WelcomePage">  
            <h1>Hello,welcome to our website</h1>  
        </div> -->
        <!-- Menu -->
        <div class="top-menu"> 
            <img src="../img/Shadow.png" class="Shadow">
            <nav class="main-nav">
                <ul class="menu-left">
                    <a href="../index.php"><img src="../img/logo.png"class="logo"></a>
                    <li><a class="Shop" href="">SHOP</a></li>
                    <li><a href="Magazine.html" class="Magazine" href="">MAGAZINE</a></li>
                    <li><a class="Custom" href="">CUSTOM YOUR OWN</a></li>
                </ul>
                <div class="menu-right">
                    <input type="search" class="searchbox" placeholder="Search Products" >
                    <a href="Cart.html"><img src="../img/cart.png" class="cart"></a>
                    <a href="Login.html"><img src="../img/Login.png" class="login"> </a>
                </div>
            </nav>     
        </div> 
        <img class="shop-top-bg" src="../img/shop_img/bg-top2_small.jpg" alt="">

        <div class="Shop-filter">
            <button class="filterBT">Filter</button>
            <button class="SortBT">Sort by Feature</button>
            <!-- <img src="/img/shop_img/t-shirt.png" alt="">
            <img src="/img/shop_img/jeans.svg" alt="">
            <p class="catalog1">Shirt</p>
            <p class="catalog3">jean</p> -->
        </div>

        <div class="Shop-object">
            <img src="" alt="">
        </div>

    </body>
</html>