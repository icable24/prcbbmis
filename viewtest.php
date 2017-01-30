<?php 
	include 'login_success.php';
	require 'dbconnect.php';

// User Input
	$pdo = Database::connect();
	$test = $pdo->prepare("SELECT * FROM bloodbag WHERE status LIKE 'For Testing'");
	$test->execute();
	$test = $test->fetchAll(PDO::FETCH_ASSOC);

?>
<!--Start of Html-->
<!DOCTYPE html>
<html>
<head>

</head>
<body>

	<?php 
		include('header.php');
	?>
	 <div class="container">
	<div class="col-lg-12">
		<div class="row" style="border-bottom:solid 1px;margin-bottom:15px;">
				<div class="col-md-7">
					<h2>Blood Test</h2>
				</div>
			</div>
		<div class="table-responsive">
			<table class="table table-hover table-striped">
				<thead>
					<tr class="alert-info">
						<th>Bag Serial No.</th>
						<th>Bag Type</th>
						<th>Blood Type</th>
						<th>Status</th>
						<th class="text-center">Action</th>				
					</tr>
				</thead>
				<tbody>					
					<?php								
						foreach ($test as $row) {
							$bloodinfo = $pdo->prepare("SELECT * FROM bloodinformation WHERE bloodid = ?");
							$bloodinfo->execute(array($row['bloodinfo']));
							$bloodinfo = $bloodinfo->fetch(PDO::FETCH_ASSOC);
							echo '<tr>';
								echo '<td>'.$row['unitserialno'].'</td>';
								echo '<td>'.$row['bagtype'].'</td>';
								echo '<td>'.$bloodinfo['bloodgroup'] . ' ' . $bloodinfo['rhtype'] .'</td>';
								echo '<td>'.$row['status'].'</td>';                                                             
								echo '<td class="text-center">
											<a class="btn btn-primary btn-md" href="bloodtest.php?bagserialno='.$row['unitserialno'].'" data-toggle="tooltip" title="Update"><span class="glyphicon glyphicon-edit"></span></a>	
							  		  </td>';
							echo '</tr>';
						}
						Database::disconnect();
					?>
				</tbody>
			</table>
		</div>
	</div>
         </div>

<!--edit @ footer.php-->
<?php
	include('footer.php');
?>
   
</body>
</html>