<?php 
	require '../dbconnect.php';

	$bagserialno = $_POST['bagserialno'];

	$hepab1 = $_POST['hepab1'];
	$syphillis1 = $_POST['syphillis1'];
	$hepac1 = $_POST['hepac1'];
	$hiv1 = $_POST['hiv1'];
	$malaria1 = $_POST['malaria1'];
	$remarks11 = $_POST['remarks11'];
	$remarks12 = $_POST['remarks12'];
	$remarks13 = $_POST['remarks13'];
	$remarks14 = $_POST['remarks14'];
	$remarks15 = $_POST['remarks15'];

	$hepab2 = $_POST['hepab2'];
	$syphillis2 = $_POST['syphillis2'];
	$hepac2 = $_POST['hepac2'];
	$hiv2 = $_POST['hiv2'];
	$malaria2 = $_POST['malaria2'];
	$remarks21 = $_POST['remarks21'];
	$remarks22 = $_POST['remarks22'];
	$remarks23 = $_POST['remarks23'];
	$remarks24 = $_POST['remarks24'];
	$remarks25 = $_POST['remarks25'];

	$hepab3 = $_POST['hepab3'];
	$syphillis3 = $_POST['syphillis3'];
	$hepac3 = $_POST['hepac3'];
	$hiv3 = $_POST['hiv3'];
	$malaria3 = $_POST['malaria3'];
	$remarks31 = $_POST['remarks31'];
	$remarks32 = $_POST['remarks32'];
	$remarks33 = $_POST['remarks33'];
	$remarks34 = $_POST['remarks34'];
	$remarks35 = $_POST['remarks35'];

	$r1 = 0;
	$r2 = 0;
	$r3 = 0;
	$r4 = 0;
	$r5 = 0;



	if($bagserialno != null){
		$pdo = Database::connect();

		$sql1 = "INSERT INTO bloodtest(bagserialno, hepab, syphillis, hepac, hiv, malaria, remarks1, remarks2, remarks3, remarks4, remarks5) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
		$test1 = $pdo->prepare($sql1);
		$test1->execute(array($bagserialno, $hepab1, $syphillis1, $hepac1, $hiv1, $malaria1, $remarks11, $remarks12, $remarks13, $remarks14, $remarks15));

		$sql2 = "INSERT INTO bloodtest(bagserialno, hepab, syphillis, hepac, hiv, malaria, remarks1, remarks2, remarks3, remarks4, remarks5) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
		$test2 = $pdo->prepare($sql2);
		$test2->execute(array($bagserialno, $hepab2, $syphillis2, $hepac2, $hiv2, $malaria2, $remarks21, $remarks22, $remarks23, $remarks24, $remarks25));

		$sql3 = "INSERT INTO bloodtest(bagserialno, hepab, syphillis, hepac, hiv, malaria, remarks1, remarks2, remarks3, remarks4, remarks5) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
		$test3 = $pdo->prepare($sql3);
		$test3->execute(array($bagserialno, $hepab3, $syphillis3, $hepac3, $hiv3, $malaria3, $remarks31, $remarks32, $remarks33, $remarks34, $remarks35));
		

		$sql4 = "SELECT * FROM bloodtest WHERE bagserialno = '$bagserialno'";
		$q4 = $pdo->prepare($sql4);
		$q4->execute();
		$q4 = $q4->fetchAll(PDO::FETCH_ASSOC);

		foreach($q4 as $row){
			if($row['remarks1'] == 'Positive'){
				$r1++;
			}

			if($row['remarks2'] == 'Positive'){
				$r2++;
			}

			if($row['remarks3'] == 'Positive'){
				$r3++;
			}

			if($row['remarks4'] == 'Positive'){
				$r4++;
			}

			if($row['remarks5'] == 'Positive'){
				$r5++;
			}
		}

		if($r1 < 2 && $r2 < 2 && $r3 < 2 && $r4 < 2 && $r5 < 2){
			$query = $pdo->prepare("UPDATE bloodbag SET status = 'Inventory' WHERE unitserialno = ?");
			$query->execute(array($bagserialno));
		}elseif($r1 >= 2){
			$query = $pdo->prepare("UPDATE bloodbag SET status = 'Hepatitis B Positive' WHERE unitserialno = ?");
			$query->execute(array($bagserialno));
		}elseif($r2 >= 2){
			$query = $pdo->prepare("UPDATE bloodbag SET status = 'Syphillis Positive' WHERE unitserialno = ?");
			$query->execute(array($bagserialno));
		}elseif($r3 >= 2){
			$query = $pdo->prepare("UPDATE bloodbag SET status = 'Hepatitis C Positive' WHERE unitserialno = ?");
			$query->execute(array($bagserialno));
		}elseif($r4 >= 2){
			$query = $pdo->prepare("UPDATE bloodbag SET status = 'HIV Positive' WHERE unitserialno = ?");
			$query->execute(array($bagserialno));
		}elseif($r5 >= 2){
			$query = $pdo->prepare("UPDATE bloodbag SET status = 'Malaria Positive' WHERE unitserialno = ?");
			$query->execute(array($bagserialno));
		}
		header("Location: ../viewtest.php");
	}else{
		header("Location: ../viewtest.php");
	}
	
?> 	