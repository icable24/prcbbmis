<?php 
	include 'login_success.php';
	require 'dbconnect.php';

	$id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    if ( null==$id ) {
        header("Location: viewactivityscheduling.php");
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM activityschedule where actid = ?";
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
        <link rel="stylesheet" href="./css/datepicker.css"
	<link rel="stylesheet" type="text/css" href="css/bootstrap.theme.mis.css">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="/resources/demos/style.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>
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
					<h2 style="text-align: center;">Update Activity</h2>
					<br />
				</div>
						
				<div class="panel panel-info">
					<div class="panel-heading">
						<h4>Activity Scheduling</h4>
					</div>
					
					<div class="panel-body">
                                            <form class="form-horizontal" action="./php/update_activityscheduling.php" method="post">

                                                 <!-- Text input-->
                                                    <div class="control-group">
							<div class="controls">
							<label class="control-label" for="actid">Activity Scheduling ID</label>
							<input class="form-control" type="hidden" name="actid" value="<?php echo $data['actid']?>">
							<input class="form-control" value="<?php echo $data['actid']?>" disabled>
							</div>
                                                    </div>
							<!-- Text input-->
							<div class="control-group">
							  <label class="control-label" for="actname">Activity Name</label>
							  <div class="controls">
							    <input id="actname" name="actname" type="text" placeholder="Activity Name" class="form-control" value="<?php echo $data['actname']?>">
							    
							  </div>
							</div>

							<!-- Text input-->
							<div class="control-group">
							  <label class="control-label" for="detail">Details</label>
							  <div class="controls">
                                                              <textarea id="detail" name="detail" placeholder="Details" class="form-control"><?php echo $data['detail']?></textarea>
							    
							  </div>
							</div>

							<!-- Text input-->
							<div class="control-group">
							  <label class="control-label" for="place">Place</label>
							  <div class="controls">
							    <input id="place" name="place" type="text" placeholder="Place" class="form-control" value="<?php echo $data['place']?>">
							    
							  </div>
							</div>

							<!-- Text input-->
							<div class="control-group">
							  <label class="control-label" for="date">Date</label>
							  <div class="controls">
                                  <input id="date" name="date" type="date" class="form-control datepicker" value="<?php echo $data['date']?>">
                                 	 <script src="js/jquery-1.9.1.min.js"></script>
										<script src="js/bootstrap-datepicker.js"></script>
										<script type="text/javascript">
											// When the document is ready
											$(document).ready(function () {
												
												$('#date').datepicker({
													format: "yyyy-mm-dd"
												});  
											
											});
									</script>
							    
							  </div>
							</div>


					</div>
							<!--Buttons-->
							<div class="panel-footer">	
								<div class="form-actions text-center forms">
									<button type="submit" class="btn btn-warning">Update</button>
                                                                        <a class="btn" href="viewactivityscheduling.php">Back</a>
								</div>		
						  	</div>	
						
						</form>
					</div>
				</div>		
			</div>
		</div>
<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog "> 

    <!-- Modal content-->
    <div class="modal-content" style="margin-top: 40%">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Error Date!</h4>
      </div>
      <div class="modal-body">
Date already has a Schedule, Please pick another Date to set your Activity.
<p><center>
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button></p></center>
			</div>
      </div>
     
        
      </div>       
      </div>
    </div>
  </div>
</div>
	<?php 


$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
if(strpos($url, 'error=date')!==false){
	echo "<script type='text/javascript'>
			$(document).ready(function(){
				$('#myModal').modal('show');
			});
		  </script>";
}
// include '/php/addcollection.php';


 ?>
	
<!--edit @ footer.php-->
<?php
	include('footer.php');
?>
</body>
</html>
