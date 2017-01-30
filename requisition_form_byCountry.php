<?php 
	include 'login_success.php';
	require 'dbconnect.php';

	$id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    
     
   
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT bankname, bankaddress, contactdetails FROM bloodbank";
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
        <script src="./js/whenchecked_byCountry.js" type="text/javascript"></script>
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
					<h2 style="text-align: center;">Blood Request</h2>
					<br />
				</div>

						
				<div class="panel panel-info">
					<div class="panel-heading">
						<h4>Request Form</h4>
					</div>
					
					<div class="panel-body">
                                            <form class="form-horizontal" action="./php/regbloodbank.php" method="post">

							<!-- Text input-->
							<div class="control-group">
							  <label class="control-label" for="fullname">Requester</label>
							  <div class="controls">
							    <input id="fullname" name="fullname" type="text" placeholder="Fullname" class="form-control" required="">
							    
							  </div>
							</div>
                                                       
                                                         <!-- Multiple Radios -->
							<div class="control-group">
                                                            <label class="control-label" for="need">Blood Component</label><br>
                                                            <div style="font-size: 16px"><input type="checkbox" name="need" value="1" id="wb" onchange="toggleStatus()">&nbsp;Whole Blood (32 days)
                                                                <div id="f1"><input id="qty" name="qty" type="number" placeholder="qty" class="form-control" required="" style="width: 65px" disabled></div> 
                                                            </div>
                                                            <div style="font-size: 16px"><input type="checkbox" name="need" value="2" id="ffp" onchange="toggleStatus()">&nbsp;Fresh Frozen Plasma (1 Year)
                                                                <div id="f2"><input id="qty" name="qty" type="number" placeholder="qty" class="form-control" required="" style="width: 65px" disabled></div> 
                                                            </div>
                                                            <div style="font-size: 16px"><input type="checkbox" name="need" value="3" id="p" onchange="toggleStatus()">&nbsp;Platelets (5 Days)
                                                                <div id="f3"><input id="qty" name="qty" type="number" placeholder="qty" class="form-control" required="" style="width: 65px" disabled></div> 
                                                            </div>
                                                        </div>
                                                               

							<!-- Text input-->
							<div class="control-group">
							  <label class="control-label" for="date">Date Needed</label>
							  <div class="controls">
							    <input id="date" name="date" type="date" class="form-control" required="">
							   		<script src="js/jquery-1.9.1.min.js"></script>
										<script src="js/bootstrap-datepicker.js"></script>
										<script type="text/javascript">
											// When the document is ready
											$(document).ready(function () {
												
												$('#date').datepicker({
													format: "yyyy-mm-dd"
												});  
											
											});
									</script>
							    
							  </div>
							</div>

							<!-- Text input-->
							<div class="control-group">
							  <label class="control-label" for="bankname">Blood Bank</label>
							  <div class="controls">
							    <input id="bankname" name="bankname" type="text" placeholder="Name" class="form-control" required="" value="<?php echo $data['bankname']?>" disabled>
							    
							  </div>
							</div>
                                                        <!-- Text input-->
							<div class="control-group">
							  <label class="control-label" for="bankaddress">Address</label>
							  <div class="controls">
                                                              <input id="bankaddress" name="bankaddress" type="text" placeholder="Address" class="form-control" required="" value="<?php echo $data['bankaddress']?>"disabled>
							    
							  </div>
							</div>

							<!-- Text input-->
							<div class="control-group">
							  <label class="control-label" for="contactdetails">Contact Number</label>
							  <div class="controls">
                                                              <input id="contactdetails" name="contactdetails" type="text" placeholder="Contact Number" class="form-control" required="" value="<?php echo $data['contactdetails']?>" disabled>
							    
							  </div>
							</div>
                                                        
                                                        <!-- Text input-->
							<div class="control-group">
							  <label class="control-label" for="detail">Reason</label>
							  <div class="controls">
                                                              <textarea id="detail" name="detail" placeholder="Enter text here..." class="form-control" required=""></textarea>
							    
							  </div>
							</div>
							
					</div>
							<!--Buttons-->
							<div class="panel-footer">	
								<div class="form-actions text-center forms">
									<button type="submit" class="btn btn-success">Request</button>
                                                                        <a class="btn" href="viewpatient.php">Cancel</a>
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