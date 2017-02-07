<?php 
	require('../dbconnect.php');

	$id = $_POST['userid'];
        if ( !empty($id)) {
        
        $usertype = $_POST['usertype'];
		
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE user SET usertype = ? WHERE userid = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($usertype, $id));
        header("Location: ../viewuser.php?id=$id");	
		
    }
?>