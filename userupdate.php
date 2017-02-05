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
        header("Location: viewuser.php");
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM user where userid = ?";
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
					<h2 style="text-align: center;">Update PRC User</h2>
					<br />
				</div>
						
				<div class="panel panel-info">
					<div class="panel-heading">
						<h4>PRC User's Profile</h4>
					</div>
					
					<div class="panel-body">
                                            <form class="form-horizontal" action="./php/update_user.php" method="post">
                                                    
                                                        <!-- Text input-->
                                                    <div class="control-group">
							<div class="controls">
							<label class="control-label" for="userid">User ID</label>
							<input class="form-control" type="hidden" name="userid" value="<?php echo $data['userid']?>">
							<input class="form-control" value="<?php echo $data['userid']?>" disabled>
							</div>
                                                    </div>
							<!-- Text input-->
							<div class="control-group">
							  <label class="control-label" for="fname">First Name</label>
							  <div class="controls">
							    <input id="fname" name="fname" type="text" placeholder="first name" class="form-control" disabled="" value="<?php echo $data['fname']?>">
							    
							  </div>
							</div>
                                                        <div class="control-group">
							  <label class="control-label" for="mname">Middle Name</label>
							  <div class="controls">
							    <input id="mname" name="mname" type="text" placeholder="middle name" class="form-control" disabled=""value="<?php echo $data['mname']?>">
							    
							  </div>
							</div>
                                                        <div class="control-group">
							  <label class="control-label" for="lname">Last Name</label>
							  <div class="controls">
                                                              <input id="lname" name="lname" type="text" placeholder="last name" class="form-control" disabled="" value="<?php echo $data['lname']?>">
							    
							  </div>
							</div>

							<!-- Text input-->
							<div class="control-group">
							  <label class="control-label" for="username">Username</label>
							  <div class="controls">
							    <input id="username" name="username" type="text" placeholder="Username" class="form-control" disabled="" value="<?php echo $data['username']?>">
							    
							  </div>
							</div>

							<!-- Text input-->
							<div class="control-group">
							  <label class="control-label" for="password">Password</label>
							  <div class="controls">
                                                              <input id="password" name="password" type="password" class="form-control" disabled="" value="<?php echo $data['password']?>">
							    
							  </div>
							</div>
                                                        
                                                         <!-- Text input-->
							<div class="control-group">
							  <label class="control-label" for="bankname">Blood Bank</label>
							  <div class="controls">
                                                              <input id="bankname" name="bankname" type="text" class="form-control" disabled="" value="<?php echo $data['bankname']?>">
							    
							  </div>
							</div>


							<!-- Select Basic -->
							<div class="control-group">
							  <label class="control-label" for="usertype">User Type</label>
							  <div class="controls">
							    <select id="usertype" name="usertype" class="form-control">
							      <option>Admin</option>
                                                              <option>PRC User</option>
							    </select>
							  </div>
							</div>

							
					</div>
							<!--Buttons-->
							<div class="panel-footer">	
								<div class="form-actions text-center forms">
									<button type="submit" class="btn btn-warning">Update</button>
                                                                        <a class="btn" href="viewuser.php">Back</a>
								</div>		
						  	</div>			
						</form>
					</div>
				</div>		
			</div>
		
	
<!--edit @ footer.php-->
<?php
	include('footer.php');
?>
</body>
</html>
