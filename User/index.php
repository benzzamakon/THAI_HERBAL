<?php
session_start();
$_SESSION['view'] = 1;
include 'php/connect.php';
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
  <link rel="icon" type="image/png" href="img/icon.png" />
  <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->
  <link href="css/agency.min.css" rel="stylesheet">
  <?php
  $sqlSearch = "SELECT * , count(count_herb.Her_ID)
  FROM herb INNER JOIN herb_nature ON  herb.Her_ID = herb_nature.Her_ID
  INNER JOIN nature ON herb_nature.Nat_ID = nature.Nat_ID INNER JOIN count_herb ON count_herb.Her_ID=herb.Her_ID
  GROUP BY count_herb.Her_ID  ORDER BY count(count_herb.Her_ID) DESC LIMIT 0,3";
  $querySearch = mysqli_query($link,$sqlSearch);

  $sqlSearch1 = "SELECT * , count(visit_disease.Dis_ID)
  FROM disease  INNER JOIN visit_disease ON visit_disease.Dis_ID=disease.Dis_ID
  GROUP BY visit_disease.Dis_ID ORDER BY count(visit_disease.Dis_ID) DESC LIMIT 0,3";
  $querySearch1 = mysqli_query($link,$sqlSearch1);
   ?>
</head>

<body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg bg-secondary fixed-top text-uppercase" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">THAI HERBAL</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive"
        aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav text-uppercase ml-auto">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="page/herbal.php">ข้อมูลสมุนไพรไทย</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="page/cure.php">รักษาตามโรค</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="page/maintain.php">บำรุงสุขภาพ</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="page/advanced_search.php">ค้นหาชั้นสูง</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="page/team.html">ติดต่อเรา</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <section id="herbal">
      <div class="container">
          <div class="row">
              <div class="col-lg-12 mx-auto">
                  <div class="modal-body">
                      <!-- Project Details Go Here -->
                      <h2 style="text-align:center;">สมุนไพรยอดฮิต 3 อันดับ</h2>
                      <br>
                      <div class="row">

                          <?php
                          while($resultSearch=mysqli_fetch_array($querySearch,MYSQLI_ASSOC))
                          {
                            $herId = $resultSearch["Her_ID"];
                          ?>

                          <div class="col-lg-4 col-md-4 col-sm-4">
                              <div class="card h-100">
                                <a  href="selectedHerb.php?Her_ID=<?php echo $resultSearch["Her_ID"];?>">
                                    <!-- <a class="portfolio-link" data-toggle="modal" href="#<?php //echo $resultSearch['Her_ID'];?>"> -->
                                      <img class="card-img-top" src="../Admin/img/imagesHerb/<?php echo $resultSearch['Her_Picture'];?>"alt="" width="200px"height="200px">
                                    <!-- </a> -->
                                    </a>
                                    <div class="card-body">
                                        <h4 class="card-title">
                                            <a href="page/selectedHerb.php?Her_ID=<?php echo $resultSearch["Her_ID"];?>"><?php echo $resultSearch['Her_Name']; ?></a>
                                        </h4>
                                        <p class="leftmaintain">
                                          ส่วน : <?php echo $resultSearch["Nat_Nature"].'  '; ?></br>
                                          บำรุง :<?php
                                          $sql5 = "SELECT * FROM herb_maintain INNER JOIN maintain ON herb_maintain.Mai_ID = maintain.Mai_ID WHERE herb_maintain.Her_ID = $herId ";
                                          $query5 = mysqli_query($link,$sql5);
                                          while($result5 = mysqli_fetch_array($query5,MYSQLI_ASSOC))
                                          {
                                           echo $result5["Mai_Name"].'  ';
                                          } ?></br>
                                          รักษา :<?php
                                          $sql6 = "SELECT * FROM herb_disease INNER JOIN disease ON herb_disease.Dis_ID = disease.Dis_ID WHERE herb_disease.Her_ID = $herId ";
                                          $query6 = mysqli_query($link,$sql6);
                                          while($result6 = mysqli_fetch_array($query6,MYSQLI_ASSOC))
                                          {
                                          echo $result6["Dis_Name"].'  ';
                                           }?>
                                        </p>
                                    </div>
                              </div>
                            </div>

                        <?php } ?><div class="col-lg-12 col-sm-6 text-center mb-4 "></div>

                      </div>
                      <br><br>
                      <div class="col-lg-12 text-center">
                        <h2 class="section-heading text-uppercase">โรคยอดฮิต 3 อันดับ</h2>
                      </div>

                    <div class="row">
                      <?php

                      while($resultSearch1=mysqli_fetch_array($querySearch1,MYSQLI_ASSOC))
                      {
                      ?>

                      <div class="col-lg-4 col-md-4 col-sm-4">
                        <div class="portfolio-caption">
                          <a href="page/selectedDis.php?Dis_ID=<?php echo $resultSearch1["Dis_ID"];?>">
                          <h4><?php echo $resultSearch1['Dis_Name']; ?></h4>
                          <p class="text-muted"><?php echo $resultSearch1['Dis_symptom']?></p>
                            </a>
                        </div>
                      </div>
                    <?php } ?>
                    <div class="col-lg-12 col-sm-6 text-center mb-4 "></div>
                  </div>

                  </div>
              </div>
          </div>
      </div>
  </section>





  <!-- Contact -->

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Contact form JavaScript -->
  <script src="js/jqBootstrapValidation.js"></script>
  <script src="js/contact_me.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/agency.min.js"></script>

</body>

</html>
