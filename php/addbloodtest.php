<?php 
require '../dbconnect.php';

		if (!empty($_POST)) {
			
			//variables
			$testnumber = $_POST['testnumber'];
			$bloodbagserialnumber = $_POST['bloodbagserialnumber'];
			$testtype = $_POST['testtype'];
			$result = $_POST['result'];
			

			//validate
		
				$pdo = Database::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql = "INSERT INTO bloodtest (testnumber, bloodbagserialnumber, testtype, result) values(?, ?, ?, ?)";
				$q = $pdo->prepare($sql);
				$q->execute(array($testnumber, $bloodbagserialnumber, $testtype, $result));
				Database::disconnect();
				header("Location: ../viewtest.php");
			}
		 ?>