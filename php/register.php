<?php
	// database connection code
	if(isset($_POST['Submit']))
	{
	// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');
	$con = mysqli_connect('localhost', 'root', '','webdevtest');

	// get the post records

	$txtName = $_POST['txtName'];
	$txtSurname=$_POST['txtsurname'];
	$txtEmail = $_POST['txtEmail'];
	$txtPhone = $_POST['txtPhone'];
	$txtAddress = $_POST['txtAddress'];

	// database insert SQL code
	$sql = "INSERT INTO `member_detail` (`Id`, `Name`, `Surname`, `Email`, `tel`, `Address`) VALUES ('0', '$txtName', '$txtSurname', '$txtEmail', '$txtPhone', '$txtAddress')";
	//$sql = "INSERT INTO `member_detail` (`Id`, `Name`, `Surname`, `Email`, `tel`, `Address`) VALUES ('0', 'test', 'test2', 'patanin@dd', '098222', 'สวัสดี test')";
	// $sql = "INSERT INTO `member_detail` (`Id`, `Name`, `Surname`, `Email`, `tel`, `Address`) VALUES (\'0\', \'test11\', \'test23\', \'daw@gma\', \'098211\', \'sad22123\');";
	// insert in database 
	$rs = mysqli_query($con, $sql);
	if($rs)
	{
		echo "Contact Records Inserted";
	}
	}
	else
	{
		echo "Are you a genuine visitor?";
		
	}
?>
