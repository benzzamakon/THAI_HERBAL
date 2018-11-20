<?php
	session_start();
	include 'connect.php';
	$strSQL = "SELECT * FROM system_admin WHERE admin_username = '".mysqli_real_escape_string($link,$_POST['txtUsername'])."'
	and admin_password = '".mysqli_real_escape_string($link,$_POST['txtPassword'])."'";
	$objQuery = mysqli_query($link,$strSQL);
	$objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);
	if(!$objResult)
	{
			echo "Username and Password Incorrect!";
	}
	else
	{
			$_SESSION["admin_ID"] = $objResult["admin_ID"];
			session_write_close();
			header("location:../index.php");

	}
	//mysql_close();
?>
