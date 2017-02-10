<?php 
	include 'login_success.php';
	require 'dbconnect.php';

    $username = $_SESSION['login_username'];
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM user WHERE username like  '$username'";
    $q = $pdo->prepare($sql);
    $q->execute();
    $user = $q->fetch(PDO::FETCH_ASSOC);
?>
<?php if($user['usertype'] == 'Admin') {?>
<!DOCTYPE html>
<html>
<head>
        <title>Philippine Red Cross Blood Bank Management Information System</title>
</head>
<body>
<?php include 'header.php'; ?>

<div class="container">
	<div class="col-lg-12">
		<div class="container-fluid">
			<?php 	
				function viewByCategory($category){
					if($category == 'Examination'){
			?>

				<div class="table-responsive">
	                <table class="table table-hover table-striped" id="myTable">
						<thead>
							<tr class="alert-info">
								<th>Donor ID</th>
								<th>Name</th>
								<th>Registration Date</th>
								<th>Remarks</th>
								<th class="text-center">Action</th>
							</tr>
						</thead>	
						<tbody>
							<?php 
								$pdo = Database::connect();
								$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
								$sql2 = "SELECT * FROM examination WHERE remarks like 'Pending'";
							    $q2 = $pdo->prepare($sql2);
							    $q2->execute();
							    $pending_exam = $q2->fetchAll(PDO::FETCH_ASSOC);

								foreach ($pending_exam as $row) {
									$sql3 = "SELECT * FROM donor WHERE did = ?";
									$q3 = $pdo->prepare($sql3);
									$q3->execute(array($row['examid']));
									$donor = $q3->fetch(PDO::FETCH_ASSOC);
									echo '<tr>';
										echo '<td>'.$row['examid'] . '</td>';
										echo '<td>'.$donor['dfname']. ' ' . substr($donor['dmname'],0,1) .'. ' . $donor['dlname'].'</td>';
										echo '<td>'.$donor['dregdate'].'</td>';
										echo '<td>'.$donor['dremarks'].'</td>';
										echo '<td class="text-center">
														<a class="btn btn-primary btn-md" href="viewexamination.php?id='.$donor['did'].'" data-toggle="tooltip" title="Update"><span class="glyphicon glyphicon-edit"></span></a>
										  		  </td>';
									echo '</tr>';
								}
							?>
						</tbody>		
					</table>
				</div>
				<?php } elseif($category == 'Screening') { ?>
					<div class="table-responsive">
	                <table class="table table-hover table-striped" id="myTable">
						<thead>
							<tr class="alert-info">
								<th>Donor ID</th>
								<th>Name</th>
								<th>Registration Date</th>
								<th>Remarks</th>
								<th class="text-center">Action</th>
							</tr>
						</thead>	
						<tbody>
							<?php 
								$pdo = Database::connect();
								$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
								$sql2 = "SELECT * FROM screening WHERE remarks like 'Pending'";
							    $q2 = $pdo->prepare($sql2);
							    $q2->execute();
							    $pending_screen = $q2->fetchAll(PDO::FETCH_ASSOC);

								foreach ($pending_screen as $row) {
									$sql3 = "SELECT * FROM donor WHERE did = ?";
									$q3 = $pdo->prepare($sql3);
									$q3->execute(array($row['scrid']));
									$donor = $q3->fetch(PDO::FETCH_ASSOC);
									echo '<tr>';
										echo '<td>'.$row['scrid'] . '</td>';
										echo '<td>'.$donor['dfname']. ' ' . substr($donor['dmname'],0,1) .'. ' . $donor['dlname'].'</td>';
										echo '<td>'.$donor['dregdate'].'</td>';
										echo '<td>'.$donor['dremarks'].'</td>';
										echo '<td class="text-center">
														<a class="btn btn-primary btn-md" href="viewscreening.php?id='.$donor['did'].'" data-toggle="tooltip" title="Update"><span class="glyphicon glyphicon-edit"></span></a>
										  		  </td>';
									echo '</tr>';
								}
							?>
						</tbody>		
					</table>
				</div>

				<?php }elseif($category == 'Request'){ ?>
					<div class="table-responsive">
						<table class="table table-hover table-striped" id="myTable">
							<thead>
								<tr class="alert-info">
									<th>Request No.</th>
									<th>Patient No.</th>
									<th>Patient Name</th>
									<th>Blood Type</th>
									<th>Component</th>
									<th class="text-center">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$pdo = Database::connect();
								$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
								$sql2 = "SELECT * FROM bloodrequest WHERE status like 'Pending'";
							    $q2 = $pdo->prepare($sql2);
							    $q2->execute();
							    $pending_request = $q2->fetchAll(PDO::FETCH_ASSOC);

								foreach($pending_request as $row){
									$patient = $pdo->prepare("SELECT * FROM patient WHERE pid = ?");
									$patient->execute(array($row['pid']));
									$patient = $patient->fetch(PDO::FETCH_ASSOC);

									$bloodinfo = $pdo->prepare("SELECT * FROM bloodinformation WHERE bloodid = ?");
									$bloodinfo->execute(array($patient['bloodinfo']));
									$bloodinfo = $bloodinfo->fetch(PDO::FETCH_ASSOC);
									echo '<tr>';
										echo '<td>' . $row['reqid']. '</td>';
										echo '<td>' . $patient['pid']. '</td>';
										echo '<td>' . $patient['pfname'] . ' ' .substr($patient['pmname'], 0, 1) . '. ' . $patient['plname'] . '</td>';
										echo '<td>' . $bloodinfo['bloodgroup'] . ' ' . $bloodinfo['rhtype'] . '</td>';
										echo '<td>' . $row['component'] . '</td>';
										echo '<td class="text-center">
														<a class="btn btn-primary btn-md" href="viewrequest.php?id='.$row['reqid'].'" data-toggle="tooltip" title="Update"><span class="glyphicon glyphicon-edit"></span></a>
										  		  </td>';
									echo '</tr>';
								}
								?>
							</tbody>
						</table>
					</div>	
                    <?php } elseif($category == 'Blood Transfer by Country') { ?>
					<div class="table-responsive">
                                       <table class="table table-hover table-striped" id="myTable">
						<thead>
							<tr class="alert-info">
								<th class="text-center">Requester</th>
                                                                <th class="text-center">Date Needed</th>
                                                                <th class="text-center">Blood Bank</th>
                                                                <th class="text-center">Blood Bank Address</th>
                                                                <th class="text-center">Remarks</th>
                                                                <th class="text-center">Action</th>
							</tr>
						</thead>	
						<tbody>
							<?php 
								$pdo = Database::connect();
								$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
								$sql2 = "SELECT * FROM bycountry WHERE remarks like 'pending'";
							    $q2 = $pdo->prepare($sql2);
							    $q2->execute();
							    $pending_screen = $q2->fetchAll(PDO::FETCH_ASSOC);

								foreach ($pending_screen as $row) {
									$sql3 = "SELECT * FROM bycountry WHERE cid = ?";
									$q3 = $pdo->prepare($sql3);
									$q3->execute(array($row['cid']));
									$donor = $q3->fetch(PDO::FETCH_ASSOC);
									echo '<tr>';
                                                                        echo '<td>'.$row['requester'].'</td>';
                                                                        echo '<td>'.$row['dateneeded'].'</td>';
                                                                        echo '<td>'.$row['bankname'].'</td>';
                                                                        echo '<td>'.$row['bankaddress'].'</td>';
									echo '<td>'.$row['remarks'].'</td>';
									echo '<td class="text-center">
														<a class="btn btn-warning btn-md" href="updatetransferbycountry.php?id='.$row['cid'].'" data-toggle="tooltip" title="Review"><span class="glyphicon glyphicon-eye-open"></span></a>
                                                                                                                <a class="btn btn-primary btn-md" href="printfortransfer.php?id='.$row['cid'].'" data-toggle="tooltip" title="Print"><span class="glyphicon glyphicon-print"></span></a>                                                                                                                
                                                                                         </td>';
									echo '</tr>';
								}
							?>
						</tbody>		
					</table>
				</div>
                    
                                <?php } elseif($category == 'Blood Transfer by Chapters/Hospitals') { ?>
					<div class="table-responsive">
                                         <table class="table table-hover table-striped" id="myTable">
                                            <thead>
							<tr class="alert-info">
								<th class="text-center">Requester</th>
                                                                <th class="text-center">Date Needed</th>
                                                                <th class="text-center">Blood Bank</th>
                                                                <th class="text-center">Blood Bank Address</th>
                                                                <th class="text-center">Remarks</th>
                                                                <th class="text-center">Action</th>
							</tr>
                                            </thead>	
						<tbody>
							<?php 
								$pdo = Database::connect();
								$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
								$sql2 = "SELECT * FROM transfer WHERE remarks like 'pending'";
							    $q2 = $pdo->prepare($sql2);
							    $q2->execute();
							    $pending_screen = $q2->fetchAll(PDO::FETCH_ASSOC);

								foreach ($pending_screen as $row) {
									$sql3 = "SELECT * FROM transfer WHERE rtid = ?";
									$q3 = $pdo->prepare($sql3);
									$q3->execute(array($row['rtid']));
									$donor = $q3->fetch(PDO::FETCH_ASSOC);
									echo '<tr>';
                                                                        echo '<td>'.$row['requester'].'</td>';
                                                                        echo '<td>'.$row['dateneeded'].'</td>';
                                                                        echo '<td>'.$row['bankname'].'</td>';
                                                                        echo '<td>'.$row['bankaddress'].'</td>';
									echo '<td>'.$row['remarks'].'</td>';
									echo '<td class="text-center">
											<a class="btn btn-warning btn-md" href="updatetransferbyChaptersHospital.php?id='.$row['rtid'].'" data-toggle="tooltip" title="Review"><span class="glyphicon glyphicon-eye-open"></span></a>
                                                                                        <a class="btn btn-primary btn-md" href="printfortransfer_byChapter.php?id='.$row['rtid'].'" data-toggle="tooltip" title="Print"><span class="glyphicon glyphicon-print"></span></a>                                                                                                                

										  		  </td>';
									echo '</tr>';
								}
							?>
						</tbody>		
					</table>
				</div>
                    
				<?php } }?>
			<ul class="nav nav-tabs nav-tabs-black">
                            <li class="active"><a data-toggle="tab" id="ex" href="#home" class="nav-tabs-black">Examination</a></li>
                            <li><a data-toggle="tab" href="#menu1" id="screen" class="nav-tabs-black">Screening</a></li>
                            <li><a data-toggle="tab" href="#menu2" id="req" class="nav-tabs-black">Request</a></li>
                                <li><a data-toggle="tab" href="#menu3" id="btransfer" class="nav-tabs-black">Blood Transfer</a></li>
			</ul>
                    <ul class="nav nav-tabs nav-tabs-black" hidden id="btransfers">
				<li><a data-toggle="tab" href="#menu4" class="nav-tabs-black">By Country</a></li>
				<li><a data-toggle="tab" href="#menu5" class="nav-tabs-black">By Chapters/Hospital</a></li>
			</ul>
			<div class="tab-content">
			    <div id="home" class="tab-pane fade in active">
					<br />
					<?php viewByCategory('Examination')?>
			    </div>
			    <div id="menu1" class="tab-pane fade">
					<br />
					<?php viewByCategory('Screening')?>
			    </div>
			    <div id="menu2" class="tab-pane fade">
					<br />
					<?php viewByCategory('Request')?>
			    </div>
			    <div id="menu4" class="tab-pane fade">
					<br />
					<?php viewByCategory('Blood Transfer by Country')?>
			    </div>
                            <div id="menu5" class="tab-pane fade">
					<br />
					<?php viewByCategory('Blood Transfer by Chapters/Hospitals')?>
			    </div>
			</div>
			<script>
				$(document).ready(function(){
					$('[data-toggle="tooltip"]').tooltip(); 
					$('.btn').tooltip();
				});
			</script>
                        <script>
$(document).ready(function(){
    $("#btransfer").click(function(){
        $("#btransfers").show();
    });
    $("#ex").click(function(){
        $("#btransfers").hide();
    });
    $("#screen").click(function(){
        $("#btransfers").hide();
    });
    $("#req").click(function(){
        $("#btransfers").hide();
    });
    });
</script>
		</div>	
	</div>
</div>

<?php include 'footer.php'; ?>
</body>
</html>
<?php }else{ 
	header("Location: ./home.php");
}?>