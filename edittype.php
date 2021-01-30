<?php 
			$typeid=$_POST['id'];
			$typename=trim($_POST['name']);//trim is space delete /where->before data and after data
			//echo $typename;
			include 'database.php';
			$sql="UPDATE types SET name='$typename' WHERE id=$typeid";
			$conn->query($sql);
			header("location: types.php?status=2");

 ?>