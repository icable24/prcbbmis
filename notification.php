<?php 
	include 'login_success.php';
	require 'dbconnect.php';

    $username = $_SESSION['login_username'];
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM user WHERE username like  '$username'";
    $q = $pdo->prepare($sql);
    $q->execute();
    $user = $q->fetch(PDO::FETCH_ASSOC);
?>
<?php if($user['usertype'] == 'Admin') {?>
<!DOCTYPE html>
<html>
<head>
        <title>Philippine Red Cross Blood Bank Management Information System</title>
</head>
<body>
<?php include 'header.php'; ?>

<div class="container">
	<div class="col-lg-12">
		<div class="container-fluid">
			<?php 	
				function viewByCategory($category){
					if($category == 'Examination'){
			?>

				<div class="table-responsive">
	                <table class="table table-hover table-striped" id="myTable">
						<thead>
							<tr class="alert-info">
								<th>Donor ID</th>
								<th>Name</th>
								<th>Registration Date</th>
								<th>Remarks</th>
								<th class="text-center">Action</th>
							</tr>
						</thead>	
						<tbody>
							<?php 
								$pdo = Database::connect();
								$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
								$sql2 = "SELECT * FROM examination WHERE remarks like 'Pending'";
							    $q2 = $pdo->prepare($sql2);
							    $q2->execute();
							    $pending_exam = $q2->fetchAll(PDO::FETCH_ASSOC);

								foreach ($pending_exam as $row) {
									$sql3 = "SELECT * FROM donor WHERE did = ?";
									$q3 = $pdo->prepare($sql3);
									$q3->execute(array($row['examid']));
									$donor = $q3->fetch(PDO::FETCH_ASSOC);
									echo '<tr>';
										echo '<td>'.$row['examid'] . '</td>';
										echo '<td>'.$donor['dfname']. ' ' . substr($donor['dmname'],0,1) .'. ' . $donor['dlname'].'</td>';
										echo '<td>'.$donor['dregdate'].'</td>';
										echo '<td>'.$donor['dremarks'].'</td>';
										echo '<td class="text-center">
														<a class="btn btn-primary btn-md" href="viewexamination.php?id='.$donor['did'].'" data-toggle="tooltip" title="Update"><span class="glyphicon glyphicon-edit"></span></a>
										  		  </td>';
									echo '</tr>';
								}
							?>
						</tbody>		
					</table>
				</div>
				<?php } elseif($category == 'Screening') { ?>
					<div class="table-responsive">
	                <table class="table table-hover table-striped" id="myTable">
						<thead>
							<tr class="alert-info">
								<th>Donor ID</th>
								<th>Name</th>
								<th>Registration Date</th>
								<th>Remarks</th>
								<th class="text-center">Action</th>
							</tr>
						</thead>	
						<tbody>
							<?php 
								$pdo = Database::connect();
								$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
								$sql2 = "SELECT * FROM screening WHERE remarks like 'Pending'";
							    $q2 = $pdo->prepare($sql2);
							    $q2->execute();
							    $pending_screen = $q2->fetchAll(PDO::FETCH_ASSOC);

								foreach ($pending_screen as $row) {
									$sql3 = "SELECT * FROM donor WHERE did = ?";
									$q3 = $pdo->prepare($sql3);
									$q3->execute(array($row['scrid']));
									$donor = $q3->fetch(PDO::FETCH_ASSOC);
									echo '<tr>';
										echo '<td>'.$row['scrid'] . '</td>';
										echo '<td>'.$donor['dfname']. ' ' . substr($donor['dmname'],0,1) .'. ' . $donor['dlname'].'</td>';
										echo '<td>'.$donor['dregdate'].'</td>';
										echo '<td>'.$donor['dremarks'].'</td>';
										echo '<td class="text-center">
														<a class="btn btn-primary btn-md" href="viewscreening.php?id='.$donor['did'].'" data-toggle="tooltip" title="Update"><span class="glyphicon glyphicon-edit"></span></a>
										  		  </td>';
									echo '</tr>';
								}
							?>
						</tbody>		
					</table>
				</div>
				<?php }elseif($category == 'Request'){ ?>
					<div class="table-responsive">
						<table class="table table-hover table-striped" id="myTable">
							<thead>
								<tr class="alert-info">
									<th>Request No.</th>
									<th>Patient No.</th>
									<th>Patient Name</th>
									<th>Blood Type</th>
									<th>Component</th>
									<th>Amount</th>
									<th>Quantity</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$pdo = Database::connect();
								$request = $pdo->prepare("SELECT * FROM bloodrequest WHERE status Like 'Pending'");
								$request->execute();
								$request = $request->fetchAll(PDO::FETCH_ASSOC);

								foreach($request as $row){
									echo '<td>'
										echo 
									echo '</td>'
								}
								?>
							</tbody>
						</table>
					</div>
				<?php } }?>
			<ul class="nav nav-tabs nav-tabs-black">
				<li class="active"><a data-toggle="tab" href="#home" class="nav-tabs-black">Examination</a></li>
				<li><a data-toggle="tab" href="#menu1" class="nav-tabs-black">Screening</a></li>
				<li><a data-toggle="tab" href="#menu2" class="nav-tabs-black">Request</a></li>
				<li><a data-toggle="tab" href="#menu3" class="nav-tabs-black">Dispensing</a></li>
			</ul>
			<div class="tab-content">
			    <div id="home" class="tab-pane fade in active">
					<br />
					<?php viewByCategory('Examination')?>
			    </div>
			    <div id="menu1" class="tab-pane fade">
					<br />
					<?php viewByCategory('Screening')?>
			    </div>
			    <div id="menu2" class="tab-pane fade">
					<br />
					<?php viewByCategory('Request')?>
			    </div>
			    <div id="menu3" class="tab-pane fade">
					<br />
					<?php viewByCategory('Dispensing')?>
			    </div>
			</div>
			<script>
				$(document).ready(function(){
					$('[data-toggle="tooltip"]').tooltip(); 
					$('.btn').tooltip();
				});
			</script>
		</div>	
	</div>
</div>

<?php include 'footer.php'; ?>
</body>
</html>
<?php }else{ 
	header("Location: ./home.php");
}?>