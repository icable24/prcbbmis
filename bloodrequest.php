<!DOCTYPE html>
<?php 
	include 'login_success.php';
?>

<?php 
	require 'dbconnect.php';
    
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM patient WHERE pfname = ?";
        $q = $pdo->prepare($sql);
        $data = $q->fetch(PDO::FETCH_ASSOC);
        Database::disconnect();
?>
<html lang="en">
<head>
	<link rel="stylesheet" href="/xampp/htdocs/pr1/css/custom_style.css">
	<link rel="stylesheet" type="text/css" href="/xampp/htdocs/pr1/css/bootstrap.theme.mis.css">
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
					<h2 style="text-align: center;">Blood Request</h2>
					<br />
				</div>
						
				<div class="panel panel-info">
					<div class="panel-heading">
						<h4 style="color: #333">Request</h4>
					</div>
					<div class="panel-body">
						<form class="form-horizontal" action="./php/addrequest.php" method="post">

<div class="control-group">
<label for="name">Patient No.</label>
<input type="text" class="form-control" required id="pid" name="pid" placeholder="Name" data-toggle="modal" data-target="#myModal" value="<?php 

$id = $_REQUEST['id'];
if($id != null){
	echo $id;
}else{
	echo "";
}?> ">
<?php 
			$d = $pdo->prepare("SELECT * FROM patient WHERE pid = ?");
			$d->execute(array($id));
			$d = $d->fetch(PDO::FETCH_ASSOC);

			$blood = $pdo->prepare("SELECT * FROM bloodinformation WHERE bloodid = ?");
			$blood->execute(array($d['bloodinfo']));
			$blood = $blood->fetch(PDO::FETCH_ASSOC);

?>
</div>
	<div class="control-group">
		<label class="control-label">Patient Name</label>
			<input disabled="" class="form-control" value="<?php echo $d['pfname'] . ' ' . substr($d['pmname'], 0, 1) . '. ' . $d['plname']; 
			?>
			">
			</input>
	</div>
			<div class="control-group">
                <label class="control-label">Blood Type</label>
                <input class="form-control" value="<?php echo $blood['bloodgroup'] . ' ' . $blood['rhtype'] ?>" disabled></input>
                <input type="hidden" name="bloodgroup" value="<?php echo $blood['bloodgroup'] ?>">
                <input type="hidden" name="rhtype" value="<?php echo $blood['rhtype'] ?>">
            </div>


<div class="control-group">
	<label for="component">Component</label>
	<select class="form-control" name="component" id="component" required="">
		<option></option>
		<option>Whole Blood</option>
		<option>FFP</option>
		<option>Packed RBC</option>
		<option>Cryoprecipitate</option>
		<option>Platelet Concentrate</option>
	</select>
</div>

<div class="control-group">
	<label for="amount" class="control-label">Amount</label>
	<select class="form-control" name="amount" id="amount" required="">
		<option></option>
		<option>450cc</option>
	</select>
</div>

<div class="control-group">
	<label for="quantity" class="control-label">Quantity</label>
	<input class="form-control" name="quantity" id="quantity" required="" type="number"></input>
</div>



<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog "> 

    <!-- Modal content-->
    <div class="modal-content" style="margin-top: 40%">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Patient List</h4>
      </div>
      <div class="modal-body">
      <?php 
      require 'dbconnect.php';
      $pdo = Database::connect();
	  $patient = $pdo->prepare("
		SELECT SQL_CALC_FOUND_ROWS * 
		FROM patient;
	");
	$patient->execute();

	$patient = $patient->fetchAll(PDO::FETCH_ASSOC);
      ?>
    	<div class="table-responsive">
				<table class="table table-hover table-striped">
					<thead>
						<tr class="alert-info">
							<th>Patient ID</th>
							<th>Patient</th>
							<th class="text-center">Action</th>
						</tr>
					</thead>	
					<tbody>					
						<?php								
							foreach ($patient as $row) {
								echo '<tr>';
									echo '<td>'. $row['pid'] . '</td>';
									echo '<td>'.$row['pfname'] . ' ' . substr($row['pmname'], 0, 1). '. ' . $row['plname'] . '</td>';
									echo '<td class="text-center">
													<a class="btn btn-primary btn-md" href="bloodrequest.php?id='.$row['pid'].'" data-toggle="tooltip" title="Select"><span class="glyphicon glyphicon-edit">
									  		  </td>';
								echo '</tr>';
							}
							Database::disconnect();
						?>
					</tbody>
				</table>
			</div>
      </div>
    </div>
  </div>
</div>
<br>

 <div class="text-center">
<button type="submit" class="btn btn-success" >Save</button>
<a href="viewrequest.php">Back</a>
</div>	
</table>
</div>
        						</form>		
					</div>
				
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
