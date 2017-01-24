<?php 
	include('../login_success.php');
?>	
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
		$remarks = $_POST['remarks'];
		$reason = $_POST['reason'];


		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "UPDATE screening SET weight = ?, spgravity = ?, hemgb = ?, hemtcrt = ?, rbc = ?, wbc = ?, pltcount = ?, screendate = ?, remarks = ?, reason = ? WHERE scrid = ?";
		$q = $pdo->prepare($sql);
        $q->execute(array($weight, $spgravity, $hemgb, $hemtcrt, $rbc, $wbc, $pltcount, $screendate, $remarks, $reason, $scrid));
        Database::disconnect();
        header("Location: ../viewscreening.php?id=$scrid");
    }


?>