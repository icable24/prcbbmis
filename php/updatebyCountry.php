<?php 
	require('../dbconnect.php');

	$id = $_POST['cid'];
        if ( !empty($id)) {
        
        $remarks = $_POST['remarks'];
		
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE bycountry SET remarks = ? WHERE cid = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($remarks, $id));
        header("Location: ../viewtransfer.php?id=$id");	
		
    }
?>