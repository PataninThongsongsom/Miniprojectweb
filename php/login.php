<?php
// database connection code
// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');

$con = mysqli_connect('localhost', 'root', ' ','’webdevtest’');

// get the post records
$txtName = $_POST['txtName'];
$txtSurname = $_POST['txtsurname'];
$txtEmail = $_POST['txtEmail'];
$txtPhone = $_POST['txtPhone'];
$txtAddress = $_POST['$txtAddress'];

$txtPassword = $_POST['$txtPassword'];

// database insert SQL code
$sql = "INSERT INTO `member_detail` (`Name`, `Surname`, `Address`, `Email`,`Tel`) VALUES ('$txtName', '$txtSurname', '$txtAddress', '$txtEmail', '$txtPhone')";

// insert in database 
$rs = mysqli_query($con, $sql);

if($rs)
{
	echo "Contact Records Inserted";
}

?>
