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
      <a class="navbar-brand text-uppercase text-expanded font-weight-bold d-lg-none" href="#">THAI HERBAL</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav mx-auto">
          <li class="nav-item  px-lg-4">
            <a class="nav-link text-uppercase text-expanded" href="index.php">ค้นหา
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item active px-lg-4">
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
  <form class="manage" id="manage" name="manage" method="post" action="php/manageBackDis.php" enctype="multipart/form-data">
  <section class="page-section about-heading">
    <div class="container">
      <div class="about-heading-content">
        <div class="row">
          <div class="col-xl-9 col-lg-12 mx-auto">
            <div class="bg-faded  rounded p-5">
              <h2 class="section-heading mb-4">
                <span class="section-heading-lower">จัดการโรค</span>
              </h2>
              <div class="row ">
                <br>
                <br>
                <div class="col-sm-2">
                  <p size="18px">ชื่อโรค</p>
                </div>
                <div class="col-sm-10">
                  <input class="form-control" name="disName" id="disName" value="" required="required" placeholder="ชื่อโรค" />
                </div>
                <div class="col-sm-2">
                  <p size="18px">อาการ</p>
                </div>

                <div class="col-sm-10">
                  <textarea class="form-control" name="disSym" id="disSym" value="" placeholder="Enter your message" rows="6" required="required"></textarea>
                </div>
                <div class="col-sm-12 mx-auto">
                  <br>
                </div>

                <!-- บันทึก -->

                <div class="col-sm-12 text-center">
                  <ul class="actions">

                      <button class="btn btn-primary" data-dismiss="modal"  type="submit" name="Register" id="Register" >
                        <i class="fas fa-check"></i>
                        เพิ่ม </button>
                      </form>

                    <!-- <button class="btn btn-danger" data-dismiss="modal"  onclick="ClearForm();">
                      <i class="fas fa-times"></i>
                      ล้าง </button> -->

                  </ul>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="page-section cta">
      <div class="container">
        <div class="row">
          <div class="col-xl-9 mx-auto">
            <div class="cta-inner text-center rounded">
              <h2 class="section-heading mb-4">
                <span class="section-heading-upper">ชื่อโรค</span>
                <span class="section-heading-lower">ทั้งหมด</span>

              </h2>
              <div class="table-responsive">
                  <table class="table">
                    <iframe src="php/iframeDis.php" width="500px" height="500px">

                    </iframe>



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
  <!-- clearData in form -->
  <script src="js/ClearForm.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="js/inputPic.js"></script>
<?php
mysqli_close($link); ?>
</body>

</html>
