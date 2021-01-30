<!DOCTYPE html>
<html>
<head>
<title>Book</title>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../jquery.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-md navbar-dark bg-success">
	<div class="container">
		<a href="index.php" class="navbar-brand">Books Shop</a>
		<button class="navbar-toggler" data-toggle="collapse" data-target="#mydiv">
			<span class="navbar-toggler-icon"></span>
		</button>	
		<div class="collapse navbar-collapse" id="mydiv">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item mx-3">
					<a href="index.php" class="nav-link" style="color: white;">Home</a>
				</li>
				<li class="nav-item mx-3">
					<a href="#" class="nav-link" style="color: white;">About</a>
				</li>
				<li class="nav-item mx-3">
					<a href="latestbook.php" class="nav-link" style="color: white;">LatestBook</a>
				</li>
				
				<li class="nav-item mx-3">
					<a href="top10book.php" class="nav-link" style="color: white;">Top10Book</a>
				</li>
				<li class="nav-item mx-3">
					<a href="contact.php" class="nav-link" style="color: white;">Contact</a>
				</li>				
			</ul>
		</div>
	</div>
</nav>

<div class="container">
<form action="search.php" method="post">
<div class="header my-5">
	
	<div class="row">
		<div class="col col-md-4">
	<div class="form-group">
          
        <select class="form-control" name="author" id="editauthor">
          <option value="">Choose Author Name</option>
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
        </div>
        <div class="col-md-4">

        <div class="form-group">
          
        <select class="form-control" name="type" id="edittype">
          <option value="">Choose Type Name</option>
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
        </div >
        <div class="col-md-4">
        <button class="btn btn-success form-control w-75">Search</button>
        </div>
        </div>
       
</div>
 </form>
 </div>
<div class="container" id="hidden">
	<div class="row">
		<div class="col-md-12">
			 <div class="row">
			 	<h3 style="color: gray;">Show Books</h3>
			 </div>
		</div>
			 <?php 
                  include 'database.php';
                  $sql ='SELECT * FROM books order by id asc limit 5';
                  $result=$conn->query($sql);
                  if ($result->num_rows>0) {
                    while($row =$result->fetch_assoc()){
                      ?>
		<div class="col-md-4">
			<div class="card my-5">
				  <img src="../<?php echo $row['photo'] ?>" class="card-img-top" alt="...">
				  <div class="card-body bg-success">
				    
				    <h5>Name:<?php echo $row['name'] ?></h5>
                      <h5>Price:<?php echo $row['price'] ?></h5>
                      <a href="moredetail.php?id=<?= $row['id'] ?>" class="btn btn-primary">View Details</a>
				  </div>
				</div>
				
		</div>

                      <?php
                    }
                  }
           ?>
	</div>
	</div>


<div class="footer" style="background-color: gray;">
	<div class="container">
	<div class="row">
		<div class="col-md-6">
	<div class="ml-auto">
		<h4>Contact Me</h4>
		<h5>Phone:09796007360/09968962449</h5>
		<h5>Email:ukza11977296@gmail.com</h5>
		<h5>Address:Mandalay,Myotha</h5>
	</div>
	</div>
	<div class="col-md-6">
	<div class="my-4">
		<img src="https://img.icons8.com/color/48/000000/facebook.png">
		</div>
	</div>
	</div>
	</div>
</div>
	
			
</body>
</html>