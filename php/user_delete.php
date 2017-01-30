<?php
    require '../dbconnect.php';
    $id = $_POST['id'];
	
    if ( !empty($id)) {
		$pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM user WHERE userid LIKE ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        Database::disconnect();
        header("Location: ../viewuser.php");
    }else{
		header("Location: ../viewuser.php");
	}
    
?>
