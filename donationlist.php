<?php
	include 'login_success.php';
	require 'dbconnect.php';

	if($_REQUEST != null){
		$id = $_REQUEST['id'];
	}

	$pdo = Database::connect();
	$donation = $pdo->prepare("SELECT * FROM collection WHERE donorcollectid = ?");
	$donation->execute(array($id));
	$donation = $donation->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
   
</head>
<?php include 'header.php'; ?>
<body>
	<div class="container">
		<div class="row col-lg-offset-3">
			<div class="col-md-4">
				<h2>
					&nbsp;&nbsp; Donation List
				</h2>
			</div>
		</div>
		<?php include 'donor_side.php'; ?>
		<div class="col-lg-8">
			<div class="table-responsive">
				<table class="table table-hover table-striped" id="myTable">
					<thead class="alert-info">
						<tr>
							<th>Collection ID</th>
							<th>Unit Serial Number</th>
							<th>Collection Date</th>
							<th class="text-center">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							foreach($donation as $row){
								echo '<tr>';
									echo '<td>'. $row['collid'] .'</td>';
									echo '<td>'. $row['unitserialno'] .'</td>';
									echo '<td>'. $row['collectiondate'] .'</td>';
									echo '<td>'. '<a class="btn btn-primary btn-md" href="viewdonation.php?id='.$row['collid'].'" data-toggle="tooltip" title="View"><span class="glyphicon glyphicon-edit"></span></a>' .'</td>';
								echo '</tr>';
							}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<?php include 'footer.php'; ?>	
</body>
</html>