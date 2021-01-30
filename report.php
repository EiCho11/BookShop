<?php 
        session_start();
        if ( $_SESSION['userid']!=null){
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>BookStore Dashboard</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
  <?php include 'sidebar.php'; ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
      <?php include 'nav.php'; ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Order Record</h1>

         
          <!-- alert  -->
         
           
          <div class="col-md-10 offset-md-1">
          <table class="table">
            <thead>
              <tr>
                <th>Voucher No</th>
                <th>Order Date</th>
                <th>Total</th>
                <th>Username</th>
                <th>Phone No</th>
                </tr>
            </thead>
            <tbody>
              <?php 
                      include 'database.php';
                      $sql = 'SELECT * FROM orders order by id desc';
                      $result=$conn->query($sql);
                      //var_dump($result);
                      if ($result->num_rows>0) {
                          $i=1;
                          while ($row=$result->fetch_assoc()){
                          //  var_dump($row);
                            ?>
              <tr>
                                <td><a href="voucherno.php?vno=<?=$row['voucherno']?>&odate=<?=$row['orderdate'] ?>"><?php echo $row['voucherno']  ?></a></td>
                                <td><?php echo $row['orderdate']; ?></td>
                                <td><?php echo $row['total']; ?></td>
                                <td><?php echo $row['username']; ?></td>
                                <td><?php echo $row['phoneno']; ?></td>
                               
              </tr>
              <?php
              $i++;
                          }
                      }

               ?>
             
            </tbody>
          </table>
        </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <?php include 'footer.php'; ?>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Data insert Modal-->
  


  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>
  

</body>

</html>
<?php 
}else{
  header('location: login1.php');
}
 ?>

 
