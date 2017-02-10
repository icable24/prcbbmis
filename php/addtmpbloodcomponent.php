<?php
	require '../dbconnect.php';

	
        if(!empty($_POST)){

		//variables
                $bloodcomponent = $_POST['bloodcomponent'];
                $bcqty = $_POST['bcqty'];
               // $rtid = $_POST['rtid'];
		
	
                $pdo = Database::connect();
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "INSERT INTO tmpbloodcomponent (bloodcomponent, bcqty) values(?, ?)";
                $q = $pdo->prepare($sql);     
                $q->execute(array($bloodcomponent, $bcqty));
                header("Location: ../requisition_form_byChapters.php");
                
     }
	
?>