<?php 

		$email=trim($_POST['email']);
		$pass=trim($_POST['password']);
	
		include 'database.php';
		$sql="SELECT * FROM admins WHERE email='$email' and password='$pass'";
		$result=$conn->query($sql);
		//var_dump($result);
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				session_start();
				$_SESSION['userid']=$row['id'];
				$_SESSION['name']=$row['name'];
				$_SESSION['email']=$row['email'];
				$_SESSION['password']=$row['password'];
				header("location: dashboard.php");
			}
		}else{
			header("location: dashboard.php?status=0");
		}


 ?>