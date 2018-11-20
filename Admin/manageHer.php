<?php
    include 'php/checkHaveLogin.php';
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
  <link rel="icon" type="image/png" href="../img/icon2.png" />
  <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
  <!-- Custom fonts for this template -->
  <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="css/business-casual.min.css" rel="stylesheet">

  <script type="text/javascript" src="js/mock.js"></script>
  <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/jquery.dropdown.css">
  <script src="js/jquery.dropdown.js"></script>
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
<form  method="post" action="php/manageBackHer.php" enctype="multipart/form-data">
  <section class="page-section about-heading">
    <div class="container">
      <div class="about-heading-content">
        <!-- <div class="row"> -->
          <div class="col-xl-11 col-lg-12 mx-auto">
            <div class="bg-faded  rounded p-5">
              <h2 class="section-heading mb-4">
                <span class="section-heading-lower">จัดการสมุนไพร</span>
              </h2>
              <div class="row ">
                <div class="col-sm-2">
                  <p>ชื่อสมุนไพร </p>
                </div>
                <div class="col-sm-10">
                  <input class="form-control" type="text" name="herName" placeholder="ชื่อสมุนไพร" />
                </div>
                <div class="col-sm-12"><p></p></div>
                <div class="col-sm-2">
                  <p>เลือกบำรุง</p>
                </div>
                <div class="col-sm-12"><p></p></div>
                <?php
                      $sql1 = "SELECT * FROM maintain";
                      $query1 = mysqli_query($link,$sql1);
                      while($result1 = mysqli_fetch_array($query1,MYSQLI_ASSOC))
                      {
                 ?>
                <div class="col-sm-5">
                  <input name="maiID[]" type="checkbox" value="<?php echo $result1["Mai_ID"];?>">
                  <label  ><?php echo $result1["Mai_Name"];?></label>
                </div>
            <?php } ?>
                <div class="col-lg-12"><p></p><br></div>

                <div class="col-sm-2">
                  <p>ไฟล์รูปภาพ</p>
                </div>
                <div class="col-sm-4">
                  <input type="file" name="herPic" style="color:red;" id="" accept="file_extension/*" required ="required">
                </div>
                <div class="col-lg-12">
                  <p ></p>
                </div>
                <div class="col-sm-2">
                  <p class="section-heading-upper">เลือกลักษณะ</p>
                </div>
                <div class="col-sm-12"><p></p></div>
                <?php
                $sql2 = "SELECT * FROM nature";
                $query2 = mysqli_query($link,$sql2);
                while($result2 = mysqli_fetch_array($query2,MYSQLI_ASSOC))
                {
                ?>
                <div class="col-sm-5">
                  <input name="natID" type="radio" value="<?php echo $result2["Nat_ID"];?>" id="cure_c">
                  <label ><?php echo $result2["Nat_Nature"];?></label>
                </div>
                <?php } ?>
               <div class="col-sm-12"><br></div>
               <div class="col-sm-2">
                <p class="section-heading-upper">เลือกโรค</p>
              </div>
               <div class="col-sm-12"></div>
               <div class="col-sm-5">
                 <!-- <div id="jquery-script-menu">
                 <div class="jquery-script-center">
                 <script type="text/javascript"
                 src="https://pagead2.googlesyndication.com/pagead/show_ads.js">
                 </script></div>
                 <div class="jquery-script-clear"></div>
                 </div> -->
                 <div class="dropdown-mul-1">
                 <select style="display:none"   name="disID[]" multiple placeholder="Select" >
               <?php
               $sql3 = "SELECT * FROM disease ORDER BY Dis_Name ASC";
               $query3 = mysqli_query($link,$sql3);
               while($result3 = mysqli_fetch_array($query3,MYSQLI_ASSOC))
               {
                ?>

                      <option value="<?php echo $result3["Dis_ID"];?>"><label class="form-control" ><?php echo $result3["Dis_Name"];?></label ></option>

             <?php } ?>
                </select>

              </div>
               </div>
               <div class="col-sm-2 "><p></p></div>


                <div class="col-sm-12 mx-auto">
                  <br>
                </div>

                <!-- บันทึก -->

                <div class="col-sm-12 text-center">
                  <ul class="actions">
                    <a href="#">
                      <button class="btn btn-primary" type="submit">
                        <i class="fas fa-check"></i>
                        เพิ่ม </button>
                    </a>

                     </form>
                    <!-- <button class="btn btn-danger"  type="submit">
                      <i class="fas fa-times"></i>
                      ล้าง </button> -->

                  </ul>
                </div>
              </div>
            </div>
          </div>
        <!-- </div> -->
      </div>
    </div>

  </section>

  <section class="page-section cta">
    <div class="container">
      <div class="row">
        <div class="col-xl-12 mx-auto">
          <div class="cta-inner text-center rounded">
            <h2 class="section-heading mb-4">
              <span class="section-heading-lower">สมุนไพรไทย</span>
              <span class="section-heading-upper">ทั้งหมด</span>

            </h2>
            <div class="table-responsive">
              <iframe src="php/iframeHer.php" width="1000px" height="500px"></iframe>
          </div>
        </div>
      </div>
    </div>
  </div>
  </section>
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
  <footer class="footer text-faded text-center py-5">
    <div class="container">
      <p class="m-0 small">Copyright &copy; Your Website 2018</p>
    </div>
  </footer>

<?php
    //  mysql_close($link);
 ?>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
