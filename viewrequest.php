  	
<?php 
	require 'dbconnect.php';

// User Input
	$error = 0;
	if($_REQUEST != NULL){
	$error = $_REQUEST['error'];
	}
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
	<div class="container-fluid">	
		<div class="row" style="border-bottom:solid 1px;margin-bottom:15px;">

				<?php if($error == 1){ ?>
				<div class="row">
					<h2 style="text-align: center; color: red;">Not Enough Blood Bag in the Inventory</h2>
					<br />
				</div>
				<?php } ?>
				<div class="col-md-7">
					<h2>Blood Request</h2>
				</div>
				<div class="col-md-5 text-right" style="padding-top:20px;">
                                    <a href="bloodrequest.php?id=" class="btn btn-success btn-md"><span class="glyphicon glyphicon-plus-sign"></span>Add Blood Request</a>
				</div>
			</div>
		<?php 	
			function viewByCategory($category){
				if($category == 'Approved'){
		?>
		<div class="table-responsive">
			<table class="table table-hover table-striped">
				<thead>
					<tr class="alert-info">
						<th>Request No.</th>
						<th class="text-center">Patient ID</th>
						<th class="text-center">Patient Name</th>
						<th class="text-center">Blood Type</th>
						<th class="text-center">Component</th>
						<th class="text-center">Status</th>
						<th class="text-center">Action</th>
					</tr>
				</thead>
				<tbody>					
					<?php
						$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
						$perPage = isset($_GET['per-page']) && $_GET['per-page'] <= 50 ? (int)$_GET['per-page'] : 10;

						// Positioning
						$start = ($page > 1) ? ($page * $perPage) - $perPage : 0;

						// Query
						$pdo = Database::connect();
						$bloodrequest = $pdo->prepare("
							SELECT SQL_CALC_FOUND_ROWS * 
							FROM bloodrequest
							WHERE status = 'Approved' ORDER BY reqid
						");
						$bloodrequest->execute(array('Pending'));

						$bloodrequest = $bloodrequest->fetchAll(PDO::FETCH_ASSOC);


											
						foreach ($bloodrequest as $row) {
							$patient = $pdo->prepare('SELECT * FROM patient WHERE pid = ?');
							$patient->execute(array($row['pid']));
							$patient = $patient->fetch(PDO::FETCH_ASSOC);
							$bloodtype = $pdo->prepare("SELECT * FROM bloodinformation WHERE bloodid = ?");
							$bloodtype->execute(array($patient['bloodinfo']));
							$bloodtype = $bloodtype->fetch(PDO::FETCH_ASSOC);
							echo '<tr>';
								echo '<td>'.$row['reqid'] .'</td>';
								echo '<td>'.$patient['pid'] .'</td>';
								echo '<td>'. $patient['pfname'] . ' ' . substr($patient['pmname'], 0, 1) .'. ' . $patient['plname']  . '</td>';
								echo '<td>'.$bloodtype['bloodgroup'] .' '. $bloodtype['rhtype'] .'</td>';
								echo '<td>'. $row['component'] .'</td>';
								echo '<td>'. $row['status'] .'</td>';
                                                                
								echo '<td class="text-center">
										<a class="btn btn-primary btn-md" href="dispensing.php?id='.$row['reqid'].'" data-toggle="tooltip" title="Dispense"><span class="glyphicon glyphicon-edit"></span></a>
							  		  </td>';
							echo '</tr>';
						}
						Database::disconnect();
					?>
				</tbody>
			</table>
		</div>
		<?php }else{ ?>
			<div class="table-responsive">
			<table class="table table-hover table-striped">
				<thead>
					<tr class="alert-info">
						<th>Request No.</th>
						<th class="text-center">Patient ID</th>
						<th class="text-center">Patient Name</th>
						<th class="text-center">Blood Type</th>
						<th class="text-center">Component</th>
						<th class="text-center">Status</th>
						<th class="text-center">Action</th>
					</tr>
				</thead>
				<tbody>					
					<?php
						$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
						$perPage = isset($_GET['per-page']) && $_GET['per-page'] <= 50 ? (int)$_GET['per-page'] : 10;

						// Positioning
						$start = ($page > 1) ? ($page * $perPage) - $perPage : 0;

						// Query
						$pdo = Database::connect();
						$bloodrequest = $pdo->prepare("
							SELECT SQL_CALC_FOUND_ROWS * 
							FROM bloodrequest
							WHERE status = 'Pending' ORDER BY reqid
						");
						$bloodrequest->execute(array('Pending'));

						$bloodrequest = $bloodrequest->fetchAll(PDO::FETCH_ASSOC);


											
						foreach ($bloodrequest as $row) {
							$patient = $pdo->prepare('SELECT * FROM patient WHERE pid = ?');
							$patient->execute(array($row['pid']));
							$patient = $patient->fetch(PDO::FETCH_ASSOC);
							$bloodtype = $pdo->prepare("SELECT * FROM bloodinformation WHERE bloodid = ?");
							$bloodtype->execute(array($patient['bloodinfo']));
							$bloodtype = $bloodtype->fetch(PDO::FETCH_ASSOC);
							echo '<tr>';
								echo '<td>'.$row['reqid'] .'</td>';
								echo '<td>'.$patient['pid'] .'</td>';
								echo '<td>'. $patient['pfname'] . ' ' . substr($patient['pmname'], 0, 1) .'. ' . $patient['plname']  . '</td>';
								echo '<td>'.$bloodtype['bloodgroup'] .' '. $bloodtype['rhtype'] .'</td>';
								echo '<td>'. $row['component'] .'</td>';
								echo '<td>'. $row['status'] .'</td>';
                                                                
								echo '<td class="text-center">
										<a class="btn btn-primary btn-md" href="confirmrequest.php?id='.$row['reqid'].'" data-toggle="tooltip" title="Update"><span class="glyphicon glyphicon-tint"></span></a>
							  		  </td>';
							echo '</tr>';
						}
						Database::disconnect();
					?>
				</tbody>
			</table>
		</div>
		<?php } } ?>
		<ul class="nav nav-tabs nav-tabs-black">
				<li class="active"><a data-toggle="tab" href="#home" class="nav-tabs-black">Approved</a></li>
				<li><a data-toggle="tab" href="#menu1" class="nav-tabs-black">Pending</a></li>
			</ul>
			<div class="tab-content">
			    <div id="home" class="tab-pane fade in active">
					<br />
					<?php viewByCategory('Approved')?>
			    </div>
			    <div id="menu1" class="tab-pane fade">
					<br />
					<?php viewByCategory('Pending')?>
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

<!--edit @ footer.php-->
<?php
	include('footer.php');
?>
   
</body>
</html>