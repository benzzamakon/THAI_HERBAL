<?php
include 'connect.php';
  // code...
//$sql1="UPDATE count_view SET views= $view + '1' WHERE Her_ID = $herId";
$date=date('y-m-d');
$sql1 = "INSERT INTO count_herb ( Cou_Date, Her_ID) VALUES('$date','$herId')";
$query2 = mysqli_query($link,$sql1);
 ?>
