<?php 
	include 'login_success.php';
	require 'dbconnect.php';

	$pdo = Database::connect();
	$bag = $pdo->prepare("SELECT * FROM bloodbag WHERE status LIKE 'Inventory'");
	$bag->execute();
	$bag = $bag->fetchAll(PDO::FETCH_ASSOC);

	foreach($bag as $row){
		$update = $pdo->prepare("SELECT * FROM inventory WHERE unitserialno = ?");
		$update->execute(array($row['unitserialno']));	
		$update = $update->fetchAll(PDO::FETCH_ASSOC);

		foreach ($update as $row2) {
			$sql = $pdo->prepare("UPDATE inventory SET remarks = ?, status = ? WHERE unitserialno = ? AND quality = 'Good Quality'");
			$sql->execute(array('Ok', 'Inventory', $row['unitserialno']));
		}
	}

	$inventory = $pdo->prepare("SELECT * FROM inventory WHERE remarks = 'Ok' ORDER BY component");
	$inventory->execute();
	$inventory = $inventory->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<body>
<?php include 'header.php'; ?>

	<div class="container">	
		<div class="row">
			<div class="col-lg-12">
				<div class="row" style="border-bottom:solid 1px;margin-bottom:15px;">
					<div class="col-md-7">
						<h2>Blood Inventory</h2>
					</div>
                                     <div class="col-md-5 text-right" style="padding-top:20px;">
                                         <a href="inventory.php" class="btn btn-success btn-md"><span class="glyphicon glyphicon-view"></span>View by BloodType</a>
				</div>
				</div>
				<div class="table-responsive">
					<table class="table table-hover table-striped">
						<thead>
							<tr class="alert-info">
								<th>Unit Serial No.</th>
								<th>Component</th>
								<th>Status</th>
								<th>Blood Type</th>
								<th>Amount</th>
							</tr>
						</thead>
						<tbody>
							<?php
								foreach($inventory as $row){
									$bloodinfo = $pdo->prepare("SELECT * FROM bloodinformation WHERE bloodid = ?");
									$bloodinfo->execute(array($row['bloodinfo']));
									$bloodinfo = $bloodinfo->fetch(PDO::FETCH_ASSOC); 
									echo '<tr>';
										echo '<td>' . $row['unitserialno'] . '</td>';
										echo '<td>' . $row['component'] . '</td>';
										echo '<td>' . $row['status'] . '</td>';
										echo '<td>' . $bloodinfo['bloodgroup'] . ' ' . $bloodinfo['rhtype'] . '</td>';
										echo '<td>' . $row['amount'] . ' ml' . '</td>';	
									echo '</tr>';
								}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

<?php include 'footer.php'; ?>
</body>
</html>