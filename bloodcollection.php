<?php 
	include 'login_success.php';
?>
<?php 
	require 'dbconnect.php';
    
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM donor where dfname = ?";
        $q = $pdo->prepare($sql);
        $data = $q->fetch(PDO::FETCH_ASSOC);
        Database::disconnect();
?>
<!DOCTYPE html>
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
					<h2 style="text-align: center;">Blood Collection</h2>
					<br />
				</div>
						
				<div class="panel panel-info">
					<div class="panel-heading">
						<h4 style="color: #333">Blood Collection</h4>
					</div>
					<div class="panel-body">
						<form class="form-horizontal" action="./php/addcollection.php" method="post">

<div class="control-group">
<label for="donorcollectid">Donor No.</label>
<input type="text" class="form-control" required id="donorcollectid" name="donorcollectid" placeholder="Donor No." data-toggle="modal" data-target="#myModal" value="<?php 

$id = $_REQUEST['id'];
if($id != null){
	echo $id;
}else{
	echo "";
}?> ">
</div>


<div class="control-group">
<label for="cfname">First Name</label>
<input type="text" class="form-control" required id="cfname" name="cfname" placeholder="First Name" value="<?php 

		$pdo1 = Database::connect();
        $pdo1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql1 = "SELECT * FROM donor where did = ?";
        $q1 = $pdo->prepare($sql1);
        $q1->execute(array($id));
        $data1 = $q1->fetch(PDO::FETCH_ASSOC);
        Database::disconnect();

        echo $data1['dfname']
?>">
</div>

<div class="control-group">
<label for="cmname">Middle Name</label>
<input type="text" class="form-control" required id="cmname" name="cmname" placeholder="First Name" value="<?php 


        echo $data1['dmname']
?>">
</div>

<div class="control-group">
<label for="clname">Last Name</label>
<input type="text" class="form-control" required id="clname" name="clname" placeholder="Last Name" value="<?php 

       echo $data1['dlname']
?>">
</div>


<div class="control-group">
                            <label class="control-label" for="bagtype">Blood Bag Used</label>
                            <select class="form-control" required="required" id="bagtype" name="bagtype" placeholder="Blood Bag Used">
                                <option></option>
                                <option value="250 cc">250 cc</option>
                                <option value="450 cc Single">450 cc Single</option>
                                <option value="50 cc Double">450 cc Double</option>
                                <option value="450 cc Triple">450 cc Triple</option>
                                <option value="450 cc Quadruple">450 cc Quadruple</option>
                                <option value="Apheresis Platelet">Apheresis Platelet</option>
                                <option value="FFP">FFP</option>
                                </select>
                        </div>
                       
                    

<div class="control-group">
<label for="unitserialno">Blood Bag Unit Serial Number</label>
<input type="text" class="form-control" required id="unitserialno" name="unitserialno" placeholder="Blood Bag Unit Serial Number">
</div>
<div class="control-group">
<label class="control-label" for="collectiondate">Date</label>
<div class="controls">
<input id="collectiondate" name="collectiondate" type="date" class="form-control" >
	<script src="js/jquery-1.9.1.min.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script type="text/javascript">
											// When the document is ready
	$(document).ready(function () {
		$('#collectiondate').datepicker({
		format: "yyyy-mm-dd"
		});  										
	});
									</script>
</div>

						<div class="control-group">
                            <label class="control-label" for="bloodtype">Blood Group</label>
                            <select class="form-control" required="required" id="bloodtype" name="bloodtype">
                                <option></option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="AB">AB</option>
                                <option value="O">O</option>
                                </select>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="rhtype">Rh Type</label>
                            <select class="form-control" required="required" id="rhtype" name="rhtype">
                                <option></option>
                                <option value="Positive">Positive</option>
                                <option value="Negative">Negative</option>
                                </select>
                        </div>
                        <br>
                        <div class="text-center">
 <!--modal-->


<button type="submit" id="showModal" class="btn btn-primary" >Save</button>
<button type="submit" class="btn btn-primary">Search</button>
</div>
</table>
		</div>
						  	</div>		
						</form>
					</div>
				</div>		
			</div>
		</div>
	</form>

<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog "> 

    <!-- Modal content-->
    <div class="modal-content" style="margin-top: 40%">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Donor List</h4>
      </div>
      <div class="modal-body">
      <?php 
      require 'dbconnect.php';
      $pdo = Database::connect();
	  $donor = $pdo->prepare("
		SELECT SQL_CALC_FOUND_ROWS * 
		FROM donor WHERE dremarks = 'Accepted'
	");
	$donor->execute();

	$donor = $donor->fetchAll(PDO::FETCH_ASSOC);
      ?>
    	<div class="table-responsive">
				<table class="table table-hover table-striped">
					<thead>
						<tr class="alert-info">
							<th>Donor ID</th>
							<th>Name</th>
							<th class="text-center">Action</th>
						</tr>
					</thead>	
					<tbody>					
						<?php								
							foreach ($donor as $row) {
								echo '<tr>';
									echo '<td>'. $row['did'] . '</td>';
									echo '<td>'.$row['dfname'] . ' ' . substr($row['dmname'], 0 , 1) . '. ' .  $row['dlname'].'</td>';
									echo '<td class="text-center">
													<a class="btn btn-primary btn-md" href="bloodcollection.php?id='.$row['did'].'" data-toggle="tooltip" title="Update"><span class="glyphicon glyphicon-edit">
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
<?php 


$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
if(strpos($url, 'error=name')!==false){
	echo "<script type='text/javascript'>
			$(showModal).ready(function(){
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
