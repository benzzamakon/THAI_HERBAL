<?php
include 'connect.php';

$maiName = $_POST["maiName"];


$sql1 = "SELECT * FROM maintain WHERE Mai_Name = '$maiName'";
$query1 = mysqli_query($link,$sql1);
$result1 =mysqli_fetch_array($query1,MYSQLI_ASSOC);
$maiNameOld = $result1['Mai_Name'];
if ($maiName == $maiNameOld) {
  echo "it have in database!!";
}else {


//table1
 $sql = "INSERT INTO maintain(Mai_Name)
 VALUES('$maiName')";
 $result = mysqli_query($link,$sql) or die ( "Error in query: $sql " . mysqli_error());

//ปิดการเชื่อมต่อ database
mysqli_close($link);
//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม

if(!$result){
echo "Error Server mysql";
}
else{
  echo "Success";
  header("location:../manageMai.php");
}
}
?>
