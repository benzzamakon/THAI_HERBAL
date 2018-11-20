<?php
	include "connect.php";

	$disID = $_POST["txtDisID"];
	$disName = $_POST["txtDisName"];
	$disSym = $_POST["txtDisSym"];
	$sql = "UPDATE disease SET
			Dis_Name = '$disName' ,
			Dis_symptom = '$disSym' 
			WHERE Dis_ID = '$disID'";

	$query = mysqli_query($link,$sql)or die(mysqli_error($link) . "<br>$sql");

	if($query) {
	 echo "Record update successfully";
	 header("location:../manage.php");
 }

	mysqli_close($link);
?>
