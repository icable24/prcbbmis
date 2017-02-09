<?php
	require '../dbconnect.php';

	
        if(!empty($_POST)){

		//variables
                $bloodcomponent = $_POST['bloodcomponent'];
                $bcqty = $_POST['bcqty'];
		
	
                $pdo = Database::connect();
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "INSERT INTO tmpbloodcomponent (bloodtype, btqty) values(?, ?)";
                $q = $pdo->prepare($sql);     
                $q->execute(array($bloodtype, $btqty));
                header("Location: ../requisition_form_byChapters1.php");
                
     }
	
?>