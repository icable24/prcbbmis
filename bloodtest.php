<?php 
	include 'login_success.php';
	require 'dbconnect.php';

	$pdo = Database::connect();
	$test = $pdo->prepare("SELECT * FROM bloodbag WHERE status LIKE 'For Testing'");
	$test->execute();
	$test = $test->fetchAll(PDO::FETCH_ASSOC);
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
		<div class="col-lg-12">
	
		</div>
	</div>
	<?php
		include('footer.php');
	?>
</body>
</html>