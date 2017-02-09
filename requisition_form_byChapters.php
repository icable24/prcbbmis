<?php 
	include 'login_success.php';
	require 'dbconnect.php';
$id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    
       
   
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT *  FROM inventory WHERE status LIKE 'inventory'";
        $q = $pdo->prepare($sql);
        $q->execute();
        $bank = $q->fetchAll(PDO::FETCH_ASSOC);
    }
     
        $username = $_SESSION['login_username'];
	$pdo = Database:: connect();
	$pdo->setAttribute(PDO:: ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $user = $pdo->prepare("SELECT * FROM user WHERE username = ?");
        $user->execute(array($username));
	$user = $user->fetch(PDO:: FETCH_ASSOC);

        $bloodbank = $pdo->prepare("SELECT * FROM bloodbank WHERE bankname = ?");
        $bloodbank->execute(array($user['bankname']));
        $bloodbank = $bloodbank->fetch(PDO:: FETCH_ASSOC);
        
        
        
        
       
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <script src="./js/addnewfieldr1.js" type="text/javascript"></script>
    <script src="./js/addnewfieldr2.js" type="text/javascript"></script>
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
                                            <form id="form_a" action="./php/addRequisitionbyChapters.php" method="post"></form>
                                            <form id="form_b" action="./php/addtmpbloodtype.php" method="post"></form>
                                            <form id="form_c" action="./php/addtmpbloodcomponent.php" method="post"></form>
                                            
                                            
							<!-- Text input-->
							<div class="control-group">
							  <label class="control-label" for="requester">Requester</label>
							  <div class="controls">
                                                              <input class="form-control" form="form_a" value="<?php echo $user['fname'].' '. substr($user['mname'],0,1).'. '.$user['lname'] ?>" disabled>
                                                              <input id="requester" form="form_a" name="requester" value="<?php echo $user['fname'].' '. substr($user['mname'],0,1).'. '.$user['lname'] ?>" type="hidden" placeholder="Fullname" class="form-control" required="">
							    
							  </div>
							</div>
                                                        
                                                        <!-- Multiple Radios -->
							<div class="control-group">
							  <label class="control-label" for="need">Need</label>&nbsp;&nbsp;
                                                                <input type="checkbox" name="need" value="1" id="bt" onchange="toggleStatus()"> Blood Type?
							  	<input type="checkbox" name="need" value="2" id="bc" onchange="toggleStatus()"> Blood Component?		
							  </div>    
                                                        
                                                        <!-- Drop down list -->
                                               <!-- <form2 class="form-horizontal" action="./php/addtmpbloodtype.php" method="post">-->
                                                        <table id="f1" form="form_a">
                                                             
                                                        <tr class="control-group">
                              
                                                         <td>
                                                <label class="control-label" for="bloodgroup">Blood Type</label>
                                                <select class="form-control" id="bloodgroup" name="bloodtype" disabled style="width: 100px" form="form_b">
									<option selected="selected" disabled></option>
                                                                        <option>A</option>
									<option>B</option>
									<option>AB</option>
									<option>O</option>
                                                                        
								</select>
                                                                     </td>
					                      <td style="padding-left: 20px">
								<label class="control-label" for="rhtype">Rh Type</label>
                                                                <select class="form-control" name="rhtype" id="rhtype" disabled style="width: 100px" form="form_b">
									<option selected="selected" disabled></option>
									<option>Positive</option>
									<option>Negative</option>
								</select>
                                                                     </td>
					                                                                        <td style="padding-left: 20px">
							  <label class="control-label" for="btqty">Quantity</label>
							  <div class="controls">
                                                              <input id="qty" name="btqty" type="number" class="form-control" required="" disabled style="width: 100px" form="form_b">
							     
							  </div>
                                                                     </td>
					                             <td style="padding-left: 20px; padding-top: 25px">
                                                                         <button type="submit" class="btn btn-default" name="btid" form="form_b"><span class="glyphicon glyphicon-plus-sign"></span></button>
                                                                         
                                                                     </td>
                                                                     
                                                           
                                                        </tr>
                                  
                                                       
                                                            </table>
                                                        <!--</form2>-->
                                                        <br>
                                                       <!-- Table -->
                                                        <div class="table-responsive" style="width: 5in" id="f1">
                                                            <table class="table table-hover table-striped">
                                                                <thead>
                                                                <tr class="alert-info">
                                                                    <th class="text-center">Blood Type</th>  
                                                                    <th class="text-center">RH Type</th>
                                                                    <th class="text-center">Quantity</th>
                                                                    <th class="text-center">Action</th>
                                                                </tr>
                                                                </thead>
                                            <tbody>					
					<?php
						require 'dbconnect.php';
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = 'SELECT * FROM tmpbloodtype ORDER BY bloodtype';							
							foreach ($pdo->query($sql) as $row) {
								echo '<tr>';
									echo '<td>'.$row['bloodtype']. '</td>';
									echo '<td>'.$row['rhtype'].'</td>';
									echo '<td>'.$row['btqty'].'</td>';
									echo '<td class="text-center">
												<a class="btn btn-default btn-md" href="tmpbtdelete.php?id='.$row['btid'].'" data-toggle="tooltip" title="Update"><span class="glyphicon glyphicon-trash"></span></a>
								  		  </td>';
								echo '</tr>';
							}
							Database::disconnect();
						?>
				</tbody>
			</table>
		</div>
                                                        <!--End of Table-->
                                                    <!--     <form3 class="form-horizontal" action="./php/addtmpbloodcomponent.php" method="post">-->
                                                        <!-- Drop Down List -->
                                                        <table id="f2" form="form_a">
                                                        <tr class="control-group">
                                                            <td>
                                                            <label class="control-label" for="bloodgroup">Blood Component</label>
                                                            <select class="form-control" id="bankname" name="bloodcomponent" disabled style="width: 2.3in" form="form_c">
                                                              <?php
                                                              foreach($bank as $row){
                                                                 echo '<option value="'.$row['component'].'">'.$row['component'].'</option>';
                                                              }
                                                              ?>
                                                              </select>
                                                            </td>
					                  <td style="padding-left: 20px">
							  <label class="control-label" for="bcqty">Quantity</label>
							  <div class="controls">
                                                              <input id="qty" name="bcqty" type="number" class="form-control" required="" disabled style="width: 100px" form="form_c">
							     
							  </div>
                                 </td>
									<td style="padding-left: 20px; padding-top: 25px">
                                                                            <button type="submit" class="btn btn-default" name="bcid" form="form_c"><span class="glyphicon glyphicon-plus-sign"></span></button>
                                                                         
                                                                        </td>
                                                                    </tr>
                                </table>
                                                        <!-- </form3> -->
                                                        
                                                        <br>
                                                       <!-- Table -->
                                                        <div class="table-responsive" style="width: 5in">
			<table class="table table-hover table-striped">
				<thead>
					<tr class="alert-info">
                                            <th class="text-center">Blood Component</th>  
                                            <th class="text-center">Quantity</th>
                                            <th class="text-center">Action</th>
					</tr>
				</thead>
				<tbody>					
					<?php
						require 'dbconnect.php';
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = 'SELECT * FROM tmpbloodcomponent ORDER BY bloodcomponent';							
							foreach ($pdo->query($sql) as $row) {
								echo '<tr>';
									echo '<td>'.$row['bloodcomponent']. '</td>';
									echo '<td>'.$row['bcqty'].'</td>';
									echo '<td class="text-center">
												<a class="btn btn-default btn-md" href="tmpbcdelete.php?id='.$row['bcid'].'" data-toggle="tooltip" title="Delete"><span class="glyphicon glyphicon-trash"></span></a>
								  		  </td>';
								echo '</tr>';
							}
							Database::disconnect();
						?>
				</tbody>
			</table>
		</div>
                                                        <!--End of Table-->

							<!-- Text input-->
							<div class="control-group">
							  <label class="control-label" for="dateneeded">Date Needed</label>
							  <div class="controls">
                                                              <input id="dateneeded" name="dateneeded" type="date" class="form-control" required="" form="form_a">
							   		<script src="js/jquery-1.9.1.min.js"></script>
										<script src="js/bootstrap-datepicker.js"></script>
										<script type="text/javascript">
											// When the document is ready
											$(document).ready(function () {
												
												$('#dateneeded').datepicker({
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
                                                               <input class="form-control" value="<?php echo $bloodbank['bankname']?>" disabled form="form_a"></input>
                                                        <input id="bankname" name="bankname" type="hidden" placeholder="bank name" class="form-control" form="form_a" required="" value="<?php echo $bloodbank['bankname']?>">
                                                           </div>
							</div>
                                                        <!-- Text input-->
							<div class="control-group">
							  <label class="control-label" for="bankaddress">Address</label>
							   <div class="controls">
							  <input class="form-control" value="<?php echo $bloodbank['bankaddress']?>" disabled form="form_a"></input>
                                                        <input id="bankaddress" name="bankaddress" type="hidden" placeholder="Bank Address" class="form-control" form="form_a" required="" value="<?php echo $bloodbank['bankaddress']?>">
							    
							  </div>
							</div>

							<!-- Text input-->
							<div class="control-group">
							  <label class="control-label" for="contactdetails">Contact Number</label>
							   <div class="controls">
							  <input class="form-control" value="<?php echo $bloodbank['contactdetails']?>" disabled form="form_a"></input>
                                                        <input id="contactdetails" name="contactdetails" type="hidden" placeholder="contact number" form="form_a" class="form-control" required="" value="<?php echo $bloodbank['contactdetails']?>">
							    
							  </div>
							</div>
                                                        
                                                        <!-- Text input-->
							<div class="control-group">
							  <label class="control-label" for="reason">Reason</label>
							  <div class="controls">
                                                              <textarea id="reason" name="reason" placeholder="Enter text here..." form="form_a" class="form-control" required=""></textarea>
							    
							  </div>
							</div>
							
					
							<!--Buttons-->
							<div class="panel-footer">	
								<div class="form-actions text-center forms">
                                                                    <button type="submit" class="btn btn-success" name="submit" form="form_a">Request</button>
                                                                        <a class="btn" href="c_Philippines_1.php">Cancel</a>
								</div>		
						  	</div>		
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


	<?php 
		include('footer.php');
	?>

</body>
</html>