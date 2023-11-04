<?php
if (isset($_SESSION['username'])) { // ถ้าlogin ไว้แล้ว
    header("location: ../html/afterlogin.html"); // ให้ redirect ไป หน้าlogin แล้ว
    exit;
}
?>
<!DOCTYPE html>
<html>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>O'clock</title>
        <link rel="icon" type="image/x-icon" href="./img/logo.png">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@100;200;300;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="./css/style.css">
        <link rel="stylesheet" href="./css/style-dropbar.css">
        <script src="../js/app.js"></script>
        
        
    </head>
    <body>
        <!-- Menu Herizon -->
        <div class="hamburger-menu">
            <input id="menu__toggle" type="checkbox" />
            <label class="menu__btn" for="menu__toggle">
                <span></span>
            </label>
            <ul class="menu__box">
            <li><a class="menu__item" href="index.php">Home</a></li>
                    <li><a class="menu__item" href="./php/Shop.php">Shop</a></li>
                    <li><a class="menu__item" href="./php/Magazine.php">Magazine</a></li>
                    <li><a class="menu__item" href="./php/Custom.php">Custom Your Own</a></li>
                    <li><a class="menu__item" href="./php/login.php">Login</a></li>
            </ul>
        </div>
        <!-- Menu Verticle-->
        <div class="top-menu"> 
            <img src="./img/Shadow.png" class="Shadow" title="Shadow">
            <nav class="main-nav">
                <ul class="menu-left">
                    <a href="index.php"><img src="./img/logo.png"class="logo"></a>
                    <li><a href="./php/Shop.php"class="Shop" href="">SHOP</a></li>
                    <li><a href="./php/Magazine.php" class="Magazine" href="">MAGAZINE</a></li>
                    <li><a class="Custom" href="./php/Custom.php">CUSTOM YOUR OWN</a></li>
                </ul>
                <div class="menu-right">
                    <input type="search" class="searchbox" placeholder="Search Products" >
                    <a href="./php/Cartbeforelogin.php"><img src="./img/cart.png" class="cart"></a>
                    <a href="./php/login.php"><img src="./img/Login.png" class="login"> </a>
                </div>
            </nav>
            
        </div> 
        <!-- Banner -->
        <div class="Banner">
            <video src="./vdo/BannerVideo.mp4" class="VdoBanner" autoplay muted loop playsinline data-object-fit="cover">
        </div>  
        <!-- Recommand -->
        <div class="Recommand">
            <div class="Rec-image">
                <img src="./img/Customyourown-neww.png" class="cyo" title="cyo">
            </div>
            <div class="Rec-paragraph">
                <h1 class="Rec-paragraph-Headers">Custom Your Own!</h1>
                <p class="Rec-paragraph-Paragraph">
                สร้างสไตล์ของคุณเอง! เลือกผ้าที่คุณชื่นชอบ ทำให้เสื้อของคุณไม่เหมือนใคร! เริ่มต้นที่ O'Clock และเป็นส่วนหนึ่งของการสร้างสรรค์แฟชั่นของคุณได้เลย!
                </p>
                <button class="Button-Paragraph" onclick="window.location.href='./html/uploadfile.html'">ทดลองใช้</button>
            </div>
        </div>
        <!-- Detail -->
        <div class="Detail-area">
            <div class="Detail-grid">
                <div class="Copyright">
                    <h4 class="Copyright-detail" style="color:white;">Copyright © 2023 O'Clock. All Rights Reserved.</h4>
            </div>
        </div>
        
    </body>
</html>