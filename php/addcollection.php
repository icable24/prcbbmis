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
		$status = 'Pending';

		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$aa = $pdo->prepare('SELECT * FROM bloodinformation WHERE bloodgroup = ? AND rhtype = ?');
		$aa->execute(array($bloodtype, $rhtype));
		$bloodinfo = $aa->fetch(PDO::FETCH_ASSOC);

		$sql = "INSERT INTO collection(donorcollectid, cfname, cmname, clname, unitserialno, collectiondate, bagtype, bloodinfo) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
		$q = $pdo->prepare($sql);
		$q->execute(array($donorcollectid, $cfname, $cmname, $clname, $unitserialno, $collectiondate, $bagtype, $bloodinfo['bloodid']));
		$collid = $pdo->lastInsertId();

		$sql2 = "INSERT INTO bloodbag (unitserialno, bagtype, bloodinfo) VALUES(?,?,?)";
		$q2 = $pdo->prepare($sql2);
		$q2->execute(array($unitserialno, $bagtype, $bloodinfo['bloodid']));

		
		$q3 = $pdo->prepare("INSERT INTO componentsprep(collid, bagserialno, remarks) VALUES (?, ?, ?)");
		$q3->execute(array($collid, $unitserialno, $status));
		Database::disconnect();
		header("Location: ../viewcollection.php");
	} 
?>