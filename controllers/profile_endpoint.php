<?php 

	require "connection.php";
	$id = $_POST['id'];
	$email = $_POST['email'];
	$first_name = $_POST['first_name'];
	$last_name= $_POST['last_name'];
	$address= $_POST['address'];
	$contact_number= $_POST['contact_number'];


		$query= "INSERT INTO user_details (email, first_name, last_name, address, contact_number, user_id) VALUES ('$email', '$first_name','$last_name', '$address', '$contact_number', '$id')";
		$result = mysqli_query($conn, $query);
// 		echo $result;

	// } else {
	


	header('location:  ../profile.php');
//}
?>