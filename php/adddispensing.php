<?php 

	require '../dbconnect.php';

	if(!empty($_POST)){

		//variables
		$bloodbagserialno = $_POST['bloodbagserialno'];
		$dispensingdate = $_POST['dispensingdate'];
		$requestid = $_POST['requestid'];
		$patient = $_POST['patient'];
		$bloodtype = $_POST['bloodtype'];
		$rname = $_POST['rname'];
		$rcontact = $_POST['rcontact'];

		//validate
		$valid = true;

		//storing
		if($valid){
			$pdo = database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO dispensing(bloodbagserialno, dispensingdate, requestid, patient, bloodtype, rname, rcontact) values(?, ?, ?, ?, ?, ?, ?)";
			$q = $pdo->prepare($sql);
			$q->execute(array($bloodbagserialno, $dispensingdate, $requestid, $patient, $bloodtype, $rname, $rcontact));
			Database::disconnect();
			header("Location: ../viewdispensing.php");
		}
	
	}
?>