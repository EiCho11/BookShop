<!-- 1.Data accept
2.Validation
3.File Upload
4.Insert Data into DB -->

<?php 
			$typename=trim($_POST['name']);//trim is space delete /where->before data and after data
			//echo $typename;
			include 'database.php';
			$sql="INSERT INTO types (name) VALUES ('$typename')";
			$conn->query($sql);
			header("location: types.php?status=1");

 ?>