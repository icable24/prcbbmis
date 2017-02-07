<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="./css/custom_style.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.theme.mis.css">
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
					<h2 style="text-align: center;">Register New Blood Bank</h2>
					<br />
				</div>
						
				<div class="panel panel-info">
					<div class="panel-heading">
						<h4>Blood Bank Profile</h4>
					</div>
					
					<div class="panel-body">
                                            <form class="form-horizontal" action="./php/regbloodbank.php" method="post">

							<!-- Text input-->
							<div class="control-group">
							  <label class="control-label" for="bankname">Name</label>
							  <div class="controls">
							    <input id="bankname" name="bankname" type="text" placeholder="Name" class="form-control" required>
							    
							  </div>
							</div>

							<!-- Text input-->
							<div class="control-group">
							  <label class="control-label" for="bankaddress">Address</label>
							  <div class="controls">
							    <input id="bankaddress" name="bankaddress" type="text" placeholder="Address" class="form-control" required>
							    
							  </div>
							</div>

							<!-- Text input-->
							<div class="control-group">
							  <label class="control-label" for="contactdetails">Contact Number</label>
							  <div class="controls">
							    <input id="contactdetails" name="contactdetails" type="text" placeholder="Contact Number" class="form-control">
							    
							  </div>
							</div>

							<!-- Select Basic -->
							<div class="control-group">
							  <label class="control-label" for="country">Country</label>
							  <div class="controls">
							    <select id="country" name="country" class="form-control">
                                    <option>Brunei</option>
                                    <option>Cambodia</option>
                                    <option>Indonesia</option>
                                    <option>Laos</option>
                                    <option>Malaysia</option>
                                    <option>Myanmar</option>
                                    <option>Philippines</option>
                                    <option>Singapore</option>
                                    <option>Thailand</option>
                                    <option>Vietnam</option>
							    </select>
							  </div>
							</div>
                                                        
                                                        <!-- Select Basic -->
							<div class="control-group">
							  <label class="control-label" for="bankcateg">Blood Bank Category</label>
							  <div class="controls">
                                                              <select id="bankcateg" name="bankcateg" class="form-control" required>
                                                                <option value="Chapter">Chapter</option>
                                                                <option value="Hospital">Hospital</option>
							    </select>
							  </div>
							</div>

					</div>
							<!--Buttons-->
							<div class="panel-footer">	
								<div class="form-actions text-center forms">
									<button type="submit" class="btn btn-success">Submit</button>
									<a class="btn" href="home.php">Back</a>
								</div>		
						  	</div>		
						</form>
					</div>
				</div>		
			</div>
	<br><br> <br><br> <br>
	<?php
	include('footer.php');
?>
</body>
</html>

