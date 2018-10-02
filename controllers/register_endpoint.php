<?php 
	
	require "connection.php";

		
	$email = $_POST['email'];
	$username = $_POST['username'];
	$password = sha1($_POST['password']);
	$confirmPassword= sha1($_POST['confirmPassword']);
	$role = 0;


	$sql= "INSERT INTO users (email, username, password, role )
		VALUES('$email', '$username', '$password', $role)";


	if(mysqli_query($conn, $sql)) {
// 		echo "success";
	} else {
		echo mysqli_error($conn);
	}
	header('location: ../index.php');
?>
