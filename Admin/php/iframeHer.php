<html>
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">



  <!-- Bootstrap core CSS -->
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
  <!-- Custom fonts for this template -->
  <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet">

  <!-- Custom styles for this template -->

  <body>

<div class="table-responsive">

    <table class="table table-bordered  table table-hover">
      <thead class="thead-info">
        <tr class="bg-success">
          <th scope="col">รหัสสมุนไพร</th>
          <th scope="col">ชื่อสมุนไพร</th>
          <th scope="col">บำรุง</th>
          <th scope="col">ลักษณะ</th>
          <th scope="col">โรค</th>
          <th scope="col">อาการ</th>
          <th scope="col">รูปภาพ</th>
          <th scope="col">แก้ไข</th>
          <th scope="col">ลบ</th>
        </tr>
      </thead>
      <tbody>

        <?php
        include 'connect.php';
        $herId = "";
        $sql4 = "SELECT * FROM herb INNER JOIN herb_nature ON  herb.Her_ID = herb_nature.Her_ID
        INNER JOIN nature ON herb_nature.Nat_ID = nature.Nat_ID";

        $query4 = mysqli_query($link,$sql4);
        while($result4 = mysqli_fetch_array($query4,MYSQLI_ASSOC))
        {
          $herId = $result4["Her_ID"];
         ?>
          <tr class="table-success">
              <!-- <th scope="row">1</th> -->
              <td><?php echo $result4["Her_ID"];?></td>
              <td><?php echo $result4["Her_Name"];?></td>
              <td><?php
              $sql5 = "SELECT * FROM herb_maintain INNER JOIN maintain ON herb_maintain.Mai_ID = maintain.Mai_ID WHERE herb_maintain.Her_ID = $herId ";
              $query5 = mysqli_query($link,$sql5);
              while($result5 = mysqli_fetch_array($query5,MYSQLI_ASSOC))
              {
                echo $result5["Mai_Name"];
              }?>
            </td>
              <td><?php echo $result4["Nat_Nature"];?></td>
              <td><?php
              $sql6 = "SELECT * FROM herb_disease INNER JOIN disease ON herb_disease.Dis_ID = disease.Dis_ID WHERE herb_disease.Her_ID = $herId ";
              $query6 = mysqli_query($link,$sql6);
              while($result6 = mysqli_fetch_array($query6,MYSQLI_ASSOC))
              {
                echo $result6["Dis_Name"];
              }?></td>
              <td><?php
              $sql7 = "SELECT * FROM herb_disease INNER JOIN disease ON herb_disease.Dis_ID = disease.Dis_ID WHERE herb_disease.Her_ID = $herId ";

              $query7 = mysqli_query($link,$sql7);
              while($result7 = mysqli_fetch_array($query7,MYSQLI_ASSOC))
              {
                echo $result7["Dis_Name"]." ".$result7["Dis_symptom"]." ";
              }
              ?></td>
              <td><img src="../img/imagesHerb/<?php echo $result4["Her_Picture"];?>"width="100px"height="100px"></td>
              <td> <a target ="_blank" href="../editHer.php?Her_ID=<?php echo $result4["Her_ID"];?>">
                  <button class="btn btn-primary" data-dismiss="modal" type="button">
                    <i class="fas fa-check"></i>
                    แก้ไข </button>
                </a></td>

              <td>
                  <a target ="_blank" href="JavaScript:if(confirm('Confirm Delete?')==true){window.location='deleteHer.php?Her_ID=<?php echo $result4["Her_ID"];?>';}">
                <button class="btn btn-danger" data-dismiss="modal" type="button">
                  <i class="fas fa-times"></i>
                  ลบ </button></a></td>
          </tr>
          <?php } ?>

      </tbody>
    </table>

</div>


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
