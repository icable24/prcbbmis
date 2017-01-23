<?php
    require '../dbconnect.php';
    $id = $_POST['id'];
	
    if ( !empty($id)) {
		$pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM bloodbank WHERE bankid LIKE ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        Database::disconnect();
        header("Location: ../viewbloodbank.php");
    }else{
		header("Location: ../viewbloodbank.php");
	}
    
?>
