<?php 
	require 'dbconnect.php';

		$id = $_REQUEST['id'];
		$pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM Examination where examid = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data3 = $q->fetch(PDO::FETCH_ASSOC);
        Database::disconnect();
?>
<div class="col-lg-3">
	<div class="list-group side_bar">
		<a href="viewdonor.php?id=<?php echo $_GET['id'] ?>" class="list-group-item bg"><span aria-hidden="true"></span>&nbsp;&nbsp; Donor's Profile</a>
		<a href="viewexamination.php?id=<?php echo $_GET['id']?>" class="list-group-item bg <?php if($data3['remarks'] == 'Pending'){
				echo ' red';
			}?>"><span aria-hidden="true"></span>&nbsp;&nbsp;Examination</a>
		<a href="viewscreening.php?id=<?php echo $_GET['id'] ?>" class="list-group-item bg"><span aria-hidden="true"></span>&nbsp;&nbsp; Screening</a>
		<a href="donationlist.php?id=<?php echo $_GET['id'] ?>" class="list-group-item bg"><span aria-hidden="true"></span>&nbsp;&nbsp; Donation List</a>
		<!-- <a href="medicalhistory.php?id=<?php echo $_GET['id'] ?>" class="list-group-item bg"><span aria-hidden="true"></span>&nbsp;&nbsp; Medical History</a> -->
	</div>
</div>