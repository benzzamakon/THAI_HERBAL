<?php
include 'connect.php';
$search =$_POST["boxSearch"];
$sqlSearch = "SELECT * FROM herb  WHERE Her_Name LIKE '%".$search."%' ";
$querySearch = mysqli_query($link,$sqlSearch);
?>
