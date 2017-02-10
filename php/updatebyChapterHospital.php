<?php 
	require('../dbconnect.php');

	$id = $_POST['rtid'];
        if ( !empty($id)) {
        
        $remarks = $_POST['remarks'];
		
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE transfer SET remarks = ? WHERE rtid = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($remarks, $id));
        header("Location: ../viewtransfer_byChapter.php?id=$id");	
		
    }
?>