<?php 
	require('../dbconnect.php');

	$id = $_POST['did'];
    if ( !empty($id)) {
                $bankname = $_POST['bankname'];
		$bankaddress = $_POST['bankaddress'];
		$contactdetails = $_POST['contactdetails'];
		$country = $_POST['country'];
		
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE bloodbank SET bankname = ?, bankaddress = ?, contactdetails = ?, country = ? WHERE bankid = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($bankname, $bankaddress, $contactdetails, $country, $id));
        Database::disconnect();
        header("Location: ../viewbloodbank.php?id=$id");	
		
    }
?>