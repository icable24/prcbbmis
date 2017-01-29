<?php 
	include 'login_success.php';
	require 'dbconnect.php';

	$pdo = Database::connect();

	$inventory = $pdo->prepare("SELECT * FROM inventory");
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