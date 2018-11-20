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
  <?php
     ini_set('display_errors', 1);
     error_reporting(~0);
     include_once 'php/connect.php';
     $HerID = null;

     if(isset($_GET["Her_ID"]))
     {
  	   $HerID = $_GET["Her_ID"];
     }
     $sql = "SELECT * FROM herb WHERE Her_ID = '".$HerID."' ";
     // $sql2 = "SELECT * FROM treatment
     // INNER JOIN disease ON treatment.Dis_ID = disease.Dis_ID
     // INNER JOIN herb ON treatment.Her_ID = herb.Her_ID
     // INNER JOIN maintain ON treatment.Mai_ID = maintain.Mai_ID
     // INNER JOIN nature ON treatment.Nat_ID = nature.Nat_ID";


     $query = mysqli_query($link,$sql);

     $result=mysqli_fetch_array($query,MYSQLI_ASSOC);

  ?>
<form class="manage" id="edifdate" name="edifdate" method="post" action="php/saveHer.php" enctype="multipart/form-data">
  <section class="page-section about-heading">
    <div class="container">
      <div class="about-heading-content">
        <div class="row">
          <div class="col-xl-9 col-lg-12 mx-auto">
            <div class="bg-faded  rounded p-5">
              <h2 class="section-heading mb-4">
                <span class="section-heading-lower">แก้ไขข้อมูลสมุนไพร</span>
              </h2>
              <div class="row ">
                <div class="col-sm-3">
                  <p>รหัสสมุนไพร </p>
                </div>
                <div class="col-sm-9">
                  <input class="form-control" type="hidden" name="txtHerID" value="<?php echo $result["Her_ID"];?>"><?php echo $result["Her_ID"];?>
                </div>
                <div class="col-sm-3">
                  <p>ชื่อสมุนไพร </p>
                </div>
                <div class="col-sm-9">
                  <input class="form-control" type="text" name="txtHerName" size="20" value="<?php echo $result["Her_Name"];?>">
                </div>
                <br>
                <br>
                <div class="col-lg-12 mx-auto">
                  <p>บำรุงที่ถูกเลือกอยู่</p>
                </div>
                <?php
                      $sql4 = "SELECT * FROM maintain INNER JOIN herb_maintain ON maintain.Mai_ID = herb_maintain.Mai_ID WHERE herb_maintain.Her_ID = '".$HerID."'";
                      $query4 = mysqli_query($link,$sql4);
                      while($result4 = mysqli_fetch_array($query4,MYSQLI_ASSOC))
                      {
                 ?>
                <div class="col-sm-9">
                  <input class="form-control" type="hidden"><?php echo $result4["Mai_Name"];?>
                </div>
              <?php } ?>
                <br>
                <br>
                <div class="col-lg-12 mx-auto">
                  <span class="section-heading-upper">จัดการเลือกบำรุง</span>
                </div>
                <div class="col-sm-12"><p></p></div>
                <?php
                      $sql1 = "SELECT * FROM maintain ";
                      $query1 = mysqli_query($link,$sql1);
                      while($result1 = mysqli_fetch_array($query1,MYSQLI_ASSOC))
                      {
                 ?>
                <div class="col-sm-5">
                  <input name="maiID[]" type="checkbox" value="<?php echo $result1["Mai_ID"];?>">
                  <label  ><?php echo $result1["Mai_Name"];?></label>
                </div>
            <?php } ?>
                <div class="col-sm-2 "><p></p><br></div>

                  <div class="col-lg-12 mx-auto">
                    <span class="section-heading-upper">ไฟร์เลือกรูปภาพ</span>
                  </div>

                <div class="col-sm-4">
                  <input type="file" name="herPic"    style="color:red;"  accept="file_extension/*">
                  <img src="img/imagesHerb/<?php echo $result["Her_Picture"];?>"width="100px"height="100px">
                </div>
                <br>
                <br>
                <?php
                      $sql5 = "SELECT * FROM nature INNER JOIN herb_nature ON nature.Nat_ID = herb_nature.Nat_ID WHERE herb_nature.Her_ID = '".$HerID."'";
                      $query5 = mysqli_query($link,$sql5);
                      while($result5 = mysqli_fetch_array($query5,MYSQLI_ASSOC))
                      {
                 ?>
                <div class="col-lg-12 mx-auto">
                  <p>ลักษณะที่ถูกเลือกอยู่</p>
                </div>
                <div class="col-sm-9">
                  <input class="form-control" type="hidden"><?php echo $result5["Nat_Nature"];?>
                </div>
              <?php } ?>
                <br>
                <br>
                <div class="col-lg-12 mx-auto">
                  <span class="section-heading-upper">จัดการเลือกลักษณะ</span>
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
                <br>
                <br>
                <div class="col-lg-12 mx-auto">
                  <p>โรคที่ถูกเลือกอยู่</p>
                </div>
                <?php
                      $sql6 = "SELECT * FROM disease INNER JOIN herb_disease ON disease.Dis_ID = herb_disease.Dis_ID WHERE herb_disease.Her_ID = '".$HerID."'";
                      $query6 = mysqli_query($link,$sql6);
                      while($result6 = mysqli_fetch_array($query6,MYSQLI_ASSOC))
                      {
                 ?>

                <div class="col-sm-9">
                  <input class="form-control" type="hidden"><?php echo $result6["Dis_Name"];?>
                </div>
              <?php } ?>
                <br>
                <br>
                <div class="col-lg-12 mx-auto">
                  <span class="section-heading-upper">จัดการโรค</span>
                </div>
                <br>
                <div class="col-sm-5">
                  <div class="dropdown-mul-1">
                  <select name="disID[]" multiple placeholder="Select" style="display:none">
                <?php
                $sql3 = "SELECT * FROM disease ORDER BY Dis_Name ASC ";
                $query3 = mysqli_query($link,$sql3);
                while($result3 = mysqli_fetch_array($query3,MYSQLI_ASSOC))
                {
                 ?>
                       <option value="<?php echo $result3["Dis_ID"];?>"><label class="form-control" ><?php echo $result3["Dis_Name"];?></label ></option>
              <?php } ?>
                 </select>
                 </div>
                </div>
                <div class="col-sm-12 mx-auto">
                  <br>
                </div>

                <!-- บันทึก -->

                <div class="col-sm-12 text-center">
                  <ul class="actions">

                      <button class="btn btn-primary" data-dismiss="modal"  type="submit" name="Register" id="Register" >
                        <i class="fas fa-check"></i>
                        บันทึก </button>


                  </ul>
              </div>

            </div>
          </div>
        </div>
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
<?php  mysqli_close($link); ?>
</body>

</html>
