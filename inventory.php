<?php 
	include 'login_success.php';
	require 'dbconnect.php';

	$pdo = Database::connect();
	//A Positive
	$apos1 = $pdo->prepare("SELECT COUNT(*) FROM inventory WHERE bloodinfo = '1' AND component = 'Apheresis Platelet'");
	$apos1->execute();
	$apos1 = $apos1->fetch();

	$apos2 = $pdo->prepare("SELECT COUNT(*) FROM inventory WHERE bloodinfo = '1' AND component = 'Cryoprecipitate'");
	$apos2->execute();
	$apos2 = $apos2->fetch();

	$apos3 = $pdo->prepare("SELECT COUNT(*) FROM inventory WHERE bloodinfo = '1' AND component = 'Fresh Frozen Plasma'");
	$apos3->execute();
	$apos3 = $apos3->fetch();

	$apos4 = $pdo->prepare("SELECT COUNT(*) FROM inventory WHERE bloodinfo = '1' AND component = 'Packed Red Blood Cell'");
	$apos4->execute();
	$apos4 = $apos4->fetch();

	$apos5 = $pdo->prepare("SELECT COUNT(*) FROM inventory WHERE bloodinfo = '1' AND component = 'Platelet Concentrate'");
	$apos5->execute();
	$apos5 = $apos5->fetch();

	$apos6 = $pdo->prepare("SELECT COUNT(*) FROM inventory WHERE bloodinfo = '1' AND component = 'Whole Blood'");
	$apos6->execute();
	$apos6 = $apos6->fetch();

	//A Negative
	$aneg1 = $pdo->prepare("SELECT COUNT(*) FROM inventory WHERE bloodinfo = '2' AND component = 'Apheresis Platelet'");
	$aneg1->execute();
	$aneg1 = $aneg1->fetch();

	$aneg2 = $pdo->prepare("SELECT COUNT(*) FROM inventory WHERE bloodinfo = '2' AND component = 'Cryoprecipitate'");
	$aneg2->execute();
	$aneg2 = $aneg2->fetch();

	$aneg3 = $pdo->prepare("SELECT COUNT(*) FROM inventory WHERE bloodinfo = '2' AND component = 'Fresh Frozen Plasma'");
	$aneg3->execute();
	$aneg3 = $aneg3->fetch();

	$aneg4 = $pdo->prepare("SELECT COUNT(*) FROM inventory WHERE bloodinfo = '2' AND component = 'Packed Red Blood Cell'");
	$aneg4->execute();
	$aneg4 = $aneg4->fetch();

	$aneg5 = $pdo->prepare("SELECT COUNT(*) FROM inventory WHERE bloodinfo = '2' AND component = 'Platelet Concentrate'");
	$aneg5->execute();
	$aneg5 = $aneg5->fetch();

	$aneg6 = $pdo->prepare("SELECT COUNT(*) FROM inventory WHERE bloodinfo = '2' AND component = 'Whole Blood'");
	$aneg6->execute();
	$aneg6 = $aneg6->fetch();

	//B Positive
	$bpos1 = $pdo->prepare("SELECT COUNT(*) FROM inventory WHERE bloodinfo = '3' AND component = 'Apheresis Platelet'");
	$bpos1->execute();
	$bpos1 = $bpos1->fetch();

	$bpos2 = $pdo->prepare("SELECT COUNT(*) FROM inventory WHERE bloodinfo = '3' AND component = 'Cryoprecipitate'");
	$bpos2->execute();
	$bpos2 = $bpos2->fetch();

	$bpos3 = $pdo->prepare("SELECT COUNT(*) FROM inventory WHERE bloodinfo = '3' AND component = 'Fresh Frozen Plasma'");
	$bpos3->execute();
	$bpos3 = $bpos3->fetch();

	$bpos4 = $pdo->prepare("SELECT COUNT(*) FROM inventory WHERE bloodinfo = '3' AND component = 'Packed Red Blood Cell'");
	$bpos4->execute();
	$bpos4 = $bpos4->fetch();

	$bpos5 = $pdo->prepare("SELECT COUNT(*) FROM inventory WHERE bloodinfo = '3' AND component = 'Platelet Concentrate'");
	$bpos5->execute();
	$bpos5 = $bpos5->fetch();

	$bpos6 = $pdo->prepare("SELECT COUNT(*) FROM inventory WHERE bloodinfo = '3' AND component = 'Whole Blood'");
	$bpos6->execute();
	$bpos6 = $bpos6->fetch();

	//B Negative
	$bneg1 = $pdo->prepare("SELECT COUNT(*) FROM inventory WHERE bloodinfo = '4' AND component = 'Apheresis Platelet'");
	$bneg1->execute();
	$bneg1 = $bneg1->fetch();

	$bneg2 = $pdo->prepare("SELECT COUNT(*) FROM inventory WHERE bloodinfo = '4' AND component = 'Cryoprecipitate'");
	$bneg2->execute();
	$bneg2 = $bneg2->fetch();

	$bneg3 = $pdo->prepare("SELECT COUNT(*) FROM inventory WHERE bloodinfo = '4' AND component = 'Fresh Frozen Plasma'");
	$bneg3->execute();
	$bneg3 = $bneg3->fetch();

	$bneg4 = $pdo->prepare("SELECT COUNT(*) FROM inventory WHERE bloodinfo = '4' AND component = 'Packed Red Blood Cell'");
	$bneg4->execute();
	$bneg4 = $bneg4->fetch();

	$bneg5 = $pdo->prepare("SELECT COUNT(*) FROM inventory WHERE bloodinfo = '4' AND component = 'Platelet Concentrate'");
	$bneg5->execute();
	$bneg5 = $bneg5->fetch();

	$bneg6 = $pdo->prepare("SELECT COUNT(*) FROM inventory WHERE bloodinfo = '4' AND component = 'Whole Blood'");
	$bneg6->execute();
	$bneg6 = $bneg6->fetch();

	//AB Positive
	$abpos1 = $pdo->prepare("SELECT COUNT(*) FROM inventory WHERE bloodinfo = '5' AND component = 'Apheresis Platelet'");
	$abpos1->execute();
	$abpos1 = $abpos1->fetch();

	$abpos2 = $pdo->prepare("SELECT COUNT(*) FROM inventory WHERE bloodinfo = '5' AND component = 'Cryoprecipitate'");
	$abpos2->execute();
	$abpos2 = $abpos2->fetch();

	$abpos3 = $pdo->prepare("SELECT COUNT(*) FROM inventory WHERE bloodinfo = '5' AND component = 'Fresh Frozen Plasma'");
	$abpos3->execute();
	$abpos3 = $abpos3->fetch();

	$abpos4 = $pdo->prepare("SELECT COUNT(*) FROM inventory WHERE bloodinfo = '5' AND component = 'Packed Red Blood Cell'");
	$abpos4->execute();
	$abpos4 = $abpos4->fetch();

	$abpos5 = $pdo->prepare("SELECT COUNT(*) FROM inventory WHERE bloodinfo = '5' AND component = 'Platelet Concentrate'");
	$abpos5->execute();
	$abpos5 = $abpos5->fetch();

	$abpos6 = $pdo->prepare("SELECT COUNT(*) FROM inventory WHERE bloodinfo = '5' AND component = 'Whole Blood'");
	$abpos6->execute();
	$abpos6 = $abpos6->fetch();

	//AB Negative
	$abneg1 = $pdo->prepare("SELECT COUNT(*) FROM inventory WHERE bloodinfo = '6' AND component = 'Apheresis Platelet'");
	$abneg1->execute();
	$abneg1 = $abneg1->fetch();

	$abneg2 = $pdo->prepare("SELECT COUNT(*) FROM inventory WHERE bloodinfo = '6' AND component = 'Cryoprecipitate'");
	$abneg2->execute();
	$abneg2 = $abneg2->fetch();

	$abneg3 = $pdo->prepare("SELECT COUNT(*) FROM inventory WHERE bloodinfo = '6' AND component = 'Fresh Frozen Plasma'");
	$abneg3->execute();
	$abneg3 = $abneg3->fetch();

	$abneg4 = $pdo->prepare("SELECT COUNT(*) FROM inventory WHERE bloodinfo = '6' AND component = 'Packed Red Blood Cell'");
	$abneg4->execute();
	$abneg4 = $abneg4->fetch();

	$abneg5 = $pdo->prepare("SELECT COUNT(*) FROM inventory WHERE bloodinfo = '6' AND component = 'Platelet Concentrate'");
	$abneg5->execute();
	$abneg5 = $abneg5->fetch();

	$abneg6 = $pdo->prepare("SELECT COUNT(*) FROM inventory WHERE bloodinfo = '6' AND component = 'Whole Blood'");
	$abneg6->execute();
	$abneg6 = $abneg6->fetch();

	//AB Positive
	$opos1 = $pdo->prepare("SELECT COUNT(*) FROM inventory WHERE bloodinfo = '7' AND component = 'Apheresis Platelet'");
	$opos1->execute();
	$opos1 = $opos1->fetch();

	$opos2 = $pdo->prepare("SELECT COUNT(*) FROM inventory WHERE bloodinfo = '7' AND component = 'Cryoprecipitate'");
	$opos2->execute();
	$opos2 = $opos2->fetch();

	$opos3 = $pdo->prepare("SELECT COUNT(*) FROM inventory WHERE bloodinfo = '7' AND component = 'Fresh Frozen Plasma'");
	$opos3->execute();
	$opos3 = $opos3->fetch();

	$opos4 = $pdo->prepare("SELECT COUNT(*) FROM inventory WHERE bloodinfo = '7' AND component = 'Packed Red Blood Cell'");
	$opos4->execute();
	$opos4 = $opos4->fetch();

	$opos5 = $pdo->prepare("SELECT COUNT(*) FROM inventory WHERE bloodinfo = '7' AND component = 'Platelet Concentrate'");
	$opos5->execute();
	$opos5 = $opos5->fetch();

	$opos6 = $pdo->prepare("SELECT COUNT(*) FROM inventory WHERE bloodinfo = '7' AND component = 'Whole Blood'");
	$opos6->execute();
	$opos6 = $opos6->fetch();

	//AB Positive
	$oneg1 = $pdo->prepare("SELECT COUNT(*) FROM inventory WHERE bloodinfo = '8' AND component = 'Apheresis Platelet'");
	$oneg1->execute();
	$oneg1 = $oneg1->fetch();

	$oneg2 = $pdo->prepare("SELECT COUNT(*) FROM inventory WHERE bloodinfo = '8' AND component = 'Cryoprecipitate'");
	$oneg2->execute();
	$oneg2 = $oneg2->fetch();

	$oneg3 = $pdo->prepare("SELECT COUNT(*) FROM inventory WHERE bloodinfo = '8' AND component = 'Fresh Frozen Plasma'");
	$oneg3->execute();
	$oneg3 = $oneg3->fetch();

	$oneg4 = $pdo->prepare("SELECT COUNT(*) FROM inventory WHERE bloodinfo = '8' AND component = 'Packed Red Blood Cell'");
	$oneg4->execute();
	$oneg4 = $oneg4->fetch();

	$oneg5 = $pdo->prepare("SELECT COUNT(*) FROM inventory WHERE bloodinfo = '8' AND component = 'Platelet Concentrate'");
	$oneg5->execute();
	$oneg5 = $oneg5->fetch();

	$oneg6 = $pdo->prepare("SELECT COUNT(*) FROM inventory WHERE bloodinfo = '8' AND component = 'Whole Blood'");
	$oneg6->execute();
	$oneg6 = $oneg6->fetch();
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
                                     <div class="col-md-5 text-right" style="padding-top:20px;">
                                         <a href="inventory_list.php" class="btn btn-success btn-md"><span class="glyphicon glyphicon-view"></span>Detailed View</a>
				</div>
				</div>
				<div class="table-responsive">
					<table class="table table-hover table-striped">
						<thead>
							<tr class="alert-info">
								<th>Blood Type</th>
								<th>Component</th>
								<th></th>
								<th>Quantity</th>
							</tr>
						</thead>
						<tbody>
							<!-- A Positive -->
							<tr>
								<td>A Positive</td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td></td>
								<td>Apheresis Platelet</td>
								<td></td>
								<td><?php echo $apos1[0]; ?></td>
							</tr>
							<tr>
								<td></td>
								<td>Cryoprecipitate</td>
								<td></td>
								<td><?php echo $apos2[0]; ?></td>
							</tr>
							<tr>
								<td></td>
								<td>Fresh Frozen Plasma</td>
								<td></td>
								<td><?php echo $apos3[0]; ?></td>
							</tr>
							<tr>
								<td></td>
								<td>Packed Red Blood Cell</td>
								<td></td>
								<td><?php echo $apos4[0]; ?></td>
							</tr>
							<tr>
								<td></td>
								<td>Platelet Concentrate</td>
								<td></td>
								<td><?php echo $apos5[0]; ?></td>
							</tr>
							<tr>
								<td></td>
								<td>Whole Blood</td>
								<td></td>	
								<td><?php echo $apos6[0]; ?></td>
							</tr>
							<!-- A Negative -->
							<tr>
								<td>A Negative</td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td></td>
								<td>Apheresis Platelet</td>
								<td></td>
								<td><?php echo $aneg1[0]; ?></td>
							</tr>
							<tr>
								<td></td>
								<td>Cryoprecipitate</td>
								<td></td>
								<td><?php echo $aneg2[0]; ?></td>
							</tr>
							<tr>
								<td></td>
								<td>Fresh Frozen Plasma</td>
								<td></td>
								<td><?php echo $aneg3[0]; ?></td>
							</tr>
							<tr>
								<td></td>
								<td>Packed Red Blood Cell</td>
								<td></td>
								<td><?php echo $aneg4[0]; ?></td>
							</tr>
							<tr>
								<td></td>
								<td>Platelet Concentrate</td>
								<td></td>
								<td><?php echo $aneg5[0]; ?></td>
							</tr>
							<tr>
								<td></td>
								<td>Whole Blood</td>
								<td></td>	
								<td><?php echo $aneg6[0]; ?></td>
							</tr>
							<!-- B Positive -->
							<tr>
								<td>B Positive</td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td></td>
								<td>Apheresis Platelet</td>
								<td></td>
								<td><?php echo $bpos1[0]; ?></td>
							</tr>
							<tr>
								<td></td>
								<td>Cryoprecipitate</td>
								<td></td>
								<td><?php echo $bpos2[0]; ?></td>
							</tr>
							<tr>
								<td></td>
								<td>Fresh Frozen Plasma</td>
								<td></td>
								<td><?php echo $bpos3[0]; ?></td>
							</tr>
							<tr>
								<td></td>
								<td>Packed Red Blood Cell</td>
								<td></td>
								<td><?php echo $bpos4[0]; ?></td>
							</tr>
							<tr>
								<td></td>
								<td>Platelet Concentrate</td>
								<td></td>
								<td><?php echo $bpos5[0]; ?></td>
							</tr>
							<tr>
								<td></td>
								<td>Whole Blood</td>
								<td></td>	
								<td><?php echo $bpos6[0]; ?></td>
							</tr>
							<!-- B Negative -->
							<tr>
								<td>B Negative</td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td></td>
								<td>Apheresis Platelet</td>
								<td></td>
								<td><?php echo $bneg1[0]; ?></td>
							</tr>
							<tr>
								<td></td>
								<td>Cryoprecipitate</td>
								<td></td>
								<td><?php echo $bneg2[0]; ?></td>
							</tr>
							<tr>
								<td></td>
								<td>Fresh Frozen Plasma</td>
								<td></td>
								<td><?php echo $bneg3[0]; ?></td>
							</tr>
							<tr>
								<td></td>
								<td>Packed Red Blood Cell</td>
								<td></td>
								<td><?php echo $bneg4[0]; ?></td>
							</tr>
							<tr>
								<td></td>
								<td>Platelet Concentrate</td>
								<td></td>
								<td><?php echo $bneg5[0]; ?></td>
							</tr>
							<tr>
								<td></td>
								<td>Whole Blood</td>
								<td></td>	
								<td><?php echo $bneg6[0]; ?></td>
							</tr>
							<!-- AB Positive -->
							<tr>
								<td>AB Positive</td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td></td>
								<td>Apheresis Platelet</td>
								<td></td>
								<td><?php echo $abpos1[0]; ?></td>
							</tr>
							<tr>
								<td></td>
								<td>Cryoprecipitate</td>
								<td></td>
								<td><?php echo $abpos2[0]; ?></td>
							</tr>
							<tr>
								<td></td>
								<td>Fresh Frozen Plasma</td>
								<td></td>
								<td><?php echo $abpos3[0]; ?></td>
							</tr>
							<tr>
								<td></td>
								<td>Packed Red Blood Cell</td>
								<td></td>
								<td><?php echo $abpos4[0]; ?></td>
							</tr>
							<tr>
								<td></td>
								<td>Platelet Concentrate</td>
								<td></td>
								<td><?php echo $abpos5[0]; ?></td>
							</tr>
							<tr>
								<td></td>
								<td>Whole Blood</td>
								<td></td>	
								<td><?php echo $abpos6[0]; ?></td>
							</tr>
							<!-- AB Negative -->
							<tr>
								<td>AB Negative</td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td></td>
								<td>Apheresis Platelet</td>
								<td></td>
								<td><?php echo $abneg1[0]; ?></td>
							</tr>
							<tr>
								<td></td>
								<td>Cryoprecipitate</td>
								<td></td>
								<td><?php echo $abneg2[0]; ?></td>
							</tr>
							<tr>
								<td></td>
								<td>Fresh Frozen Plasma</td>
								<td></td>
								<td><?php echo $abneg3[0]; ?></td>
							</tr>
							<tr>
								<td></td>
								<td>Packed Red Blood Cell</td>
								<td></td>
								<td><?php echo $abneg4[0]; ?></td>
							</tr>
							<tr>
								<td></td>
								<td>Platelet Concentrate</td>
								<td></td>
								<td><?php echo $abneg5[0]; ?></td>
							</tr>
							<tr>
								<td></td>
								<td>Whole Blood</td>
								<td></td>	
								<td><?php echo $abneg6[0]; ?></td>
							</tr>
							<!-- O Positive -->
							<tr>
								<td>O Positive</td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td></td>
								<td>Apheresis Platelet</td>
								<td></td>
								<td><?php echo $opos1[0]; ?></td>
							</tr>
							<tr>
								<td></td>
								<td>Cryoprecipitate</td>
								<td></td>
								<td><?php echo $opos2[0]; ?></td>
							</tr>
							<tr>
								<td></td>
								<td>Fresh Frozen Plasma</td>
								<td></td>
								<td><?php echo $opos3[0]; ?></td>
							</tr>
							<tr>
								<td></td>
								<td>Packed Red Blood Cell</td>
								<td></td>
								<td><?php echo $opos4[0]; ?></td>
							</tr>
							<tr>
								<td></td>
								<td>Platelet Concentrate</td>
								<td></td>
								<td><?php echo $opos5[0]; ?></td>
							</tr>
							<tr>
								<td></td>
								<td>Whole Blood</td>
								<td></td>	
								<td><?php echo $opos6[0]; ?></td>
							</tr>
							<!-- O Negative -->
							<tr>
								<td>O Negative</td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td></td>
								<td>Apheresis Platelet</td>
								<td></td>
								<td><?php echo $oneg1[0]; ?></td>
							</tr>
							<tr>
								<td></td>
								<td>Cryoprecipitate</td>
								<td></td>
								<td><?php echo $oneg2[0]; ?></td>
							</tr>
							<tr>
								<td></td>
								<td>Fresh Frozen Plasma</td>
								<td></td>
								<td><?php echo $oneg3[0]; ?></td>
							</tr>
							<tr>
								<td></td>
								<td>Packed Red Blood Cell</td>
								<td></td>
								<td><?php echo $oneg4[0]; ?></td>
							</tr>
							<tr>
								<td></td>
								<td>Platelet Concentrate</td>
								<td></td>
								<td><?php echo $oneg5[0]; ?></td>
							</tr>
							<tr>
								<td></td>
								<td>Whole Blood</td>
								<td></td>	
								<td><?php echo $oneg6[0]; ?></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

<?php include 'footer.php'; ?>
</body>
</html>