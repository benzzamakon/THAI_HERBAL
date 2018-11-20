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
     $disId = null;
     if(isset($_GET["Dis_ID"]))
     {
       $disId = $_GET["Dis_ID"];
     }
     $sql = "SELECT * FROM disease  WHERE Dis_ID = '".$disId."' ";
     $query = mysqli_query($link,$sql);
     $result=mysqli_fetch_array($query,MYSQLI_ASSOC);
     ?>
  <!-- ส่วนหน้าข้อมูลสมุนไพรไทย -->
  <section id="herbal">
    <div class="container">
      <div class="row">
        <div class="modal-body">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase"><?php echo $result["Dis_Name"]; ?></h2>
        </div>

      <div class="row text-center">
<div class="col-lg-4 col-sm-6 text-center mb-4 ">
</div>
        <div class="col-lg-4 col-sm-6 text-center mb-4 ">
          <p class="left"><?php
          echo$result["Dis_symptom"];
          ?></p>
          <ul>
              <li class="left">สมุนไพรที่เกี่ยวข้อง :
                <?php
                $sql6 = "SELECT * FROM herb INNER JOIN herb_disease ON herb.Her_ID = herb_disease.Her_ID WHERE herb_disease.Dis_ID = '$disId'";
                $query6 = mysqli_query($link,$sql6);

                while($result6 = mysqli_fetch_array($query6,MYSQLI_ASSOC))
                {
                  echo $result6["Her_Name"];
               }
               if (!$result6) {
                 echo "no data";
               }?>
             </li>
          </ul>

        </div>

        <div class="col-lg-12 col-sm-6 text-center mb-4 ">
          <a class="portfolio-link" href="javascript:history.back();">
            <button class="btn btn-primary" data-dismiss="modal" type="button">
             ย้อนกลับ</button>
          </a><br>
          <?php
          $sql= "SELECT count(Dis_ID) FROM visit_disease WHERE Dis_ID = '$disId'";
          $query = mysqli_query($link,$sql);
          $result = mysqli_fetch_array($query);
          $view = $result['count(Dis_ID)'];
          if ($_SESSION['view'] == 1) {
            include '../php/countUserDis.php';
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
