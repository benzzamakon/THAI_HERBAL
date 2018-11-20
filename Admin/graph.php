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
    <link href="https://canvasjs.com/assets/css/jquery-ui.1.11.2.min.css" rel="stylesheet" />

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <?php
    $error =false ;
    include 'php/connect.php';

    $year = null;
    $month = null;

    if (isset($_POST["year"])) {
          $year = $_POST["year"];
    }
    if (isset($_POST["month"])) {
      $month = $_POST["month"];
    }

    $sql = "SELECT Cou_Date,MONTH(Cou_Date),YEAR(Cou_Date), Her_ID, count(Her_ID) as userlook  FROM count_herb
    WHERE MONTH(Cou_Date) LIKE  '%".$month."%' OR YEAR(Cou_Date) LIKE '%".$year."%' GROUP BY Her_ID ORDER BY userlook DESC ";
    $query = mysqli_query($link,$sql);
    $arrayUserlook  = array();
    $arraynamelook = array();
    $arraynamelook2 = array();
    // $num = mysqli_num_rows($query);
    $n = '5' ;
    for ($i = 0 ; $i < $n ;$i++){
      $result = mysqli_fetch_array($query,MYSQLI_ASSOC) ;
      array_push($arrayUserlook,$result["userlook"]);
      array_push($arraynamelook2,$result["Her_ID"]);
    }
    // for($x = 0; $x < $n; $x++) {
    // echo $arraynamelook2[$x];
    // echo "<br>";
//}



// { label: "'.$arraynamelook[0].'", y: '.$arrayUserlook[0].' },
// { label: "'.$arraynamelook[1].'", y: '.$arrayUserlook[1].' },
    for ($i = 0; $i < $n ;$i++){
    $sql1= "SELECT * from herb WHERE Her_ID Like $arraynamelook2[$i]";
    $query1 = mysqli_query($link,$sql1);
    $result1 = mysqli_fetch_array($query1,MYSQLI_ASSOC);
    array_push($arraynamelook,$result1["Her_Name"]);
        }
        if(!$result&&!$result1)
        {
            echo '<script>';
            echo "alert('no Have !');";
            echo 'window.location="graph.php";';
            echo '</script>';
        }
        $sql4 = "SELECT DISTINCT YEAR(Cou_Date) FROM  count_herb WHERE YEAR(Cou_Date) LIKE '%".$year."%' ORDER by YEAR(Cou_Date) DESC";
        $query4 = mysqli_query($link,$sql4);
        $result4 = mysqli_fetch_array($query4,MYSQLI_ASSOC);
    echo '<link href="css/business-casual.min.css" rel="stylesheet">
    <script>
            window.onload = function () {

            var options = {
                animationEnabled: true,
                title: {
                    text: "สมุนไพรที่ถูกเข้าชม ประจำปี '.$result4["YEAR(Cou_Date)"].' "
                },
                axisY: {
                    title: "จำนวนผู้เข้าชม (in %)",
                    suffix: "%",
                    includeZero: false
                },
                axisX: {
                    title: "สมุนไพรที่ถูกเข้าชม"
                },
                data: [{
                    type: "column",
                    yValueFormatString: "#,##0.0#"%"",
                    dataPoints: [
                      { label: "'.$arraynamelook[0].'", y: '.$arrayUserlook[0].' },
                      { label: "'.$arraynamelook[1].'", y: '.$arrayUserlook[1].' },
                      { label: "'.$arraynamelook[2].'", y: '.$arrayUserlook[2].' },
                      { label: "'.$arraynamelook[3].'", y: '.$arrayUserlook[3].' },
                      { label: "'.$arraynamelook[4].'", y: '.$arrayUserlook[4].' }

                    ]
                }]
            };
            $("#chartContainer").CanvasJSChart(options);

            }
            </script>
            '; ?>

</head>

<body>

    <h1 class="site-heading text-center text-white d-none d-lg-block">
        <span class="site-heading-upper text-primary mb-3">ระบบจัดการฐานข้อมูลสมุนไพรไทย</span>
        <span class="site-heading-lower">THAI HERBAL</span>
    </h1>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark py-lg-4" id="mainNav">
        <div class="container">
            <a class="navbar-brand text-uppercase text-expanded font-weight-bold d-lg-none" href="#">Start Bootstrap</a>
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
                    <li class="nav-item  px-lg-4">
                        <a class="nav-link text-uppercase text-expanded" href="manage.php">จัดการข้อมูล</a>
                    </li>
                    <li class="nav-item active px-lg-4">
                        <a class="nav-link text-uppercase text-expanded" href="products.php">รายงาน</a>
                    </li>
                    <li class="nav-item px-lg-4">
                        <a href="" class="nav-link text-uppercase text-expanded ">
                            <span class="label"> ออกจากระบบ</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


<form  action="graph.php" method="post">
    <section class="page-section">
        <div class="container">
            <div class="about-heading-content">
                <div class="row">
                    <div class="col-xl-9 col-lg-12 mx-auto">
                        <div class="bg-faded  rounded p-5">
                            <h2 class="section-heading mb-4">
                                <span class="section-heading-lower">สมุนไพรที่ถูกเข้าชมมากที่สุด</span>
                            </h2>



                            <div class="row ">

                                <div class="col-sm-3">
                                    <p>ประจำเดือน </p>
                                </div>
                                <div class="col-sm-9">
                                    <div class="select-wrapper">
                                        <select name="month"  class="form-control">
                                            <option>- เลือก -</option>
                                            <option value="01">ม.ค.</option>
                                            <option value="02">ก.พ.</option>
                                            <option value="03">มี.ค.</option>
                                            <option value="04">เม.ย.</option>
                                            <option value="05">พ.ค.</option>
                                            <option value="06">มิ.ย.</option>
                                            <option value="07">ก.ค.</option>
                                            <option value="08">ส.ค.</option>
                                            <option value="09">ก.ย.</option>
                                            <option value="10">ต.ค.</option>
                                            <option value="11">พ.ย.</option>
                                            <option value="12">ธ.ค.</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <p>ประจำปี </p>
                                </div>
                                <div class="col-sm-9">
                                    <div class="select-wrapper">
                                        <select name="year"  class="form-control">
                                          <option>- เลือก -</option>
                                          <?php
                                          $sql3 = "SELECT DISTINCT YEAR(Cou_Date) FROM  count_herb ORDER by YEAR(Cou_Date) DESC";
                                          $query3 = mysqli_query($link,$sql3);
                                          while($result3 = mysqli_fetch_array($query3,MYSQLI_ASSOC))
                                          {
                                           ?>

                                                 <option value="<?php echo $result3["YEAR(Cou_Date)"];?>"><label class="form-control" ><?php echo $result3["YEAR(Cou_Date)"];?></label ></option>
                                     <?php } ?>
                                        </select>
                                    </div>
                                </div>
      </br></br>
                                <div class="col-sm-12 text-center">
                                  <ul class="actions">
                                      <button class="btn btn-primary" type="submit">
                                        <i class="fas fa-check"></i>
                                        ค้นหา</button>
                                  </ul>
                                </div>
                                </br></br>

                                <div class="col-sm-12">
                                        <div id="chartContainer" style="height: 370px; width: 100%;"></div>

                                </div>
                                <br><br><br>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


  </form>




    <footer class="footer text-faded text-center py-5">
        <div class="container">
            <p class="m-0 small">Copyright &copy; Your Website 2018</p>
        </div>
    </footer>


    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
    <script src="https://canvasjs.com/assets/script/jquery-ui.1.11.2.min.js"></script>
    <script src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>

</body>

</html>
