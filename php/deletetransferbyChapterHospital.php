<?php
    require '../dbconnect.php';
    $id = $_POST['id'];
	
    if ( !empty($id)) {
		$pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM transfer WHERE rtid LIKE ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        Database::disconnect();
        header("Location: ../viewtransfer_byChapter.php");
    }
    
?>
