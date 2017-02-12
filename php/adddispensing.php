<?php 

	require '../dbconnect.php';

	if(!empty($_POST)){
		$pdo = Database::connect();
		$quantity = $_POST['qty'];
		$reqid = $_POST['reqid'];
		$rname = $_POST['rname'];
		$dispensingdate = $_POST['dispensingdate'];
		$raddress = $_POST['raddress'];
		$rcontact = $_POST['rcontact'];

		$sql = $pdo->prepare("INSERT INTO dispensing(rname, raddress, rcontact, reqid, dispensingdate) VALUES(?,?,?,?,?)");
		$sql->execute(array($rname, $raddress, $rcontact, $reqid, $dispensingdate));

		$dispid = $pdo->lastInsertId();

		for($i = 0; $i < $quantity; $i++){
			$bloodinfo[$i] = $_POST['bagserialno'.$i];
			$bloodbag = $pdo->prepare("UPDATE inventory SET status = 'Served', dispid = ?  WHERE unitserialno = ?");
			$bloodbag->execute(array($dispid, $bloodinfo[$i]));
		}

		$sql2 = $pdo->prepare("UPDATE bloodrequest SET status = 'Served' WHERE reqid = ? ");
		$sql2->execute(array($reqid));
		header("Location: ../viewdispensing.php");
	}
		header("Location: ../viewdispensing.php");
?>