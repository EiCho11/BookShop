1.accept data
2.validation
3.upload file
4.insert database

<?php 
		$name=trim($_POST['name']);
		$price=trim($_POST['price']);
		$author=trim($_POST['author']);
		$type=trim($_POST['type']);

		$photo=$_FILES['photo'];//array
		$pdf=$_FILES['pdf'];//array
		//upload image
		$filepath='photo/';
		$photofilename=$filepath.$photo['name'];
		$tmpnamepho=$photo['tmp_name'];
		move_uploaded_file($tmpnamepho, $photofilename);

		//upload pdf
		$filepath1='pdf/';
		$pdffilenamepdf=$filepath1.$pdf['name'];
		$tmpname=$pdf['tmp_name'];
		move_uploaded_file($tmpname, $pdffilenamepdf);
		//echo $type;
		include 'database.php';
		$sql="INSERT INTO books (name,price,photo,pdf,author_id,type_id) VALUES ('$name','$price','$photofilename','$pdffilenamepdf',$author,$type)";
		$conn->query($sql);
		//echo $name;
		//echo $price;
		

		header("location: books.php?status=1");


 ?>