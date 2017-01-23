<!DOCTYPE html>
<?php 
	include 'login_success.php';
?>

<?php 
	require 'dbconnect.php';
    
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM patient where pname = ?";
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
<input type="text" class="form-control" required id="name" name="name" placeholder=" name" data-toggle="modal" data-target="#myModal" value="<?php 

$id = $_REQUEST['id'];
if($id != null){
	echo $id;
}else{
	echo "";
}?> ">
<div class="control-group">
                            <label class="control-label" for="bloodtype">Blood Type</label>
                            <select class="form-control" required="bloodtype" id="bloodtype" name="bloodtype">
                                <option></option>
                                <option value="">A</option>
                                <option value="">B</option>
                                <option value="">O</option>
                                <option value="">AB</option>
                                <option value="">-A</option>
                                <option value="">-B</option>
                                <option value="">-O</option>
                                <option value="">-AB</option>
                                </select>
                        </div>


<div class="control-group ">
<label for="requestno">Request No.</label>
<input type="text" class="form-control" required id="requestno" name="requestno" placeholder="Request No.">
</div>

<div class="control-group">
<label for="hospital">Hospital</label>
<input type="text" class="form-control" required id="hospital" name="hospital" placeholder="Hospital">
</div>

<div class="control-group">
<label for="component">Component</label>
<input type="text" class="form-control" required id="component" name="component" placeholder="Component">
</div>

<div class="control-group">
							  <label class="control-label" for="transfusion">Transfusion</label>
							  	<input type="radio" name="transfusion" value="male" id="transfusion" checked> Yes
			  					<input type="radio" name="transfusion" value="female" id="transfusion"> No
							  </div>

<div class="control-group">
<label for="quantity">Quantity</label>
<input type="text" class="form-control" required id="quantity" name="quantity" placeholder="Quantity">
</div>

<div class="control-group">
<label for="diagnosis">Diagnosis</label>
<input type="text" class="form-control" required id="diagnosis" name="diagnosis" placeholder="Diagnosis">
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
									echo '<td>'.$row['pfname']. ' ' . $row['pfname'].'. ' . $row['plname'].'</td>';
									echo '<td class="text-center">
													<a class="btn btn-primary btn-md" href="bloodrequest.php?id='.$row['pid'].'" data-toggle="tooltip" title="Update"><span class="glyphicon glyphicon-edit">
									  		  </td>';
								echo '</tr>';
							}
							Database::disconnect();
						?>
					</tbody>
				</table>
			</div>
      </div>
      <div class="modal-footer">
      	<button type="submit" class="btn btn-primary">Save</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<br>

 <div class="text-center">
<button type="submit" class="btn btn-primary" >Save</button>
<button type="submit" class="btn btn-primary">Search</button>
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
