<?php 
include('login_success.php'); 

include('dbconnect.php');
?>

	<html lang="en">
	<head>
	  <title>PRCBBMIS</title>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  
	  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

	  <link rel="stylesheet" href="./css/custom_style.css">

	 </head>


	<body>


	<?php include('header.php'); //nav bar and header?> 

	<!-- PAGE TITLE -->
	
	
	<!-- Start of Content -->
	<div class="container-fluid">

	<div class="container-fluid content col-md-10" style="padding-left:210px;">
	<br>
		<div class="panel panel-primary">
			<div class="panel-heading content">
				<strong>Generate Report&nbsp;&nbsp;&nbsp;</strong>
			</div>
						
				<div class="panel-body" style="padding-left:30px;">
					<!--<form name="genrep" method="POST" action="orgreport.php">-->
					<div class="col-lg-11 forms">
					<!-- Activity -->
					<form name="report" method="POST" action="genreport.php">
						<div class="form-group">
							<label class="control-label" for="inputActivity">Category</label>
							<select class="form-control" required="required" id="inputActivity" name="category">
								<option value="none">-- Select Category --</option>
								<option value="donor">Donor</option>
								<option value="patient">Patient</option>
                                                                <option value="bd">Blood Dispensed</option>
                                                                <option value="btc">Blood Type Component</option>
                                                                <option value="bi">Blood Inventory</option>
                                                                <option value="patient">Hospital</option>
                                                                
							</select>
						</div>
					<p>-------------------------------------------------------------------------------------------------------------------------------------------------</p>

					<label class="control-label" for="checkOrg">Organization</label>
					<input type="checkbox" id="checkOrg" name="checkorg" value="1" onchange="toggleStatus()"> 
					
					<div id="f1">

						<!-- Organization Name -->
						<div class="form-group" style="padding-left:50px;">
							<label class="control-label" for="inputOrgName">Organization Name</label>
							<div class="input-group">
								<span class="input-group-btn">
									<select class="form-control" require="required" id="inputOrgName" name="orgrep" onChange="showUser(this.value)" disabled>
										<option selected="selected" disabled>-- Select Organization --</option>
									<?php
										$pdo = Database::connect();
										$sql = 'SELECT * FROM organization ORDER BY orgname';
										foreach ($pdo->query($sql) as $row) {
											echo '<option value="'. $row['orgid'] . '" >' . $row['orgname'] . '</option>';
										}
										Database::disconnect();
									?>
									</select>
								</span>
							</div>
						</div>

						<div class="form-group" style="padding-left:50px;">
							<label class="control-label" for="checkpart">Participants &nbsp;&nbsp;&nbsp;</label>
							<input type="checkbox" name="partcheck" value="1" id="checkpart" disabled>
						</div>

					</div>

					<script type="text/javascript">
						function showUser(str) {
							if (str == "") {
								document.getElementById("orgprofile").innerHTML = "";
								return;
							} else { 
								if (window.XMLHttpRequest) {
									// code for IE7+, Firefox, Chrome, Opera, Safari
									xmlhttp = new XMLHttpRequest();
								} else {
									// code for IE6, IE5
									xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
								}
								xmlhttp.onreadystatechange = function() {
									if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
										document.getElementById("orgprofile").innerHTML = xmlhttp.responseText;
									}
								};
								xmlhttp.open("GET","getuser.php?id="+str,true);
								xmlhttp.send();
							}
						}
					</script>

					<script>
						$(document).ready(function(){
							$('[data-toggle="tooltip"]').tooltip();   
						});
					</script>

					<p>-------------------------------------------------------------------------------------------------------------------------------------------------</p>
								
					
						
						<label class="control-label" for="checkTrees">Trees or Propagules</label>
						<input type="checkbox" id="checkTrees" name="toggle" onchange="toggleStatus()">
					<div id="f2">
						<div class="form-group" style="padding-left:50px;">
							<label class="control-label" for="checktreePlanted">Number of Trees or Propagules Planted &nbsp;&nbsp;&nbsp;</label>
							<input type="checkbox" name="treesplanted" id="checktreePlanted" disabled>
						</div>

						<div class="form-group" style="padding-left:50px;">
							<label class="control-label" for="checktreeLived">Number of Trees or Propagules Lived  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
							<input type="checkbox" name="treeslived" id="checktreeLived" disabled>
						</div>
						<div class="form-group" style="padding-left:50px;">
							<label class="control-label" for="checktreeWithered">Number of Trees or Propagules Withered &nbsp;</label>
							<input type="checkbox" name="treeswithered" id="checktreeWithered" disabled>
						</div>
						
					</div>	<!--end for tree form -->

					<p>-------------------------------------------------------------------------------------------------------------------------------------------------</p>

					<div>
						<label class="control-label" for="checkbud">Budget&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
						<input type="checkbox" name="budrep" value="1" id="checkbud">
					</div>
					<div>
						<label class="control-label" for="checkliq">Liquidation&nbsp;&nbsp;</label>
						<input type="checkbox" name="liqrep" value="1" id="checkliq">
					</div>
					<div>
						<label class="control-label" for="checkinc">Incident &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
						<input type="checkbox" name="increp" value="1" id="checkinc">
					</div>

				</div>
				<div class="form-actions text-center forms">
					<button type="submit" class="btn btn-success">Generate</button>
				</div>
				</form>
                </div>
		</div>
	</div>
</div>

	


	<script>
	$(document).ready(function(){
	$('.deleteB').click(function(){
		var value = $( this ).val();
		console.log(value);
		$('#deleteTextField').val(value);
	}); 
});
	function toggleStatus() {
    if ($('#checkTrees').is(':checked')) {
        $('#f2 :input').removeAttr('disabled');
        //
    } else {
        $('#f2 :input').attr('disabled', true);
    }

    if ($('#checkOrg').is(':checked')) {
        $('#f1 :input').removeAttr('disabled');
        //
    } else {
        $('#f1 :input').attr('disabled', true);
    }
	}
</script>


<?php
include('footer.php'); 
?>

</body>
</html>