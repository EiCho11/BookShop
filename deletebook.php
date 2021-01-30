<?php 
			$typeid=$_REQUEST['id'];
			//echo $typeid;
			//echo $typename;
			include 'database.php';
			$sql="DELETE FROM books WHERE id=$typeid";
			 		$conn->query($sql);
			header("location: books.php?status=3");

 ?>