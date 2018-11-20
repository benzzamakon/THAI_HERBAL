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
                            <th scope="col">รหัสลักษณะ</th>
                            <th scope="col">ชื่อลักษณะ</th>
                            <th scope="col">แก้ไข</th>
                            <th scope="col">ลบ</th>
                        </tr>
                    </thead>
                    <tbody>

                      <?php
                      include 'connect.php';
                      $sql = "SELECT * FROM nature";
                      $query = mysqli_query($link,$sql);
                      while($result = mysqli_fetch_array($query,MYSQLI_ASSOC))
                      {
                       ?>

                        <tr class="table-success">
                            <!-- <th scope="row">1</th> -->
                            <td><?php echo $result["Nat_ID"];?></td>
                            <td><?php echo $result["Nat_Nature"];?></td>
                            <td> <a target ="_blank"  href="../editNat.php?Nat_ID=<?php echo $result["Nat_ID"];?>">
                                <button class="btn btn-primary" data-dismiss="modal" type="button">
                                  <i class="fas fa-check"></i>
                                  แก้ไข </button>
                              </a></td>

                            <td>
                                <a target ="_blank"  href="JavaScript:if(confirm('Confirm Delete?')==true){window.location='deleteNat.php?Nat_ID=<?php echo $result["Nat_ID"];?>';}">
                              <button class="btn btn-danger" data-dismiss="modal" type="button">
                                <i class="fas fa-times"></i>
                                ลบ </button></a></td>
                        </tr>

                        <?php
                        }
                        ?>

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
