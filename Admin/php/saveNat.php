<?php
	ini_set('display_errors', 1);
	error_reporting(~0);

	include 'connect.php';
	$a = $_POST["txtNatName"];
	$b = $_POST["txtNatID"];
	
	$sql = "UPDATE nature SET	Nat_Nature = '$a'	WHERE Nat_ID = '$b'";
	$query = mysqli_query($link,$sql) or die(mysqli_error($link));

	if($query) {
	 echo "Record update successfully";
	 header("location:../manageNat.php");
	}
	else {
		echo "error";
	}
	mysqli_close($link);
?>
