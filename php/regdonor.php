<?php
	require '../dbconnect.php';

	if(!empty($_POST)){

		//variables
		date_default_timezone_set("Asia/Taipei");

		$dfname = $_POST['dfname'];
		$dmname = $_POST['dmname'];
		$dlname = $_POST['dlname'];
		$daddress = $_POST['daddress'];
		$dbirthdate = $_POST['dbirthdate'];
		$dgender = $_POST['dgender'];
		$dreligion = $_POST['dreligion'];
		$dcontact = $_POST['dcontact'];
		$dtype = $_POST['dtype'];
		$dnationality = $_POST['dnationality'];
		$demail = $_POST['demail'];	
		$dregdate = date("m-d-Y");	
		$dremarks = 'Pending';
		
		//validate
		$valid = true;

		//storing
		if($valid){
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql1 = "INSERT INTO donor (dfname, dmname, dlname, daddress, dbirthdate, dgender, dreligion, dcontact, dtype, dnationality, demail, dregdate, dremarks) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
			$q1 = $pdo->prepare($sql1);
            $q1->execute(array($dfname, $dmname, $dlname, $daddress, $dbirthdate, $dgender, $dreligion, $dcontact, $dtype, $dnationality, $demail, $dregdate, $dremarks));

            $did = $pdo->lastInsertId();

            $sql2 = "INSERT INTO examination (examid, remarks) values (?, ?)";
            $q2 = $pdo->prepare($sql2);
            $q2->execute(array($did, $dremarks));
            $sql3 = "INSERT INTO screening (scrid, remarks) values (?, ?)";
            $q3 = $pdo->prepare($sql3);
            $q3->execute(array($did, $dremarks));
            Database::disconnect();
            header("Location: ../viewdonor.php?id=$did");
		}
	}
?>