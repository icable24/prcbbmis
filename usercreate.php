<?php 
	include 'login_success.php';
	require 'dbconnect.php';

	$id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    
     
   
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT *  FROM bloodbank WHERE status LIKE 'registered'";
        $q = $pdo->prepare($sql);
        $q->execute();
        $bank = $q->fetchAll(PDO::FETCH_ASSOC);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="./css/custom_style.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.theme.mis.css">
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
					<h2 style="text-align: center;">Register New PRC User</h2>
					<br />
				</div>
						
				<div class="panel panel-info">
					<div class="panel-heading">
						<h4>PRC User's Profile</h4>
					</div>
					
					<div class="panel-body">
						<form class="form-horizontal" action="./php/reguser.php" method="post" onsubmit="return Validate()" name="vForm">

							<!-- Text input-->
							<div class="control-group">
							  <label class="control-label" for="fname">First Name</label>
							  <div class="controls">
							    <input id="fname" name="fname" type="text" placeholder="first name" class="form-control" required="">
							    
							  </div>
							</div>
                                                        <div class="control-group">
							  <label class="control-label" for="mname">Middle Name</label>
							  <div class="controls">
							    <input id="mname" name="mname" type="text" placeholder="middle name" class="form-control" required="">
							    
							  </div>
							</div>
                                                        <div class="control-group">
							  <label class="control-label" for="lname">Last Name</label>
							  <div class="controls">
							    <input id="lname" name="lname" type="text" placeholder="last name" class="form-control" required="">
							    
							  </div>
							</div>

							<!-- Text input-->
							<div class="control-group">
							  <label class="control-label" for="username">Username</label>
							  <div class="controls">
							    <input id="username" name="username" type="text" placeholder="Username" class="form-control textInput" required="">
							    <div id="uname_error" class="val_error"></div>
							  </div>
							</div>

							<!-- Text input-->
							<div class="control-group">
							  <label class="control-label" for="password">Password</label>
							  <div class="controls">
                                                              <input id="password" name="password" type="password" class="form-control textInput" required="">
							    <div id="pass_error" class="val_error"></div>
							  </div>
							</div>
                                                        <!-- Text input-->
                                                       <div class="control-group">
							  <label class="control-label" for="bankname">Blood Bank</label>
							  <div class="controls">
                                                              <select class="form-control" id="bankname" name="bankname">
                                                              <?php
                                                              foreach($bank as $row){
                                                                 echo '<option value="'.$row['bankname'].'">'.$row['bankname'].'</option>';
                                                              }
                                                              ?>
                                                              </select>
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

							
					
							<!--Buttons-->
							<div class="panel-footer">	
								<div class="form-actions text-center forms">
									<button type="submit" class="btn btn-success" onclick="CheckLength('password') ">Submit</button>
                                                                        <a class="btn" href="viewuser.php">Back</a>
								</div>		
						  	</div>		
						</form>
                                            </div>
                                        </div>
				</div>		
			</div>

<script>
function CheckLength(name) {

            var password = document.getElementById(name).value;

            if (password.length < 4){

                alert('Password is too short!');
                die();
            }if (password.length > 8){

                alert('Password is too long!');
                die();
            }
        }
    </script>
 ?>
<!--edit @ footer.php-->
<?php
	include('footer.php');
?>
</body>
</html>


<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog "> 

    <!-- Modal content-->
    <div class="modal-content" style="margin-top: 40%">
      <div class="modal-header  btn-danger">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Error Username!</h4>
      </div>
      <div class="modal-body">
Username Already Exist!.
<p><center>
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button></p></center>
			</div>
      </div>
     
        
      </div>       
      </div>
<?php 


$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
if(strpos($url, 'error=username')!==false){
	echo "<script type='text/javascript'>
			$(document).ready(function(){
				$('#myModal').modal('show');
			});
		  </script>";
}


// include '/php/addcollection.php';

