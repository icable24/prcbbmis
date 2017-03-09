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
							<br></br>


                                                        <!-- Select Basic -->
							<ul class = "nav nav-tabs">
                    	<li class="nav-item">
                    	<a href="#summary" class="nav-link active" role="tab" data-toggle="tab" >Summary</a>
                    	 </li>        
                   		<li class="nav-item">
                    	 <a href="#detailed" class="nav-link active" role="tab" data-toggle="tab">Detailed</a>
                    	</li>
                    	<li class="nav-item">
                    	 <a href="#exception" class="nav-link active" role="tab" data-toggle="tab">Exception</a>
                    	</li>
                    	
                   	</ul>
                   	
                   		<div class = "tab-content">
                   		<div role = "tabpanel" class="tab-pane fade" id="summary"><select id="categ" name="categ" class="form-control" style="width: 3in" onchange="updateCheckBox(this)" >
	                                                                
	                                                                <option value="none">-- Select Category --</option>
																	<p><option value="donor">Donor</option>
																	<option value="patient">Patient</option>
	                                                                <option value="inventory">Blood Inventory</option>
	                                                                <option value="date">Activity</option>
	                                                                </p>
	                                                				<div style="text-align:center; width: 3in; font-size: 16px" >
                                                             	   
                                                                   
                                     
                                                              </div>
                                                              </select>
                                                              </div>
                                                              </form>
                                                              


	                     <br>


                   		<div role = "tabpanel" class="tab-pane fade" id="detailed"><select id="categ1" name="categ1" class="form-control" style="width: 3in" onchange="updateCheckBox(this)" >
	                                                                
	                                                                <option value="none">-- Select Category --</option>
																	<p><option value="collection" id="collection" onchange="toggleStatus()">Blood Collection
																	</option>
																	<option value="request" id="request" onchange="toggleStatus()">Blood Request</option>
																	<option value="test" id="test" onchange="toggleStatus()">Blood Test</option>
																	<option value="bycountry" id="bycountry" onchange="toggleStatus()">Blood Transfer(By Country)</option>
	                                                				<div style="text-align:center; width: 3in; font-size: 16px" >
                                                             	   </p> </select>
                                                             	   <br></br>
                                                             	   </br>

                   	</br>
								
					</div>
					<div role = "tabpanel" class="tab-pane fade" id="exception"><select id="categ2" name="categ2" class="form-control" style="width: 3in" onchange="updateCheckBox(this)" >
	                                                                
	                                                                <option value="none">-- Select Category --</option>
																	<option value="deferred" id="deferred" onchange="toggleStatus()">Deferred</option>
																	<option value="accepted" id="accepted" onchange="toggleStatus()">Accepted</option>
																	<option value="gquality" id="gquality" onchange="toggleStatus()">Good Quality</option>
																	<option value="pquality" id="pquality" onchange="toggleStatus()">Poor Quality</option>
																	<option value="walkin" id="walkin" onchange="toggleStatus()">Walk in</option>
																	<option value="rep" id="rep" onchange="toggleStatus()">Replacement</option>
																	<option value="approved" id="approved" onchange="toggleStatus()">Approved</option>
	                                                				<div style="text-align:center; width: 3in; font-size: 16px" >
                                                             	   </p> </select>
                                                             	   <br></br>
                                                             	   </br>
                                                             	   </br>
                                                             	   </div>
<button type="submit" name="submit" class="btn btn-success btn-md"><span class="glyphicon glyphicon-plus-sign"></span> Generate </a>
						
				</div>		

			</div>
			
		
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
   
    if ($('#rbc').is(':selected')) {
        $('#i4 :option').add('bloodcollection');
        //
    } else {
        $('#i4 :option').attr('disabled', true);
    }
    if ($('#rbr').is(':selected')) {
        $('#i3 :option').add('bloodrequest');
        //
    } else {
        $('#i3 :option').attr('disabled', true);
    }
    if ($('#rd').is(':selected')) {
        $('#i2 :option').add('dispensing');
        //
    } else {
        $('#i2 :option').attr('disabled', true);
    }
    if ($('#rt').is(':selected')) {
        $('#i1 :option').add('bloodtest');
        //
    } else {
        $('#i1 :option').attr('disabled', true);
    }
	}
       
    
</script>


	
      
<!--edit @ footer.php-->
<?php
	include('footer.php');
?>
</body>
</html>
