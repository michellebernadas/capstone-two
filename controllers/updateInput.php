<?php  
	session_start();

	$id = $_POST['id'];
	$input = $_POST['input'];

	if (isset($_SESSION['cart'][$id])) {
		$_SESSION['cart'][$id]= $input;
	}

	// print_r($_SESSION['cart']);
?>