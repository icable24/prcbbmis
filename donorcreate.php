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
<!--body starts here-->
<body>
	<!--edit @ header.php-->
	<?php
	include('header.php');
	?>

		<div class="container">
			<div class="col-lg-offset-2 col-lg-8 col-lg-offset-2">
				<div class="row">
					<h2 style="text-align: center;">Register New Donor</h2>
					<br />
				</div>
						
				<div class="panel panel-info">
					<div class="panel-heading">
						<h4>Donors' Profile</h4>
					</div>
					
					<div class="panel-body">
						<form class="form-horizontal" action="./php/regdonor.php" method="post">

							<!-- Text input-->
							<div class="control-group">
							  <label class="control-label" for="dfname">First Name</label>
							  <div class="controls">
							    <input id="dfname" name="dfname" type="text" placeholder="First Name" class="form-control" required="">
							    
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="dmname">Middle Name</label>
							  <div class="controls">
							    <input id="dmname" name="dmname" type="text" placeholder="Middle Name" class="form-control">
							    
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="dlname">Last Name</label>
							  <div class="controls">
							    <input id="dlname" name="dlname" type="text" placeholder="Last Name" class="form-control" required="">
							    
							  </div>
							</div>

							<!-- Text input-->
							<div class="control-group">
							  <label class="control-label" for="daddress">Address</label>
							  <div class="controls">
							    <input id="daddress" name="daddress" type="text" placeholder="Address" class="form-control" required="">
							    
							  </div>
							</div>

							<!-- Text input-->
							<div class="control-group">
							  <label class="control-label" for="dbirthdate">Birth Date</label>
							  <div class="controls">
							    <input id="dbirthdate" name="dbirthdate" type="date" class="form-control" required="" max="1999-2-13">
							   		<script src="js/jquery-1.9.1.min.js"></script>
										<script src="js/bootstrap-datepicker.js"></script>
										<script type="text/javascript">
											// When the document is ready
											$(document).ready(function () {
												$('#dbirthdate').datepicker({
													format: "yyyy-mm-dd",
													maxDate: new Date(1999, 2,13)
												});  
											});
									</script>
							  </div>
							</div>

							<!-- Multiple Radios -->
							<div class="control-group">
							  <label class="control-label" for="dgender">Gender</label>
							  	<input type="radio" name="dgender" value="male" id="dgender" required=""> Male
			  					<input type="radio" name="dgender" value="female" id="dgender" required=""> Female
							</div>

							<!-- Text input-->
							<div class="control-group">
							  <label class="control-label" for="dreligion">Religion</label>
							  <div class="controls">
							    <input id="dreligion" name="dreligion" type="text" placeholder="Religion" class="form-control" required="">
							    
							  </div>
							</div>

							<!-- Text input-->
							<div class="control-group">
							  <label class="control-label" for="dcontact">Contact Number</label><label class="control-label eg">(Format: +63xxxxxxxxxx)</label>
							  <div class="controls">
							    <input id="dcontact" name="dcontact" type="tel" placeholder="Contact Number" class="form-control" required="">
							    
							  </div>
							</div>

							<!-- Select Basic -->
							<div class="control-group">
							  <label class="control-label" for="dtype">Donor Type</label>
							  <div class="controls">
							    <select id="dtype" name="dtype" class="form-control" required="">
							      <option></option>
							      <option>Walk-in</option>
							      <option>Replacement</option>
							      <option>Patient Directed</option>
							      <option>Mobile Blood Donation</option>
							    </select>
							  </div>
							</div>

							<div class="control-group">
								<label class="control-label" for="bloodgroup">Blood Group</label>
								<div class="controls">
									<select class="form-control" name="bloodgroup" id="bloodgroup">
										<option></option>
										<option>A</option>
										<option>B</option>
										<option>AB</option>
										<option>O</option>
									</select>
								</div>
							</div>

							<div class="control-group">
								<label class="control-label" for="rhtype">Rh Type</label>
								<div class="controls">
									<select class="form-control" name="rhtype" id="rhtype">
										<option></option>
										<option>Positive</option>
										<option>Negative</option>
									</select>
								</div>
							</div>

							<!-- Text input-->
							<div class="control-group">
							  <label class="control-label" for="dnationality">Nationality</label>
							  <div class="controls">
							    <input id="dnationality" name="dnationality" type="text" placeholder="Nationality" class="form-control" required="">
							    
							  </div>
							</div>

							<!-- Text input-->
							<div class="control-group">
							  <label class="control-label" for="demail">Email Address</label>
							  <div class="controls">
							    <input id="demail" name="demail" type="email" placeholder="Email Address" class="form-control">
							  </div>
							</div>

					</div>
							<!--Buttons-->
							<div class="panel-footer">	
								<div class="form-actions text-center forms">
									<button type="submit" class="btn btn-success">Submit</button>
									<a class="btn" href="donorlist.php">Back</a>
								</div>		
						  	</div>		
						</form>
					</div>
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
