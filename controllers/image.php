<?php  
	require "connection.php";

	$id = $_POST['id'];
	$image= "../assets/images/".$_FILES['image']['name'];


	move_uploaded_file($_FILES['image']['tmp_name'], $image);

	$sql = "UPDATE items SET image= '$image' WHERE id=$id";
	$query = mysqli_query($conn,$sql);
// 	echo $sql;

	header('location: ../list_products.php');

?>