<?php 
	include 'login_success.php';
	require 'dbconnect.php';

	$id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    if ( null==$id ) {
        header("Location: view.php");
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM patient where pid = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        Database::disconnect();
    }
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
					<h2 style="text-align: center;">Update Patient Information</h2>
					<br />
				</div>

						
				<div class="panel panel-info">
					<div class="panel-heading">
						<h4>Patient Profile</h4>
					</div>
					
					<div class="panel-body">
                                            <form class="form-horizontal" action="./php/update_patient.php" method="post">

                                                 <!-- Text input-->
                                                    <div class="control-group">
							<div class="controls">
                                                            <label class="control-label" for="pid">Patients ID</label>
							<input class="form-control" type="hidden" name="pid" value="<?php echo $data['pid']?>">
							<input class="form-control" value="<?php echo $data['pid']?>" disabled>
							</div>
                                                    </div>
							<!-- Text input-->
							<div class="control-group">
							  <label class="control-label" for="pfname">First name</label>
							  <div class="controls">
							    <input id="pfname" name="pfname" type="text" placeholder="first name" class="form-control" required="" value="<?php echo $data['pfname']?>">
							    
							  </div>
							</div>
                                                        <!-- Text input-->
							<div class="control-group">
							  <label class="control-label" for="pmname">Middle name</label>
							  <div class="controls">
							    <input id="pmname" name="pmname" type="text" placeholder="middle name" class="form-control" required="" value="<?php echo $data['pmname']?>">
							    
							  </div>
							</div>
                                                        <!-- Text input-->
							<div class="control-group">
							  <label class="control-label" for="plname">Last name</label>
							  <div class="controls">
							    <input id="plname" name="plname" type="text" placeholder="last name" class="form-control" required="" value="<?php echo $data['plname']?>">
							    
							  </div>
							</div>

							<!-- Text input-->
							<div class="control-group">
							  <label class="control-label" for="paddress">Address</label>
							  <div class="controls">
							    <input id="paddress" name="paddress" type="text" placeholder="Address" class="form-control" required="" value="<?php echo $data['paddress']?>">
							    
							  </div>
							</div>

							<!-- Text input-->
							<div class="control-group">
							  <label class="control-label" for="pbirthdate">Birth Date</label>
							  <div class="controls">
							    <input id="pbirthdate" name="pbirthdate" type="date" class="form-control" required=""  value="<?php echo $data['pbirthdate']?>">
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
							  	<input name="pgender" value="male" id="pgender" type="radio" <?php if($data['pgender'] == 'male')echo 'checked="checked"'; ?> required=""> Male
							<input type="radio" name="pgender" value="female" id="pgender" <?php if($data['pgender'] == 'female')echo 'checked="checked"'; ?> required=""> Female
							  </div>

							<!-- Text input-->
							<div class="control-group">
								<label class="control-label" for="pcontact">Contact Number</label>
							    <div class="controls">
							    	<input id="pcontact" name="pcontact" type="text" placeholder="Contact Number" class="form-control" value="<?php echo $data['pcontact'] ?>">
							  	</div>
							</div>

							
					</div>
							<!--Buttons-->
							<div class="panel-footer">	
								<div class="form-actions text-center forms">
									<button type="submit" class="btn btn-warning">Update</button>
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