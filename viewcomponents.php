<?php 
	include 'login_success.php';
	require 'dbconnect.php';

	$id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }else{
		header("Location: components_prep.php");
	}

	$pdo = Database::connect();

	$component = $pdo->prepare("SELECT * FROM componentsprep WHERE prepid = ?");
	$component->execute(array($id));
	$component = $component->fetch(PDO::FETCH_ASSOC);

	$bag = $pdo->prepare("SELECT * FROM bloodbag WHERE unitserialno = ?");
	$bag->execute(array($component['bagserialno']));
	$bag = $bag->fetch(PDO::FETCH_ASSOC);

	$bloodinfo = $pdo->prepare("SELECT * FROM bloodinformation WHERE bloodid = ?");
	$bloodinfo->execute(array($bag['bloodinfo']));
	$bloodinfo = $bloodinfo->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="./css/custom_style.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.theme.mis.css">
	<link rel="stylesheet" href="css/datepicker.css">
	<link rel="stylesheet" href="css/bootstrap-datetimepicker.min.css">
</head>
<body>
<?php include 'header.php'; ?>
	<div class="container">
		<div class="col-lg-offset-2 col-lg-8">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h3 style="color: black;">Components Separation</h3>
				</div>
				<div class="panel-body">
					<form class="form-horizontal" action="php/addprep.php" method="post">
						<input type="hidden" name="prepid" value="<?php echo $component['prepid'] ?>">
						<div class="control-group">
							<label class="control-label">Bag Serial No.</label>
							<div class="controls">
								<input value="<?php echo $component['bagserialno'] ?>" class="form-control" disabled>
								<input type="hidden" name="bagserialno" value="<?php echo $component['bagserialno'] ?>">
							</div>				
						</div>
						<div class="control-group">
							<label class="control-label">Bag Type</label>
							<div class="controls">
								<input value="<?php echo $bag['bagtype'] ?>" class="form-control" disabled>
								<input type="hidden" name="bagtype" value="<?php echo $bag['bagtype'] ?>">
							</div>				
						</div>
						<div class="control-group">
							<label class="control-label">Blood Type</label>
							<div class="controls">
								<input value="<?php echo $bloodinfo['bloodgroup'] . ' ' . $bloodinfo['rhtype'] ?>" class="form-control" disabled>
								<input type="hidden" name="bloodinfo" value="<?php echo $bloodinfo['bloodid'] ?>">
							</div>				
						</div>
						<br>
						<?php if($bag['bagtype'] == 'Apheresis Platelet'){ ?>
							<div class="panel panel-info">
								<label class="control-label">&nbsp;&nbsp;&nbsp;Apheresis Platelet:</label>
								<div class="panel-body">
									<div class="col-lg-12">
										<div class="control-group">
											<label class="control-label">Amount</label>
											<div class="controls">
												<input type="text" name="component5" class="form-control" required="">
											</div>				
										</div>
									</div>
								</div>			
							</div>
						<?php }else{ ?>
							<div class="panel panel-info">
								<label class="control-label">&nbsp;&nbsp;&nbsp;Packed Red Blood Cell:</label>
								<div class="panel-body">
									<div class="col-lg-12">
										<div class="control-group">
											<label class="control-label">Amount</label>
											<div class="controls">
												<input type="text" name="component1" class="form-control" required="" min="100" max="450">
											</div>				
										</div>
									</div>
								</div>
								<label class="control-label">&nbsp;&nbsp;&nbsp;Fresh Frozen Plasma:</label>
								<div class="panel-body">
									<div class="col-lg-12">
										<div class="control-group">
											<label class="control-label">Amount</label>
											<div class="controls">
												<input type="text" name="component2" class="form-control" required="">
											</div>				
										</div>
									</div>
								</div>
								<label class="control-label">&nbsp;&nbsp;&nbsp;Platelet Concentrate:</label>
								<div class="panel-body">
									<div class="col-lg-12">
										<div class="control-group">
											<label class="control-label">Amount</label>
											<div class="controls">
												<input type="text" name="component3" class="form-control" required="">
											</div>				
										</div>
									</div>
								</div>								
								<?php if($bag['bagtype'] == '450cc Quadruple'){ ?>
									<label class="control-label">&nbsp;&nbsp;&nbsp;Cryoprecipitate:</label>
									<div class="panel-body">
										<div class="col-lg-12">
											<div class="control-group">
												<label class="control-label">Amount</label>
												<div class="controls">
													<input type="text" name="component4" class="form-control" required="">
												</div>				
											</div>
										</div>
									</div>
								<?php } ?>
							</div>
								<?php } ?>
				</div>		
						<div class="panel-footer">	
							<div class="form-actions text-center forms">
								<button type="submit" class="btn btn-success">Submit</button>
                                <a class="btn" href="components_prep.php">Back</a>
							</div>		
					  	</div>	
					</form>
			</div>	
		</div>	
	</div>	
<?php include 'footer.php'; ?>
</body>
</html>