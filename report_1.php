<?php 
	include('login_success.php')
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="./css/custom_style.css">
        <link rel="stylesheet" href="css/bootstrap-datetimepicker.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.theme.mis.css">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="/resources/demos/style.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 
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
					
				</div>
						
				<div class="panel panel-info">
					<div class="panel-heading">
                                            <h4 style="text-align: center">Generate Report</h4>
					</div>
					
					<div class="panel-body">
                                           

                                                <center>

                                                        <!-- Select Basic -->
							<div class="control-group">
							  <label class="control-label" for="categ">Category</label>
							  <div class="controls">
                                                              <select id="categ" name="categ" class="form-control" style="width: 3in" onchange="updateCheckBox(this)">
                                                                
                                                                <option value="none">-- Select Category --</option>
								<option value="odr">Office Donor Registry</option>
								<option value="mdr">MBD Donor Registry</option>
                                                                <option value="bd">Blood Dispensed</option>
                                                                <option value="btc">Blood Type/Component</option>
                                                                <option value="bi">Blood Inventory</option>
                                                                <option value="patient">Hospital</option>
                                                                  
                                                                
							    </select>
                                                             
                                                              <br>
							  </div>
							</div>
                                                        
                                                         <!-- Select Basic -->
							<div class="control-group">
							  <label class="control-label" for="rtype">Report Type</label>
							  <div class="controls">
                                                              <select id="rtype" name="rtype" class="form-control" style="width: 3in">
                                                                
                                                                  <option style="align-content: center">-Select Report Type-</option>
                                                                <option>Summarize</option>
                                                                <option>Detailed</option>
                                                                <option>Statistical</option>
                                                                
							    </select>
							  </div>
							</div>

                                                </center>
                                                <br>
					</div>
							<!--Buttons-->
							<div class="panel-footer">	
								<div class="form-actions text-center forms">
									<a href="dreport.php" class="btn btn-success btn-md"><span class="glyphicon glyphicon-plus-sign"></span> Generate</a>
									
								</div>		
						  	</div>		
						
					</div>
				</div>		
			</div>
		</div>
                <br>
                <br>
                <br>
               <br>
                <br>
                <br>
               <br>
                <br>
                <br>
               
	
<!--edit @ footer.php-->
<?php
	include('footer.php');
?>
</body>
</html>
