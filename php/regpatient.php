<?php
	require '../dbconnect.php';

	if(!empty($_POST)){

		//variables
		$pfname = $_POST['pfname'];
                $pmname = $_POST['pmname'];
                $plname = $_POST['plname'];
		$paddress = $_POST['paddress'];
		$pbirthdate = $_POST['pbirthdate'];
		$pgender = $_POST['pgender'];
		$pcontact = $_POST['pcontact'];
		$pregdate = date('m-d-Y');
	
		
		//validate
		$valid = true;

		//storing
		if($valid){
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO patient (pfname, pmname, plname, paddress, pbirthdate, pgender, pcontact, pregdate) values(?, ?, ?, ?, ?, ?, ?, ?)";
			$q = $pdo->prepare($sql);
            $q->execute(array($pfname, $pmname, $plname, $paddress, $pbirthdate, $pgender, $pcontact, $pregdate));
            Database::disconnect();
            header("Location: ../viewpatient.php");
		}
	}
?>