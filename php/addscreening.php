<?php
	require '../dbconnect.php';

	if(!empty($_POST)){

		//variables
		$scrid = $_POST['did'];
		$weight = $_POST['weight'];
		$spgravity = $_POST['spgravity'];
		$hemgb = $_POST['hemgb'];
		$hemtcrt = $_POST['hemtcrt'];
		$rbc = $_POST['rbc'];
		$wbc = $_POST['wbc'];
		$pltcount = $_POST['pltcount'];
		$screendate = date('m-d-Y');


		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "UPDATE screening SET weight = ?, spgravity = ?, hemgb = ?, hemtcrt = ?, rbc = ?, wbc = ?, pltcount = ?, screendate = ? WHERE scrid = ?";
		$q = $pdo->prepare($sql);
        $q->execute(array($weight, $spgravity, $hemgb, $hemtcrt, $rbc, $wbc, $pltcount, $screendate, $scrid));
        Database::disconnect();
        header("Location: ../viewscreening.php?id=$scrid");
    } else{
    	header("location: ../donorlist.php");
    }


?>