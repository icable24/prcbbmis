<?php
	require '../dbconnect.php';

	if(!empty($_POST)){
		$requester = $_POST['requester'];
		$bloodcomponent = $_POST['bloodcomponent'];
                $qty = $_POST['qty'];
		$dateneeded = $_POST['dateneeded'];
		$bankname = $_POST['bankname'];
		$bankaddress = $_POST['bankaddress'];
		$contactdetails = $_POST['contactdetails'];
		$reason = $_POST['reason'];
		

                
                $pdo = Database::connect();
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "INSERT INTO byCountry (requester, bloodcomponent, qty, dateneeded, bankname, bankaddress, contactdetails, reason) values(?, ?, ?, ?, ?, ?, ?, ?)";
                $q = $pdo->prepare($sql);     
                $q->execute(array($requester, $bloodcomponent, $qty, $dateneeded, $bankname, $bankaddress, $contactdetails, $reason));
                Database::disconnect();
                header("Location: ../viewtransfer.php");
                
        }
?>