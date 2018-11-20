<?php
  include_once 'connect.php';
	ini_set('display_errors', 1);
	error_reporting(~0);

	$HerID = $_GET["Her_ID"];
	$sql = "DELETE FROM herb WHERE Her_ID = '".$HerID."' ";
  $sql2 = "DELETE FROM herb_disease WHERE Her_ID = '".$HerID."' ";
  $sql3 = "DELETE FROM herb_maintain WHERE Her_ID = '".$HerID."' ";
  $sql4 = "DELETE FROM herb_nature	WHERE Her_ID = '".$HerID."' ";
	$query = mysqli_query($link,$sql);
  $query2 = mysqli_query($link,$sql2);
  $query3 = mysqli_query($link,$sql3);
  $query4 = mysqli_query($link,$sql4);

	if(mysqli_affected_rows($link)) {
     header("location:iframeHer.php");
	}

	mysqli_close($link);
?>
