<?php
	require '../dbconnect.php';

	
        if(!empty($_POST)){

		//variables
                $bloodtype = $_POST['bloodtype'];
                $rhtype = $_POST['rhtype'];
                $btqty = $_POST['btqty'];
		
	
                $pdo = Database::connect();
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "INSERT INTO tmpbloodtype (bloodtype, rhtype, btqty) values(?, ?, ?)";
                $q = $pdo->prepare($sql);     
                $q->execute(array($bloodtype, $rhtype, $btqty));
                header("Location: ../requisition_form_byChapters1.php");
                
     }
	
?>