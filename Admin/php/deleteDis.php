<?php
  include_once 'connect.php';
	ini_set('display_errors', 1);
	error_reporting(~0);

	$disID = $_GET["Dis_ID"];
	$sql = "DELETE FROM disease
			WHERE Dis_ID = '".$disID."' ";

	$query = mysqli_query($link,$sql);

	if(mysqli_affected_rows($link)) {
     header("location:iframeDis.php");
	}

	mysqli_close($link);
?>
