<?php
session_start();
$_SESSION['view'] = 1;
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
    <script src="../../Admin/js/jquery.dropdown.js"></script>
    <script type="text/javascript" src="../../Admin/js/mock.js"></script>
    <link rel="stylesheet" type="text/css" href="../../Admin/css/jquery.dropdown.css">
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
                        <a class="nav-link js-scroll-trigger" href="#cure">รักษาตามโรค</a>
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
    <!-- รักษาตามโรคทั้งหมด -->
    <section id="cure">
        <div class="container">
            <div class="row">
              <div class="col-md-3"></div>
                    <div class="col-sm-2 text-center">
                            <p>รักษาตามโรค</p>
                        </div>
                        <div class="col-md-4">
                          <div class="col-sm-10 text-center mb-4">
                              <div class="select-wrapper">
                        <form action="cureAll.php" method="post">
                            <input type="text" name="Dis_Name" value="">
                            <input type="submit" value="ค้นหา">
                              </form>
                        </div>
                        </div>
                        </div>
                        <?php
                        $error = false;
                        $search = null;
                        $disID = null;
                        if (isset($_POST["Dis_Name"])) {
                            $search = $_POST["Dis_Name"];
                        }
                        $sqlSearch = "SELECT * FROM disease WHERE Dis_Name LIKE '%".$search."%' ORDER BY Dis_Name ASC ";
                        $querySearch = mysqli_query($link,$sqlSearch);
                         ?>
                <div class="col-lg-12 mx-auto">
                    <div class="modal-body">
                        <!-- Project Details Go Here -->
                        <h2 style="text-align:center;">รักษาตามโรคทั้งหมด</h2>
                        <br>
                        <div class="row">

                         <?php
                          while($resultSearch=mysqli_fetch_array($querySearch,MYSQLI_ASSOC))
                          {
                            $disID = $resultSearch["Dis_Name"];
                          ?>
                            <div class="col-lg-4 col-md-4 col-sm-4 ">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <h4 class="card-title">
                                            <a href="selectedDis.php?Dis_ID=<?php echo $resultSearch["Dis_ID"];?>"><?php echo $resultSearch["Dis_Name"]; ?></a>
                                        </h4>

                                        <p class="leftmaintain">
                                          <?php echo $resultSearch["Dis_symptom"]; ?>
                                        </p>

                                    </div>
                                </div>
                            </div>
                            <?php } ?>
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
