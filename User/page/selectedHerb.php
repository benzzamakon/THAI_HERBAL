<?php
session_start();
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
  <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
  <!-- Custom fonts for this template -->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

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
            <a class="nav-link js-scroll-trigger" href="herbalAll.php">ข้อมูลสมุนไพรไทย</a>
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
     $HerID = null;
     if(isset($_GET["Her_ID"]))
     {
       $HerID = $_GET["Her_ID"];
     }
     // $date  =date("d-m-Y");
     // $time = date("h:i:s");
     // $herId =  $HerID;
     // $ip = $_SERVER['REMOTE_ADDR'];
     // $sql2="INSERT INTO count_herb(Cou_Date,Cou_IP,Cou_Time,Her_ID)VALUES
     // ('$date', '$ip', '$time','$herId')";
     // mysql_query($link,$sql2);

     $sql = "SELECT * FROM herb  WHERE Her_ID = '".$HerID."' ";
     $query = mysqli_query($link,$sql);
     $result=mysqli_fetch_array($query,MYSQLI_ASSOC);
     ?>
  <!-- ส่วนหน้าข้อมูลสมุนไพรไทย -->
  <section id="herbal">
    <div class="container">
      <div class="row">
        <div class="modal-body">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase"><?php echo $result["Her_Name"]; ?></h2>
        </div>

      <div class="row text-center">
<div class="col-lg-4 col-sm-6 text-center mb-4 ">
</div>
        <div class="col-lg-4 col-sm-6 text-center mb-4 ">
          <a class="portfolio-link" data-toggle="modal" href="#herbal1">
            <img class="card-img-top " src="../../Admin/img/imagesHerb/<?php echo $result['Her_Picture'];?>"alt="" width="200px"height="200px">
            <br>
          </a>
          <ul>
              <li class="left">ส่วน : <?php
              $sql5 = "SELECT * FROM nature INNER JOIN herb_nature ON nature.Nat_ID = herb_nature.Nat_ID WHERE herb_nature.Her_ID = '".$HerID."'";
              $query5 = mysqli_query($link,$sql5);
              while($result5 = mysqli_fetch_array($query5,MYSQLI_ASSOC))
              {
              echo $result5["Nat_Nature"];
              }
             ?></li>
              <li class="left">บำรุง :
                <?php
                  $sql4 = "SELECT * FROM maintain INNER JOIN herb_maintain ON maintain.Mai_ID = herb_maintain.Mai_ID WHERE herb_maintain.Her_ID = '".$HerID."'";
                  $query4 = mysqli_query($link,$sql4);
                  while($result4 = mysqli_fetch_array($query4,MYSQLI_ASSOC))
                      {
               echo $result4["Mai_Name"].'  ';
              } ?>
            </li>
              <li class="left">รักษา :
                <?php
                $sql6 = "SELECT * FROM disease INNER JOIN herb_disease ON disease.Dis_ID = herb_disease.Dis_ID WHERE herb_disease.Her_ID = '".$HerID."'";
                $query6 = mysqli_query($link,$sql6);
                while($result6 = mysqli_fetch_array($query6,MYSQLI_ASSOC))
                {
              echo $result6["Dis_Name"].'  ';
               }?>
             </li>
          </ul>
          <p class="left"><?php
          $sql7 = "SELECT * FROM herb_disease INNER JOIN disease ON herb_disease.Dis_ID = disease.Dis_ID WHERE herb_disease.Her_ID = '".$HerID."'";

          $query7 = mysqli_query($link,$sql7);
          while($result7 = mysqli_fetch_array($query7,MYSQLI_ASSOC))
          {
            echo $result7["Dis_Name"]." ".$result7["Dis_symptom"]." ";
          }
          ?></p>
        </div>

        <div class="col-lg-12 col-sm-6 text-center mb-4 ">
          <a class="portfolio-link" href="javascript:history.back();">
            <button class="btn btn-primary" data-dismiss="modal" type="button">
             ย้อนกลับ</button>
          </a><br>
          <?php
          $herId = $HerID;
          $sql= "SELECT count(Her_ID) FROM count_herb WHERE Her_ID = '$herId'";
          $query = mysqli_query($link,$sql);
          $result = mysqli_fetch_array($query);
          $view = $result['count(Her_ID)'];
          if ($_SESSION['view'] == 1) {
            include '../php/countUser.php';
            $_SESSION['view'] = 0;
          }
          echo "วิว : ".$view;
          ?>
        </div>
      </div>
      </div>
    </div>
    </div>
  </section>

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
