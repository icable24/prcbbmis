<?php
	require '../dbconnect.php';

	
        if(!empty($_POST)){

		//variables
                $bloodtype = $_POST['bloodcomponent'];
                $bcqty = $_POST['bcqty'];
		
	
                $pdo = Database::connect();
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "INSERT INTO tmpbloodcomponent (bloodcomponent, bcqty) values(?, ?)";
                $q = $pdo->prepare($sql);     
                $q->execute(array($bloodtype, $bcqty));
                header("Location: ../requisition_form_byChapters.php");
                
     }
	
?>