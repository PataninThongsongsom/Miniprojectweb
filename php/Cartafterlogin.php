<?php
session_start();


$user = $_SESSION['user_login'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/stylecart2.css">
    <title>Document</title>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src = "../js/cart2.js"></script>
</head>
<body>
   
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
  </div>

  <div class="cart-content">
    <h1>SHOPPING CART</h1>
    <p>STATUS: 1 ITEM</p>
    
</div>
<br>

<div class = "mycart">
    <div class = "product">
        <div class = "listcart">
            <div class = "numberlist">
                <img src = "../img/Product_cloth_dataset/tshirt/1.jpg" class ="numberlist-img">
                <div class = "numberlist-text">
                    <p class = "numberlist-name">T-SHIRT</p>
                    <p class = "numberlist-des">BEN10</p>
                </div>
                <div class ="quantity">
                    <button class ="quantity-btn decrease">-</button>
                    <h3 class ="item-quantity">1</h3>
                    <button class = "quantity-btn increase">+</button>
                </div>
                <h2 class = "numberlist-price">500 ฿</h2>
                <button class = "numberlist-del-btn"><ion-icon name="trash-sharp"></ion-icon></button>
            </div>
        </div>
       
    </div>
    <div class = "subtotal">
        <div class = "subtotal-box">
            <h1 class = "text">YOUR TOTAL</h1>
            <h2 class = "subtotalprice">500฿</h2>
            <a href="#" class="subtotal-btn">BUY NOW!</a>
        </div>
    </div>
</div>
<script src = "../js/cart.js"></script>

  
</body>
</html>