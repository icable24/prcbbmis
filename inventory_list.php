<?php 
	include 'login_success.php';
	require 'dbconnect.php';
?>
<!DOCTYPE html>
<html>
<body>
<?php include 'header.php'; ?>

	<div class="container">	
		<div class="row">
			<div class="col-lg-12">
				<div class="row" style="border-bottom:solid 1px;margin-bottom:15px;">
					<div class="col-md-7">
						<h2>Blood Inventory</h2>
					</div>
				</div>
				<div class="table-responsive">
					<table class="table table-hover">
						<thead>
							<tr class="alert-info">
								<th>Unit Serial Number</th>
								<th>Component</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

<?php include 'footer.php'; ?>
</body>
</html>