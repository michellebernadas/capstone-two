<?php  
	session_start();

	$input = $_POST['input'];

	if (isset($_SESSION['cart'])) {
		$_SESSION['cart']= $input;
	}

	// print_r($_SESSION['cart']);

?>