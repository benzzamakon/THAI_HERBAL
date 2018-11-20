<?php
include 'connect.php';

$natName = $_POST["natName"];


$sql1 = "SELECT * FROM nature WHERE Nat_Nature = '$natName'";
$query1 = mysqli_query($link,$sql1);
$result1 =mysqli_fetch_array($query1,MYSQLI_ASSOC);
$natNameOld = $result1['Nat_Nature'];
if ($natName == $natNameOld) {
  echo "it have in database!!";
}else {


//table1
 $sql = "INSERT INTO nature(Nat_Nature)
 VALUES('$natName')";
 $result = mysqli_query($link,$sql) or die ( "Error in query: $sql " . mysqli_error());

//ปิดการเชื่อมต่อ database
mysqli_close($link);
//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม

if(!$result){
echo "Error Server mysql";
}
else{
  echo "Success";
  header("location:../manageNat.php");
}
}
?>
