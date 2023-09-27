<?php
session_start();
if (!isset($_SESSION['username'])) { // ถ้าlogin ไว้แล้ว
    header("location: ./afterlogin.php"); // ให้ redirect ไป หน้าlogin แล้ว
    exit;
}
include './connect.php'; // Include your database connection code
// Pagination configuration
$itemsPerPage = 8; // Number of items to display per page
$page = isset($_GET['page']) ? $_GET['page'] : 1; // Get the current page from the query string or default to page 1

// Calculate the offset (starting index) for the SQL query
$offset = ($page - 1) * $itemsPerPage;

// Query to select image paths with pagination
$sql = "SELECT image_path FROM images LIMIT $offset, $itemsPerPage";
//sort Item
$sql2 = "SELECT image_path FROM images JOIN products ON images.IMG_ID=products.IMG_ID ORDER BY products.price DESC LIMIT $offset, $itemsPerPage;";
$sql3 = "SELECT image_path FROM images JOIN products ON images.IMG_ID=products.IMG_ID ORDER BY products.price ASC LIMIT $offset, $itemsPerPage;";
if(isset($_POST['SortBT'])){
    $result = $con->query($sql2);
}else if(isset($_POST['SortBTASC'])){
    $result = $con->query($sql3);
}else{
    $result = $con->query($sql);
}

$imagePaths = []; // An array to store the image paths

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $imagePaths[] = $row['image_path'];
    }
}

// Count the total number of images in the database
$totalImagesQuery = "SELECT COUNT(*) as total FROM images";
$totalImagesResult = $con->query($totalImagesQuery);
$totalImages = $totalImagesResult->fetch_assoc()['total'];
$con->close(); // Close the database connection
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
                <a href="afterlogin.php"><img src="../img/logo.png" class="logo"></a>
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
        <button id="filterBT" class="filterBT">Filter</button>
        <form action="./Shop.php" method="post">
            <div class="dropdown">
                <button class="SortBT" name="SortBT">Sort by Feature</button>
                <div class="dropdown-content" style="left: 1px;">
                    <button class="SortBT" name="SortBT">Sort by DESC</button>
                    <button class="SortBT" name="SortBTASC">Sort by ASC</button>
                </div>
            </div>
        </form>
    </div>

    <div id="image-container">
        <!-- Loop through the image paths and display the images -->
        <?php
        foreach ($imagePaths as $imagePath) {
            echo '<img src="' . $imagePath . '" alt="Image" />';
        }
        ?>
    </div>

    <!-- Next-pic buttons (Next and Previous) -->
    <div class="Next-pic">
        <?php
        $totalPages = ceil($totalImages / $itemsPerPage);

        // Previous button
        if ($page > 1) {
            $prevPage = $page - 1;
            echo '<a href="?page=' . $prevPage . '">Previous</a>';
        }

        // Next button
        if ($page < $totalPages) {
            $nextPage = $page + 1;
            echo '<a href="?page=' . $nextPage . '">Next</a>';
        }
        ?>
    </div>

</body>

</html>