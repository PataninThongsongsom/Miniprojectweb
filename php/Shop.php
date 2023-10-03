<?php
session_start();
if (!isset($_SESSION['username'])) { // ถ้าlogin ไว้แล้ว
    header("location: ./afterlogin.php"); // ให้ redirect ไป หน้าlogin แล้ว
    exit;
}
include './connect.php'; // Include your database connection code
// Pagination configuration
$itemsPerPage = 16; // Number of items to display per page
$page = isset($_GET['page']) ? $_GET['page'] : 1; // Get the current page from the query string or default to page 1

// Calculate the offset (starting index) for the SQL query
$offset = ($page - 1) * $itemsPerPage;

// Query to select image paths with pagination
//$sql = "SELECT image_path FROM images LIMIT $offset, $itemsPerPage";
$sql = "SELECT images.image_path FROM images 
            JOIN products ON images.IMG_ID = products.IMG_ID LIMIT $offset, $itemsPerPage";
//sort Item
$sql2 = "SELECT image_path FROM images JOIN products ON images.IMG_ID=products.IMG_ID ORDER BY products.price DESC LIMIT $offset, $itemsPerPage;";
$sql3 = "SELECT image_path FROM images JOIN products ON images.IMG_ID=products.IMG_ID ORDER BY products.price ASC LIMIT $offset, $itemsPerPage;";

// if(isset($_POST['SortBT'])){
//     $result = $con->query($sql2);
// }else if(isset($_POST['SortBTASC'])){
//     $result = $con->query($sql3);
// }else{
//     $result = $con->query($sql);
// }

if (isset($_POST['submit-fitler'])|| !empty($_GET['category'])) {
    if (isset($_POST['category'])) {
        $category = $_POST['category'];
    }else if(isset($_GET['category'])){
        $category = $_GET['category'];
    } 
    else {
        // Handle the case where 'category' is not set, e.g., when no checkboxes are selected
        $category = []; // Initialize it as an empty array or handle it as needed
    }
    $maxPrice = isset($_POST['max-price']) ? $_POST['max-price'] : null;
    $minPrice = isset($_POST['min-price']) ? $_POST['min-price'] : null;

    // Create the base SQL query
     $sql = "SELECT images.image_path FROM images 
             JOIN products ON images.IMG_ID = products.IMG_ID";

    // Add category filter if selected
    if (!empty($category)) {
        $categoryFilters = [];
        foreach ($category as $cat) {
            if ($cat === 'shirt') {
                $categoryFilters[] = "products.CID = 1"; // Shirt category ID
            } elseif ($cat === 'Jeans') {
                $categoryFilters[] = "products.CID = 2"; // Jeans category ID
            }
        }
        if (!empty($categoryFilters)) {
            $sql .= " WHERE " . implode(" OR ", $categoryFilters);
        }

    }

    // Add price range filter if max and min prices are provided
    if (!empty($maxPrice) && !empty($minPrice)) {
        $sql .= " AND products.price BETWEEN $minPrice AND $maxPrice";
    }

    // Sort the results based on price
    $sql .= " ORDER BY products.price DESC LIMIT $offset, $itemsPerPage";

    // Execute the modified SQL query
    $result = $con->query($sql);
} else {
    // Default query without filtering
    // $result = $con->query($sql);
    if(isset($_POST['SortBT'])){
        $result = $con->query($sql2);
    }else if(isset($_POST['SortBTASC'])){
        $result = $con->query($sql3);
    }else{
        $result = $con->query($sql);
    }
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
$categoryFilter = isset($_POST['category']) ? implode(",", $_POST['category']) : '';
$categoryFilter2 = isset($_GET['category']) ? $_GET['category'] : $categoryFilter;
$maxPriceFilter = isset($_POST['max-price']) ? $_POST['max-price'] : '';
$minPriceFilter = isset($_POST['min-price']) ? $_POST['min-price'] : '';
// Construct the URL for Next and Previous links
$nextPageURL = "?page=" . ($page + 1);
$prevPageURL = "?page=" . ($page - 1);
$nextPageURL .= "&category=" . $categoryFilter2;
$prevPageURL .= "&category=" . $categoryFilter2;
// Include filter parameters in the URLs if they are set
// if (!empty($categoryFilter)) {
//     $nextPageURL .= "&category=" . $categoryFilter;
//     $prevPageURL .= "&category=" . $categoryFilter;
// }
if (!empty($maxPriceFilter)) {
    $nextPageURL .= "&max-price=" . $maxPriceFilter;
    $prevPageURL .= "&max-price=" . $maxPriceFilter;
}
if (!empty($minPriceFilter)) {
    $nextPageURL .= "&min-price=" . $minPriceFilter;
    $prevPageURL .= "&min-price=" . $minPriceFilter;
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
    <script src="https://kit.fontawesome.com/e08e147dde.js" crossorigin="anonymous"></script>
    <script src="../js/Shop.js"></script>
</head>

<body>
    <!-- <div class="WelcomePage">  
            <h1>Hello,welcome to our website</h1>  
        </div> -->
    <!-- Menu -->

    <nav id="side">
        <h1 id="closeFilter">CLOSE</h1>
        <form action="Shop.php" method="post" onsubmit="return validatePrice()">
            <h1>Category</h1>
            <div required>
                <input type="checkbox" id="shirt" name="category[]" value="shirt" <?php if (isset($_POST['category']) && in_array('shirt', $_POST['category'])) echo 'checked'; ?>>
                <label for="shirt">shirt</label>
                <input type="checkbox" id="Jeans" name="category[]" value="Jeans" <?php if (isset($_POST['category']) && in_array('Jeans', $_POST['category'])) echo 'checked'; ?>>
                <label for="Jean"> Jean</label>
            </div>

            <h1>Price</h1>
            <label for="max-price">Max Price : </label>
            <input type="number" name="max-price" placeholder="1000" value="<?php echo isset($_POST['max-price']) ? $_POST['max-price'] : ''; ?>"><br>
            <label for="max-price">Min Price : </label>
            <input type="number" name="min-price" min="100" placeholder="100" value="<?php echo isset($_POST['min-price']) ? $_POST['min-price'] : ''; ?>"><br>
            <input type="submit" name="submit-fitler" id="submit-filter">
        </form>

    </nav>

    <div class="top-menu">
        <img src="../img/Shadow.png" class="Shadow">
        <nav class="main-nav" style="display: relative; position: absolute;">
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
    <!-- <img class="shop-top-bg" src="../img/shop_img/bg-top2_small.jpg" alt=""> -->

    <div class="Shop-filter">
        <button id="filterBT" class="filterBT">Filter</button>
        <form action="./Shop.php" method="post">
            <div class="dropdown">
                <button class="SortBT" name="SortBT">Sort by Feature</button>
                <div class="dropdown-content" style="left: 1px;">
                    <button class="SortBT" name="SortBT">Sort by MAX</button>
                    <button class="SortBT" name="SortBTASC">Sort by MIN</button>
                </div>
            </div>
        </form>
    </div>

    <div id="image-container">
        
        <!-- Loop through the image paths and display the images -->
        <?php
        foreach ($imagePaths as $imagePath) {
            $sqlPrice = "SELECT products.price FROM products JOIN images ON products.IMG_ID = images.IMG_ID WHERE images.image_path = '$imagePath'";
            $priceResult = $con->query($sqlPrice);
            $price = $priceResult->fetch_assoc()['price'];
            echo '  <div class="product-item">
                        <img src="' . $imagePath . '" alt="Image" />
                        <p class="product-price">$' . $price . '</p>
                    </div>';
        
        }
        
        $con->close(); // Close the database connection
        ?>
    </div>

    <!-- Next-pic buttons (Next and Previous) -->
    <div class="Next-pic">
        <?php
        $totalPages = ceil($totalImages / $itemsPerPage);
        if ($page > 1) {
            echo '<a href="' . $prevPageURL . '">Previous</a>';
        }
        
        // Next button
        if ($page < $totalPages) {
            echo '<a href="' . $nextPageURL . '">Next</a>';
        }
        
        ?>
    </div>

</body>

</html>