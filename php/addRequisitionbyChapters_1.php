<?php
	require '../dbconnect.php';

	if(!empty($_POST)){
		$requester = $_POST['requester'];
		
		$dateneeded = $_POST['dateneeded'];
		$bankname = $_POST['bankname'];
		$bankaddress = $_POST['bankaddress'];
		$contactdetails = $_POST['contactdetails'];
		$reason = $_POST['reason'];
		/*
                $bloodtype = $_POST['bloodtype'];
		$rhtype = $_POST['rhtype'];
		$btqty = $_POST['btqty'];
		$bloodcomponent = $_POST['bloodcomponent'];
		$bcqty = $_POST['bcqty'];
                */
		$pdo = Database::connect();
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql4 = "SELECT * FROM tmpbloodtype WHERE bloodtype = ?";
		$q4 = $pdo->prepare($sql4);
		$q4->execute(array($bloodtype));
                
                
		$pdo = Database::connect();
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql4 = "SELECT * FROM tmpbloodcomponent WHERE bloodcomponent = ?";
		$q4 = $pdo->prepare($sql4);
		$q4->execute(array($bloodcomponent));
                
                
                
		$pdo = Database::connect();
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "INSERT INTO transfer (requester, dateneeded, bankname, bankaddress, contactdetails, reason) values(?, ?, ?, ?, ?, ?)";
                $q = $pdo->prepare($sql);     
                $q->execute(array($requester, $dateneeded, $bankname, $bankaddress, $contactdetails, $reason));
                Database::disconnect();
                header("Location: ../viewtransfer_byChapter_1.php");
	}
?>