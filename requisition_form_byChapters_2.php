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
                                            
                                            <form id="form_a" action="./php/addRequisitionbyChapters.php" method="post">
                                            
                                            
							<!-- Text input-->
							<div class="control-group">
							  <label class="control-label" for="requester">Requester</label>
							  <div class="controls">
                                                              <input class="form-control" form="form_a" value="<?php echo $user['fname'].' '. substr($user['mname'],0,1).'. '.$user['lname'] ?>" disabled>
                                                              <input id="requester" form="form_a" name="requester" value="<?php echo $user['fname'].' '. substr($user['mname'],0,1).'. '.$user['lname'] ?>" type="hidden" placeholder="Fullname" class="form-control" required="">
							    
							  </div>
							</div>
                                                        <!-- End of Text Input -->
                                                        <br>
                                                        <!-- Check Box -->
							<div class="control-group">
							  <label class="control-label" for="need">Need</label>&nbsp;&nbsp;
                                                          <input type="button" name="need" data-toggle="modal" data-target="#btModal" id="bt" value=" Blood Type?" onchange="toggleStatus()">
							  	<input type="button" name="need" data-toggle="modal" data-target="#bcModal" value=" Blood Component?" id="bc" onchange="toggleStatus()">		
							</div>    
                                                         <!-- End Check Box -->
                                                        <br>
                                                       <!-- Table -->
                                                       
                                                        <div class="table-responsive" style="width: 5in">
                                                            <table class="table table-hover table-striped">
                                                                <thead>
                                                                <tr class="alert-info">
                                                                    <th class="text-center">Blood Type</th>  
                                                                    <th class="text-center">RH Type</th>
                                                                    <th class="text-center">Quantity</th>
                                                                </tr>
                                                                </thead>					
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
									
												
								  		  
								echo '</tr>';
							}
							Database::disconnect();
						?>
                                            </tbody>
			</table>
		</div>
                                                        <!--End of Table-->
                                                   
                                                        
                                                        <br>
                                                       <!-- Table -->
                         <div class="table-responsive" style="width: 5in">
			<table class="table table-hover table-striped">
				<thead>
					<tr class="alert-info">
                                            <th class="text-center">Blood Component</th>  
                                            <th class="text-center">Quantity</th>
                                            
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
                                                              <input id="dateneeded" name="dateneeded" type="date" class="form-control" required="">
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
                                                               <input class="form-control" value="<?php echo $bloodbank['bankname']?>" disabled></input>
                                                        <input id="bankname" name="bankname" type="hidden" placeholder="bank name" class="form-control" required="" value="<?php echo $bloodbank['bankname']?>">
                                                           </div>
							</div>
                                                        <!-- Text input-->
							<div class="control-group">
							  <label class="control-label" for="bankaddress">Address</label>
							   <div class="controls">
							  <input class="form-control" value="<?php echo $bloodbank['bankaddress']?>" disabled ></input>
                                                        <input id="bankaddress" name="bankaddress" type="hidden" placeholder="Bank Address" class="form-control"required="" value="<?php echo $bloodbank['bankaddress']?>">
							    
							  </div>
							</div>
                                                        <!-- End -->
							<!-- Text input-->
							<div class="control-group">
							  <label class="control-label" for="contactdetails">Contact Number</label>
							   <div class="controls">
							  <input class="form-control" value="<?php echo $bloodbank['contactdetails']?>" disabled ></input>
                                                        <input id="contactdetails" name="contactdetails" type="hidden" placeholder="contact number" class="form-control" required="" value="<?php echo $bloodbank['contactdetails']?>">
							    
							  </div>
							</div>
                                                        <!--End-->
                                                        <!-- Text input-->
							<div class="control-group">
							  <label class="control-label" for="reason">Reason</label>
							  <div class="controls">
                                                              <textarea id="reason" name="reason" placeholder="Enter text here..."class="form-control" required=""></textarea>
							    
							  </div>
							</div>
							<!-- End -->
					
							<!--Buttons-->
							<div class="panel-footer">	
								<div class="form-actions text-center forms">
                                                                    <button type="submit" class="btn btn-success" name="submit">Request</button>
                                                                        <a class="btn" href="c_Philippines_1.php">Cancel</a>
								</div>		
						  	</div>	
                                                        </form>
					</div>
                                      </div>
                        </div>
				</div>	
                       <!-- End of Form -->
		
  <!-- Blood Type Modal -->
   <div class="modal fade" id="btModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document" >
			<div class="modal-content" style="margin-top:40%;">
                            <div class="modal-header" style="background-color: #99ccff">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Blood Type</h4>
				</div>
                            <center>
                                <form id="form_b" action="./php/addtmpbloodtype.php" method="post"> 
				 <!-- Start Table Form -->
                                    <table>   
                                        <tr class="control-group">
                                                        <td>
                                                <label class="control-label" for="bloodgroup">Blood Type</label>
                                                <select class="form-control" id="bloodgroup" name="bloodtype" style="width: 100px" form="form_b">
									<option selected="selected" disabled></option>
                                                                        <option>A</option>
									<option>B</option>
									<option>AB</option>
									<option>O</option>
                                                                        
								</select>
                                                                     </td>
					                      <td style="padding-left: 20px">
								<label class="control-label" for="rhtype">Rh Type</label>
                                                                <select class="form-control" name="rhtype" id="rhtype"style="width: 100px">
									<option selected="selected" disabled></option>
									<option>Positive</option>
									<option>Negative</option>
								</select>
                                                                     </td>
					                                                                        <td style="padding-left: 20px">
							  <label class="control-label" for="btqty">Quantity</label>
							  <div class="controls">
                                                              <input id="qty" name="btqty" type="number" class="form-control" required="" style="width: 100px">
							     
							  </div>
                                                                     </td>
					                             <td style="padding-left: 20px; padding-top: 25px">
                                                                         <button type="submit" class="btn btn-default" data-toggle="modal" data-target="#btModal" name="btid"><span class="glyphicon glyphicon-plus-sign"></span></button>
                                                                         
                                                                     </td>
                                           
                                                         </tr>
                                                    </table>
                                    <!-- End Table Form-->
                                    <!-- Start View Table -->
                                                        <div class="table-responsive" style="width: 5in">
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
							$sql = 'SELECT * FROM inventory ORDER BY bloodtype';							
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
                                    </form>  
                            </center>
			</div>
		</div>
  	</div>

<!-- End Bloodtype Modal -->


 <!-- Blood Type Modal -->
   <div class="modal fade" id="bcModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document" >
			<div class="modal-content" style="margin-top:40%;">
                            <div class="modal-header" style="background-color: #99ccff">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Blood Component</h4>
				</div>
                            <center>
                                <form action="./php/addtmpbloodcomponent.php" method="post"> 
				 <table>
                                                        <tr class="control-group">
                                                            <td>
                                                            <label class="control-label" for="bloodcomponent">Blood Component</label>
                                                            <select class="form-control" id="bloodcomponent" name="bloodcomponent" disabled style="width: 2.3in">
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
                                                              <input id="bcqty" name="bcqty" type="number" class="form-control" required="" disabled style="width: 100px">
							     
							  </div>
                                 </td>
									<td style="padding-left: 20px; padding-top: 25px">
                                                                            <button type="submit" class="btn btn-default" name="bcid"><span class="glyphicon glyphicon-plus-sign"></span></button>
                                                                         
                                                                        </td>
                                                                    </tr>
                                </table>
                                    
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
                                    </form>  
                            </center>
			</div>
		</div>
  	</div>

<!-- End Blood Type -->

	<?php 
		include('footer.php');
	?>

</body>
</html>