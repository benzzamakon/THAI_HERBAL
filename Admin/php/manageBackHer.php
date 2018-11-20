<?php
  include 'connect.php';
  // code...
  $herName = $_POST["herName"];
  $natID = $_POST["natID"];
  $herPic = $_FILES["herPic"];

  //up images
  $ext = pathinfo(basename($_FILES['herPic']['name']),PATHINFO_EXTENSION);
  $new_pic_name = 'img_'.uniqid().".".$ext;
  $image_path = "../img/imagesHerb/";
  $upload_path = $image_path.$new_pic_name;
  //uping
  $success  = move_uploaded_file($_FILES['herPic']['tmp_name'],$upload_path);
    if (!$success) {
      echo "ไม่สามารถ upload รูปภาพได้";
      exit();
    }
    $herPic = $new_pic_name;

    $sql = "SELECT * FROM herb WHERE Her_Name = '$herName'";
    $query = mysqli_query($link,$sql);
    $result =mysqli_fetch_array($query,MYSQLI_ASSOC);
    $herNameOld = $result['Her_Name'];
    if ($herName == $herNameOld) {
      echo "it have in database!!";
    }else {



  $sql1 = "INSERT INTO herb(Her_Name,Her_Picture)VALUES('$herName','$herPic')";
  $result = mysqli_query($link, $sql1) or die ("Error in query: $sql1 " . mysqli_error());

  $sql2 = "SELECT * FROM herb WHERE Her_Name = '$herName'";
  $query2 = mysqli_query($link,$sql2);
  $result2 =mysqli_fetch_array($query2,MYSQLI_ASSOC);
  $herID =  $result2['Her_ID'];

  for ($i=0; $i < count($_POST['maiID']); $i++) {
    $maiID[$i] = $_POST["maiID"][$i];
      echo $_POST["maiID"][$i]."++++$i<br>";
      $sql ="INSERT INTO herb_maintain(Her_ID,Mai_ID) VALUES ('$herID','$maiID[$i]')";
      $result = mysqli_query($link, $sql) or die ("Error in query: $sql " . mysqli_error());
  }

  for ($i=0; $i < count($_POST['disID']); $i++) {
      echo $_POST["disID"][$i];
      $disID[$i] = $_POST["disID"][$i];
      $sql ="INSERT INTO herb_disease(Her_ID,dis_ID) VALUES ('$herID','$disID[$i]')";
      $result = mysqli_query($link, $sql) or die ("Error in query: $sql " . mysqli_error());
  }
  $sql3 ="INSERT INTO herb_nature(Her_ID,Nat_ID) VALUES ('$herID','$natID')";
  $result3 = mysqli_query($link, $sql3) or die ("Error in query: $sql3 " . mysqli_error());

  if(!$result3&&!$result&&$result2){
    echo "Error Server mysql";
  }
  else{
    header("location:../manage.php");
  }
}
  mysqli_close($link);
?>
