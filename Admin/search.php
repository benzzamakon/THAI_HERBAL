<?php
    include 'php/checkHaveLogin.php';
 ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>THAI HERBAL</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="../img/icon2.png" />
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/business-casual.min.css" rel="stylesheet">

</head>

<body>

    <h1 class="site-heading text-center text-white d-none d-lg-block">
        <span class="site-heading-upper text-primary mb-3">ระบบจัดการฐานข้อมูลสมุนไพรไทย</span>
        <span class="site-heading-lower">THAI HERBAL</span>
    </h1>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark py-lg-4" id="mainNav">
        <div class="container">
            <a class="navbar-brand text-uppercase text-expanded font-weight-bold d-lg-none" href="#">Start Bootstrap</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item active px-lg-4">
                        <a class="nav-link text-uppercase text-expanded" href="index.php">ค้นหา</a>
                    </li>
                    <li class="nav-item  px-lg-4">
                        <a class="nav-link text-uppercase text-expanded" href="manage.php">จัดการข้อมูล</a>
                    </li>
                    <li class="nav-item px-lg-4">
                        <a class="nav-link text-uppercase text-expanded" href="products.php">รายงาน</a>
                    </li>
                    <li class="nav-item px-lg-4">
                        <a href="php/logOut.php" class="nav-link text-uppercase text-expanded ">
                            <span class="label"> ออกจากระบบ</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
<?php
  include 'php/connect.php';
$sqlSearch = "" ;
$h =  "" ;
$n =  "" ;
$m =  "" ;
$d =  "" ;
$ds = "" ;
if (isset($_POST["herb"])) {
    $h = $_POST["herb"];
}
if (isset($_POST["natID"])) {
    $n = $_POST["natID"];
}
if (isset($_POST["maiID"])) {
    $m = $_POST["maiID"];
}
if (isset($_POST["Dis_Name"])) {
    $d = $_POST["Dis_Name"];
}
if (isset($_POST["Dis_symptom"])) {
    $ds = $_POST["Dis_symptom"];
}

if($h != "" &&$n == ""&&$m == ""&&$d == ""&&$ds =="" )
{
  $sqlSearch = "SELECT   * FROM herb
  INNER JOIN herb_nature ON  herb.Her_ID = herb_nature.Her_ID
  INNER JOIN nature ON herb_nature.Nat_ID = nature.Nat_ID
  INNER JOIN herb_disease ON herb_disease.Her_ID = herb.Her_ID
  INNER JOIN disease ON disease.Dis_ID = herb_disease.Dis_ID
  INNER JOIN herb_maintain ON herb_maintain.Her_ID = herb.Her_ID
  INNER JOIN maintain ON herb_maintain.Mai_ID = maintain.Mai_ID
  WHERE Her_Name LIKE '%".$h."%' ";
}elseif($h==""&&$n != ""&&$m == ""&&$d == ""&&$ds =="")
{
  $sqlSearch = "SELECT   * FROM herb
  INNER JOIN herb_nature ON  herb.Her_ID = herb_nature.Her_ID
  INNER JOIN nature ON herb_nature.Nat_ID = nature.Nat_ID
  INNER JOIN herb_disease ON herb_disease.Her_ID = herb.Her_ID
  INNER JOIN disease ON disease.Dis_ID = herb_disease.Dis_ID
  INNER JOIN herb_maintain ON herb_maintain.Her_ID = herb.Her_ID
  INNER JOIN maintain ON herb_maintain.Mai_ID = maintain.Mai_ID
  WHERE Nat_Nature LIKE '%".$n."%' ";
}elseif($h==""&&$n == ""&& $m != ""&&$d == ""&&$ds =="")
{
  $sqlSearch = "SELECT   * FROM herb
  INNER JOIN herb_nature ON  herb.Her_ID = herb_nature.Her_ID
  INNER JOIN nature ON herb_nature.Nat_ID = nature.Nat_ID
  INNER JOIN herb_disease ON herb_disease.Her_ID = herb.Her_ID
  INNER JOIN disease ON disease.Dis_ID = herb_disease.Dis_ID
  INNER JOIN herb_maintain ON herb_maintain.Her_ID = herb.Her_ID
  INNER JOIN maintain ON herb_maintain.Mai_ID = maintain.Mai_ID
  WHERE Mai_Name LIKE '%".$m."%' ";
}elseif($h==""&&$n == ""&&$m == ""&&$d != ""&&$ds =="")
{
  $sqlSearch = "SELECT   * FROM herb
  INNER JOIN herb_nature ON  herb.Her_ID = herb_nature.Her_ID
  INNER JOIN nature ON herb_nature.Nat_ID = nature.Nat_ID
  INNER JOIN herb_disease ON herb_disease.Her_ID = herb.Her_ID
  INNER JOIN disease ON disease.Dis_ID = herb_disease.Dis_ID
  INNER JOIN herb_maintain ON herb_maintain.Her_ID = herb.Her_ID
  INNER JOIN maintain ON herb_maintain.Mai_ID = maintain.Mai_ID
  WHERE Dis_Name LIKE '%".$d."%' ";
}elseif($h==""&&$n == ""&&$m == ""&&$d == ""&&$ds !="")
{
  $sqlSearch = "SELECT   * FROM herb
  INNER JOIN herb_nature ON  herb.Her_ID = herb_nature.Her_ID
  INNER JOIN nature ON herb_nature.Nat_ID = nature.Nat_ID
  INNER JOIN herb_disease ON herb_disease.Her_ID = herb.Her_ID
  INNER JOIN disease ON disease.Dis_ID = herb_disease.Dis_ID
  INNER JOIN herb_maintain ON herb_maintain.Her_ID = herb.Her_ID
  INNER JOIN maintain ON herb_maintain.Mai_ID = maintain.Mai_ID
  WHERE Dis_symptom LIKE '%".$ds."%' ";
}elseif($h!=""&&$n != ""&&$m == ""&&$d == ""&&$ds =="")
{
  $sqlSearch = "SELECT   * FROM herb
  INNER JOIN herb_nature ON  herb.Her_ID = herb_nature.Her_ID
  INNER JOIN nature ON herb_nature.Nat_ID = nature.Nat_ID
  INNER JOIN herb_disease ON herb_disease.Her_ID = herb.Her_ID
  INNER JOIN disease ON disease.Dis_ID = herb_disease.Dis_ID
  INNER JOIN herb_maintain ON herb_maintain.Her_ID = herb.Her_ID
  INNER JOIN maintain ON herb_maintain.Mai_ID = maintain.Mai_ID
  WHERE Her_Name LIKE '%".$h."%' and Nat_Nature LIKE '%".$n."%'";
}elseif($h!=""&&$n == ""&&$m != ""&&$d == ""&&$ds =="")
{
  $sqlSearch = "SELECT   * FROM herb
  INNER JOIN herb_nature ON  herb.Her_ID = herb_nature.Her_ID
  INNER JOIN nature ON herb_nature.Nat_ID = nature.Nat_ID
  INNER JOIN herb_disease ON herb_disease.Her_ID = herb.Her_ID
  INNER JOIN disease ON disease.Dis_ID = herb_disease.Dis_ID
  INNER JOIN herb_maintain ON herb_maintain.Her_ID = herb.Her_ID
  INNER JOIN maintain ON herb_maintain.Mai_ID = maintain.Mai_ID
  WHERE Her_Name LIKE '%".$h."%' and Mai_Name LIKE '%".$m."%' ";
}elseif($h!=""&&$n == ""&&$m == ""&&$d != ""&&$ds =="")
{
  $sqlSearch = "SELECT   * FROM herb
  INNER JOIN herb_nature ON  herb.Her_ID = herb_nature.Her_ID
  INNER JOIN nature ON herb_nature.Nat_ID = nature.Nat_ID
  INNER JOIN herb_disease ON herb_disease.Her_ID = herb.Her_ID
  INNER JOIN disease ON disease.Dis_ID = herb_disease.Dis_ID
  INNER JOIN herb_maintain ON herb_maintain.Her_ID = herb.Her_ID
  INNER JOIN maintain ON herb_maintain.Mai_ID = maintain.Mai_ID
  WHERE Her_Name LIKE '%".$h."%' and Dis_Name LIKE '%".$d."%' ";
}elseif($h!=""&&$n == ""&&$m == ""&&$d == ""&&$ds !="")
{
  $sqlSearch = "SELECT   * FROM herb
  INNER JOIN herb_nature ON  herb.Her_ID = herb_nature.Her_ID
  INNER JOIN nature ON herb_nature.Nat_ID = nature.Nat_ID
  INNER JOIN herb_disease ON herb_disease.Her_ID = herb.Her_ID
  INNER JOIN disease ON disease.Dis_ID = herb_disease.Dis_ID
  INNER JOIN herb_maintain ON herb_maintain.Her_ID = herb.Her_ID
  INNER JOIN maintain ON herb_maintain.Mai_ID = maintain.Mai_ID
  WHERE Her_Name LIKE '%".$h."%' and Dis_symptom LIKE '%".$ds."%' ";
}elseif($h==""&&$n != ""&&$m != ""&&$d == ""&&$ds =="")
{
  $sqlSearch = "SELECT   * FROM herb
  INNER JOIN herb_nature ON  herb.Her_ID = herb_nature.Her_ID
  INNER JOIN nature ON herb_nature.Nat_ID = nature.Nat_ID
  INNER JOIN herb_disease ON herb_disease.Her_ID = herb.Her_ID
  INNER JOIN disease ON disease.Dis_ID = herb_disease.Dis_ID
  INNER JOIN herb_maintain ON herb_maintain.Her_ID = herb.Her_ID
  INNER JOIN maintain ON herb_maintain.Mai_ID = maintain.Mai_ID
  WHERE Nat_Nature LIKE '%".$n."%' and Mai_Name LIKE '%".$m."%' ";
}elseif($h==""&&$n != ""&&$m == ""&&$d != ""&&$ds =="")
{
  $sqlSearch = "SELECT   * FROM herb
  INNER JOIN herb_nature ON  herb.Her_ID = herb_nature.Her_ID
  INNER JOIN nature ON herb_nature.Nat_ID = nature.Nat_ID
  INNER JOIN herb_disease ON herb_disease.Her_ID = herb.Her_ID
  INNER JOIN disease ON disease.Dis_ID = herb_disease.Dis_ID
  INNER JOIN herb_maintain ON herb_maintain.Her_ID = herb.Her_ID
  INNER JOIN maintain ON herb_maintain.Mai_ID = maintain.Mai_ID
  WHERE Nat_Nature LIKE '%".$n."%' and Dis_Name LIKE '%".$d."%' ";
}elseif($h==""&&$n != ""&&$m == ""&&$d == ""&&$ds !="")
{
  $sqlSearch = "SELECT   * FROM herb
  INNER JOIN herb_nature ON  herb.Her_ID = herb_nature.Her_ID
  INNER JOIN nature ON herb_nature.Nat_ID = nature.Nat_ID
  INNER JOIN herb_disease ON herb_disease.Her_ID = herb.Her_ID
  INNER JOIN disease ON disease.Dis_ID = herb_disease.Dis_ID
  INNER JOIN herb_maintain ON herb_maintain.Her_ID = herb.Her_ID
  INNER JOIN maintain ON herb_maintain.Mai_ID = maintain.Mai_ID
  WHERE Nat_Nature LIKE '%".$n."%' and Dis_symptom LIKE '%".$ds."%' ";
}elseif($h==""&&$n == ""&&$m != ""&&$d != ""&&$ds =="")
{
  $sqlSearch = "SELECT   * FROM herb
  INNER JOIN herb_nature ON  herb.Her_ID = herb_nature.Her_ID
  INNER JOIN nature ON herb_nature.Nat_ID = nature.Nat_ID
  INNER JOIN herb_disease ON herb_disease.Her_ID = herb.Her_ID
  INNER JOIN disease ON disease.Dis_ID = herb_disease.Dis_ID
  INNER JOIN herb_maintain ON herb_maintain.Her_ID = herb.Her_ID
  INNER JOIN maintain ON herb_maintain.Mai_ID = maintain.Mai_ID
  WHERE Mai_Name LIKE '%".$m."%' and Dis_Name LIKE '%".$d."%' ";
}elseif($h==""&&$n == ""&&$m != ""&&$d == ""&&$ds !="")
{
  $sqlSearch = "SELECT   * FROM herb
  INNER JOIN herb_nature ON  herb.Her_ID = herb_nature.Her_ID
  INNER JOIN nature ON herb_nature.Nat_ID = nature.Nat_ID
  INNER JOIN herb_disease ON herb_disease.Her_ID = herb.Her_ID
  INNER JOIN disease ON disease.Dis_ID = herb_disease.Dis_ID
  INNER JOIN herb_maintain ON herb_maintain.Her_ID = herb.Her_ID
  INNER JOIN maintain ON herb_maintain.Mai_ID = maintain.Mai_ID
  WHERE Mai_Name LIKE '%".$m."%' and Dis_symptom LIKE '%".$ds."%' ";
}elseif($h==""&&$n == ""&&$m == ""&&$d != ""&&$ds !="")
{
  $sqlSearch = "SELECT   * FROM herb
  INNER JOIN herb_nature ON  herb.Her_ID = herb_nature.Her_ID
  INNER JOIN nature ON herb_nature.Nat_ID = nature.Nat_ID
  INNER JOIN herb_disease ON herb_disease.Her_ID = herb.Her_ID
  INNER JOIN disease ON disease.Dis_ID = herb_disease.Dis_ID
  INNER JOIN herb_maintain ON herb_maintain.Her_ID = herb.Her_ID
  INNER JOIN maintain ON herb_maintain.Mai_ID = maintain.Mai_ID
  WHERE Dis_Name LIKE '%".$d."%' and Dis_symptom LIKE '%".$ds."%' ";
}elseif($h!=""&&$n != ""&&$m != ""&&$d == ""&&$ds =="")
{
  $sqlSearch = "SELECT   * FROM herb
  INNER JOIN herb_nature ON  herb.Her_ID = herb_nature.Her_ID
  INNER JOIN nature ON herb_nature.Nat_ID = nature.Nat_ID
  INNER JOIN herb_disease ON herb_disease.Her_ID = herb.Her_ID
  INNER JOIN disease ON disease.Dis_ID = herb_disease.Dis_ID
  INNER JOIN herb_maintain ON herb_maintain.Her_ID = herb.Her_ID
  INNER JOIN maintain ON herb_maintain.Mai_ID = maintain.Mai_ID
  WHERE Her_Name LIKE '%".$h."%' and Nat_Nature LIKE '%".$n."%' and Mai_Name LIKE '%".$m."%'";
}elseif($h !=""&&$n != ""&&$m == ""&&$d != ""&&$ds =="")
{
  $sqlSearch = "SELECT   * FROM herb
  INNER JOIN herb_nature ON  herb.Her_ID = herb_nature.Her_ID
  INNER JOIN nature ON herb_nature.Nat_ID = nature.Nat_ID
  INNER JOIN herb_disease ON herb_disease.Her_ID = herb.Her_ID
  INNER JOIN disease ON disease.Dis_ID = herb_disease.Dis_ID
  INNER JOIN herb_maintain ON herb_maintain.Her_ID = herb.Her_ID
  INNER JOIN maintain ON herb_maintain.Mai_ID = maintain.Mai_ID
  WHERE Her_Name LIKE '%".$h."%' and Nat_Nature LIKE '%".$n."%' and Dis_Name LIKE '%".$d."%' ";
}elseif($h!=""&&$n != ""&&$m == ""&&$d == ""&&$ds !="")
{
  $sqlSearch = "SELECT   * FROM herb
  INNER JOIN herb_nature ON  herb.Her_ID = herb_nature.Her_ID
  INNER JOIN nature ON herb_nature.Nat_ID = nature.Nat_ID
  INNER JOIN herb_disease ON herb_disease.Her_ID = herb.Her_ID
  INNER JOIN disease ON disease.Dis_ID = herb_disease.Dis_ID
  INNER JOIN herb_maintain ON herb_maintain.Her_ID = herb.Her_ID
  INNER JOIN maintain ON herb_maintain.Mai_ID = maintain.Mai_ID
  WHERE Her_Name LIKE '%".$h."%' and Nat_Nature LIKE '%".$n."%' and Dis_symptom LIKE '%".$ds."%' ";
}elseif($h!=""&&$n == ""&&$m != ""&&$d != ""&&$ds =="")
{
  $sqlSearch = "SELECT   * FROM herb
  INNER JOIN herb_nature ON  herb.Her_ID = herb_nature.Her_ID
  INNER JOIN nature ON herb_nature.Nat_ID = nature.Nat_ID
  INNER JOIN herb_disease ON herb_disease.Her_ID = herb.Her_ID
  INNER JOIN disease ON disease.Dis_ID = herb_disease.Dis_ID
  INNER JOIN herb_maintain ON herb_maintain.Her_ID = herb.Her_ID
  INNER JOIN maintain ON herb_maintain.Mai_ID = maintain.Mai_ID
  WHERE Her_Name LIKE '%".$h."%' and Mai_Name LIKE '%".$m."%' and Dis_Name LIKE '%".$d."%'";
}elseif($h!=""&&$n == ""&&$m != ""&&$d == ""&&$ds !="")
{
  $sqlSearch = "SELECT   * FROM herb
  INNER JOIN herb_nature ON  herb.Her_ID = herb_nature.Her_ID
  INNER JOIN nature ON herb_nature.Nat_ID = nature.Nat_ID
  INNER JOIN herb_disease ON herb_disease.Her_ID = herb.Her_ID
  INNER JOIN disease ON disease.Dis_ID = herb_disease.Dis_ID
  INNER JOIN herb_maintain ON herb_maintain.Her_ID = herb.Her_ID
  INNER JOIN maintain ON herb_maintain.Mai_ID = maintain.Mai_ID
  WHERE Her_Name LIKE '%".$h."%' and Mai_Name LIKE '%".$m."%' and Dis_symptom LIKE '%".$ds."%' ";
}elseif($h!=""&&$n == ""&&$m == ""&&$d != ""&&$ds !="")
{
  $sqlSearch = "SELECT   * FROM herb
  INNER JOIN herb_nature ON  herb.Her_ID = herb_nature.Her_ID
  INNER JOIN nature ON herb_nature.Nat_ID = nature.Nat_ID
  INNER JOIN herb_disease ON herb_disease.Her_ID = herb.Her_ID
  INNER JOIN disease ON disease.Dis_ID = herb_disease.Dis_ID
  INNER JOIN herb_maintain ON herb_maintain.Her_ID = herb.Her_ID
  INNER JOIN maintain ON herb_maintain.Mai_ID = maintain.Mai_ID
  WHERE Her_Name LIKE '%".$h."%' and Dis_Name LIKE '%".$d."%' and Dis_symptom LIKE '%".$ds."%' ";
}elseif($h==""&&$n != ""&&$m != ""&&$d != ""&&$ds =="")
{
  $sqlSearch = "SELECT   * FROM herb
  INNER JOIN herb_nature ON  herb.Her_ID = herb_nature.Her_ID
  INNER JOIN nature ON herb_nature.Nat_ID = nature.Nat_ID
  INNER JOIN herb_disease ON herb_disease.Her_ID = herb.Her_ID
  INNER JOIN disease ON disease.Dis_ID = herb_disease.Dis_ID
  INNER JOIN herb_maintain ON herb_maintain.Her_ID = herb.Her_ID
  INNER JOIN maintain ON herb_maintain.Mai_ID = maintain.Mai_ID
  WHERE Nat_Nature LIKE '%".$n."%' and Mai_Name LIKE '%".$m."%' and Dis_Name LIKE '%".$d."%'";
}elseif($h==""&&$n != ""&&$m != ""&&$d == ""&&$ds !="")
{
  $sqlSearch = "SELECT   * FROM herb
  INNER JOIN herb_nature ON  herb.Her_ID = herb_nature.Her_ID
  INNER JOIN nature ON herb_nature.Nat_ID = nature.Nat_ID
  INNER JOIN herb_disease ON herb_disease.Her_ID = herb.Her_ID
  INNER JOIN disease ON disease.Dis_ID = herb_disease.Dis_ID
  INNER JOIN herb_maintain ON herb_maintain.Her_ID = herb.Her_ID
  INNER JOIN maintain ON herb_maintain.Mai_ID = maintain.Mai_ID
  WHERE Nat_Nature LIKE '%".$n."%' and Mai_Name LIKE '%".$m."%' and Dis_symptom LIKE '%".$ds."%'";
}elseif($h==""&&$n != ""&&$m == ""&&$d != ""&&$ds !="")
{
  $sqlSearch = "SELECT   * FROM herb
  INNER JOIN herb_nature ON  herb.Her_ID = herb_nature.Her_ID
  INNER JOIN nature ON herb_nature.Nat_ID = nature.Nat_ID
  INNER JOIN herb_disease ON herb_disease.Her_ID = herb.Her_ID
  INNER JOIN disease ON disease.Dis_ID = herb_disease.Dis_ID
  INNER JOIN herb_maintain ON herb_maintain.Her_ID = herb.Her_ID
  INNER JOIN maintain ON herb_maintain.Mai_ID = maintain.Mai_ID
  WHERE Nat_Nature LIKE '%".$n."%' and Dis_Name LIKE '%".$d."%' and Dis_symptom LIKE '%".$ds."%'";
}elseif($h==""&&$n == ""&&$m != ""&&$d != ""&&$ds !="")
{
  $sqlSearch = "SELECT   * FROM herb
  INNER JOIN herb_nature ON  herb.Her_ID = herb_nature.Her_ID
  INNER JOIN nature ON herb_nature.Nat_ID = nature.Nat_ID
  INNER JOIN herb_disease ON herb_disease.Her_ID = herb.Her_ID
  INNER JOIN disease ON disease.Dis_ID = herb_disease.Dis_ID
  INNER JOIN herb_maintain ON herb_maintain.Her_ID = herb.Her_ID
  INNER JOIN maintain ON herb_maintain.Mai_ID = maintain.Mai_ID
  WHERE Mai_Name LIKE '%".$m."%' and Dis_Name LIKE '%".$d."%' and Dis_symptom LIKE '%".$ds."%'";
}elseif($h!=""&&$n != ""&&$m != ""&&$d != ""&&$ds =="")
{
  $sqlSearch = "SELECT   * FROM herb
  INNER JOIN herb_nature ON  herb.Her_ID = herb_nature.Her_ID
  INNER JOIN nature ON herb_nature.Nat_ID = nature.Nat_ID
  INNER JOIN herb_disease ON herb_disease.Her_ID = herb.Her_ID
  INNER JOIN disease ON disease.Dis_ID = herb_disease.Dis_ID
  INNER JOIN herb_maintain ON herb_maintain.Her_ID = herb.Her_ID
  INNER JOIN maintain ON herb_maintain.Mai_ID = maintain.Mai_ID
  WHERE Her_Name LIKE '%".$h."%' and Mai_Name LIKE '%".$m."%' and Dis_Name LIKE '%".$d."%' and Nat_Nature LIKE '%".$n."%'";
}elseif($h!=""&&$n != ""&&$m != ""&&$d == ""&&$ds !="")
{
  $sqlSearch = "SELECT   * FROM herb
  INNER JOIN herb_nature ON  herb.Her_ID = herb_nature.Her_ID
  INNER JOIN nature ON herb_nature.Nat_ID = nature.Nat_ID
  INNER JOIN herb_disease ON herb_disease.Her_ID = herb.Her_ID
  INNER JOIN disease ON disease.Dis_ID = herb_disease.Dis_ID
  INNER JOIN herb_maintain ON herb_maintain.Her_ID = herb.Her_ID
  INNER JOIN maintain ON herb_maintain.Mai_ID = maintain.Mai_ID
  WHERE Her_Name LIKE '%".$h."%' and Nat_Nature LIKE '%".$n."%' and Mai_Name LIKE '%".$m."%' and Dis_symptom LIKE '%".$ds."%' ";
}elseif($h!=""&&$n != ""&&$m == ""&&$d != ""&&$ds !="")
{
  $sqlSearch = "SELECT   * FROM herb
  INNER JOIN herb_nature ON  herb.Her_ID = herb_nature.Her_ID
  INNER JOIN nature ON herb_nature.Nat_ID = nature.Nat_ID
  INNER JOIN herb_disease ON herb_disease.Her_ID = herb.Her_ID
  INNER JOIN disease ON disease.Dis_ID = herb_disease.Dis_ID
  INNER JOIN herb_maintain ON herb_maintain.Her_ID = herb.Her_ID
  INNER JOIN maintain ON herb_maintain.Mai_ID = maintain.Mai_ID
  WHERE Her_Name LIKE '%".$h."%' and Nat_Nature LIKE '%".$n."%' and Dis_Name LIKE '%".$d."%' and Dis_symptom LIKE '%".$ds."%' ";
}elseif($h!=""&&$n == ""&&$m != ""&&$d != ""&&$ds !="")
{
  $sqlSearch = "SELECT   * FROM herb
  INNER JOIN herb_nature ON  herb.Her_ID = herb_nature.Her_ID
  INNER JOIN nature ON herb_nature.Nat_ID = nature.Nat_ID
  INNER JOIN herb_disease ON herb_disease.Her_ID = herb.Her_ID
  INNER JOIN disease ON disease.Dis_ID = herb_disease.Dis_ID
  INNER JOIN herb_maintain ON herb_maintain.Her_ID = herb.Her_ID
  INNER JOIN maintain ON herb_maintain.Mai_ID = maintain.Mai_ID
  WHERE Her_Name LIKE '%".$h."%' and Mai_Name LIKE '%".$m."%' and Dis_Name LIKE '%".$d."%' and Dis_symptom LIKE '%".$ds."%' ";
}elseif($h ==""&&$n != ""&&$m != ""&&$d != ""&&$ds !="")
{
  $sqlSearch = "SELECT   * FROM herb
  INNER JOIN herb_nature ON  herb.Her_ID = herb_nature.Her_ID
  INNER JOIN nature ON herb_nature.Nat_ID = nature.Nat_ID
  INNER JOIN herb_disease ON herb_disease.Her_ID = herb.Her_ID
  INNER JOIN disease ON disease.Dis_ID = herb_disease.Dis_ID
  INNER JOIN herb_maintain ON herb_maintain.Her_ID = herb.Her_ID
  INNER JOIN maintain ON herb_maintain.Mai_ID = maintain.Mai_ID
  WHERE Nat_Nature LIKE '%".$n."%' and Mai_Name LIKE '%".$m."%' and Dis_Name LIKE '%".$d."%' and Dis_symptom LIKE '%".$ds."%' ";
}elseif($h!=""&&$n != ""&&$m != ""&&$d != ""&&$ds !="")
{
  $sqlSearch = "SELECT   * FROM herb
  INNER JOIN herb_nature ON  herb.Her_ID = herb_nature.Her_ID
  INNER JOIN nature ON herb_nature.Nat_ID = nature.Nat_ID
  INNER JOIN herb_disease ON herb_disease.Her_ID = herb.Her_ID
  INNER JOIN disease ON disease.Dis_ID = herb_disease.Dis_ID
  INNER JOIN herb_maintain ON herb_maintain.Her_ID = herb.Her_ID
  INNER JOIN maintain ON herb_maintain.Mai_ID = maintain.Mai_ID
  WHERE Her_Name LIKE '%".$h."%' and Nat_Nature LIKE '%".$n."%' and Mai_Name LIKE '%".$m."%' and Dis_Name LIKE '%".$d."%' and Dis_symptom LIKE '%".$ds."%' ";
}else {
  echo '<script>';
  echo "alert('no Have !');";
  echo 'window.location="index.php";';
  echo '</script>';
}
$querySearch = mysqli_query($link,$sqlSearch);
$num = mysqli_num_rows($querySearch);

// if (isset($querySearch)) {
//   echo '<script>';
//   echo "alert('no Have !');";
//   echo 'window.location="index.php";';
//   echo '</script>';}
 ?>
    <section class="page-section about-heading">
        <div class="container">
            <img class="img-fluid rounded about-heading-img mb-3 mb-lg-0" src="img/about.jpg" alt="">
            <div class="about-heading-content">
                <div class="row">
                    <div class="col-xl-11 col-lg-10 mx-auto">
                        <div class="bg-faded rounded p-5">
                            <h2 class="section-heading mb-4">
                                <span class="section-heading-lower">ผลลัพธ์จากการการค้นหาคำว่า</span>
                                <span class="section-heading-upper"><?php echo "ชื่อสมุนไพร : ".$h.' , ';
                                echo "ลักษณะ : ".$n.' , ';
                                echo "บำรุง : ".$m.' , ';
                                echo "โรค : ".$d.' , ';
                                echo "อาการ : ".$ds; ?></span>
                            </h2>

                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">รหัสสมุนไพร</th>
                                        <th scope="col">ชื่อสมุนไพร</th>
                                        <th scope="col">บำรุง</th>
                                        <th scope="col">ลักษณะ</th>
                                        <th scope="col">โรค</th>
                                        <th scope="col">อาการ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php


                                  while($resultSearch=mysqli_fetch_array($querySearch,MYSQLI_ASSOC))
                                  {

                                    $herId = $resultSearch["Her_ID"];
                                    ?>
                                    <tr>
                                        <th scope="row"><?php echo $resultSearch["Her_ID"]; ?></th>
                                        <td><?php echo $resultSearch["Her_Name"]; ?></td>
                                        <td><?php
                                        $sql5 = "SELECT * FROM herb_maintain INNER JOIN maintain ON herb_maintain.Mai_ID = maintain.Mai_ID WHERE herb_maintain.Her_ID = $herId ";
                                        $query5 = mysqli_query($link,$sql5);
                                        while($result5 = mysqli_fetch_array($query5,MYSQLI_ASSOC))
                                        {
                                        echo $result5["Mai_Name"];
                                      }
                                        ?></td>
                                        <td><?php echo $resultSearch["Nat_Nature"]; ?></td>
                                        <td><?php
                                        $sql6 = "SELECT * FROM herb_disease INNER JOIN disease ON herb_disease.Dis_ID = disease.Dis_ID WHERE herb_disease.Her_ID = $herId ";
                                        $query6 = mysqli_query($link,$sql6);
                                        while($result6 = mysqli_fetch_array($query6,MYSQLI_ASSOC))
                                        {
                                        echo $result6["Dis_Name"];
                                        }
                                        ?></td>
                                        <td><?php
                                        $sql7 = "SELECT * FROM herb_disease INNER JOIN disease ON herb_disease.Dis_ID = disease.Dis_ID WHERE herb_disease.Her_ID = $herId ";
                                        $query7 = mysqli_query($link,$sql7);
                                        while($result7 = mysqli_fetch_array($query7,MYSQLI_ASSOC))
                                        {
                                         echo $result7["Dis_symptom"];
                                        }
                                         ?></td>
                                      <?php }
                                      if($num=='0'){
                                        echo '<script>';
                                        echo "alert('no Have !');";
                                        echo 'window.location="index.php";';
                                        echo '</script>';
                                      }?>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="footer text-faded text-center py-5">
        <div class="container">
            <p class="m-0 small">Copyright &copy; Your Website 2018</p>
        </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
