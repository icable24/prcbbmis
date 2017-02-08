<?php 	
	include '../dbconnect.php';

	$pid = $_REQUEST['pid'];
	$id = $_REQUEST['id'];
	$pdo = Database::connect();

	if($id == '0'){
		$update = $pdo->prepare("UPDATE bloodrequest SET status = 'Approved' WHERE pid = '$pid'");
		$update->execute();
		header("Location: ../viewrequest.php");
	}else{
		$update = $pdo->prepare("UPDATE bloodrequest SET status = 'Denied' WHERE pid = '$pid'");
		$update->execute();
		header("Location: ../viewrequest.php");	
	}
	header("Location: ../viewrequest.php");
?>