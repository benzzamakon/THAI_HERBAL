<?php
	ini_set('display_errors', 1);
	error_reporting(~0);

	include_once 'connect.php';
$herPic = $_FILES["herPic"];
$ext = pathinfo(basename($_FILES['herPic']['name']),PATHINFO_EXTENSION);
$new_pic_name = 'img_'.uniqid().".".$ext;
$image_path = "../img/imagesHerb/";
$upload_path = $image_path.$new_pic_name;
$herID = $_POST["txtHerID"];
//uping
$success  = move_uploaded_file($_FILES['herPic']['tmp_name'],$upload_path);
  if (!$success) {
    echo "ไม่สามารถ upload รูปภาพได้";
    exit();
  }
  $herPic = $new_pic_name;

	$sql = "UPDATE herb SET
			Her_Name = '".$_POST["txtHerName"]."' ,
			Nat_ID = '".$_POST["natID"]."' ,
			Her_Picture = '".$herPic."'
			WHERE Her_ID = '".$_POST["txtHerID"]."' ";

			$sql1 = "DELETE FROM herb_maintain WHERE Her_ID = $herID ";
			$result1 = mysqli_query($link, $sql1) or die ("Error in query: $sql1 " . mysqli_error());

			for ($i=0; $i < count($_POST['maiID']); $i++) {
				$maiID[$i] = $_POST["maiID"][$i];
					echo $_POST["maiID"][$i]."++++$i<br>";
					$sql = "INSERT INTO herb_maintain(Her_ID,Mai_ID) VALUES ('$herID','$maiID[$i]')";
		      $result = mysqli_query($link, $sql) or die ("Error in query: $sql " . mysqli_error());
			}

			$sql2 = "DELETE FROM herb_disease WHERE Her_ID = $herID ";
			$result2 = mysqli_query($link, $sql2) or die ("Error in query: $sql2 " . mysqli_error());

			for ($i=0; $i < count($_POST['disID']); $i++) {
					$disID[$i] = $_POST["disID"][$i];
					echo $_POST["disID"][$i];
					$sql ="INSERT INTO herb_disease(Her_ID,dis_ID) VALUES ('$herID','$disID[$i]')";
		      $result = mysqli_query($link, $sql) or die ("Error in query: $sql " . mysqli_error());
			}


	$query = mysqli_query($link,$sql);

	if($query) {
	 echo "Record update successfully";
 	 header("location:../manage.php");
	}

	mysqli_close($link);
?>
