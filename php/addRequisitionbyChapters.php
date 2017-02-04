<?php
	require '../dbconnect.php';

	if(!empty($_POST)){
		$name = $_POST['requester'];
		$bloodtype = $_POST['bloodtype'];
		$rh = $_POST['rh'];
		$btqty = $_POST['btqty'];
		$bloodcomponent = $_POST['bloodcomponent'];
		$bcqty = $_POST['bcqty'];
		$dateneeded = $_POST['dateneeded'];
		$bankname = $_POST['bankname'];
		$bankaddress = $_POST['bankaddress'];
		$contactdetails = $_POST['contactdetails'];
		$reason = $_POST['reason'];
		$remarks = $_POST['remarks'];

		$pdo = Database::connect();
		$query = $pdo->prepare('INSERT INTO transfer(requester, bloodtype, rh, btqty, bloodcomponent, bcqty, dateneeded, bankname, bankaddress, contactdetails, reason, remarks) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
		$query->execute(array($name, $bloodtype, $rh, $btqty, $bloodcomponent, $bcqty, $dateneeded, $bankname, $bankaddress, $contactdetails, $reason, $remarks));
		Database::disconnect();
	}else{
		header("Location: ../donorlist");
	}
?>