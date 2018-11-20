<?php
    include '../php/connect.php';
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
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="icon" type="image/png" href="../img/icon.png" />
  <link href="../https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
  <!-- Custom fonts for this template -->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

  <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
  <!-- Custom styles for this template -->
  <link href="../css/agency.min.css" rel="stylesheet">
</head>

<body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg bg-secondary fixed-top text-uppercase" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="../index.php">THAI HERBAL</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive"
        aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="herbal.php">ข้อมูลสมุนไพรไทย</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="cure.php">รักษาตามโรค</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="maintain.php">บำรุงสุขภาพ</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="advanced_search.php">ค้นหาชั้นสูง</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="team.html">ติดต่อเรา</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <?php
    include '../php/connect.php';
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
    echo 'window.location="advanced_search.php";';
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
  <!-- ส่วนหน้าการค้นหาชั้นสูง -->
  <form  action="search.php" method="post">
  <section class="bg-light" id="advanced_search">
        <div class="container">
          <div class="row">
            <div class="col-lg-12 text-center">
              <h2 class="section-heading text-uppercase">ผลลัพธ์จากการการค้นหาคำว่า</h2>
              <h3 class="section-subheading text-muted"><?php echo "ชื่อสมุนไพร : ".$h.' , ';
              echo "ลักษณะ : ".$n.' , ';
              echo "บำรุง : ".$m.' , ';
              echo "โรค : ".$d.' , ';
              echo "อาการ : ".$ds; ?></h3>
            </div>
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
                         echo 'window.location="advanced_search.php";';
                         echo '</script>';
                      }?>
                    </tr>
                </tbody>
            </div>
          </div>
      </section>
</form>


  <!-- Bootstrap core JavaScript -->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Contact form JavaScript -->
  <script src="../js/jqBootstrapValidation.js"></script>
  <script src="../js/contact_me.js"></script>


  <!-- Custom scripts for this template -->
  <script src="../js/agency.min.js"></script>


</body>

</html>
