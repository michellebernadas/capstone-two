<?php  
session_start();
$id = $_POST['id'];

if (isset($_SESSION['cart'])) {
	unset($_SESSION['cart'][$id]);
}
// header('location: ../products.php');
?>