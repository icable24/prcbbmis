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
	FROM user 
	ORDER BY fname
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
					<h2>PRC User List</h2>
				</div>
				<div class="col-md-5 text-right" style="padding-top:20px;">
					<a href="usercreate.php" class="btn btn-success btn-md"><span class="glyphicon glyphicon-plus-sign"></span> Add PRC User</a>
				</div>
			</div>
		<div class="table-responsive">
			<table class="table table-hover table-striped">
				<thead>
					<tr class="alert-info">
                                            <th class="text-center">Name</th>  
                                            <th>Username</th>
                                            <th>User Type</th>
                                            <th>Blood Bank</th>
                                            <th class="text-center">Action</th>
					</tr>
				</thead>
				<tbody>					
					<?php
						require 'dbconnect.php';
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = 'SELECT * FROM user ORDER BY fname DESC';							
							foreach ($pdo->query($sql) as $row) {
								echo '<tr>';
									echo '<td>'.$row['lname']. ', ' . $row['fname'] .' ' . $row['mname'].'</td>';
									echo '<td>'.$row['username'].'</td>';
									echo '<td>'.$row['usertype'].'</td>';
                                                                        echo '<td>'.$row['bankname'].'</td>';
									echo '<td class="text-center">
												<a class="btn btn-warning btn-md" href="userupdate.php?id='.$row['userid'].'" data-toggle="tooltip" title="Update"><span class="glyphicon glyphicon-edit"></span></a>
												<a class="btn btn-danger btn-md" href="userdelete.php?id='.$row['userid'].'" data-toggle="tooltip" title="Update"><span class="glyphicon glyphicon-trash"></span></a>
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