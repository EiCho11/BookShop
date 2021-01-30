<!DOCTYPE html>
<html>
<head>
<title>Book</title>
<meta charset="utf-8">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
				<li class="nav-item mx-3">
					<i class="material-icons" style="margin-top: 10px;color: white;">add_shopping_cart</i>
					<a href="ordercard.php" id="showcount" style="color: white;position: absolute;margin: 10px 0px 0 10px;">0</a>
				</li>			
			</ul>
		</div>
	</div>
</nav>

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

	 <?php 
                  $id=$_REQUEST['id'];
                  $sql ="SELECT books.*,authors.name as authorname,types.name as typename FROM books INNER JOIN authors on books.author_id=authors.id INNER JOIN types on books.type_id=types.id where books.id=$id ";
                  $result=$conn->query($sql);
                  if ($result->num_rows>0) {
                    while($row =$result->fetch_assoc()){
                      ?>
 <div class="container">                   
<div class="card mb-3">
  <div class="row no-gutters">
    <div class="col-md-4">
      <img src="../<?php echo $row['photo'] ?>" class="card-img-top" alt="...">
    </div>
    <div class="col-md-8 my-3">
      <div class="card-body">
		 <h5 style="color: gray;">Name:<?php echo $row['name'] ?></h5>                      
	      <h5>Author Name:<?php echo $row['authorname'] ?></h5>
	      <h5>Type Name:<?php echo $row['typename'] ?></h5>
	      <h5>Price:<?php echo $row['price'] ?></h5>
	      <a href="#" class="btn btn-success">Read Demo</a>
	      <a href="#" class="addtocard btn btn-primary" data-id="<?= $row['id'] ?>" data-name="<?= $row['name'] ?>" data-price="<?= $row['price'] ?>" data-photo="<?= $row['photo'] ?>">Add to card</a>       
      </div>
         <?php
                    }
                  }
           ?>
    </div>
  </div>
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


<script type="text/javascript">
	$(document).ready(function(){
			showcount();
			function showcount(){
				var mycart=localStorage.getItem('mycart');
				if(mycart){
					mycartobj=JSON.parse(mycart);
					var total=0;
					$.each(mycartobj.itemlist,function(i,v){
						total+=parseInt(v.quanity);
					});
					$("#showcount").html(total);
				}
			}
			$(".addtocard").click(function(){
				var id=$(this).data('id');
				var price=$(this).data('price');
				var name=$(this).data('name');
				var photo=$(this).data('photo');
				//console.log(id,name,price,photo);
				var item={
					id:id,
					price:price,
					name:name,
					photo:photo,
					quanity:1
				};
				var mycart=localStorage.getItem('mycart');
				if(!mycart){
					mycart='{"itemlist":[]}';

				}
				var mycartobj=JSON.parse(mycart);
				var status=false;
				var total=0;
				$.each(mycartobj.itemlist,function(i,v){
					if(v.id==id){
						status=true;
						v.quanity++;
					}
				//	total+=parseInt(v.quanity);
				})
				//$("#showcount").html(total);
				if(!status){
					mycartobj.itemlist.push(item);
				}
				//mycartobj.itemlist.push(item);
				console.log(mycartobj);
				
				localStorage.setItem('mycart',JSON.stringify(mycartobj));
				showcount();

			})
		})
</script>

	
			
</body>
</html>