<?php 
	
	require "connection.php";

	$id = $_POST['id'];
	// $image= "../assets/images/".$_FILES['image']['name'];
	$name = $_POST['nameInput'];
	$description = $_POST['descInput'];
	$price = $_POST['priceInput'];
	$category_id= $_POST['categoryInput'];

	// move_uploaded_file($_FILES['image']['tmp_na;me'], $image);
	
	$sql = "UPDATE items SET name = '$name', description = '$description', price = '$price', category_id= '$category_id' WHERE id= '$id' ";
	$query = mysqli_query($conn,$sql);
	echo $query;

	$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

	header('location: ../list_products.php');

?>