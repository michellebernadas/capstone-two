<?php 
	
	require "connection.php";

	$username = $_POST['username'];
	
	$sql= "SELECT*FROM users WHERE username= '$username' ";
	$result =(mysqli_query($conn, $sql));
	// $row =mysqli_num_rows($result);
	// echo $row;

	if(mysqli_num_rows($result)>0) {
		echo 'found';
	} else {
		echo "not found";
	}

	
?>