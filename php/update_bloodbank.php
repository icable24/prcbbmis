<?php 
	require('../dbconnect.php');

	$id = $_POST['bankid'];
    if ( !empty($id)) {
                
		$bankaddress = $_POST['bankaddress'];
		$contactdetails = $_POST['contactdetails'];
		
		
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE bloodbank SET bankaddress = ?, contactdetails = ? WHERE bankid = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($bankaddress, $contactdetails, $id));
        Database::disconnect();
        header("Location: ../viewbloodbank.php?id=$id");	
		
    }
?>