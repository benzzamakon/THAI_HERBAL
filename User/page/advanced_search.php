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
            <a class="nav-link js-scroll-trigger" href="cure.php">รักษาตามโรค</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="maintain.php">บำรุงสุขภาพ</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#advanced_search">ค้นหาชั้นสูง</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="team.html">ติดต่อเรา</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- ส่วนหน้าการค้นหาชั้นสูง -->
  <form  method="post" action="search.php">
    <section class="bg-light" id="advanced_search">
      <div class="container">
        <div class="row">
            <div class="col-xl-11 col-lg-12 mx-auto">
              <div class="bg-faded  rounded p-5">
                <div class="col-lg-12 text-center">
                  <h2 class="section-heading text-uppercase">ค้นหาชั้นสูง</h2>
                </div>
                <div class="row ">
                  <div class="col-sm-2">
                    <p>ชื่อสมุนไพร </p>
                  </div>
                  <div class="col-sm-10">
                    <input class="form-control" type="text" name="herb" placeholder="ชื่อสมุนไพร" />
                  </div>
                  <div class="col-sm-12"></div>
                  <div class="col-sm-2">
                    <p>เลือกบำรุง</p>
                  </div>
                  <div class="col-sm-12"></div>
                  <?php
                        $sql1 = "SELECT * FROM maintain";
                        $query1 = mysqli_query($link,$sql1);
                        while($result1 = mysqli_fetch_array($query1,MYSQLI_ASSOC))
                        {
                   ?>
                  <div class="col-sm-5">
                    <input name="maiID" type="radio" value="<?php echo  $result1["Mai_Name"];?>">
                    <label  ><?php echo $result1["Mai_Name"];?></label>
                  </div>
              <?php } ?>
                  <div class="col-lg-12"></div>
                  <div class="col-sm-2">
                    <p class="section-heading-upper">เลือกลักษณะ</p>
                  </div>
                  <div class="col-sm-12"></div>
                  <?php
                  $sql2 = "SELECT * FROM nature";
                  $query2 = mysqli_query($link,$sql2);
                  while($result2 = mysqli_fetch_array($query2,MYSQLI_ASSOC))
                  {
                  ?>
                  <div class="col-sm-5">
                    <input name="natID" type="radio" value="<?php echo $result2["Nat_Nature"];?>" id="cure_c">
                    <label ><?php echo $result2["Nat_Nature"];?></label>
                  </div>
                  <?php } ?>
                 <div class="col-sm-12"></div>
                 <div class="col-sm-2">
                  <p class="section-heading-upper">เลือกโรค</p>
                </div>
                 <div class="col-sm-10">
                   <div class="dropdown-mul-1">
                   <select style="display:none"   name="Dis_Name"  placeholder="Select" >
                     <option value=""><label class="form-control">เลือก</label ></option>
                 <?php
                 $sql3 = "SELECT * FROM disease ORDER BY Dis_Name ASC";
                 $query3 = mysqli_query($link,$sql3);
                 while($result3 = mysqli_fetch_array($query3,MYSQLI_ASSOC))
                 {
                  ?>
                        <option value="<?php echo $result3["Dis_Name"];?>"><label class="form-control" ><?php echo $result3["Dis_Name"];?></label ></option>

               <?php } ?>
                  </select>
                </div>
                 </div>
                 <div class="col-sm-12 "></div>
                 <div class="col-sm-2">
                   <p>อาการ</p>
                 </div>
                 <div class="col-sm-10">
                   <input class="form-control" type="text" name="Dis_symptom" placeholder="อาการ" />
                 </div>
                 <div class="col-sm-12"><br></div>
                  <!-- บันทึก -->
                  <div class="col-sm-12 text-center">
                    <ul class="actions">
                        <button class="btn btn-primary" type="submit">
                          <i class="fas"></i>
                          ค้นหา</button>
                       </form>

                    </ul>
                  </div>
                </div>
              </div>
            </div>
          <!-- </div> -->
        </div>
      </div>
    </section>
</form>
      <script>
        $('.dropdown-mul-1').dropdown({
          // data: json1.data,
          limitCount: 40,
          multipleMode: 'label',
          choice: function () {
            // console.log(arguments,this);
          }
        });
      </script>
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
