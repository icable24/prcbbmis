<?php 
	include 'login_success.php';
	require 'dbconnect.php';

	$id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    if ( null==$id ) {
        header("Location: viewbloodbank.php");
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM bloodbank where bankid = ?";
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
					<h2 style="text-align: center;">Update Blood Bank</h2>
					<br />
				</div>
						
				<div class="panel panel-info">
					<div class="panel-heading">
						<h4>Blood Bank Profile</h4>
					</div>
					
					<div class="panel-body">
                                            <form class="form-horizontal" action="./php/update_bloodbank.php" method="post">

                                                     <!-- Text input-->
                                                    <div class="control-group">
							<div class="controls">
							<label class="control-label" for="bankid">Blood Bank ID</label>
							<input class="form-control" type="hidden" name="bankid" value="<?php echo $data['bankid']?>">
							<input class="form-control" value="<?php echo $data['bankid']?>" disabled>
							</div>
                                                    </div>
							<!-- Text input-->
							<div class="control-group">
							  <label class="control-label" for="bankname">Name</label>
							  <div class="controls">
                                                              <input id="bankname" name="bankname" type="text" placeholder="Name" class="form-control" disabled required="" value="<?php echo $data['bankname']?>" >
							    
							  </div>
							</div>

							<!-- Text input-->
							<div class="control-group">
							  <label class="control-label" for="bankaddress">Address</label>
							  <div class="controls">
							    <input id="bankaddress" name="bankaddress" type="text" placeholder="Address" class="form-control" required="" value="<?php echo $data['bankaddress']?>">
							    
							  </div>
							</div>

							<!-- Text input-->
							<div class="control-group">
							  <label class="control-label" for="contactdetails">Contact Number</label>
							  <div class="controls">
                                                              <input id="contactdetails" name="contactdetails" type="text" placeholder="Contact Number" class="form-control" required="" value="<?php echo $data['contactdetails']?>">
							    
							  </div>
							</div>

							<!-- Select Basic -->
							<div class="control-group">
							  <label class="control-label" for="country">Country</label>
							  <div class="controls">
                                                              <select id="country" name="country" class="form-control" disabled="">
                                                                <option>Select Country</option>
                                                                <option <?php if($data['country'] == 'Brunei')echo 'selected="selected"'; ?>>Brunei</option>
                                                                <option <?php if($data['country'] == 'Cambodia')echo 'selected="selected"'; ?>>Cambodia</option>
                                                                <option <?php if($data['country'] == 'Indonesia')echo 'selected="selected"'; ?>>Indonesia</option>
                                                                <option <?php if($data['country'] == 'Laos')echo 'selected="selected"'; ?>>Laos</option>
                                                                <option <?php if($data['country'] == 'Malaysia')echo 'selected="selected"'; ?>>Malaysia</option>
                                                                <option <?php if($data['country'] == 'Myanmar')echo 'selected="selected"'; ?>>Myanmar</option>
                                                                <option <?php if($data['country'] == 'Philippines')echo 'selected="selected"'; ?>>Philippines</option>
                                                                <option <?php if($data['country'] == 'Singapore')echo 'selected="selected"'; ?>>Singapore</option>
                                                                <option <?php if($data['country'] == 'Thailand')echo 'selected="selected"'; ?>>Thailand</option>
                                                                <option <?php if($data['country'] == 'Vietnam')echo 'selected="selected"'; ?>>Vietnam</option>
							    </select>
							  </div>
							</div>
                                                        
                                                         <!-- Select Basic -->
							<div class="control-group">
							  <label class="control-label" for="bankcateg">Blood Bank Category</label>
							  <div class="controls">
                                                              <select id="bankcateg" name="bankcateg" class="form-control" disabled="">
                                                                <option  <?php if($data['bankcateg'] == 'Chapter')echo 'selected="selected"'; ?>>Chapter</option>
                                                                <option <?php if($data['bankcateg'] == 'Hospital')echo 'selected="selected"'; ?>>Hospital</option>
							    </select>
							  </div>
							</div>


					</div>
							<!--Buttons-->
							<div class="panel-footer">	
								<div class="form-actions text-center forms">
									<button type="submit" class="btn btn-warning">Update</button>
                                                                        <a class="btn" href="viewbloodbank.php">Back</a>
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
