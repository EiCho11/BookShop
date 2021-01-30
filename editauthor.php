<?php 
			$authorid=$_POST['id'];
			$authorname=trim($_POST['name']);//trim is space delete /where->before data and after data
			//echo $typename;
			include 'database.php';
			$sql="UPDATE authors SET name='$authorname' WHERE id=$authorid";
			$conn->query($sql);
			header("location: authors.php?status=2");

 ?>