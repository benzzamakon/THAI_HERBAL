<?php
include 'connect.php';

$disName = $_POST["disName"];
$disSym = $_POST["disSym"];

$sql1 = "SELECT * FROM disease WHERE Dis_Name = '$disName'";
$query1 = mysqli_query($link,$sql1);
$result1 =mysqli_fetch_array($query1,MYSQLI_ASSOC);
$disNameOld = $result1['Dis_Name'];
if ($disName == $disNameOld) {
  echo "it have in database!!";
}else {

//table1
 $sql = "INSERT INTO disease(Dis_Name,Dis_symptom)
 VALUES('$disName','$disSym')";
 $result = mysqli_query($link,$sql) or die ( "Error in query: $sql " . mysqli_error());

//ปิดการเชื่อมต่อ database
mysqli_close($link);
//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม

if(!$result){
echo "Error Server mysql";
}
else{
  echo "Success";
  header("location:../manage.php");
}
}
?>
