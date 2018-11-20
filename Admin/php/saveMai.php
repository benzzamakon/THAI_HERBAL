<?php
	ini_set('display_errors', 1);
	error_reporting(~0);

	include 'connect.php';
	$a = $_POST["txtMaiName"];
	$b = $_POST["txtMaiID"];

	$sql = "UPDATE maintain SET	Mai_Name = '$a'	WHERE Mai_ID = '$b'";
	$query = mysqli_query($link,$sql) or die(mysqli_error($link));

	if($query) {
	 echo "Record update successfully";
	 header("location:../manageMai.php");
	}
	else {
		echo "error";
	}
	mysqli_close($link);
?>
