<?php 
	require 'dbconnect.php';

// User Input
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$perPage = isset($_GET['per-page']) && $_GET['per-page'] <= 50 ? (int)$_GET['per-page'] : 10;

// Positioning
$start = ($page > 1) ? ($page * $perPage) - $perPage : 0;

// Query
$pdo = Database::connect();
$dispensing = $pdo->prepare("
	SELECT SQL_CALC_FOUND_ROWS * 
	FROM dispensing
	LIMIT {$start},{$perPage}
");
$dispensing->execute();

$dispensing = $dispensing->fetchAll(PDO::FETCH_ASSOC);

// Pages
$total = $pdo->query("SELECT FOUND_ROWS() as total")->fetch()['total'];
$pages = ceil($total / $perPage);
?>
<!--Start of Html-->
<!DOCTYPE html>
<html>
<head>

</head>
<body>

	<?php 
		include('header.php');
	?>
	 <div class="container">
	<div class="col-lg-12">
		<div class="row" style="border-bottom:solid 1px;margin-bottom:15px;">
				<div class="col-md-7">
					<h2>Dispensing List</h2>
				</div>
				<div class="col-md-5 text-right" style="padding-top:20px;">
                                    <a href="viewrequest.php" class="btn btn-success btn-md"><span class="glyphicon glyphicon-plus-sign"></span>Add New Dispensing</a>
				</div>
			</div>
		<div class="table-responsive">
			<table class="table table-hover table-striped">
				<thead>
					<tr class="alert-info">
						<th>Dispensing Date</th>
						<th>Request ID</th>
						<th>Patient</th>
                        <th>Blood Type</th>
						<th>Received by</th>
						<th>Contact</th>
					</tr>
				</thead>
				<tbody>					
					<?php								
						foreach ($dispensing as $row) {
							$pdo = Database::connect();
							$query1 = $pdo->prepare("SELECT * FROM bloodrequest WHERE reqid = ? ");
							$query1->execute(array($row['reqid']));
							$query1 = $query1->fetch(PDO::FETCH_ASSOC);
							$patient = $pdo->prepare("SELECT * FROM patient WHERE pid = ?");
							$patient->execute(array($query1['pid']));
							$patient = $patient->fetch(PDO::FETCH_ASSOC);
							$blood = $pdo->prepare("SELECT * FROM bloodinformation WHERE bloodid = ?");
							$blood->execute(array($patient['bloodinfo']));
							$blood = $blood->fetch(PDO::FETCH_ASSOC);
							echo '<tr>';
								echo '<td>'.$row['dispensingdate'].'</td>';
								echo '<td>'.$row['reqid'].'</td>';
								echo '<td>'.$patient['pfname'] . ' ' . substr($patient['pmname'], 0, 1) . '. ' . $patient['plname'] . '</td>';
                                                                echo '<td>'.$blood['bloodgroup'] . ' ' . $blood['rhtype'] .'</td>';
                                                                echo '<td>'.$row['rname'].'</td>';
                                                                echo '<td>'.$row['rcontact'].'</td>';
							echo '</tr>';
						}
						Database::disconnect();
					?>
				</tbody>
			</table>
		</div>
		<nav class="text-center">
			  <ul class="pagination">
				<?php if($page > 1){?>
					<li>
					  <a href="?page=<?php echo $page-1; ?>&per-page=<?php echo $perPage; ?>" aria-label="Previous">
						<span aria-hidden="true">&laquo;</span>
					  </a>
					</li>
				<?php }?>
				
				<?php for($x = 1; $x <= $pages; $x++) : ?>
					<li <?php if($page === $x){ echo 'class="active"'; }?> ><a href="?page=<?php echo $x; ?>&per-page=<?php echo $perPage; ?>"><?php echo $x; ?></a></li>
				<?php endfor; ?>
				
				<?php if($page < $pages){?>
					<li>
					  <a href="?page=<?php echo $page+1; ?>&per-page=<?php echo $perPage; ?>" aria-label="Next">
						<span aria-hidden="true">&raquo;</span>
					  </a>
					</li>
				<?php }?>
				
			  </ul>
		</nav>
	</div>
         </div>

<!--edit @ footer.php-->
<?php
	include('footer.php');
?>
   
</body>
</html>