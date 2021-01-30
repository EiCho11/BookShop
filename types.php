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
          <h1 class="h3 mb-4 text-gray-800">Book Types</h1>

          <a href="#add" class="btn btn-success" data-toggle="modal">Add New Type</a>
          <!-- alert  -->
         
           

          <table class="table">
            <thead>
              <tr>
                <th>No</th>
                <th>Name</th>
                <th>Actions</th>
                </tr>
            </thead>
            <tbody>
              <?php 
                      include 'database.php';
                      $sql = 'SELECT * FROM types';
                      $result=$conn->query($sql);
                      //var_dump($result);
                      if ($result->num_rows>0) {
                          $i=1;
                          while ($row=$result->fetch_assoc()){
                          //  var_dump($row);
                            ?>
              <tr>
                                <td><?php echo $i;  ?></td>
                                <td><?php echo $row['name']; ?></td>
                                <td>
                                  
                                  <a href="#" class="edit btn btn-warning btn-circle btn-sm" data-id="<?=$row['id']?>"  data-name="<?=$row['name']?>"><i class="fas fa-exclamation-triangle" ></i></a>
                                  <a href="#" class="delete btn btn-danger btn-circle btn-sm" data-id="<?=$row['id']?>" ><i class="fas fa-trash" ></i></a>
                                </td>
              </tr>
              <?php
              $i++;
                          }
                      }

               ?>
             
            </tbody>
          </table>

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
  <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add New Book</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="addtype.php" method="post">
          <div class="modal-body">
            <input type="text" name="name" placeholder="Book Type..." class="form-control" required="required">
          </div>

          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            
            <input type="submit" name="btnsubmit" value="Save" class="btn btn-primary">
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Book</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="edittype.php" method="post">
          <input type="text" name="id" id="editid" class="form-control" hidden="">
          <div class="modal-body">
            <input type="text" name="name" placeholder="Book Type..." class="form-control" required="required" id="editname">
          </div>

          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            
            <input type="submit" name="btnsubmit" value="Update" class="btn btn-primary">
          </div>
        </form>
      </div>
    </div>
  </div>


  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){

      $('.delete').click(function(){        
        var id =$(this).data('id');
        if(confirm('Are you sure delete!')){
          window.location.href="deletetype.php?id="+id;
        }


      })
      //alert('ok!');
      $('.edit').click(function(){
       // alert('ok!');
       var id=$(this).data('id');
       var name=$(this).data('name');
      //alert(id + name);
      $('#editname').val(name);
      $('#editid').val(id);
      $('#edit').modal('show');
      })
    })
    
  </script>

</body>

</html>
