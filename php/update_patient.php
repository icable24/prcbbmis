<?php 
	require('../dbconnect.php');

	$id = $_POST['pid'];
        if(!empty($id)){

		//variables
		$pfname = $_POST['pfname'];
                $pmname = $_POST['pmname'];
                $plname = $_POST['plname'];
		$paddress = $_POST['paddress'];
		$pbirthdate = $_POST['pbirthdate'];
		$pgender = $_POST['pgender'];
		$pcontact = $_POST['pcontact'];
		$pregdate = date('m-d-Y');
		
		
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE patient SET pfname = ?, pmname = ?, plname = ?, paddress = ?, pbirthdate = ?, pgender =?, pcontact =?, pregdate = ? WHERE pid = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($pfname, $pmname, $plname, $paddress, $pbirthdate, $pgender, $pcontact, $pregdate, $id));
        Database::disconnect();
        header("Location: ../viewpatient.php?id=$id");	
		
    }
?>