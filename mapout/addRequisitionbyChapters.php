<?php
	require '../dbconnect.php';

	if(!empty($_POST)){
                
		$requester = $_POST['requester'];
		$positiveA = $_POST['positiveA'];
                $negativeA = $_POST['negativeA'];
                $positiveB = $_POST['positiveB'];
                $negativeB = $_POST['negativeB'];
                $positiveO = $_POST['positiveO'];
                $negativeO = $_POST['negativeO'];
                $positiveAB = $_POST['positiveAB'];
		$negativeAB = $_POST['negativeAB'];
                $ffpqty = $_POST['ffpqty'];
                $pcqty = $_POST['pcqty'];
                $wbqty = $_POST['wbqty'];
                $cqty = $_POST['cqty'];
                $dateneeded = $_POST['dateneeded'];
		$bankname = $_POST['bankname'];
		$bankaddress = $_POST['bankaddress'];
		$contactdetails = $_POST['contactdetails'];
		$reason = $_POST['reason'];
		
          
                
		$pdo = Database::connect();
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "INSERT INTO transfer (requester, positiveA, negativeA, positiveB, negativeB, positiveO, negativeO, positiveAB, negativeAB, ffpqty, pcqty, wbqty, cqty ,dateneeded, bankname, bankaddress, contactdetails, reason) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                $q = $pdo->prepare($sql);     
                $q->execute(array($requester,$positiveA, $negativeA, $positiveB, $negativeB, $positiveO, $negativeO, $positiveAB, $negativeAB, $ffpqty, $pcqty, $wbqty, $cqty, $dateneeded, $bankname, $bankaddress, $contactdetails, $reason));
                Database::disconnect();
                header("Location: ../index.php");
	}
?>