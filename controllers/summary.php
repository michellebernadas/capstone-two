<?php  
	
	$sub = $_POST['sub'];
	$total = $_POST['total'];

	if(isset($_SESSION['sub'])) {
		$_SESSION['sub'] = $sub;
	}
	if (isset($_SESSION['total'])) {
		$_SESSION['total']= $total;

	}

?>