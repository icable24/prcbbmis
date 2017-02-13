<?php
	require '../dbconnect.php';

	if(!empty($_POST)){
		$requester = $_POST['requester'];
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
                $sql = "INSERT INTO bycountry (requester, ffpqty, pcqty, wbqty, cqty, dateneeded, bankname, bankaddress, contactdetails, reason) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                $q = $pdo->prepare($sql);     
                $q->execute(array($requester, $ffpqty, $pcqty, $wbqty, $cqty, $dateneeded, $bankname, $bankaddress, $contactdetails, $reason));
                Database::disconnect();
                header("Location: ../index.php");
                
        }
?>