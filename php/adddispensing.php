<?php 

	require '../dbconnect.php';

	if(!empty($_POST)){
		$pdo = Database::connect();
		$quantity = $_POST['qty'];
		
		for($i = 0; $i < $quantity; $i++){
			$bloodinfo[$i] = $_POST['bagserialno'.$i];
		}

		

		$bloodbag = $pdo->prepare()
	}
?>