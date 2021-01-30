<?php 
			include 'database.php';
			$username=$_POST['username'];
			$phoneno=$_POST['phoneno'];
			$mycart=$_POST['mycart'];
			//var_dump($mycart);
			$vouncherno= uniqid();
			$total=0;
			foreach ($mycart as $key => $value) {
				$id=$value['id'];
				$price=$value['price'];
				$quality=$value['quanity'];
				$subtotal=$price*$quality;
				$total+=$subtotal;
				echo $id;
				
				$sql="INSERT INTO orderdetails(book_id,qty,voucherno) VALUES ($id,$quality,'$vouncherno')";
				$conn->query($sql);

			}
			$sql="INSERT INTO orders(voucherno,total,username,phoneno) VALUES ('$vouncherno',$total,'$username','$phoneno')";
				$conn->query($sql);
				echo ('Your Order Successfully !');
 ?>