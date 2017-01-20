<?php 
	require('../dbconnect.php');

	$id = $_POST['did'];
    if ( !empty($id)) {
        $dfname = $_POST['dfname'];
        $dmname = $_POST['dmname'];
        $dlname = $_POST['dlname'];
        $daddress = $_POST['daddress'];
        $dbirthdate = $_POST['dbirthdate'];
        $dgender = $_POST['dgender'];
        $dreligion = $_POST['dreligion'];
        $dcontact = $_POST['dcontact'];
        $dtype = $_POST['dtype'];
        $dnationality = $_POST['dnationality'];
        $demail = $_POST['demail']; 
		
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE donor  SET dfname = ?, dmname = ?, dlname = ?, daddress = ?, dbirthdate = ?, dgender = ?, dreligion = ?, dcontact = ?, dtype = ? , dnationality = ?, demail = ? WHERE did = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($dfname, $dmname, $dlname, $daddress, $dbirthdate, $dgender, $dreligion, $dcontact, $dtype, $dnationality, $demail, $id));
        Database::disconnect();
        header("Location: ../viewdonor.php?id=$id");	
		
    }else {
        header("Location: ../donorlist.php");
    }	
?>