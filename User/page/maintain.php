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
            <a class="nav-link js-scroll-trigger" href="#maintain">บำรุงสุขภาพ</a>
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
  $sql = "SELECT * FROM maintain ORDER BY Mai_Name DESC";
  $q = mysqli_query($link,$sql);
 ?>
  <!-- ส่วนหน้าบำรุง -->
  <section id="maintain">
        <div class="container">
          <div class="row">
            <div class="col-lg-12 text-center">
              <h2 class="section-heading text-uppercase">บำรุงสุขภาพ</h2>
              <h3 class="section-subheading text-muted">ทุกคนก็ย่อมต้องนึกถึงข้อดีของสมุนไพรที่ช่วยบำรุงสุขภาพ และนี่คือสมุนไพรที่ดีต่อสุขภาพ</h3>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <ul class="timeline">
                <?php
                while($r=mysqli_fetch_array($q,MYSQLI_ASSOC))
                {
                ?>
                <li>
                  <div class="timeline-image">
                    <a class="portfolio-link" data-toggle="modal" href="maintainH.php?Mai_Name=<?php echo $r["Mai_Name"];?>">
                      <img class="rounded-circle img-fluid" src="../img/บำรุง/<?php echo $r["Mai_Name"];?>.jpg" alt="">
                    </a>
                  </div>
                  <div class="timeline-panel">
                    <div class="timeline-heading">
                      <a href="maintainH.php?Mai_Name=<?php echo $r["Mai_Name"];?>">
                      <h4 class="subheading"><?php echo $r["Mai_Name"]; ?></h4>
                      </a>
                    </div>
                  </div>
                </li>
              <?php } ?>
              </ul>
            </div>
          </div>
        </div>
      </section>
  <!-- maintain  -->

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
