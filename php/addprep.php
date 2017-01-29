<?php 
	require '../dbconnect.php';

	if(!empty($_POST)){
		$id = $_POST['prepid'];
		$bagserialno = $_POST['bagserialno'];
		$bagtype = $_POST['bagtype'];
		$status = 'For Testing';
		$bloodinfo = $_POST['bloodinfo'];

		$pdo = Database::connect();
		if($bagtype == 'Apheresis Platelet'){
			$component5 = $_POST['component5'];
			$quality = 'Good Quality';

			$q1 = $pdo->prepare("INSERT INTO inventory(unitserialno, component, status, bloodinfo, amount, quality) VALUES(?,?,?,?,?,?)");
			$q1->execute(array($bagserialno, 'Apheresis Platelet', $status, $bloodinfo, $component5, $quality));

			$q2 = $pdo->prepare("UPDATE componentsprep SET remarks = 'Done' WHERE prepid = '$id'");
			$q2->execute();
		}elseif($bagtype == '450cc Triple'){
			$component1 = $_POST['component1'];
			$component2 = $_POST['component2'];
			$component3 = $_POST['component3'];
			$quality1 = '';
			$quality2 = '';
			$quality3 = '';

			if($component1 >= '250' && $component1 <= '300' ){
				$quality1 = 'Good Quality';
			}else{
				$quality1 = 'Poor Quality';
			}

			if($component2 >= '225' && $component2 <= '250' ){
				$quality2 = 'Good Quality';
			}else{
				$quality2 = 'Poor Quality';
			}

			if($component3 >= '40'){
				$quality3 = 'Good Quality';
			}else{
				$quality3 = 'Poor Quality';
			}

			$q1 = $pdo->prepare("INSERT INTO inventory(unitserialno, component, status, bloodinfo, amount, quality) VALUES(?, ?, ?, ?, ?, ?)");
			$q1->execute(array($bagserialno, 'Packed Red Blood Cell', $status, $bloodinfo, $component1, $quality1));

			$q2 = $pdo->prepare("INSERT INTO inventory(unitserialno, component, status, bloodinfo, amount, quality) VALUES(?, ?, ?, ?, ?, ?)");
			$q2->execute(array($bagserialno, 'Fresh Frozen Plasma', $status, $bloodinfo, $component2, $quality2));

			$q3 = $pdo->prepare("INSERT INTO inventory(unitserialno, component, status, bloodinfo, amount, quality) VALUES(?, ?, ?, ?, ?, ?)");
			$q3->execute(array($bagserialno, 'Platelet Concentrate', $status, $bloodinfo, $component3, $quality3));

			$q4 = $pdo->prepare("UPDATE componentsprep SET remarks = 'Done' WHERE prepid = '$id'");
			$q4->execute();
		}elseif($bagtype == '450cc Quadruple'){
			$component1 = $_POST['component1'];
			$component2 = $_POST['component2'];
			$component3 = $_POST['component3'];
			$component4 = $_POST['component4'];

			if($component1 >= '250' && $component1 <= '300' ){
				$quality1 = 'Good Quality';
			}else{
				$quality1 = 'Poor Quality';
			}

			if($component2 >= '225' && $component2 <= '250' ){
				$quality2 = 'Good Quality';
			}else{
				$quality2 = 'Poor Quality';
			}

			if($component3 >= '40'){
				$quality3 = 'Good Quality';
			}else{
				$quality3 = 'Poor Quality';
			}

			if($component4 >= '10' && $component4 <= '20'){
				$quality4 = 'Good Quality';
			}else{
				$quality4 = 'Poor Quality';
			}


			$q1 = $pdo->prepare("INSERT INTO inventory(unitserialno, component, status, bloodinfo, amount, quality) VALUES(?, ?, ?, ?, ?, ?)");
			$q1->execute(array($bagserialno, 'Packed Red Blood Cell', $status, $bloodinfo, $component1, $quality1));

			$q2 = $pdo->prepare("INSERT INTO inventory(unitserialno, component, status, bloodinfo, amount, quality) VALUES(?, ?, ?, ?, ?, ?)");
			$q2->execute(array($bagserialno, 'Fresh Frozen Plasma', $status, $bloodinfo, $component2, $quality2));

			$q3 = $pdo->prepare("INSERT INTO inventory(unitserialno, component, status, bloodinfo, amount, quality) VALUES(?, ?, ?, ?, ?, ?)");
			$q3->execute(array($bagserialno, 'Platelet Concentrate', $status, $bloodinfo, $component3, $quality3));

			$q4 = $pdo->prepare("INSERT INTO inventory(unitserialno, component, status, bloodinfo, amount, quality) VALUES(?, ?, ?, ?, ?, ?)");
			$q4->execute(array($bagserialno, 'Cryoprecipitate', $status, $bloodinfo, $component4, $quality4));

			$q5 = $pdo->prepare("UPDATE componentsprep SET remarks = 'Done' WHERE prepid = '$id'");
			$q5->execute();
		}
	}

	header("Location: ../components_prep.php");
?>