<?php 
	include 'login_success.php';
?>
<?php 
	require 'dbconnect.php';
    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    if ( null==$id ) {
        header("Location: viewtransfer.php");
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM transfer where rtid = ?";
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
					<h2 style="text-align: center;">Review Request</h2>
					<br />
				</div>
						
				<div class="panel panel-info">
					<div class="panel-heading">
						<h4>Request Form</h4>
					</div>
					
					<div class="panel-body">
                                           
                                            <form class="form-horizontal" action="./php/updatebyChapterHospital.php" method="post">
                                                    
                                                        <!-- Text input-->
                                                        <div class="control-group">
							<div class="controls">
							<label class="control-label" for="rtid">Requester ID</label>
							<input class="form-control" type="hidden" name="rtid" value="<?php echo $data['rtid']?>">
							<input class="form-control" value="<?php echo $data['rtid']?>" disabled>
							</div>
                                                        </div>
                                                        <!-- Text input-->
							<div class="control-group">
							<label class="control-label" for="requester">Requester</label>
							<div class="controls">
							<input id="requester" name="requester" type="text" class="form-control" disabled="" value="<?php echo $data['requester']?>">
							</div>
							</div>
                                                        
                                                        <br>
                                                        <!--Table -->
                                                        <table>
                                                        <tr>
                                                        <center>
                                                        <label>Blood Type</label>
                                                        <span style="padding-left: 200px"></span>
                                                        <label>Blood Component</label>
                                                        </center>
                                                        
                                                        <td style="padding-left: 110px">
                                                        <!-- Text input-->
                                                        <label class="control-label" for="positiveA">A</label>
                                                        <input class="form-control" name="positiveA" type="text" style="width: 65px" value="<?php echo $data['positiveA']; ?>" disabled>
                                                        <!-- Text input-->
                                                        <label class="control-label" for="positiveB">B</label>
                                                        <input class="form-control" name="positiveB" type="text" style="width: 65px" value="<?php echo $data['positiveB']; ?>" disabled>
                                                        <!-- Text input-->
                                                        <label class="control-label" for="positiveO">O</label>
                                                        <input class="form-control" name="positiveO" type="text" style="width: 65px" value="<?php echo $data['positiveO']; ?>" disabled>
                                                        <!-- Text input-->
                                                        <label class="control-label" for="positiveAB">AB</label>
                                                        <input class="form-control" name="positiveAB" type="text" style="width: 65px" value="<?php echo $data['positiveAB']; ?>" disabled>
                                                        </td>
                                                        
                                                        <td style="padding-left: 10px">
                                                        <!-- Text input-->
                                                        <label class="control-label" for="negativeA">-A</label>
                                                        <input class="form-control" name="negativeA" type="text" style="width: 65px" value="<?php echo $data['negativeA']; ?>" disabled>
                                                        <!-- Text input-->
                                                        <label class="control-label" for="negativeB">-B</label>
                                                        <input class="form-control" name="negativeB" type="text" style="width: 65px" value="<?php echo $data['negativeB']; ?>" disabled>
                                                        <!-- Text input-->
                                                        <label class="control-label" for="negativeO">-O</label>
                                                        <input class="form-control" name="negativeO" type="number" style="width: 65px" value="<?php echo $data['negativeO']; ?>" disabled>
                                                        <!-- Text input-->
                                                        <label class="control-label" for="negativeAB">-AB</label>
                                                        <input class="form-control" name="negativeAB" type="number" style="width: 65px" value="<?php echo $data['negativeAB']; ?>" disabled>
                                                        </td>
                                                        
                                                        <td style="padding-left: 150px">
                                                        <!-- Text input-->
                                                        <label class="control-label" for="ffpqty">Fresh Frozen Plasma(1 Year)</label>
                                                        <input class="form-control" name="ffpqty" type="text" style="width: 65px" value="<?php echo $data['ffpqty']; ?>" disabled>
                                                        <!-- Text input-->
							<label class="control-label" for="pcqty">Platelet Concentrate(5 Days)</label>
                                                        <input class="form-control" name="pcqty" type="text" style="width: 65px" value="<?php echo $data['pcqty']; ?>" disabled>
                                                        <!-- Text input-->
							<label class="control-label" for="wbqty">Whole Blood(32 Days)</label>
                                                        <input class="form-control" name="wbqty" type="text" style="width: 65px" value="<?php echo $data['wbqty']; ?>" disabled>
                                                        <!-- Text input-->
							<label class="control-label" for="cqty">Cryoprecipitate (1 Year)</label>
                                                        <input class="form-control" name="cqty" type="text" style="width: 65px" value="<?php echo $data['cqty']; ?>" disabled>
                                                        </td> 
                                                        </tr>
                                                        </table>
                                                        <!-- End Table -->
                                                        <br>
                                                         <!-- Text input-->
							<div class="control-group">
							  <label class="control-label" for="dateneeded">Date Needed</label>
							  <div class="controls">
                                                              <input id="dateneeded" name="dateneeded" type="text" class="form-control" disabled="" value="<?php echo $data['dateneeded']?>">
							    
							  </div>
							</div>

                                                           <!-- Text input-->
							<div class="control-group">
                                                            <label class="control-label" for="bankname">Bank Name</label>
							  <div class="controls">
                                                              <input id="bankname" name="bankname" type="text" class="form-control" disabled="" value="<?php echo $data['bankname']?>">
							    
							  </div>
							</div>
                                                           <!-- Text input-->
							<div class="control-group">
							  <label class="control-label" for="bankaddress">Bank Address</label>
							  <div class="controls">
                                                              <input id="bankaddress" name="bankaddress" type="text" class="form-control" disabled="" value="<?php echo $data['bankaddress']?>">
							    
							  </div>
							</div>
                                                           
                                                            <!-- Text input-->
							<div class="control-group">
							  <label class="control-label" for="contactdetails">Contact Number</label>
							  <div class="controls">
                                                              <input id="contactdetails" name="contactdetails" type="text" class="form-control" disabled="" value="<?php echo $data['contactdetails']?>">
							    
							  </div>
							</div>
                                                            
                                                             <!-- Text input-->
							<div class="control-group">
							  <label class="control-label" for="reason">Reason</label>
							  <div class="controls">
                                                              <input id="reason" name="reason" type="text" class="form-control" disabled="" value="<?php echo $data['reason']?>">
							    
							  </div>
							</div>
                                                             
                                                             <!-- Select Basic -->
							<div class="control-group">
							  <label class="control-label" for="remarks">Remarks</label>
							  <div class="controls">
							    <select id="remarks" name="remarks" class="form-control">
                                                                <option></option>
                                                                <option>Accepted</option>
                                                                <option>Denied</option>
                                                              
							    </select>
							  </div>
							</div>

							

							
					
							<!--Buttons-->
							<div class="panel-footer">	
								<div class="form-actions text-center forms">
									<button type="submit" class="btn btn-warning">Ok</button>
                                                                        <a class="btn" href="notification.php">Back</a>
								</div>		
						  	</div>			
						</form>
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
