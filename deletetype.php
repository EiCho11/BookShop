<?php 
			$typeid=$_REQUEST['id'];
			//$typename=trim($_POST['name']);//trim is space delete /where->before data and after data
			//echo $typename;
			include 'database.php';
			$sql="DELETE FROM types WHERE id=$typeid";
			$conn->query($sql);
			header("location: types.php?status=3");

 ?>