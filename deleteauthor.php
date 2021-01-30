<?php 
		$authorid=$_REQUEST['id'];
		//$typename=trim($_POST['name']);//trim is space delete /where->before data and after data
		//echo $typename;
		include 'database.php';
		$sql="DELETE FROM authors WHERE id=$authorid";
		$conn->query($sql);
		header("location: authors.php?status=3");

 ?>