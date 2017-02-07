<?php

	include 'login_success.php';
	require 'dbconnect.php'; 

	$pdo = Database::connect();
	$query = $pdo->prepare("SELECT * FROM componentsprep WHERE remarks = 'Pending'");
	$query->execute();
	$query = $query->fetchAll(PDO::FETCH_ASSOC);
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
						<h2>Components Prep</h2>
					</div>
				</div>
				<div class="table-responsive">
					<table class="table  table-hover table-striped">
						<thead>
							<tr class="alert-info ">
								<th>Collection No.</th>
								<th>Blood Bag No.</th>
								<th>Bag Type</th>
                                <th>Status</th>                                                                
								<th class="text-center">Action</th>
							</tr>							
						</thead>
						<tbody>
							<?php 
								foreach($query as $row){
									$q = $pdo->prepare("SELECT * FROM collection WHERE collid = ?");
									$q->execute(array($row['collid']));
									$q = $q->fetch(PDO::FETCH_ASSOC);
									echo '<tr>';
										echo '<td>' . $row['collid'] . '</td>';
										echo '<td>' . $row['bagserialno'] . '</td>';
										echo '<td>' . $q['bagtype'] . '</td>';
										echo '<td>' . $row['remarks'] . '</td>';
										echo '<td class="text-center">
													<a class="btn btn-primary btn-md" href="viewcomponents.php?id='.$row['prepid'].'" data-toggle="tooltip" title="Update"><span class="glyphicon glyphicon-edit"></span></a>
									  		  </td>';
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