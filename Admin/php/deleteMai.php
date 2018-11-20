<?php
  include 'connect.php';
	ini_set('display_errors', 1);
	error_reporting(~0);

	$MaiID = $_GET["Mai_ID"];
	$sql = "DELETE FROM maintain
			WHERE Mai_ID = '".$MaiID."' ";

	$query = mysqli_query($link,$sql);

	if(mysqli_affected_rows($link)) {
     header("location:iframeMai.php");
	}

	mysqli_close($link);
?>
