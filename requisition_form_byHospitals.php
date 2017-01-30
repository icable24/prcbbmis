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
							  <label class="control-label" for="pfname">Requester</label>
							  <div class="controls">
							    <input id="pfname" name="pfname" type="text" placeholder="Fullname" class="form-control" required="">
							    
							  </div>
							</div>
                                                        <!-- Text input-->
							<!--<div class="control-group">
							  <label class="control-label" for="pmname">Middle name</label>
							  <div class="controls">
							    <input id="pmname" name="pmname" type="text" placeholder="Enter middle name" class="form-control" required="">
							    
							  </div>
							</div> -->
                                                        <!-- Text input-->
							<!--<div class="control-group">
							  <label class="control-label" for="plname">Last name</label>
							  <div class="controls">
							    <input id="plname" name="plname" type="text" placeholder="Enter last name" class="form-control" required="">
							    
							  </div>
							</div>-->
                                                        <!-- Multiple Radios -->
							<div class="control-group">
							  <label class="control-label" for="need">Need</label>&nbsp;&nbsp;
                                                                <input type="checkbox" name="need" value="1" id="bt" onchange="toggleStatus()"> Blood Type?
							  	<input type="checkbox" name="need" value="2" id="bc" onchange="toggleStatus()"> Blood Component?		
							  </div>    
                                                            <div id="f1">
							<div class="control-group">
                                                            <label class="control-label" for="bloodgroup">Blood Type&nbsp;&nbsp;<input type="button" value="+" onclick="addInput()" ></label>
                                                            <select class="form-control" id="bloodgroup" name="bloodgroup" disabled >
									<option selected="selected" disabled></option>
                                                                        <option>A</option>
									<option>B</option>
									<option>AB</option>
									<option>O</option>
                                                                        
								</select>
                                                        </div>
                                                        <div class="control-group">
								<label class="control-label" for="rhtype">Rh Type</label>
                                                                <select class="form-control" name="rhtype" id="rhtype" disabled >
									<option selected="selected" disabled></option>
									<option>Positive</option>
									<option>Negative</option>
								</select>
							</div>
                                                        <div class="control-group">
							  <label class="control-label" for="qty">Quantity</label>
							  <div class="controls">
                                                              <input id="qty" name="qty" type="text" class="form-control" required="" disabled/>
							    
							  </div>
							</div>
                                                                 <span id="responce"></span>
                                                        </div>
                                                        <div id="f2">
                                                        <div class="control-group">
                                                            <label class="control-label" for="bloodgroup">Blood Component&nbsp;&nbsp;<input type="button" value="+" onclick="addInput()" ></label>
								<select class="form-control" id="bloodgroup"  name="bloodgroup" >
									<option selected="selected" disabled></option>
									<option>Red Cell</option>
									<option>Fresh Frozen Plasma</option>
									<option>Platelet Concentrate</option>
									<option>Whole Blood</option>
								</select>
							</div>

                                                        </div>

							<!-- Text input-->
							<div class="control-group">
							  <label class="control-label" for="pbirthdate">Date Needed</label>
							  <div class="controls">
							    <input id="pbirthdate" name="pbirthdate" type="date" class="form-control" required="">
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
<script>
var countBox =1;
var boxName = 0;
function addInput()
{
     var boxName="textBox"+countBox; 
     document.getElementById('responce').innerHTML+='<div class="control-group">\
                                                     <label class="control-label" for="bloodgroup">Blood Type</label>\
                                                     <select class="form-control" id="bloodgroup" name="bloodgroup" disabled>\
                                                     <option selected="selected" disabled></option>\
                                                      <option>A</option>\
                                                        <option>B</option>\
							<option>AB</option>\
							<option>O</option>\
                                                        </select>\
                                                         <div class="control-group">\
								<label class="control-label" for="rhtype">Rh Type</label>\
                                                                <select class="form-control" name="rhtype" id="rhtype" disabled >\
									<option selected="selected" disabled></option>\
									<option>Positive</option>\
									<option>Negative</option>\
								</select>\
							</div>\n\
                                                            <div id="f2">\
                                                        <div class="control-group">\
                                                            <label class="control-label" for="bloodgroup">Blood Component</label>\
								<select class="form-control" id="bloodgroup"  name="bloodgroup" >\
									<option selected="selected" disabled></option>\
									<option>Red Cell</option>\
									<option>Fresh Frozen Plasma</option>\
									<option>Platelet Concentrate</option>\
									<option>Whole Blood</option>\
								</select>\
							</div>\
                                                        </div>';
     countBox += 1;
}
</script>
	<?php 
		include('footer.php');
	?>

</body>
</html>