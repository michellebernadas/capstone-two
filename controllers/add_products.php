<?php  
	echo "post: <br>";
	print_r($_POST);

	echo "<br> <hr>files: <br>";
	print_r($_FILES);
	require "connection.php";

	$name= $_POST['productName'];
	$description= $_POST['description'];
	$price= $_POST['productPrice'];
	$image= "../assets/images/".$_FILES['image']['name'];
	$category_id= $_POST['productCategories'];

	move_uploaded_file($_FILES['image']['tmp_name'], $image);
	

	$sql= "INSERT INTO items ( name, description, price, image, category_id) VALUES
			('$name', '$description', '$price', '$image', '$category_id')";

	$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

	header('location: ../list_products.php');
?>