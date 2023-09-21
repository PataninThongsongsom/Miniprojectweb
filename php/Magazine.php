<?php
session_start();
if (!isset($_SESSION['username'])) { // ถ้าไม่ได้เข้าระบบอยู่
    header("location: ./login.php"); // redirect ไปยังหน้า login.php
    exit;
}

$user = $_SESSION['user_login'];
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>O'clock</title>
        <link rel="icon" type="image/x-icon" href="../img/logo.png">
        <link rel="stylesheet" href="../css/style.css">
        <script src="../js/app.js"></script>
        
        
    </head>
    <body>
        <!-- <div class="WelcomePage">  
            <h1>Hello,welcome to our website</h1>  
        </div> -->
        <!-- Menu -->
        <div class="top-menu"> 
            <img src="../img/Shadow.png" class="Shadow" title="Shadow">
            <nav class="main-nav">
                <ul class="menu-left">
                    <a href="./afterlogin.php"><img src="../img/logo.png"class="logo"></a>
                    <li><a href="../html/Cart.html"class="Shop" href="">SHOP</a></li>
                    <li><a href="../php/Magazine.php" class="Magazine" href="">MAGAZINE</a></li>
                    <li><a class="Custom" href="../html/Custom.html">CUSTOM YOUR OWN</a></li>
                </ul>
                <div class="menu-right">
                    <input type="search" class="searchbox" placeholder="Search Products" >
                    <a href="../html/Cart.html"><img src="../img/cart.png" class="cart"></a>
                    <a href="../php/login.php"><img src="../img/Login.png" class="login"> </a>
                </div>
            </nav> 
        </div> 
        </div>
    </body>
</html>