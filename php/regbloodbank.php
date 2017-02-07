<?php
	require '../dbconnect.php';

	if(!empty($_POST)){

		//variables
		$bankname = $_POST['bankname'];
		$bankaddress = $_POST['bankaddress'];
		$contactdetails = $_POST['contactdetails'];
		$country = $_POST['country'];
                $bankcateg = $_POST['bankcateg'];
                
		
	
		
		//validate
		$valid = true;

		//storing
		if($valid){
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO bloodbank (bankname, bankaddress, contactdetails, country, bankcateg) values(?, ?, ?, ?, ?)";
			$q = $pdo->prepare($sql);
            $q->execute(array($bankname, $bankaddress, $contactdetails, $country, $bankcateg));
            Database::disconnect();
            header("Location: ../viewbloodbank.php");
		}
	}
?>