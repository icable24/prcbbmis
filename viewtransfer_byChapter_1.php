<?php 
	require 'dbconnect.php';

// User Input
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$perPage = isset($_GET['per-page']) && $_GET['per-page'] <= 50 ? (int)$_GET['per-page'] : 10;

// Positioning
$start = ($page > 1) ? ($page * $perPage) - $perPage : 0;

// Query
$pdo = Database::connect();
$user = $pdo->prepare("
	SELECT SQL_CALC_FOUND_ROWS * 
	FROM transfer 
	ORDER BY requester
	LIMIT {$start},{$perPage}
");
$user->execute();

$user = $user->fetchAll(PDO::FETCH_ASSOC);

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
					<h2>Blood Request for Transfer</h2>
				</div>
                    <div class="col-md-5 text-right" style="padding-top:20px;">
                            <a href="viewtransfer.php" class="btn btn-success btn-md"><span class="glyphicon glyphicon-view"></span>View by Country</a>
				</div>
				
			</div>
		<div class="table-responsive">
			<table class="table table-hover table-striped">
				<thead>
					<tr class="alert-info">
                                                <th class="text-center">Requester</th>  
                                                <th class="text-center">Date Needed</th>
						<th class="text-center">Blood Component</th>
                                                <th class="text-center">Blood Type</th>
                                                <th class="text-center">Blood Bank</th>
						<th class="text-center">Remarks</th>
                                                <th class="text-center">Action</th>
						
					</tr>
				</thead>
				<tbody>					
					<?php
						require 'dbconnect.php';
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = 'SELECT * FROM transfer ORDER BY requester DESC';							
							foreach ($pdo->query($sql) as $row) {
								echo '<tr>';
									echo '<td>'.$row['requester'].'</td>';
                                                                        echo '<td>'.$row['dateneeded'].'</td>';
                                                                        echo '<td>'.$row['bloodcomponent'].'</td>';
                                                                        echo '<td>'.$row['bloodtype'].'</td>';
									echo '<td>'.$row['bankname'].'</td>';
									echo '<td>'.$row['remarks'].'</td>';
									echo '<td class="text-center">
											<a class="btn btn-primary btn-md" href="printfortransfer_byChapter.php?id='.$row['rtid'].'" data-toggle="tooltip" title="Print"><span class="glyphicon glyphicon-print"></span></a>
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
    <br><br> <br><br> <br><br> <br><br> <br><br> <br><br> <br><br>
<!--edit @ footer.php-->
<?php
	include('footer.php');
?>
</body>
</html>