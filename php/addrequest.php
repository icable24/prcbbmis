<?php 

		require '../dbconnect.php';

		if (!empty($_POST)) {
			
			//variables
			
			$name = $_POST['name'];
			$bloodtype = $_POST['bloodtype'];
			$requestno = $_POST['requestno'];
			$hospital = $_POST['hospital'];
			$component = $_POST['component'];
			$transfusion = $_POST['transfusion'];
			$quantity = $_POST['quantity'];
			$diagnosis = $_POST['diagnosis'];
			//validate
			$valid = true;

			//storing
			if ($valid) {
				$pdo = Database::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql = "INSERT INTO bloodrequest (name, bloodtype, requestno, hospital, component, transfusion, quantity, diagnosis) values(?, ?, ?, ?, ?, ?, ?, ?)";
				$q = $pdo->prepare($sql);
				$q->execute(array($name, $bloodtype, $requestno, $hospital, $component, $transfusion, $diagnosis, $quantity));
				Database::disconnect();
				header("Location: ../viewrequest.php");
			}
		}





 ?>