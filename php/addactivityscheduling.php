<?php
	require '../dbconnect.php';

	if(!empty($_POST)){

		//variables
		$actname = $_POST['actname'];
		$detail = $_POST['detail'];
		$place = $_POST['place'];
		$date = $_POST['date'];      
		


		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$checkdate = "SELECT date FROM activityschedule WHERE date ='$date'";
		$result = $pdo->query($checkdate);
		$numberOfRows = $result->rowcount();

		if($numberOfRows > 0){
			header("Location: ../activityschedulingcreate.php?error=date");
		}else{
		$sql = "INSERT INTO activityschedule (actname, detail, place, date) values(?, ?, ?, ?)";
		$q = $pdo->prepare($sql);

                $q->execute(array($actname, $detail, $place, $date));
                Database::disconnect();
                header("Location: ../viewactivityscheduling.php");
	}
}
?>
