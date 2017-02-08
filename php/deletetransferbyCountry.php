<?php
    require '../dbconnect.php';
    $id = $_POST['id'];
	
    if ( !empty($id)) {
		$pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM byCountry WHERE cid LIKE ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        Database::disconnect();
        header("Location: ../viewtransfer.php");
    }
    
?>
