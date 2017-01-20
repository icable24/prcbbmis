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
							<!-- Text input-->
							<div class="control-group">
							  <label class="control-label" for="sdate">Start Date:</label>
							  <div class="controls">
                                                              <input id="sdate" name="sdate" type="sdate" class="form-control datepicker" style="width: 2in">
							    <script src="js/jquery-1.9.1.min.js"></script>
										<script src="js/bootstrap-datepicker.js"></script>
										<script type="text/javascript">
											// When the document is ready
											$(document).ready(function () {
												
												$('#sdate').datepicker({
													format: "yyyy-mm-dd"
												});  
											
											});
									</script>
							  </div>
							</div>
                                                        <!-- Text input-->
							<div class="control-group">
							  <label class="control-label" for="edate">End Date:</label>
							  <div class="controls">
                                                              <input id="edate" name="edate" type="edate" class="form-control datepicker" style="width: 2in">
							    <script src="js/jquery-1.9.1.min.js"></script>
										<script src="js/bootstrap-datepicker.js"></script>
										<script type="text/javascript">
											// When the document is ready
											$(document).ready(function () {
												
												$('#edate').datepicker({
													format: "yyyy-mm-dd"
												});  
											
											});
									</script>
							  </div>
							</div>

                                                        <!-- Select Basic -->
							<div class="control-group">
							  <label class="control-label" for="categ">Category</label>
							  <div class="controls">
                                                              <select id="categ" name="categ" class="form-control" style="width: 3in">
                                                                
                                                                  <option style="align-content: center">-Select Category-</option>
                                                                <option href="dreport.php">Donor Report</option>
                                                                
							    </select>
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
	
<!--edit @ footer.php-->
<?php
	include('footer.php');
?>
</body>
</html>
