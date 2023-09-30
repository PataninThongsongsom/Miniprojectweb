<?php
session_start();


$user = $_SESSION['user_login'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Magazine</title>
    <link rel="stylesheet" href="../css/style-magazine.css">
    <link rel="javascript" href="../js/app-magazine.js">
</head>
<body>

    <!-- Menu -->
    <div class="top-menu"> 
        <!-- <img src="../img/Shadow.png" class="Shadow" title="Shadow"> -->
        <nav class="main-nav">
            <ul class="menu-left">
                <li><a href="./Shop.php"class="Shop" href="">SHOP</a></li>
                <li><a href="./Magazine.html" class="Magazine" href="">MAGAZINE</a></li>
                <li><a class="Custom" href="./Custom.php">CUSTOM YOUR OWN</a></li>\
                
            </ul>
            <!-- <div class="menu-middle">
                <a href="index.html"><img src="../img/logo.png"class="logo"></a>
            </div> -->
            <div class="menu-right">
                <!-- <input type="search" class="searchbox" placeholder="Search Products" > -->
                <a href="./html/Cart.html"><img src="../img/cart.png" class="cart"></a>
                <a href="./html/Login.html"><img src="../img/Login.png" class="login"> </a>
            </div>
        </nav>
    </div> 

    <!-- Banner -->
    <section class="Banner-Section">
        <header class="header translate"  data-speed="-0.7">MAGAZINE</header>
        <div class="Banner-Image">
            <img src="../img/Magazine/shadows.png" class="shadow">
            <img src="../img/Magazine/background1-back.png" class="background-back translate" id="back" data-speed="-0.6" alt="">
            <img src="../img/Magazine/background1-mid.png" class="background-mid translate" id="mid" data-speed="-0.2" alt="">
            <img src="../img/Magazine/background1-front.png" class="background-front translate" id="front" data-speed="-0.1" alt="">
        </div>
    </section>
    <section class="Magazine-Section">
        <header class="header-magazine">Magazine</header>
        <p class="detail"> 
            
        </p>
    </section>
    

   
    <script src="../js/app-magazine.js"></script>


    
</body>
</html>