<?php 
	require('../dbconnect.php');

	$id = $_POST['actid'];
        if ( !empty($id)) {
        $actname = $_POST['actname'];
        $detail = $_POST['detail'];
        $place = $_POST['place'];
        $date = $_POST['date'];
        
		
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE activityschedule SET actname = ?, detail = ?, place = ?, date = ? WHERE actid = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($actname, $detail, $place, $date, $id));
        Database::disconnect();
        header("Location: ../viewactivityscheduling.php?id=$id");	
		
    }	
?>