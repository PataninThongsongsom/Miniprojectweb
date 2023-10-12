<?php
    include "./connect.php";
    $sqlcheck = "SELECT username FROM `member_account` ";
    $resultCheck = mysqli_query($con, $sqlcheck);
    $takenUsernames =(array) $resultCheck;

    sleep(1);

    if (!in_array( $_GET["username"], $takenUsernames )) {
        echo "okay";
    } else {
        echo "denied";
    }
?>
