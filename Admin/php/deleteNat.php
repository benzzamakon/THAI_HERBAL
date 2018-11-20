<?php
  include 'connect.php';
	ini_set('display_errors', 1);
	error_reporting(~0);

	$NatID = $_GET["Nat_ID"];
	$sql = "DELETE FROM nature
			WHERE Nat_ID = '".$NatID."' ";

	$query = mysqli_query($link,$sql);

	if(mysqli_affected_rows($link)) {
     header("location:iframeNat.php");
	}

	mysqli_close($link);
?>
