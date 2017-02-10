<?php 
	include 'login_success.php';
	require 'dbconnect.php';

	$pdo = Database::connect();
	$id = $_REQUEST['id'];

	$dispense = $pdo->prepare("SELECT * FROM bloodrequest WHERE reqid = ?");
	$dispense->execute(array($id));
	$dispense = $dispense->fetch(PDO::FETCH_ASSOC);

	$blood = $pdo->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM inventory WHERE component = ? AND bloodinfo = ? AND status = ?");
	$blood->execute(array($dispense['component'], $dispense['bloodid'], 'Inventory'));
	$blood = $blood->fetchAll(PDO::FETCH_ASSOC);

	$patient = $pdo->prepare("SELECT * FROM patient WHERE pid = ?");
	$patient->execute(array($dispense['pid']));
	$patient = $patient->fetch(PDO::FETCH_ASSOC);

	$info = $pdo->prepare("SELECT * FROM bloodinformation WHERE bloodid = ?");
	$info->execute(array($patient['bloodinfo']));
	$info = $info->fetch(PDO::FETCH_ASSOC);

	if(!count($blood) < $dispense['quantity']){
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="/xampp/htdocs/pr1/css/custom_style.css">
	<link rel="stylesheet" type="text/css" href="/xampp/htdocs/pr1/css/bootstrap.theme.mis.css">
</head>
<!--body starts here-->
<body>
	<!--edit @ header.php-->
	<?php
	include('header.php');
	?>

		<div class="container">
			<div class="col-lg-offset-2 col-lg-8 col-lg-offset-2">
						
				<div class="panel panel-info">
					<div class="panel-heading">
						<h4 style="color: #333">Dispensing</h4>
					</div>
					<div class="panel-body">
						<form class="form-horizontal" action="./php/adddispensing.php" method="post">
						
						<?php for($i = 0; $i < $dispense['quantity']; $i++){ 
								$b = $blood[$i];
							?>
							<div class="control-group">
								<label for="bloodbagserialno">Blood Bag No.</label>
								<input type="hidden" class="form-control" required id="bloodbagserialno" name="<?php echo 'bagserialno'. $i ?>" placeholder="Bag Serial Number" value="<?php echo $b['unitserialno'] ?>">
								<input type="text" class="form-control" disabled="" value="<?php echo $b['unitserialno'] ?>">

							</div>
						<?php } ?>
							<div class="control-group">
								<input type="hidden" id="qty" name="qty" value="<?php echo $dispense['quantity'] ?>">
							</div>
							<div class="control-group">
								<input type="hidden" id="reqid" name="reqid" value="<?php echo $_REQUEST['id'] ?>">
							</div>
							<div class="control-group">
								<label class="control-label" for="dispensingdate">Date</label>
								<div class="controls">
								<input id="dispensingdate" name="dispensingdate" type="date" class="form-control" required="">
							   		<script src="js/jquery-1.9.1.min.js"></script>
										<script src="js/bootstrap-datepicker.js"></script>
										<script type="text/javascript">
											// When the document is ready
											$(document).ready(function () {
												
												$('#dispensingdate').datepicker({
													format: "yyyy-mm-dd"
												});  
											
											});
									</script>
							</div>


							<div class="control-group">
								<label for="patient" class="control-label">Patient</label>
								<input type="hidden" required id="patient" name="patient" placeholder="Patient" value="<?php echo $patient['pid'] ?>">

								<input type="text" class="form-control" value="<?php echo $patient['pfname'] . ' ' . substr($patient['pmname'], 0, 1) . '. ' . $patient['plname']?>" disabled>
							</div>

							<div class="control-group">
	                            <label class="control-label" for="bloodgroup">Blood Type</label>
	                            <input type="text" class="form-control" value="<?php echo $info['bloodgroup'] ?>" disabled>
	                            <input type="hidden" value="<?php echo $info['bloodgroup'] ?>" >
                        	</div>

                        	<div class="control-group">
	                            <label class="control-label" for="rhtype">Rh Type</label>
	                            <input type="text" class="form-control" value="<?php echo $info['rhtype'] ?>" disabled>
	                            <input type="hidden" value="<?php echo $info['rhtype'] ?>" >
                        	</div>

						<br>
						<div class="control-group">
						<p><label for="inputPerson">Received By</label></p>
						<p1><label for="rname">Name</label></p1>
						<input type="text" class="form-control" required id="rname" name="rname" placeholder="Name">
						</div>

						<div class="control-group">
							<label for="raddress" class="control-label">Address</label>
							<input type="text" class="form-control" id="raddress" name="raddress" required="" placeholder="Address">
						</div>
					
						<div class="control-group">
							<label for="rcontact">Contact</label>
							<input type="text" class="form-control" required id="rcontact" name="rcontact" placeholder="Contact">
						</div>
						<br>
						<div class="text-center">
							<button type="submit" class="btn btn-success">Save</button>
							<a href="viewdispensing.php" type="button">Back</a>
						</div>
						</table>
									
						  		</div>		
						  	</form>
						</form>
					</div>
				</div>		
			</div>
		</div>
	
<!--edit @ footer.php-->
<?php
	include('footer.php');
?>
</body>
</html>
<?php }else{
	header("Location: ./viewrequest.php?error=1");
	} ?>
