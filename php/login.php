<?php
    // Start a session (if not already started)
    session_start();

    // Database connection code
    $con = mysqli_connect('localhost', 'root', '', 'webdevtest');

    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Query to check if the provided username and password match a record in the database
        $sql = "SELECT * FROM `member_account` WHERE `Username` = '$username' AND `Password` = '$password'";

        $result = mysqli_query($con, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            // Login successful
            $_SESSION['username'] = $username; // Store username in session for future use
            // echo "Ez";
            header("Location: ../index.html"); // Redirect to the dashboard or another secure page
            exit();
        } else {
            // Login failed
            echo "Invalid username or password. Please try again.";
        }
    } else {
        echo "Please provide both username and password.";
    }

    mysqli_close($con);
?>
