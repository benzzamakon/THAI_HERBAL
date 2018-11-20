<?php
include 'connect.php';
  // code...
//$sql1="UPDATE count_view SET views= $view + '1' WHERE Her_ID = $herId";
$date=date('y-m-d');
$sql1 = "INSERT INTO visit_disease ( Vis_Date, Dis_ID) VALUES('$date','$disId')";
$query2 = mysqli_query($link,$sql1);
 ?>
