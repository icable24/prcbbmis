<?php 
require '../dbconnect.php';

if(!empty($_POST)){

	//variables
	$donorcollectid = $_POST['donorcollectid'];
	$cfname = $_POST['cfname'];
	$cmname = $_POST['cmname'];
	$clname = $_POST['clname'];
	$unitserialno = $_POST['unitserialno'];
	$collectiondate = $_POST['collectiondate'];
	$bagtype = $_POST['bagtype'];
	$bloodtype = $_POST['bloodtype'];
	$rhtype = $_POST['rhtype'];

	//validate
	$valid = true;

	//store
	if ($valid) {
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "INSERT INTO collection(donorcollectid, cfname, cmname, clname, unitserialno, collectiondate, bagtype, bloodtype, rhtype)values (?, ?, ?, ?, ?, ?, ?, ?, ?)";
		$q = $pdo->prepare($sql);
		$q->execute(array($donorcollectid, $cfname, $cmname, $clname, $unitserialno, $collectiondate, $bagtype, $bloodtype, $rhtype));
		Database::disconnect();
		header("Location: ../viewcollection.php");
	}

	} ?>