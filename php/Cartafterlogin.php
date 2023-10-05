<?php
session_start();
include "./connect.php";
if ($_GET["action"]=="add") {
	
	$pid = $_GET['pid'];
    $sql = "SELECT * FROM products WHERE PID = '$pid' ";
    
    $result = $con->query($sql);
    $res = mysqli_fetch_assoc($result);
	$cart_item = array(
 		'pid' => $pid,
		'pname' => $res["product_name"],
		'price' => $res["price"],
		'qty' => $_GET['qty'],
        'img' => $_GET['img']
	);

	// ถ้ายังไม่มีสินค้าใดๆในรถเข็น
	if(empty($_SESSION['cart']))
    	$_SESSION['cart'] = array();
 
	// ถ้ามีสินค้านั้นอยู่แล้วให้บวกเพิ่ม
	if(array_key_exists($pid, $_SESSION['cart'])){
		$_SESSION['cart'][$pid]['qty'] += $_GET['qty'];
		
	}
		
	// หากยังไม่เคยเลือกสินค้นนั้นจะ
	else
	    $_SESSION['cart'][$pid] = $cart_item;

// ปรับปรุงจำนวนสินค้า
} else if ($_GET["action"]=="update") {
	$pid = $_GET["pid"];     
	$qty = $_GET["qty"];
	$_SESSION['cart'][$pid]['qty'] = $qty;

// ลบสินค้า
} else if ($_GET["action"]=="delete") {
	
	$pid = $_GET['pid'];
	unset($_SESSION['cart'][$pid]);
}


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
    <!-- <script src = "../js/cart2.js"></script> -->
</head>
<body>
   
   <div class="top-menu"> 
    <img src="../img/Shadow.png" class="Shadow" title="Shadow">
    <nav class="main-nav">
        <ul class="menu-left">
            <a href="./afterlogin.php"><img src="../img/logo.png"class="logo"></a>
            <li><a href="./Shop.php"class="Shop" href="">SHOP</a></li>
            <li><a href="./Magazine.php" class="Magazine" href="">MAGAZINE</a></li>
            <li><a class="Custom" href="./Custom.php">CUSTOM YOUR OWN</a></li>
        </ul>
        <div class="menu-right">
            <input type="search" class="searchbox" placeholder="Search Products" >
            <a href="#"><img src="../img/cart.png" class="cart"></a>
            <a href="./login.php"><img src="../img/Login.png" class="login"> </a>
        </div>
    </nav>
  </div>

  <div class="cart-content">
    <h1>SHOPPING CART</h1>
    <p>STATUS: 1 ITEM</p>
    
</div>
<br>
<?php
            $sum =0;
            foreach ($_SESSION["cart"] as $item){
                $sum += $item["price"] * $item["qty"];
            ?>
    <div class = "mycart">
        
        <div class = "product">
        <div class = "listcart">
            <div class = "numberlist">
                
                <img src = "<?=$item["img"]?>" class ="numberlist-img">
                <div class = "numberlist-text">
                    
                    <p class = "numberlist-name"><?=$item["pname"]?></p>
                    <!-- <p class = "numberlist-des">BEN10</p> -->
                </div>
                <div class ="quantity">
                    <button class ="quantity-btn decrease">-</button>
                    <h3 class ="item-quantity"><?=$item["qty"]?></h3>
                    <button class = "quantity-btn increase">+</button>
                </div>
                <h2 class = "numberlist-price"><?=$item["price"]?> ฿</h2>
                <!-- <button class = "numberlist-del-btn"><ion-icon name="trash-sharp" ></ion-icon></button><br> -->
                <a href="?action=delete&pid=<?=$item["pid"]?>">ลบ</a>
                
            </div>
        </div>
      
    </div> <?php }?>
    <div class = "subtotal">
        <div class = "subtotal-box">
            <h1 class = "text">YOUR TOTAL</h1>
            <h2 class = "subtotalprice"><?=$sum?> ฿</h2>
            <a href="#" class="subtotal-btn">BUY NOW!</a>
        </div>
    </div>
</div> 
<script src = "../js/cart.js"></script>

  
</body>
</html>