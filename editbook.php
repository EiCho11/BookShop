<?php
$bookid=$_POST['id'];
$bookname=trim($_POST['name']);
$bookprice=trim($_POST['price']);
$bookauthor=trim($_POST['author']);
$booktype=trim($_POST['type']);
$photofilepath=$_POST['oldphoto'];
$pdffilepath = $_POST['oldpdf'];


$photo=$_FILES['photo'];
if($photo['size'] >0){
			// unlink($photofilepath);
			$basepath='photo/';
			$photofilepath=$basepath.$photo['name'];
			move_uploaded_file($photo['tmp_name'], $photofilepath);
		}

$pdf=$_FILES['pdf'];
if($pdf['size'] >0){
$basepath1='pdf/';
$pdffilepath=$basepath1.$pdf['name'];//path pyin
$tempname1=$pdf['tmp_name'];
move_uploaded_file($tempname1,$pdffilepath);
}

// echo $photofilepath,$pdffilepath;die();


include 'database.php';
$sql= "UPDATE books SET name='$bookname', photo='$photofilepath', price ='$bookprice', pdf='$pdffilepath' , author_id ='$bookauthor', type_id='$booktype' WHERE id='$bookid' ";

// echo $sql;die();

$conn->query($sql);
header("location:books.php?status=2");
?>