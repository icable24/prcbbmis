<?php 
	include 'login_success.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="./css/custom_style.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.theme.mis.css">
	<link rel="stylesheet" href="css/datepicker.css">
	<link rel="stylesheet" href="css/bootstrap-datetimepicker.min.css">
</head>
<body>
	<!--Header edit @ header.php-->
	<?php 
		include('header.php')  
	?>

	<!-- MAIN PAGE -->
			<!--Form Starts Here-->
		<div class="container">
			<div class="col-lg-offset-2 col-lg-8 col-lg-offset-2">
				<div class="row">
					<h2 style="text-align: center;">Register New Patient</h2>
					<br />
				</div>

						
				<div class="panel panel-info">
					<div class="panel-heading">
						<h4>Patient Profile</h4>
					</div>
					
					<div class="panel-body">
						<form class="form-horizontal" action="./php/regpatient.php" method="post">

							<!-- Text input-->
							<div class="control-group">
							  <label class="control-label" for="pfname">First Name</label>
							  <div class="controls">
							    <input id="pfname" name="pfname" type="text" placeholder="Enter first name" class="form-control" required="">
							    
							  </div>
							</div>
                                                        <!-- Text input-->
							<div class="control-group">
							  <label class="control-label" for="pmname">Middle Name</label>
							  <div class="controls">
							    <input id="pmname" name="pmname" type="text" placeholder="Enter middle name" class="form-control" required="">
							    
							  </div>
							</div>
                                                        <!-- Text input-->
							<div class="control-group">
							  <label class="control-label" for="plname">Last Name</label>
							  <div class="controls">
							    <input id="plname" name="plname" type="text" placeholder="Enter last name" class="form-control" required="">
							    
							  </div>
							</div>

							<div class="control-group">
								<label class="control-label" for="bloodgroup">Blood Group</label>
								<select class="form-control" id="bloodgroup" name="bloodgroup">
									<option></option>
									<option>A</option>
									<option>B</option>
									<option>AB</option>
									<option>O</option>
								</select>
							</div>

							<div class="control-group">
								<label class="control-label" for="rhtype">Rh Type</label>
								<select class="form-control" name="rhtype" id="rhtype">
									<option></option>
									<option>Positive</option>
									<option>Negative</option>
								</select>
							</div>

							<!-- Text input-->
							<div class="control-group">
							  <label class="control-label" for="paddress">Address</label>
							  <div class="controls">
							    <input id="paddress" name="paddress" type="text" placeholder="Address" class="form-control" required="">
							    
							  </div>
							</div>

							<!-- Text input-->
							<div class="control-group">
							  <label class="control-label" for="pbirthdate">Birth Date</label>
							  <div class="controls">
							    <input id="pbirthdate" name="pbirthdate" type="date" class="form-control" required="">
							   		<script src="js/jquery-1.9.1.min.js"></script>
										<script src="js/bootstrap-datepicker.js"></script>
										<script type="text/javascript">
											// When the document is ready
											$(document).ready(function () {
												
												$('#pbirthdate').datepicker({
													format: "yyyy-mm-dd"
												});  
											
											});
									</script>
							    
							  </div>
							</div>
                                                     
							<!-- Multiple Radios -->
							<div class="control-group">
							  <label class="control-label" for="pgender">Gender</label>
							  	<input type="radio" name="pgender" value="male" id="pgender"> Male
			  					<input type="radio" name="pgender" value="female" id="pgender"> Female
							  </div>

							<!-- Text input-->
							<div class="control-group">
								<label class="control-label" for="pcontact">Contact Number</label>
							    <div class="controls">
							    	<input id="pcontact" name="pcontact" type="text" placeholder="Contact Number" class="form-control">
							  	</div>
							</div>

							
					</div>
							<!--Buttons-->
							<div class="panel-footer">	
								<div class="form-actions text-center forms">
									<button type="submit" class="btn btn-success">Submit</button>
                                    <a class="btn" href="viewpatient.php">Back</a>
								</div>		
						  	</div>		
						</form>
					</div>
				</div>		
			</div>
		</div>

	<?php 
		include('footer.php');
	?>

</body>
</html>