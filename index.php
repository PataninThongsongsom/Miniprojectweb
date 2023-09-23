<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>O'clock</title>
        <link rel="icon" type="image/x-icon" href="./img/logo.png">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@100;200;300;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="./css/style.css">
        <script src="../js/app.js"></script>
        
        
    </head>
    <body>
        <!-- Menu -->
        <div class="top-menu"> 
            <img src="./img/Shadow.png" class="Shadow" title="Shadow">
            <nav class="main-nav">
                <ul class="menu-left">
                    <a href="index.html"><img src="./img/logo.png"class="logo"></a>
                    <li><a href="./html/Cart.html"class="Shop" href="">SHOP</a></li>
                    <li><a href="./html/Magazine.html" class="Magazine" href="">MAGAZINE</a></li>
                    <li><a class="Custom" href="./html/Custom.html">CUSTOM YOUR OWN</a></li>
                </ul>
                <div class="menu-right">
                    <input type="search" class="searchbox" placeholder="Search Products" >
                    <a href="./html/Cart.html"><img src="./img/cart.png" class="cart"></a>
                    <a href="./html/Login.html"><img src="./img/Login.png" class="login"> </a>
                </div>
            </nav>
            
        </div> 
        <!-- Banner -->
        <div class="Banner">
            <!--Effect ภาพ Banner-->
            <!-- <div class="black_effect"></div>-->
            <video src="./vdo/BannerVideo.mp4" class="VdoBanner" autoplay muted loop playsinline data-object-fit="cover">
        </div>  
        <!-- Recommand -->
        <div class="Recommand">
            <div class="Rec-image">
                <img src="./img/Customyourown-new.png" class="cyo" title="cyo">
            </div>
            <div class="Rec-paragraph">
                <h1 class="Rec-paragraph-Headers">Custom Your Own!</h1>
                <p class="Rec-paragraph-Paragraph">
                    เปิดตัว เว็บแรกของโลกที่สามารถเอารูป ควาย
                    เข้าไปในเสื้อของคุณได้ ไม่มีเว็บไหนที่มีเทคโนโลยีที่
                    ทำได้ขนาดนี้มาก่อน! โดยเทคโนโลยีนี้ได้รับแรงบันดาลใจ
                    ต่อยอดมาจากเสื้อผ้ายอดฮิตจาก อภิชาติฟาร์ม
                </p>
                <button class="Button-Paragraph" onclick="window.location.href='./html/uploadfile.html'">ทดลองใช้</button>
            </div>
        </div>
        
    </body>
</html>