<?php
	
	session_start();
	require "connection.php";
	
	if(isset($_POST['username'])){
		$username = $_POST['username'];
	}
	if(isset($_POST['password'])){
		$password = sha1($_POST['password']);
	}


	$sql= "SELECT *FROM users WHERE
		password= '$password' AND username='$username'";

	$result = mysqli_query($conn, $sql);
	$empty = "";
	if (mysqli_num_rows($result)>0) {

		$_SESSION['logged_in_user'] = $username;

	while ($row= mysqli_fetch_assoc($result)) {
		$empty = $row['role'];
		}
		// echo $empty;
	} else {
		$_SESSION['error_message'] = "Login failed";
	}


	if ($empty == 1) {
		if(!isset($_SESSION['admin'])) {
			$_SESSION['admin'] = 1;
			
		} if(isset($_SESSION['admin'])){
		echo $_SESSION['admin'];
	}

	} else {
		if(!isset($_SESSION['user'])){
			$_SESSION['user'] = 0;
		} if(isset($_SESSION['user'])){
		echo $_SESSION['user'];
	}

	}
	
	
?>

