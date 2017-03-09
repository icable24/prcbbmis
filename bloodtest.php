<?php 
	include 'login_success.php';
	require 'dbconnect.php';

	$bagserialno = $_REQUEST['bagserialno'];

	if($bagserialno == null){
		header("Location: viewtest.php");
	}

	$pdo = Database::connect();

	$bag = $pdo->prepare("SELECT * FROM bloodbag WHERE unitserialno = ?");
	$bag->execute(array($bagserialno));
	$bag = $bag->fetch(PDO::FETCH_ASSOC);

	$bloodinfo = $pdo->prepare("SELECT * FROM bloodinformation WHERE bloodid = ?");
	$bloodinfo->execute(array($bag['bloodinfo']));
	$bloodinfo = $bloodinfo->fetch(PDO::FETCH_ASSOC);
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
		<div class="col-lg-offset-1 col-lg-10">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h4>Blood Test</h4>	
				</div>
				<div class="panel-body">
					<form class="form-horizontal" action="php/addtest.php" method="post">
						<div class="control-group">
							<label class="control-label">Bag Serial No.</label>
							<div class="controls">
								<input class="form-control" value="<?php echo  $bagserialno ?>" disabled>
								<input name="bagserialno" type="hidden" value="<?php echo  $bagserialno ?>">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">Blood Type</label>
							<div class="controls">
								<input class="form-control" value="<?php echo  $bloodinfo['bloodgroup'] . ' ' . $bloodinfo['rhtype'] ?>" disabled>
							</div>
						</div>
						<br>

						<div class="panel panel-info">
							<div class="panel-heading">
								<h5 style="color:black;">Test Number 1</h5>
							</div>
							<div class="panel-body">
								<div class="control-group">
									<div class="col-lg-6">
										<label class="control-label" for="hepab1">Hepatitis B</label>
										<input class="form-control" type="Number" step="any" name="hepab1" required="">
									</div>
									<div class="col-lg-6">
										<label class="control-label" for="remarks11">Remarks</label>
										<select name="remarks11" id="remarks11" class="form-control" required="">
											<option></option>
											<option value="Reactive">Reactive</option>
											<option value="Non-Reactive">Non-Reactive</option>
										</select>
									</div>	
								</div>
								<div class="control-group">
									<div class="col-lg-6">
										<label class="control-label" for="hepac1">Hepatitis C</label>
										<input class="form-control" type="Number" step="any" name="hepac1" required="">
									</div>
									<div class="col-lg-6">
										<label class="control-label" for="remarks12">Remarks</label>
										<select name="remarks12" id="remarks12" class="form-control" required="">
											<option></option>
											<option value="Reactive">Reactive</option>
											<option value="Non-Reactive">Non-Reactive</option>
										</select>
									</div>
								</div>
								<div class="control-group">
									<div class="col-lg-6">
										<label class="control-label" for="syphillis1">Syphillis</label>
										<input class="form-control" type="Number" step="any" name="syphillis1" required="">
									</div>
									<div class="col-lg-6">
										<label class="control-label" for="remarks13">Remarks</label>
										<select name="remarks13" id="remarks13" class="form-control" required="">
											<option></option>
											<option value="Reactive">Reactive</option>
											<option value="Non-Reactive">Non-Reactive</option>
										</select>
									</div>
								</div>
								<div class="control-group">
									<div class="col-lg-6">
										<label class="control-label" for="hiv1">HIV</label>
										<input class="form-control" type="Number" step="any" name="hiv1" required="">
									</div>
									<div class="col-lg-6">
										<label class="control-label" for="remarks14">Remarks</label>
										<select name="remarks14" id="remarks14" class="form-control" required="">
											<option></option>
											<option value="Reactive">Reactive</option>
											<option value="Non-Reactive">Non-Reactive</option>
										</select>
									</div>
								</div>
								<div class="control-group">
									<div class="col-lg-6">
										<label class="control-label" for="malaria1">Malaria</label>
										<input class="form-control" type="Number" step="any" name="malaria1" required="">
									</div>
									<div class="col-lg-6">
										<label class="control-label" for="remarks15">Remarks</label>
										<select name="remarks15" id="remarks15" class="form-control" required="">
											<option></option>
											<option value="Reactive">Reactive</option>
											<option value="Non-Reactive">Non-Reactive</option>
										</select>
									</div>
								</div>
							</div>
						</div>

						<div class="panel panel-info">
							<div class="panel-heading">
								<h5 style="color:black;">Test Number 2</h5>
							</div>
							<div class="panel-body">
								<div class="control-group">
									<div class="col-lg-6">
										<label class="control-label" for="hepab2">Hepatitis B</label>
										<input class="form-control" type="Number" step="any" name="hepab2" required="">
									</div>
									<div class="col-lg-6">
										<label class="control-label" for="remarks21">Remarks</label>
										<select name="remarks21" id="remarks21" class="form-control" required="">
											<option></option>
											<option value="Reactive">Reactive</option>
											<option value="Non-Reactive">Non-Reactive</option>
										</select>
									</div>	
								</div>
								<div class="control-group">
									<div class="col-lg-6">
										<label class="control-label" for="hepac2">Hepatitis C</label>
										<input class="form-control" type="Number" step="any" name="hepac2" required="">
									</div>
									<div class="col-lg-6">
										<label class="control-label" for="remarks22">Remarks</label>
										<select name="remarks22" id="remarks22" class="form-control" required="">
											<option></option>
											<option value="Reactive">Reactive</option>
											<option value="Non-Reactive">Non-Reactive</option>
										</select>
									</div>
								</div>
								<div class="control-group">
									<div class="col-lg-6">
										<label class="control-label" for="syphillis2">Syphillis</label>
										<input class="form-control" type="Number" step="any" name="syphillis2" required="">
									</div>
									<div class="col-lg-6">
										<label class="control-label" for="remarks23">Remarks</label>
										<select name="remarks23" id="remarks23" class="form-control" required="">
											<option></option>
											<option value="Reactive">Reactive</option>
											<option value="Non-Reactive">Non-Reactive</option>
										</select>
									</div>
								</div>
								<div class="control-group">
									<div class="col-lg-6">
										<label class="control-label" for="hiv2">HIV</label>
										<input class="form-control" type="Number" step="any" name="hiv2" required="">
									</div>
									<div class="col-lg-6">
										<label class="control-label" for="remarks24">Remarks</label>
										<select name="remarks24" id="remarks24" class="form-control" required="">
											<option></option>
											<option value="Reactive">Reactive</option>
											<option value="Non-Reactive">Non-Reactive</option>
										</select>
									</div>
								</div>
								<div class="control-group">
									<div class="col-lg-6">
										<label class="control-label" for="malaria2">Malaria</label>
										<input class="form-control" type="Number" step="any" name="malaria2" required="">
									</div>
									<div class="col-lg-6">
										<label class="control-label" for="remarks25">Remarks</label>
										<select name="remarks25" id="remarks25" class="form-control" required="">
											<option></option>
											<option value="Reactive">Reactive</option>
											<option value="Non-Reactive">Non-Reactive</option>
										</select>
									</div>
								</div>
							</div>
						</div>
						<div class="panel panel-info">
							<div class="panel-heading">
								<h5 style="color:black;">Test Number 3</h5>
							</div>
							<div class="panel-body">
								<div class="control-group">
									<div class="col-lg-6">
										<label class="control-label" for="hepab3">Hepatitis B</label>
										<input class="form-control" type="Number" step="any" name="hepab3" required="">
									</div>
									<div class="col-lg-6">
										<label class="control-label" for="remarks31">Remarks</label>
										<select name="remarks31" id="remarks31" class="form-control" required="">
											<option></option>
											<option value="Reactive">Reactive</option>
											<option value="Non-Reactive">Non-Reactive</option>
										</select>
									</div>	
								</div>
								<div class="control-group">
									<div class="col-lg-6">
										<label class="control-label" for="hepac3">Hepatitis C</label>
										<input class="form-control" type="Number" step="any" name="hepac3" required="">
									</div>
									<div class="col-lg-6">
										<label class="control-label" for="remarks32">Remarks</label>
										<select name="remarks32" id="remarks32" class="form-control" required="">
											<option></option>
											<option value="Reactive">Reactive</option>
											<option value="Non-Reactive">Non-Reactive</option>
										</select>
									</div>
								</div>
								<div class="control-group">
									<div class="col-lg-6">
										<label class="control-label" for="syphillis3">Syphillis</label>
										<input class="form-control" type="Number" step="any" name="syphillis3" required="">
									</div>
									<div class="col-lg-6">
										<label class="control-label" for="remarks33">Remarks</label>
										<select name="remarks33" id="remarks33" class="form-control" required="">
											<option></option>
											<option value="Reactive">Reactive</option>
											<option value="Non-Reactive">Non-Reactive</option>
										</select>
									</div>
								</div>
								<div class="control-group">
									<div class="col-lg-6">
										<label class="control-label" for="hiv3">HIV</label>
										<input class="form-control" type="Number" step="any" name="hiv3" required="">
									</div>
									<div class="col-lg-6">
										<label class="control-label" for="remarks34">Remarks</label>
										<select name="remarks34" id="remarks34" class="form-control" required="">
											<option></option>
											<option value="Reactive">Reactive</option>
											<option value="Non-Reactive">Non-Reactive</option>
										</select>
									</div>
								</div>
								<div class="control-group">
									<div class="col-lg-6">
										<label class="control-label" for="malaria3">Malaria</label>
										<input class="form-control" type="Number" step="any" name="malaria3" required="">
									</div>
									<div class="col-lg-6">
										<label class="control-label" for="remarks35">Remarks</label>
										<select name="remarks35" id="remarks35" class="form-control" required="">
											<option></option>
											<option value="Reactive">Reactive</option>
											<option value="Non-Reactive">Non-Reactive</option>
										</select>
									</div>
								</div>
							</div>
						</div>
				</div>
					<div class="panel-footer">	
						<div class="form-actions text-center forms">
							<button type="submit" class="btn btn-success">Submit</button>
							<a class="btn" href="viewtest.php">Back</a>
						</div>		
				  	</div>
					</form>
			</div>
		</div>
	</div>
	<?php
		include('footer.php');
	?>
</body>
</html>
