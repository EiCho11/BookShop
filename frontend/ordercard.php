
<!DOCTYPE html>
<html>
<head>
<title>Book</title>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
<script type="text/javascript" src="../jquery.min.js"></script>
<script type="text/javascript" src="../bootstrap/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){

    showtable();
    function deleterecord(id)
    {
      var mycart=localStorage.getItem('mycart');
      var mycartobj=JSON.parse(mycart);
      var mycartarray=mycartobj.itemlist;
      mycartarray.splice(id,1);
      console.log(mycartobj.itemlist);
      mycartobj.itemlist=mycartarray;
      localStorage.setItem('mycart',JSON.stringify(mycartobj));
      showtable();
    }
    $("#tbody").on('click','.btndel',function()
    {
        var id=$(this).data('id');
        var ans=confirm('Are you sure?');
        if (ans)
        {   
          deleterecord(id);
        }

    })
    
      $("#tbody").on('click','.btnincrease',function()
    {
      var id=$(this).data('id');
      var mycart=localStorage.getItem('mycart');
      if(mycart)
      {
      var mycartobj=JSON.parse(mycart);
      $.each(mycartobj.itemlist,function(i,v)
        {
          //console.log(i,v);
          if(i==id)
          {
              v.quanity++;
          }
                
        })
      console.log(mycartobj);
      }
      console.log(id);
      localStorage.setItem('mycart',JSON.stringify(mycartobj));
      showtable();
    })
    
    $("#tbody").on('click','.btndecrease',function()
    {
      var id=$(this).data('id');
      var mycart=localStorage.getItem('mycart');
      // console.log(id);
      if(mycart)
      {
        var mycartobj=JSON.parse(mycart);
        $.each(mycartobj.itemlist,function(i,v)
        {
          console.log(i,v);
          if(i==id)
          {
            var quantity = v.quanity--;          
          }
          if(quantity<=1)
          {
            var mycartarray=mycartobj.itemlist;
            mycartarray.splice(id,1);
          }
          showtable();              
          $("#quan").html(quantity);    
        })
      }
      
      console.log(id);
      localStorage.setItem('mycart',JSON.stringify(mycartobj));
      showtable();
    })

    function showtable(){
      var mycart=localStorage.getItem('mycart');
      if(mycart){
        mycartobj=JSON.parse(mycart);
        var mycartobjarr=mycartobj.itemlist;
        var html="";  var total=0;var j=1;
        $.each(mycartobjarr,function(i,v){
          var id=v.id;
          var photo=v.photo;
          var name=v.name;
          var qty=v.quanity;
          var price=v.price;
          var sutotal=qty*price;
          total+=parseInt(sutotal);
          // console.log(price);
          html +='<tr><td>'+j+'</td>'+'<td><img src=" ../'+photo+'" width=80 height=80></td><td>'+name+'</td><td><button class="btnincrease" data-id='+i+'>+</button><p id="quan">'+qty+'</p><button class="btndecrease" data-id='+i+'>-</button></td><td>'+price+'</td>'+'<td>'+sutotal+'</td>'+'<td><button class="btndel" data-id='+i+'>Delete</button></td></tr>'; 
          j++;
        })
        html+='<tr>'+'<td colspan="5" class="text-center">Sub Total</td>'+'<td>'+total+'</td></tr>';
        $('#tbody').html(html);
        
        }
        
      }
        $('.order').click(function(){
    var username=$('#username').val();
    var phoneno=$('#phoneno').val();
    if(username!= ""&& phoneno !=""){
      var mycart=localStorage.getItem('mycart');
      var mycartobj=JSON.parse(mycart);
      var mycartobjarr=mycartobj.itemlist;
      $.post('order.php',{username:username,phoneno:phoneno,mycart:mycartobjarr},function(
        response){
        alert(response);
        localStorage.clear();
        $('#userdata').modal('hide');

      })
    }else{alert('Please fill!');

    }
})
    })
  
</script>
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
 <div class="container">
  <table class="table">
    <thead>
      <tr>
        <th>NO</th>
        <th>PHOTO</th>
        <th>NAME</th>
        <th>QUALITY</th>
        <th>UNIT PRICE</th>
        <th>TOTAL</th>
        <th>DELETE</th>
      </tr>
    </thead>
    <tbody id="tbody">
      
    </tbody>
  </table>
</div> 
<a href="#userdata"  data-toggle="modal" class="btn btn-success btn-block" >Check Out</a>
  
<div class="modal fade" tabindex="-1" role="dialog"  id="userdata">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Username:</label>
          <input type="text" name="username" id="username" class="form-control">
        </div>
        <div class="form-group">
          <label>Phone No:</label>
          <input type="text" name="phoneno" id="phoneno" class="form-control">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="order btn btn-primary" >Order</button>
      </div>
    </div>
  </div>
</div>

<div class="footer" style="background-color: gray;">
	<div class="container">
	<div class="row">
		<div class="col-md-6">
	
		<h4>Contact Me</h4>
		<h5>Phone:09796007360/09968962449</h5>
		<h5>Email:ukza11977296@gmail.com</h5>
		<h5>Address:Mandalay,Myotha</h5>
	
	</div>
	<div class="col-md-6 align-right">
	
		<img src="https://img.icons8.com/color/48/000000/facebook.png">
		
	</div>
	</div>
	</div>
</div>

</body>
</html>



