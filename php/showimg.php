<?php
include 'connect.php'; // Include your database connection code

// Pagination configuration
$itemsPerPage = 8; // Number of items to display per page
$page = isset($_GET['page']) ? $_GET['page'] : 1; // Get the current page from the query string or default to page 1

// Calculate the offset (starting index) for the SQL query
$offset = ($page - 1) * $itemsPerPage;

// Query to select image paths with pagination
$sql = "SELECT image_path FROM images LIMIT $offset, $itemsPerPage";
$result = $con->query($sql);

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
    <!-- ... your other head content ... -->
</head>

<body>
    <!-- ... your existing HTML content ... -->

    <div id="image-container">
        <!-- Loop through the image paths and display the images -->
        <?php
        foreach ($imagePaths as $imagePath) {
            echo '<img src="' . $imagePath . '" alt="Image" />';
        }
        ?>
    </div>

    <!-- Pagination buttons (Next and Previous) -->
    <div class="pagination">
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

    <!-- ... your existing HTML content ... -->
</body>

</html>
