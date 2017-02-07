<?php 
include 'login_success.php';
require 'dbconnect.php';

$id = $_REQUEST['id'];
$pdo = Database::connect();
$request = $pdo->prepare("SELECT * FROM bloodrequest WHERE reqid = ?");
$request->execute(array($id));
$request = $request->fetch(PDO::FETCH_ASSOC);

$patient = $pdo->prepare("SELECT * FROM patient WHERE pid = ?");
$patient->execute(array($request['pid']));
$patient = $patient->fetch(PDO::FETCH_ASSOC);

$blood = $pdo->prepare("SELECT * FROM bloodinformation WHERE bloodid = ?");
$blood->execute(array($patient['bloodinfo']));
$blood = $blood->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
	<body>
	<?php include 'header.php'; ?>
	
	<div class="container">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-offset-2 col-lg-8">
					<div class="panel panel-info">
						<div class="panel-heading">
							<h4>Blood Request Confirmation</h4>
						</div>

						<div class="panel-body">
							<div class="control-group">
								<label for="pname" class="control-label">Patient Name</label>
								<input class="form-control" type="text" value="<?php echo $patient['pfname']. ' ' . substr($patient['pmname'], 0, 1) . '. '. $patient['plname'] ?>" disabled>
							</div>
							<div class="control-group">
								<label for="" class="control-label">Blood Type</label>
								<input type="text" class="form-control" value="<?php echo $blood['bloodgroup'] . ' ' . $blood['rhtype'] ?>" disabled>
							</div>
							<div class="control-group">	
								<label for="component" class="control-label">Blood Component</label>
								<input type="text" class="form-control" value="<?php echo $request['component'] ?>" disabled>
							</div>
							<div class="control-group">	
								<label for="quantity" class="control-label">Quantity</label>
								<input type="text" class="form-control" value="<?php echo $request['quantity'] ?>" disabled>
							</div>
						</div>
						<div class="panel-footer text-center">
							<a href="php/confirmRequest.php?id=0&&pid=<?php echo $patient['pid'] ?>" class="btn btn-success">Approve</a>
							<a href="php/confirmRequest.php?id=1<?php echo $patient['pid'] ?>" class="btn btn-danger">Deny</a>
							<a href="viewrequest.php" class="btn">Back</a>	
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php include 'footer.php'; ?>
	</body>
</html>