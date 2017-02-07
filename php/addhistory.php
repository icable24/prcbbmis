<?php 
	require '../dbconnect.php';

	for($i = 1; $i < 30; $i++){
		echo	$_POST['A'.$i];
	}
?>