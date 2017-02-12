<?php 
	include 'login_success.php';
	require 'dbconnect.php';

	$id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    if ( null==$id ) {
        header("Location: donorlist.php");
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM donor WHERE did = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        Database::disconnect();
    }

    $pdo2 = Database::connect();
    $pdo2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql2 = "SELECT * FROM examination WHERE examid = ?";
    $q2 = $pdo2->prepare($sql2);
    $q2->execute(array($id));
    $data2 = $q2->fetch(PDO::FETCH_ASSOC);
    Database::disconnect();
?>
<!DOCTYPE html>
<html lang="en">
<head>
		<!-- CSS import Files -->
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="./jquery-timepicker-1.3.2/jquery.timepicker.min.css">
        <link rel="stylesheet" href="./css/custom_style.css">

      
        <!-- JQuery and Javascript File -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="./jquery-timepicker-1.3.2/jquery.timepicker.min.css"></script>
        <title>Philippine Red Cross Blood Bank Management Information System</title>
</head>
<body>
	<!--Header edit @ header.php-->
	<?php 
		include('header.php')  
	?>

	<!-- MAIN PAGE -->
			<!--Form Starts Here-->
		<div class="container">
			
			<div class="row col-lg-offset-3">
				<div class="col-md-4">
					<h2>
						&nbsp;&nbsp; Examination
					</h2>
				</div>
			</div>
			<?php 
				include 'donor_side.php'
			?>
			<div class="col-lg-8">
						
				<div class="panel panel-info">
					<div class="panel-heading">
						<h4><?php echo $data['dfname'] . ' ' . substr($data['dmname'], 0 , 1) . '. ' . $data['dlname'] ?></h4>
					</div>
					
					<div class="panel-body">
						<form class="form-horizontal" action="./php/update_examination.php" method="post">

							<input class="form-control" type="hidden" name="did" value="<?php echo $data['did']?>">
							<div class="control-group">
								<label class="control-label" for="did">Donor ID</label>
								<div class="controls">
									<input id="did" type="text"  class="form-control" value="<?php echo 'D02-' . $data['did'] ?>" disabled>							    
							  </div>
							</div>
							<!-- Text input-->
							<div class="control-group">
								<label class="control-label" for="bldpressure">Blood Pressure</label><label class="control-label eg">(eg. 120/80)</label>
								<div class="controls">
									<input id="bldpressure" name="bldpressure" type="text" placeholder="Blood Pressure" class="form-control" required="" value="<?php echo $data2['bldpressure'] ?>">							    
							  </div>
							</div>

							<!-- Text input-->
							<div class="control-group">
							  <label class="control-label" for="pulserate">Pulse Rate</label><label class="control-label eg">(Beats per minute)</label>
							  <div class="controls">
							    <input id="pulserate" name="pulserate" type="Number" placeholder="Pulse Rate" class="form-control" required="" value="<?php echo $data2['pulserate'] ?>">
							    
							  </div>
							</div>

							<!-- Text input-->
							<div class="control-group">
							  <label class="control-label" for="bodytemp">Body Temperature</label><label class="control-label eg">(in &deg;C)</label>
							  <div class="controls">
							    <input id="bodytemp" name="bodytemp" type="Number" step="any" placeholder="Body Temperature" class="form-control" required="" value="<?php echo $data2['bodytemp'] ?>">
							    
							  </div>
							</div>


							<!-- Text input-->
							<div class="control-group">
								<label class="control-label" for="genapp">General Appearance</label>
							    <div class="controls">
							    	<input id="genapp" name="genapp" type="text" placeholder="General Appearance" class="form-control" required="" value="<?php echo $data2['genapp'] ?>">
							  	</div>
							</div>

							<!-- Text input-->
							<div class="control-group">
								<label class="control-label" for="skin">Skin</label>
							    <div class="controls">
							    	<input id="skin" name="skin" type="text" placeholder="Skin" class="form-control" required=""  value="<?php echo $data2['skin'] ?>">
							  	</div>
							</div>

							<!-- Text input-->
							<div class="control-group">
								<label class="control-label" for="heent">HEENT</label>
							    <div class="controls">
							    	<input id="heent" name="heent" type="text" placeholder="Head, Eyes, Ears, Nose, and Throat" class="form-control" required="" value="<?php echo $data2['heent'] ?>">
							  	</div>
							</div>

							<!-- Text input-->
							<div class="control-group">
								<label class="control-label" for="hnl">Heart and Lungs</label>
							    <div class="controls">
							    	<input id="hnl" name="hnl" type="text" placeholder="Heart and Lungs" class="form-control" required="" autocomplete="off" value="<?php echo $data2['hnl'] ?>">
							  	</div>
							</div>

							<!-- Text input-->
							<div class="control-group">
								<label class="control-label" for="remarks">Remarks</label>
							    <div class="controls">
								    <select id="remarks" name="remarks" class="form-control" required="">
								     	<option></option>
								    	<option <?php if($data2['remarks'] == 'Accepted') echo 'selected="selected"'; ?>>Accepted</option>
								    	<option <?php if($data2['remarks'] == 'Deferred') echo 'selected="selected"'; ?>>Deferred</option>
								    	<option <?php if($data2['remarks'] == 'Temporarily Deferred') echo 'selected="selected"'; ?>>Temporarily Deferred</option>
								    </select>
							  	</div>
							</div>

							<!-- Text input-->
							<div class="control-group" hidden="">
								<label class="control-label" for="reason">Reason</label>
							    <div class="controls">
							    	<input id="reason" name="reason" type="text" placeholder="Reasons" class="form-control" autocomplete="off">
							  	</div>
							</div>	

					</div>
							<!--Buttons-->
							<div class="panel-footer">	
								<div class="form-actions text-center forms">
									<button type="submit" class="btn btn-success">Submit</button>
									<a class="btn" href="viewexamination.php?id=<?php echo $_GET['id']?>">Back</a>
								</div>		
						  	</div>		
						</form>
					</div>
				</div>		
			</div>
		</div>

		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document" >
			<div class="modal-content" style="margin-top:40%;">
				<div class="modal-header btn-danger">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Delete Patient</h4>
				</div>
				<form class="form-horizontal" action="./php/donor_delete.php" method="post">
					<div class="modal-body content">
						<input type="hidden" name="delid" id="deleteTextField" value="<?php echo $_GET['id'] ?>"/>
						<div class="alert alert-danger" role="alert">Are you sure you want to delete this donor?</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
						<button type="submit" class="btn btn-danger">Delete</button>
					</div>
				</form>
			</div>
		</div>
  	</div>

	<?php 
		include('footer.php');
	?>

</body>
</html>

