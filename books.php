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
          <h1 class="h3 mb-4 text-gray-800">Book Lists</h1>
          <a href="#add" class="btn btn-success" data-toggle="modal">Add New Books</a>
          <table class="table">
            <thead></thead>
              <tr>
                <th>No</th>
                <th>Name</th>
                <th>Photo</th>
                <th>Price</th>
                <th>Pdf</th>
                <th>Authors_id</th>
                <th>Types_id</th>
                <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                      include 'database.php';
                      $sql = 'SELECT books. *,types.name as tname,authors.name as aname FROM books INNER JOIN types ON books.type_id=types.id INNER JOIN authors ON books.author_id=authors.id';
                      $result=$conn->query($sql);
                      if ($result->num_rows>0) {
                          $i=1;
                          while ($row=$result->fetch_assoc()){
                          //  var_dump($row);
                            ?>
              <tr>
                <td><?php  echo $i; ?></td>
                <td> <?php echo $row['name'] ?></td>
                <td> <img src="<?php echo $row['photo'] ?>" width=80 height=80></td>
                <td> <?php  echo $row['price'] ?></td>
                <td><img src="<?php echo $row['pdf'] ?>" width=80 height=80></td>
                <td><?php  echo $row['aname'] ?></td>
                <td><?php echo $row['tname'] ?></td>
                 <td>
                  <a href="#" class="edit btn btn-warning btn-circle btn-sm"
                   data-id="<?php echo $row['id'] ?>"
                   data-name="<?php echo $row['name'] ?>"
                   data-price="<?php echo $row['price'] ?>" 
                   data-photo="<?php echo $row['photo'] ?>" 
                   data-pdf="<?php echo $row['pdf'] ?>" 
                   data-author="<?php echo $row['author_id'] ?>" 
                   data-type="<?php echo $row['type_id'] ?>">
                   <i class="fas fa-exclamation-triangle" ></i></a>
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

  <!-- Logout Modal-->
  <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Book Lists</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
      <form action="addbook.php" method="post" enctype="multipart/form-data">
        <div class="modal-body">Name<input type="text" name="name" class="form-control"></div>
        
        <div class="modal-body">Price<input type="text" name="price" class="form-control"></div>
        <div class="form-group">
          <label>Author:</label>
        <select class="form-control" name="author">
          <option value="">Choose Author</option>
          <?php 
                  include 'database.php';
                  $sql ='SELECT * FROM authors';
                  $result=$conn->query($sql);
                  if ($result->num_rows>0) {
                    while($row =$result->fetch_assoc()){
                      ?>
                      <option value="<?= $row['id']?>"><?=$row['name']?></option>
                      <?php
                    }
                  }
           ?>
        </select>
        </div>
        <div class="form-group">
          <label>Types:</label>
        <select class="form-control" name="type" id="">
          <option value="">Choose type</option>
          <?php 
                  include 'database.php';
                  $sql ='SELECT * FROM types';
                  $result=$conn->query($sql);
                  if ($result->num_rows>0) {
                    while($row =$result->fetch_assoc()){
                      ?>
                      <option value="<?= $row['id']?>"><?= $row['name']?></option>
                      <?php
                    }
                  }
           ?>
        </select>
        </div>

        <div class="modal-body">Photo<br><input type="file" name="photo"></div>
        <div class="modal-body">PDF<br><input type="file" name="pdf"></div>
        
        
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
          <h5 class="modal-title" id="exampleModalLabel">Book Lists</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="editbook.php" method="post" enctype="multipart/form-data">

        <div class="modal-body">
          <input type="hidden" name="id" class="form-control" id="editid"></div>
        <div class="modal-body">Name
          <input type="text" name="name" class="form-control" id="editname"></div>
        
        <div class="modal-body">Price<input type="text" name="price" class="form-control" id="editprice"></div>
        <div class="form-group">
          <label>Author:</label>
        <select class="form-control" name="author" id="editauthor">
          <option value="">Choose Author</option>
          <?php 
                  include 'database.php';
                  $sql ='SELECT * FROM authors';
                  $result=$conn->query($sql);
                  if ($result->num_rows>0) {
                    while($row =$result->fetch_assoc()){
                      
                      ?>
                      <option value="<?= $row['id']?>" ><?= $row['name']?></option>
                      <?php
                    }
                  }
           ?>
        </select>
        </div>
        <div class="form-group">
          <label>Types:</label>
        <select class="form-control" name="type" id="edittype">
          <option value="">Choose type</option>
          <?php 
                  include 'database.php';
                  $sql ='SELECT * FROM types';
                  $result=$conn->query($sql);
                  if ($result->num_rows>0) {
                    while($row =$result->fetch_assoc()){
                      ?>
                      <option value="<?= $row['id']?>"><?= $row['name']?></option>
                      <?php
                    }
                  }
           ?>
        </select>
        </div>
        <div class="modal-body">
          <input type="hidden" id="oldphoto" name="oldphoto">
          <input type="hidden" id="oldpdf" name="oldpdf">

        Photo:<img src="" id="editphoto" width="50" height="50"><a href="#" id="delete">Delete</a>
        <input type="file" name="photo" > <br>
        </div>
        <div class="modal-body">PDF<br>
          <img src="" id="editpdf" width="50" height="50">
          <input type="file" name="pdf"></div>        
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
      $('#delete').click(function(){
       $("#editphoto").hide();
        $(this).hide();
        $("#newphoto").show();
      })


      $('.edit').click(function(){
      //  $('.newphoto').hide();
       // var id=$(this).data('id');
        var id =$(this).data('id');
        var name=$(this).data('name');
        var price=$(this).data('price');
        var photo=$(this).data('photo');
        var pdf=$(this).data('pdf');
        var author=$(this).data('author');
        var type=$(this).data('type');
        console.log(id,name,price,photo,pdf,author,type);

         $('#edit').modal('show');
        $('#editid').val(id);
        $('#editname').val(name);
        $('#editprice').val(price);
        $('#oldphoto').val(photo);
        $('#oldpdf').val(pdf);
        $("#editphoto").attr('src',photo);//img
        $("#editpdf").attr('src',pdf);//p
        $('#editauthor').val(author);
        $('#edittype').val(type); 

        

      })

      $('.delete').click(function(){        
        var id =$(this).data('id');
        alert(id);
        if(confirm('Are you sure delete!')){
          window.location.href="deletebook.php?id="+id;
        }
        })

      })
  </script>

</body>

</html>
