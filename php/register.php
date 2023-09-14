<?php
// database connection code
if(isset($_POST['Submit']))
{
    // $con = mysqli_connect('localhost', 'database_user', 'database_password','database');
    $con = mysqli_connect('localhost', 'root', '', 'webdevtest');

    // Get the post records
    $txtName = $_POST['txtName'];
    $txtSurname = $_POST['txtsurname'];
    $txtEmail = $_POST['txtEmail'];
    $txtPhone = $_POST['txtPhone'];
    $txtAddress = $_POST['txtAddress'];

    $txtUsername = $_POST['Username'];
    $txtPassword = $_POST['Password'];

    // Database insert SQL code for member_detail table
    $sql = "INSERT INTO `member_detail` (`Name`, `Surname`, `Email`, `tel`, `Address`) VALUES ('$txtName', '$txtSurname', '$txtEmail', '$txtPhone', '$txtAddress')";

    // Insert into member_detail and check for success
    $rs = mysqli_query($con, $sql);
    if($rs)
    {
        // Retrieve the auto-generated Id from the last insert operation
        $mdId = mysqli_insert_id($con);

        // Database insert SQL code for member_account table using the retrieved Id
        $sql2 = "INSERT INTO `member_account` (`Username`, `Password`, `MD_id`) VALUES ('$txtUsername', '$txtPassword', '$mdId')";

        // Insert into member_account
        $rs2 = mysqli_query($con, $sql2);

        if($rs2)
        {
            header("Location: ../Login.html");
            exit();
            

        }
        else
        {
            echo "Failed to insert into member_account";
        }
    }
    else
    {
        echo "Failed to insert into member_detail";
    }
}
else
{
    echo "Are you a genuine visitor?";
}
?>
