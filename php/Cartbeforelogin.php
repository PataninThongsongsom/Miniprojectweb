<?php
session_start();
if (!isset($_SESSION['username'])) { // ถ้าlogin ไว้แล้ว
    header("location: ./afterlogin.php"); // ให้ redirect ไป หน้าlogin แล้ว
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oclock</title>
    
    <!-- เพิ่มการเชื่อมต่อไปยังไลบรารี Ionicons -->
    <link rel="stylesheet" href="../css/stylecart.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/ionicons@5.5.1/dist/css/ionicons.min.css">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    
</head>
<body>
    <div class="container">
        <div class="top-menu"> 
            <img src="../img/Shadow.png" class="Shadow" title="Shadow">
            <nav class="main-nav">
                <ul class="menu-left">
                    <a href="index.html"><img src="../img/logo.png"class="logo"></a>
                    <li><a href="../html/Cart.html"class="Shop" href="">SHOP</a></li>
                    <li><a href="../html/Magazine.html" class="Magazine" href="">MAGAZINE</a></li>
                    <li><a class="Custom" href="./html/Custom.html">CUSTOM YOUR OWN</a></li>
                </ul>
                <div class="menu-right">
                    <input type="search" class="searchbox" placeholder="Search Products" >
                    <a href="../html/Cart.html"><img src="../img/cart.png" class="cart"></a>
                    <a href="../html/Login.html"><img src="../img/Login.png" class="login"> </a>
                </div>
            </nav>
            <div class="cart-content">
                <h1>SHOPPING CART</h1>
                <ion-icon name="cart-sharp"></ion-icon>
                <p>STATUS: EMPTY</p>
                
                <p class ="mytext">ลงชื่อเข้าใช้เพื่อดูรถเข็นของคุณและเริ่มช็อปปิ้ง</p>
                <a href="../html/Login.html" class="login-link">LOGIN</a>
            </div>
        </div> 
        
       
           
</body>
</html>
