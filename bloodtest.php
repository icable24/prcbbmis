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
					<h2 style="text-align: center;">Blood Test</h2>
					<br />
				</div>
						
				<div class="panel panel-info">
					<div class="panel-heading">
						<h4 style="color: #333">Blood Test</h4>
					</div>
					<div class="panel-body">
						<form class="form-horizontal" action="./php/addbloodtest.php" method="post">
		

<form class="form-horizontal" action="./php/btest.php" method="post">
<ul class="text-field">

<div class="control-group">
<label for="testnumber">Test Number</label>
<p><input type="text" class="form-control" required id="testnumber" name="testnumber" placeholder="Test Num.">
</div>


<div class="control-group">
<label for="bloodbagserialnumber">Blood Bag Serial Number</label>
<input type="text" class="form-control" required id="bloodbagserialnumber" name="bloodbagserialnumber" placeholder="Serial Number">
</div>

<div class="control-group">
<label for="testtype">Test Type</label>
<input type="text" class="form-control" required id="testtype" name="testtype" placeholder="Request ID">
</div>

<div class="control-group">
<label for="result">Result</label>
<input type="text" class="form-control" required id="result" name="result" placeholder="Result">
</div>

<br>
<div class="text-center">
<button type="submit" class="btn btn-primary">Save</button>
<button type="submit" class="btn btn-primary">Search</button>
</div>

</table>
        <br><br><br><br>
										</form>
								</form>
						  	</div>		
						</form>
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
