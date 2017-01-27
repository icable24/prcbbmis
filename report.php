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
		<form class="form-horizontal" action="./dreport.php" method="post">
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
                                                              <select id="categ" name="categ" class="form-control" style="width: 3in" onchange="updateCheckBox(this)" >
                                                                
                                                                <option value="none">-- Select Category --</option>
																<option value="donor">Donor</option>
																<option value="patient">Patient</option>
                                                                <option value="odr">Office Donor Registry</option>
																<option value="mdr">MBD Donor Registry</option>
                                                                <option value="bd">Blood Dispensed</option>
                                                                <option value="btc">Blood Type/Component</option>
                                                                <option value="bi">Blood Inventory</option>
                                                                <option value="patient">Hospital</option>
                                                                  
                                                                
							    </select>
                                                              <br>
                                                              <div style="text-align:center; width: 3in; font-size: 16px" >
                                                              <p >
                                                                  <input type="checkbox" hidden="" name="donor[]" value="did"  id="donor" onchange="toggleStatus() /> ID &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                  <input type="checkbox" hidden="" name="donor[]" id="donor" value="dfname" onchange="toggleStatus() /> Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                  <input type="checkbox" hidden="" name="donor[]" id="donor" value="dbirthdate" onchange="toggleStatus()/> Birthdate &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                  <input type="checkbox" hidden="" name="donor[]" id="donor" name="dgender" onchange="toggleStatus()/>Gender&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                  <input type="checkbox" hidden="" name="donor[]" id="donor" value="daddress" onchange="toggleStatus()/> Address &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                                                                  <input type="checkbox" hidden="" name="donor[]" id="donor" value="dcontact" onchange="toggleStatus()/> Contact &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                  
        </p>            
                                                              </div>
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
									<button type="submit" class="btn btn-success btn-md"><span class="glyphicon glyphicon-plus-sign"></span> Generate</a>
									
								</div>		
						  	</div>		
						
					</div>
				</div>		
			</div>
		</form>
                <br>
                <br>
                <br>
                <script>
    function updateCheckBox(opts) {
        var chks = document.getElementsByName("donor[]");

        if (opts.value == 'donor') {
            for (var i = 0; i <= chks.length; i++) {
                chks[i].hidden = false;
            }
        }
        else {
            for (var i = 0; i <= chks.length; i++) {
                chks[i].hidden = true;
                chks[i].checked = false;
            }
        }
    }
</script>
<script>

	
  function toggleStatus() {
   
    if ($('#bc').is(':checked')) {
        $('#f2 :input').removeAttr('disabled');
        //
    } else {
        $('#f2 :input').attr('disabled', true);
    }

    if ($('#bt').is(':checked')) {
        $('#f1 :input').removeAttr('disabled');
        //
    } else {
        $('#f1 :input').attr('disabled', true);
    }
	}
       
    
</script>
	
      
<!--edit @ footer.php-->
<?php
	include('footer.php');
?>
</body>
</html>
