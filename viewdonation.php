<?php 	
	include 'login_success.php';
	require 'dbconnect.php';

	if($_REQUEST != null){
		$id = $_REQUEST['id'];
	}
	$pdo = Database::connect();
	$donation = $pdo->prepare("SELECT * FROM collection WHERE collid = ?");
	$donation->execute(array($id));
	$donation = $donation->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<?php include 'header.php'; ?>
<body>
	<div class="container">
		<div class="row col-lg-offset-3">
            <div class="col-md-4">
                <h2>
                    &nbsp;&nbsp; Donation
                </h2>
            </div>
		</div>
		<?php include 'donor_side.php'; ?>
		<div class="col-lg-8">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h4>Donation</h4>
				</div>
				<div class="panel-body">
					<form class="form-horizontal">
						<div class="control-group">
							<label class="control-label">Collection Id</label>
							<input class="form-control" disabled="" value="<?php echo $donation['collid'] ?>"></input>
						</div>
						<div class="control-group">
							<label class="control-label">Name</label>
							<input class="form-control" disabled value="<?php echo $donation['cfname']. ' ' . substr($donation['cmname'],0,1). '. ' . $donation['clname'] ?>"></input>
						</div>
						<div class="control-group">
							<label class="control-label">Donor Date</label>
							<input class="form-control" disabled value="<?php echo $donation['collectiondate'] ?>"></input>
						</div>
				</div>
						<div class="panel-footer">	
							<div class="form-actions text-center forms">
								<a class="btn" href="donationlist.php?id=<?php echo $donation['donorcollectid']?>">Back</a>
							</div>		
					  	</div>		
					</form>	
			</div>
		</div>
	</div>
</body>
<?php include 'footer.php'; ?>
</html>