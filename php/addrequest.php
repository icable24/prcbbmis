<?php 

		require '../dbconnect.php';

		if (!empty($_POST)) {
			
			//variables
			$pid = $_POST['pid'];
			$bloodgroup = $_POST['bloodgroup'];
			$rhtype = $_POST['rhtype'];
			$component = $_POST['component'];
			$amount = $_POST['amount'];
			$quantity = $_POST['quantity'];
			$status  = 'Pending';

			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$sql4 = "SELECT * FROM bloodinformation WHERE bloodgroup = ? AND rhtype = ?";
			$q4 = $pdo->prepare($sql4);
			$q4->execute(array($bloodgroup, $rhtype));
			$bloodinfo = $q4->fetch(PDO::FETCH_ASSOC);

			$sql = "INSERT INTO bloodrequest (pid, bloodid, component, amount, quantity, status) values(?, ?, ?, ?, ?, ?)";
			$q = $pdo->prepare($sql);
			$q->execute(array($pid, $bloodinfo['bloodid'], $component, $amount, $quantity, $status));
			Database::disconnect();
			header("Location: ../viewrequest.php");
			
		}else{
			header("Location: ../viewrequest.php");
		}
		
 ?>