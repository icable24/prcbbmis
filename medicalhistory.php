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
					<div class="panel panel-info">
						<div class="panel-heading">
							<div class="table-responsive">
								<thead>
									<tr class="alert-info">
										<div class="col-lg-10">
											<th><h4>Medical History</h4></th>
										</div>
										<div class="col-lg-1">
											<th><h4 class="text-center">Yes</h4></th>
										</div>
										<div class="col-lg-1">
											<th><h4 class="text-center">No</h4></th>
										</div>
									</tr>
								</thead>
							</div>
						</div>
						<div class="panel-body">
							<div class="table-responsive">
								<form action="php/addhistory.php" class="form-horizontal" method="POST">
									<table class="table table-hover table-striped">
										<tbody>
											<tr>
												<div class="col-lg-10">
													<div class="control-group">
														<p>
															1. Do you feel well and healthy today?
														</p>
													</div>
												</div>
												<div class="col-lg-1">
													<div class="control-group">
														<input type="radio" class="form-control" name="A1" value="Yes" required required>
													</div>
												</div>
												<div class="col-lg-1">
													<div class="control-group">
														<input type="radio" class="form-control" name="A1" value="No" required>
													</div>
												</div>
											</tr>
											<hr>
											<tr>
												<div class="col-lg-offset-1 col-lg-9">
													<div class="control-group">
														<p>
															Have any flu or cold?
														</p>
													</div>
												</div>
												<div class="col-lg-1">
													<div class="control-group">
														<input type="radio" class="form-control" name="A2" value="Yes" required required>
													</div>
												</div>
												<div class="col-lg-1">
													<div class="control-group">
														<input type="radio" class="form-control" name="A2" value="No" required>
													</div>
												</div>
											</tr>
											<tr>
												<div class="col-lg-10">
													<div class="control-group">
														<p>
															2. Have you ever been refured as a blood donor or told not to donate blood?
														</p>
													</div>
												</div>
												<div class="col-lg-1">
													<div class="control-group">
														<input type="radio" class="form-control" name="A3" value="Yes" required required>
													</div>
												</div>
												<div class="col-lg-1">
													<div class="control-group">
														<input type="radio" class="form-control" name="A3" value="No" required>
													</div>
												</div>
											</tr>
											<tr>
												<div class="col-lg-10">
													<div class="control-group">
														<p>
															3. Have you within the last <b> twelve (12) hours</b> had an alcohol intake?
														</p>
													</div>
												</div>
												<div class="col-lg-1">
													<div class="control-group">
														<input type="radio" class="form-control" name="A4" value="Yes" required required>
													</div>
												</div>
												<div class="col-lg-1">
													<div class="control-group">
														<input type="radio" class="form-control" name="A4" value="No" required>
													</div>
												</div>
											</tr>
											<tr>
												<div class="col-lg-10">
													<div class="control-group">
														<p>
															4. Do you intend to drive a heave transport vehicle or operate a heavy machine within the next <b> twelve (12) hours</b>?
														</p>
													</div>
												</div>
												<div class="col-lg-1">
													<div class="control-group">
														<input type="radio" class="form-control" name="A5" value="Yes" required required>
													</div>
												</div>
												<div class="col-lg-1">
													<div class="control-group">
														<input type="radio" class="form-control" name="A5" value="No" required>
													</div>
												</div>
											</tr>
											<tr>
												<div class="col-lg-10">
													<div class="control-group">
														<p>
															5. Do you intend to ride/pilot an airplane within <b>twenty-four (24) hours</b>?
														</p>
													</div>
												</div>
												<div class="col-lg-1">
													<div class="control-group">
														<input type="radio" class="form-control" name="A6" value="Yes" required required>
													</div>
												</div>
												<div class="col-lg-1">
													<div class="control-group">
														<input type="radio" class="form-control" name="A6" value="No" required>
													</div>
												</div>
											</tr>
											<tr>
												<div class="col-lg-10">
													<div class="control-group">
														<p>
															6. In the past <b>72 Hours</b> have you had tooth extraction?
														</p>
													</div>
												</div>
												<div class="col-lg-1">
													<div class="control-group">
														<input type="radio" class="form-control" name="A7" value="Yes" required required>
													</div>
												</div>
												<div class="col-lg-1">
													<div class="control-group">
														<input type="radio" class="form-control" name="A7" value="No" required>
													</div>
												</div>
											</tr>
											<tr>
												<div class="col-lg-10">
													<div class="control-group">
														<p>
															7. in the last <b>3 days</b> have you taken aspirin?
														</p>
													</div>
												</div>
												<div class="col-lg-1">
													<div class="control-group">
														<input type="radio" class="form-control" name="A8" value="Yes" required required>
													</div>
												</div>
												<div class="col-lg-1">
													<div class="control-group">
														<input type="radio" class="form-control" name="A8" value="No" required>
													</div>
												</div>
											</tr>
											<tr>
												<div class="col-lg-10">
													<div class="control-group">
														<p>
															8. In the past <b>4 weeks</b> have you taken any medications? Vaccinations?
														</p>
													</div>
												</div>
												<div class="col-lg-1">
													<div class="control-group">
														<input type="radio" class="form-control" name="A9" value="Yes" required required>
													</div>
												</div>
												<div class="col-lg-1"> 
													<div class="control-group">
														<input type="radio" class="form-control" name="A9" value="No" required>
													</div>
												</div>
											</tr>
											<tr>
												<div class="col-lg-10">
													<div class="control-group">
														<p>
															9. In the past <b>3 months</b> have you:
														</p>
													</div>
												</div>
											</tr>
											<tr>
												<div class="col-lg-offset-1 col-lg-9">
													<div class="control-group">
														<p>
															Had chicken pox and/or cold sores?
														</p>
													</div>
												</div>
												<div class="col-lg-1">
													<div class="control-group">
														<input type="radio" class="form-control" name="A10" value="Yes" required required>
													</div>
												</div>
												<div class="col-lg-1"> 
													<div class="control-group">
														<input type="radio" class="form-control" name="A10" value="No" required>
													</div>
												</div>
											</tr>
											<tr>
												<div class="col-lg-offset-1 col-lg-9">
													<div class="control-group">
														<p>
															Travelled or lived in outside of your place residence?
														</p>
													</div>
												</div>
												<div class="col-lg-1">
													<div class="control-group">
														<input type="radio" class="form-control" name="A11" value="Yes" required required>
													</div>
												</div>
												<div class="col-lg-1"> 
													<div class="control-group">
														<input type="radio" class="form-control" name="A11" value="No" required>
													</div>
												</div>
											</tr>
											<tr>
												<div class="col-lg-offset-1 col-lg-9">
													<div class="control-group">
														<p>
															Donated whole blood, platelets, or plasma?
														</p>
													</div>
												</div>
												<div class="col-lg-1">
													<div class="control-group">
														<input type="radio" class="form-control" name="A12" value="Yes" required required>
													</div>
												</div>
												<div class="col-lg-1"> 
													<div class="control-group">
														<input type="radio" class="form-control" name="A12" value="No" required>
													</div>
												</div>
											</tr>
											<tr>
												<div class="col-lg-10">
													<div class="control-group">
														<p>
															10. For the past <b>6 months</b> have you been under the doctor's care for a certain disease/ illness?
														</p>
													</div>
												</div>
												<div class="col-lg-1">
													<div class="control-group">
														<input type="radio" class="form-control" name="A13" value="Yes" required required>
													</div>
												</div>
												<div class="col-lg-1"> 
													<div class="control-group">
														<input type="radio" class="form-control" name="A13" value="No" required>
													</div>
												</div>
											</tr>
											<tr>
												<div class="col-lg-12">
													<div class="control-group">
														<p>
															11. Have you ever had any of the following:
														</p>
													</div>
												</div>
											</tr>
											<tr>
												<div class="col-lg-offset-1 col-lg-9">
													<div class="control-group">
														<p>
															Cancer, Blood disease or bleeding disorder (haemophilia)?
														</p>
													</div>
												</div>
												<div class="col-lg-1">
													<div class="control-group">
														<input type="radio" class="form-control" name="A14" value="Yes" required required>
													</div>
												</div>
												<div class="col-lg-1"> 
													<div class="control-group">
														<input type="radio" class="form-control" name="A14" value="No" required>
													</div>
												</div>
											</tr>
											<tr>
												<div class="col-lg-offset-1 col-lg-9">
													<div class="control-group">
														<p>
															Heart disease/surgery, rheumatic fever or chest pains?
														</p>
													</div>
												</div>
												<div class="col-lg-1">
													<div class="control-group">
														<input type="radio" class="form-control" name="A15" value="Yes" required required>
													</div>
												</div>
												<div class="col-lg-1"> 
													<div class="control-group">
														<input type="radio" class="form-control" name="A15" value="No" required>
													</div>
												</div>
											</tr>
											<tr>
												<div class="col-lg-offset-1 col-lg-9">
													<div class="control-group">
														<p>
															Lung disease, tuberculosis, or asthma?
														</p>
													</div>
												</div>
												<div class="col-lg-1">
													<div class="control-group">
														<input type="radio" class="form-control" name="A16" value="Yes" required required>
													</div>
												</div>
												<div class="col-lg-1"> 
													<div class="control-group">
														<input type="radio" class="form-control" name="A16" value="No" required>
													</div>
												</div>
											</tr>
											<tr>
												<div class="col-lg-offset-1 col-lg-9">
													<div class="control-group">
														<p>
															Kidney disease, thyroid disease, diabetes, epilepsy?
														</p>
													</div>
												</div>
												<div class="col-lg-1">
													<div class="control-group">
														<input type="radio" class="form-control" name="A17" value="Yes" required required>
													</div>
												</div>
												<div class="col-lg-1"> 
													<div class="control-group">
														<input type="radio" class="form-control" name="A17" value="No" required>
													</div>
												</div>
											</tr>
											<tr>
												<div class="col-lg-offset-1 col-lg-9">
													<div class="control-group">
														<p>
															Any other chronic medical condition or surgical operations?
														</p>
													</div>
												</div>
												<div class="col-lg-1">
													<div class="control-group">
														<input type="radio" class="form-control" name="A18" value="Yes" required>
													</div>
												</div>
												<div class="col-lg-1"> 
													<div class="control-group">
														<input type="radio" class="form-control" name="A18" value="No" required>
													</div>
												</div>
											</tr>
											<tr>
												<div class="col-lg-10">
													<div class="control-group">
														<p>
															12. Have you ever had malaria in the past?
														</p>
													</div>
												</div>
												<div class="col-lg-1">
													<div class="control-group">
														<input type="radio" class="form-control" name="A19" value="Yes" required>
													</div>
												</div>
												<div class="col-lg-1"> 
													<div class="control-group">
														<input type="radio" class="form-control" name="A19" value="No" required>
													</div>
												</div>
											</tr>
											<tr>
												<div class="col-lg-10">
													<div class="control-group">
														<p>
															13. Have you had jundice/hepatitis/personal contact with person who had hepatitis?
														</p>
													</div>
												</div>
												<div class="col-lg-1">
													<div class="control-group">
														<input type="radio" class="form-control" name="A20" value="Yes" required>
													</div>
												</div>
												<div class="col-lg-1"> 
													<div class="control-group">
														<input type="radio" class="form-control" name="A20" value="No" required>
													</div>
												</div>
											</tr>
											<tr>
												<div class="col-lg-10">
													<div class="control-group">
														<p>
															14. <b>From 1980 to present</b>, did you spend time in the United Kingdom or Europe?
														</p>
													</div>
												</div>
												<div class="col-lg-1">
													<div class="control-group">
														<input type="radio" class="form-control" name="A21" value="Yes" required>
													</div>
												</div>
												<div class="col-lg-1"> 
													<div class="control-group">
														<input type="radio" class="form-control" name="A21" value="No" required>
													</div>
												</div>
											</tr>
											<tr>
												<div class="col-lg-12">
													<div class="control-group">
														<p>
															15. In the past <b>one (1) year</b>:
														</p>
													</div>
												</div>
											</tr>
											<tr>
												<div class="col-lg-offset-1 col-lg-9">
													<div class="control-group">
														<p>
															Have you travelled or lived in other countries?
														</p>
													</div>
												</div>
												<div class="col-lg-1">
													<div class="control-group">
														<input type="radio" class="form-control" name="A22" value="Yes" required>
													</div>
												</div>
												<div class="col-lg-1"> 
													<div class="control-group">
														<input type="radio" class="form-control" name="A22" value="No" required>
													</div>
												</div>
											</tr>
											<tr>
												<div class="col-lg-offset-1 col-lg-9">
													<div class="control-group">
														<p>
															Have you been incarcerated, jailed or imprisoned?
														</p>
													</div>
												</div>
												<div class="col-lg-1">
													<div class="control-group">
														<input type="radio" class="form-control" name="A23" value="Yes" required>
													</div>
												</div>
												<div class="col-lg-1"> 
													<div class="control-group">
														<input type="radio" class="form-control" name="A23" value="No" required>
													</div>
												</div>
											</tr>
											<tr>
												<div class="col-lg-offset-1 col-lg-9">
													<div class="control-group">
														<p>
															Have you taken prohibited drugs (orally, by nose, or by injection)?
														</p>
													</div>
												</div>
												<div class="col-lg-1">
													<div class="control-group">
														<input type="radio" class="form-control" name="A24" value="Yes" required>
													</div>
												</div>
												<div class="col-lg-1"> 
													<div class="control-group">
														<input type="radio" class="form-control" name="A24" value="No" required>
													</div>
												</div>
											</tr>
											<tr>
												<div class="col-lg-10">
													<div class="control-group">
														<p>
															16. Have you received blood, blood products and/or had tissue/organ transplant or graft?
														</p>
													</div>
												</div>
												<div class="col-lg-1">
													<div class="control-group">
														<input type="radio" class="form-control" name="A25" value="Yes" required>
													</div>
												</div>
												<div class="col-lg-1"> 
													<div class="control-group">
														<input type="radio" class="form-control" name="A25" value="No" required>
													</div>
												</div>
											</tr>
											<tr>
												<div class="col-lg-offset-1 col-lg-9">
													<div class="control-group">
														<p>
															Have you had a tattoo applied, ear piercing, acupuncture, accidental needle stick injury, or come in contact with someone else's blood?
														</p>
													</div>
												</div>
												<div class="col-lg-1">
													<div class="control-group">
														<input type="radio" class="form-control" name="A26" value="Yes" required>
													</div>
												</div>
												<div class="col-lg-1"> 
													<div class="control-group">
														<input type="radio" class="form-control" name="A26" value="No" required>
													</div>
												</div>
											</tr>
											<tr>
												<div class="col-lg-10">
													<div class="control-group">
														<p>
															17. Have you ever had any sexually transmitted disease like syphillis, gonorrhea, HIV/AIDS, etc?
														</p>
													</div>
												</div>
												<div class="col-lg-1">
													<div class="control-group">
														<input type="radio" class="form-control" name="A27" value="Yes" required>
													</div>
												</div>
												<div class="col-lg-1"> 
													<div class="control-group">
														<input type="radio" class="form-control" name="A27" value="No" required>
													</div>
												</div>
											</tr>
											<tr>
												<div class="col-lg-offset-1 col-lg-9">
													<div class="control-group">
														<p>
															Have you every engaged in unprotected or unsafe sex?
														</p>
													</div>
												</div>
												<div class="col-lg-1">
													<div class="control-group">
														<input type="radio" class="form-control" name="A28" value="Yes" required>
													</div>
												</div>
												<div class="col-lg-1"> 
													<div class="control-group">
														<input type="radio" class="form-control" name="A28" value="No" required>
													</div>
												</div>
											</tr>
											<tr>
												<div class="col-lg-10">
													<div class="control-group">
														<p>
															18. Are you giving blood only because you want to be tested for HIV or AIDS virus or Hepatitis virus?
														</p>
													</div>
												</div>
												<div class="col-lg-1">
													<div class="control-group">
														<input type="radio" class="form-control" name="A29" value="Yes" required>
													</div>
												</div>
												<div class="col-lg-1"> 
													<div class="control-group">
														<input type="radio" class="form-control" name="A29" value="No" required>
													</div>
												</div>
											</tr>
											<tr>
												<div class="col-lg-10">
													<div class="control-group">
														<p>
															19. Are you aware that an HIV infected person can still transmit the virus despite a negative AIDS test?
														</p>
													</div>
												</div>
												<div class="col-lg-1">
													<div class="control-group">
														<input type="radio" class="form-control" name="A30" value="Yes" required required="">
													</div>
												</div>
												<div class="col-lg-1"> 
													<div class="control-group">
														<input type="radio" class="form-control" name="A30" value="No" required required="">
													</div>
												</div>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
							<div class="panel-footer">
								<div class="form-actions text-center forms">
								<button type="submit" class="btn btn-success">Submit</button>
								<a class="btn" href="donorlist.php">Back</a>
							</div>	
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>

		<?php include 'footer.php'; ?>
	</body>
</html>