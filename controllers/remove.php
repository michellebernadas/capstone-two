<?php 
	require "connection.php";
	$id = $_GET['id'];

// 	echo $id;

	$sql= "DELETE FROM items WHERE id= $id";
	$result= mysqli_query($conn, $sql);

	if (isset($_GET['id'])) {
		unset($_GET['id']);
	}

	header('location: ../list_products.php');
?>
