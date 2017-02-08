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
								<input type="text" class="form-control" required id="bloodbagserialno" name="bloodbagserialno" placeholder="Bag Serial Number" value="<?php echo $b['unitserialno'] ?>">
							</div>
						<?php } ?>
							<div class="control-group">
								<label class="control-label" for="dispensingdate">Date</label>
								<div class="controls">
								<input id="dispensingdate" name="dispensingdate" type="date" class="form-control" required id ="dispensingdate">
							</div>

							<div class="control-group">
							<label for="requestid" class="control-label">Request ID</label>
							<input type="text" class="form-control" required id="requestid" name="requestid" placeholder="Request ID">
							</div>

							<div class="control-group">
							<label for="patient" class="control-label">Patient</label>
							<input type="text" class="form-control" required id="patient" name="patient" placeholder="Patient">
							</div>
							<div class="control-group">
                            <label class="control-label" for="bloodtype">Blood Type</label>
                            <select class="form-control" required="required" id="bloodtype" name="bloodtype">
                                <option></option>
                                <option value="">A</option>
                                <option value="">B</option>
                                <option value="">O</option>
                                <option value="">AB</option>
                                <option value="">-A</option>
                                <option value="">-B</option>
                                <option value="">-O</option>
                                <option value="">-AB</option>
                            </select>
                        </div>


						<br>
						<div class="control-group">
						<p><label for="inputPerson">Received By</label></p>
						<p1><label for="rname">Name</label></p1>
						<input type="text" class="form-control" required id="rname" name="rname" placeholder="Name">
						</div>

						<div class="control-group">
						<label for="rcontact">Contact</label>
						<input type="text" class="form-control" required id="rcontact" name="rcontact" placeholder="Contact">
						</div>
						<br>
						 <div class="text-center">
						<button type="submit" class="btn btn-primary">Save</button>
						<button type="submit" class="btn btn-primary">Search</button>
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
