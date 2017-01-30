<?php 
	include 'login_success.php';
	require 'dbconnect.php';

// User Input
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$perPage = isset($_GET['per-page']) && $_GET['per-page'] <= 50 ? (int)$_GET['per-page'] : 10;

// Positioning
$start = ($page > 1) ? ($page * $perPage) - $perPage : 0;

// Query
$pdo = Database::connect();
$collection = $pdo->prepare("
	SELECT SQL_CALC_FOUND_ROWS * 
	FROM collection 
	ORDER BY collid
	LIMIT {$start},{$perPage}
");
$collection->execute();

$collection = $collection->fetchAll(PDO::FETCH_ASSOC);



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
					<h2>Collection List</h2>
				</div>
				<div class="col-md-5 text-right" style="padding-top:20px;">
                                    <a href="BloodCollection.php?id="  class="btn btn-success btn-md"><span class="glyphicon glyphicon-plus-sign"></span>Add New Collection</a>
				</div>
			</div>
		<div class="table-responsive">
			<table class="table table-hover table-striped">
				<thead>
					<tr class="alert-info">
						<th>Donor No.</th>
						<th>Blood Bag No.</th>
						<th>Donor Name</th>
						<th>Collection Date</th>
						<th>Blood Bag Type</th>
						<th>Blood Type</th>
						<th class="text-center">Action</th>
						
					</tr>
				</thead>
				<tbody>					
					<?php								
						foreach ($collection as $row) {
							$bloodinfo = $pdo->prepare("SELECT * FROM bloodinformation WHERE bloodid = ?");
							$bloodinfo->execute(array($row['bloodinfo']));
							$bloodinfo = $bloodinfo->fetch(PDO::FETCH_ASSOC);
							echo '<tr>';
								echo '<td>'.$row['donorcollectid'] . '</td>';
								echo '<td>'. $row['unitserialno'] . '</td>';
								echo '<td>'.$row['cfname'].' '.  substr($row['cmname'], 0 , 1) . '. ' . $row['clname'] .'</td>';
								echo '<td>'.$row['collectiondate'].'</td>';
                                echo '<td>'.$row['bagtype'].'</td>';
                                echo '<td>'.$bloodinfo['bloodgroup'] . ' ' . $bloodinfo['rhtype'] . '</td>';	
                                                                
								echo '<td class="text-center">
											<a class="btn btn-primary btn-md" href="printcollection.php?id='.$row['donorcollectid'].'" data-toggle="tooltip" title="Update"><span class="glyphicon glyphicon-print"></span></a>	
							  		  </td>';
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