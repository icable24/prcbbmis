<!DOCTYPE html>
<html lang="en">
<head>
		<!-- CSS import Files -->
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="./jquery-timepicker-1.3.2/jquery.timepicker.min.css">
        <link rel="stylesheet" href="./css/custom_style.css">

      
        <!-- JQuery and Javascript File -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="./jquery-timepicker-1.3.2/jquery.timepicker.min.css"></script>
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
						<h4 style="color: #333">Patient Profile</h4>
					</div>
					
					<div class="panel-body">
						<form class="form-horizontal" action="./php/addexamination.php" method="post">

							<!-- Text input-->
							<div class="control-group">
							  <label class="control-label" for="bldpressure">Blood Pressure</label><label class="control-label eg">(eg. 120/80)</label>
							  <div class="controls">
							    <input id="bldpressure" name="bldpressure" type="text" placeholder="Blood Pressure" class="form-control" required="">
							    
							  </div>
							</div>

							<!-- Text input-->
							<div class="control-group">
							  <label class="control-label" for="pulserate">Pulse Rate</label><label class="control-label eg">(Beats per minute)</label>
							  <div class="controls">
							    <input id="pulserate" name="pulserate" type="Number" placeholder="Pulse Rate" class="form-control" required="">
							    
							  </div>
							</div>

							<!-- Text input-->
							<div class="control-group">
							  <label class="control-label" for="bodytemp">Body Temperature</label><label class="control-label eg">(in &deg;C)</label>
							  <div class="controls">
							    <input id="bodytemp" name="bodytemp" type="Number" placeholder="Body Temperature" class="form-control" required="">
							    
							  </div>
							</div>


							<!-- Text input-->
							<div class="control-group">
								<label class="control-label" for="genapp">General Appearance</label>
							    <div class="controls">
							    	<input id="genapp" name="genapp" type="text" placeholder="General Appearance" class="form-control" required="">
							  	</div>
							</div>

							<!-- Text input-->
							<div class="control-group">
								<label class="control-label" for="skin">Skin</label>
							    <div class="controls">
							    	<input id="skin" name="skin" type="text" placeholder="Skin" class="form-control" required="">
							  	</div>
							</div>

							<!-- Text input-->
							<div class="control-group">
								<label class="control-label" for="heent">HEENT</label>
							    <div class="controls">
							    	<input id="heent" name="heent" type="text" placeholder="Head, Eyes, Ears, Nose, and Throat" class="form-control" required="">
							  	</div>
							</div>

							<!-- Text input-->
							<div class="control-group">
								<label class="control-label" for="hnl">Heart and Lungs</label>
							    <div class="controls">
							    	<input id="hnl" name="hnl" type="text" placeholder="Heart and Lungs" class="form-control" required="">
							  	</div>
							</div>

							<!-- Text input-->
							<div class="control-group">
								<label class="control-label" for="remarks">Remarks</label>
							    <div class="controls">
							    	<input id="remarks" name="remarks" type="text" placeholder="Remarks" class="form-control">
							  	</div>
							</div>

							<!-- Text input-->
							<div class="control-group">
								<label class="control-label" for="reason">Reason</label>
							    <div class="controls">
							    	<input id="reason" name="reason" type="text" placeholder="Reasons" class="form-control">
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
		</div>

	<?php 
		include('footer.php');
	?>

</body>
</html>