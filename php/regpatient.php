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
		$bloodgroup = $_POST['bloodgroup'];
		$rhtype = $_POST['rhtype'];
		
		//validate
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$sql2 = "SELECT * FROM bloodinformation WHERE bloodgroup = ? AND rhtype = ?";
		$q2 = $pdo->prepare($sql2);
		$q2->execute(array($bloodgroup, $rhtype));
		$bloodinfo = $q2->fetch(PDO::FETCH_ASSOC);

		$sql = "INSERT INTO patient (pfname, pmname, plname, paddress, pbirthdate, pgender, pcontact, pregdate, bloodinfo) values(?, ?, ?, ?, ?, ?, ?, ?, ?)";
		$q = $pdo->prepare($sql);
        $q->execute(array($pfname, $pmname, $plname, $paddress, $pbirthdate, $pgender, $pcontact, $pregdate, $bloodinfo['bloodid']));
        Database::disconnect();
        header("Location: ../viewpatient.php");
	}
?>