<!-- 1.Data accept
2.Validation
3.File Upload
4.Insert Data into DB -->

<?php 
			$authorname=trim($_POST['name']);//trim is space delete /where->before data and after data
			//echo $typename;
			include 'database.php';
			$sql="INSERT INTO authors (name) VALUES ('$authorname')";
			$conn->query($sql);
			header("location: authors.php?status=1");

 ?>