<?php 
	require "connection.php";

	$id = $_POST['id'];
	$image = $_POST['image'];
	$name = $_POST['nameInput'];
	$description = $_POST['descInput'];
	$price = $_POST['priceInput'];
	$category_id= $_POST['categoryInput'];

	echo $category_id;
	// $sql = "SELECT * FROM artists WHERE id= $id";
	// $result= mysqli_query($conn, $sql);
	// $result= mysqli_fetch_assoc($result);

?>

