<?php 
	require '../dbconnect.php';

	for($i = 1; $i < 31; $i++){
		echo	$_POST['A'.$i];
	}

	$pdo = Database::connect();
	for($i = 1; $i < 31; $i++){
		$A = 'A' . $i;
		$query = $pdo->prepare("INSERT INTO history('$A') VALUES(?)");
		$query->execute(array($_POST['A'.$i]));
	}
?>