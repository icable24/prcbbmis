<?php
    require '../dbconnect.php';
    $id = $_POST['delid'];
	
    if ( !empty($id)) {
		echo $id;
		$pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM donor WHERE did LIKE ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $sql2 = "DELETE FROM examination WHERE examid LIKE ?";
        $q2 = $pdo->prepare($sql2);
        $q2->execute(array($id));
        $sql3 = "DELETE FROM screening WHERE scrid LIKE ?";
        $q3 = $pdo->prepare($sql3);
        $q3->execute(array($id));
        Database::disconnect();
		header("Location: ../viewdonor.php");
    }else{
		header("Location: ../viewdonor.php");
	}
    
?>
