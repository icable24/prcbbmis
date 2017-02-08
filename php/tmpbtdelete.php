<?php
    require '../dbconnect.php';
    $id = $_POST['id'];
	
    if ( !empty($id)) {
		$pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM tmpbloodtype WHERE btid LIKE ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        Database::disconnect();
        header("Location: ../requisition_form_byChapters.php");
    }else{
		header("Location: ../requisition_form_byChapters.php");
	}
    
?>
