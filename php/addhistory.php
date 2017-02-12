<?php 
	require '../dbconnect.php';

	for($i = 1; $i < 31; $i++){
		echo	$_POST['A'.$i];
	}
?>