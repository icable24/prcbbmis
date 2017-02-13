<?php 
	
	require '../dbconnect.php';
$id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    
       
   
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT *  FROM inventory WHERE status LIKE 'inventory'";
        $q = $pdo->prepare($sql);
        $q->execute();
        $bank = $q->fetchAll(PDO::FETCH_ASSOC);
    }
     
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <script src="../js/addnewfieldr1.js" type="text/javascript"></script>
    <script src="../js/addnewfieldr2.js" type="text/javascript"></script>
    <link rel="stylesheet" href="../css/custom_style.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.theme.mis.css">
	<link rel="stylesheet" href="../css/datepicker.css">
	<link rel="stylesheet" href="../css/bootstrap-datetimepicker.min.css">
</head>
<body>
	<!--Header edit @ header.php-->
	<?php 
		include('header.php')  
	?>

	<!-- MAIN PAGE -->
        
			<!--Form Starts Here-->
		<div class="container">
			<div class="col-lg-offset-2 col-lg-8 col-lg-offset-2">
				<div class="row">
                      <h2 style="text-align: center;">Blood Request</h2>
					<br />
				</div>

						
				<div class="panel panel-info">
					<div class="panel-heading">
						<h4>Request Form</h4>
					</div>
					
					<div class="panel-body">
                                            
                                            <form id="form_a" action="../php/addRequisitionbyChapters.php" method="post">
                                            
                                            
							<!-- Text input-->
							<div class="control-group">
							<label class="control-label" for="requester">Requester</label>
							<div class="controls">
                                                        
                                                            <input id="requester" name="requester" type="text" placeholder="Fullname" class="form-control" required="">
							</div>
							</div>
                                                        <!-- End of Text Input -->
                                                        <br>
                                                        <!--Table -->
                                                        <table>
                                                        <tr>
                                                        <label class="control-label" for="need">Need</label>
                                                        </tr>
                                                        <br>
                                                        <tr>
                                                        <center>
                                                        <input type="button" name="need" id="show" value=" Blood Type?">
                                                        <span style="padding-left: 200px"></span>
                                                        <input type="button" name="need" id="show1" value=" Blood Component?" >
                                                        </center>
                                                        
                                                        <td style="padding-left: 110px" hidden id="shows">
                                                        <!-- Text input-->
                                                        <label class="control-label" for="positiveA">A</label>
                                                        <input class="form-control" name="positiveA" type="number" style="width: 65px">
                                                        <!-- Text input-->
                                                        <label class="control-label" for="positiveB">B</label>
                                                        <input class="form-control" name="positiveB" type="number" style="width: 65px">
                                                        <!-- Text input-->
                                                        <label class="control-label" for="positiveO">O</label>
                                                        <input class="form-control" name="positiveO" type="number" style="width: 65px">
                                                        <!-- Text input-->
                                                        <label class="control-label" for="positiveAB">AB</label>
                                                        <input class="form-control" name="positiveAB" type="number" style="width: 65px">
                                                        </td>
                                                        
                                                        <td style="padding-left: 10px" hidden id="shows1">
                                                        <!-- Text input-->
                                                        <label class="control-label" for="negativeA">-A</label>
                                                        <input class="form-control" name="negativeA" type="number" style="width: 65px">
                                                        <!-- Text input-->
                                                        <label class="control-label" for="negativeB">-B</label>
                                                        <input class="form-control" name="negativeB" type="number" style="width: 65px">
                                                        <!-- Text input-->
                                                        <label class="control-label" for="negativeO">-O</label>
                                                        <input class="form-control" name="negativeO" type="number" style="width: 65px">
                                                        <!-- Text input-->
                                                        <label class="control-label" for="negativeAB">-AB</label>
                                                        <input class="form-control" name="negativeAB" type="number" style="width: 65px">
                                                        </td>
                                                        
                                                        <td style="padding-left: 150px"  hidden id="shows2">
                                                        <!-- Text input-->
                                                        <label class="control-label" for="ffpqty">Fresh Frozen Plasma(1 Year)</label>
                                                        <input class="form-control" name="ffpqty" type="number" style="width: 65px">
                                                        <!-- Text input-->
							<label class="control-label" for="pcqty">Platelet Concentrate(5 Days)</label>
                                                        <input class="form-control" name="pcqty" type="number" style="width: 65px">
                                                        <!-- Text input-->
							<label class="control-label" for="wbqty">Whole Blood(32 Days)</label>
                                                        <input class="form-control" name="wbqty" type="number" style="width: 65px">
                                                        <!-- Text input-->
							<label class="control-label" for="cqty">Cryoprecipitate (1 Year)</label>
                                                        <input class="form-control" name="cqty" type="number" style="width: 65px">
                                                        </td> 
                                                        </tr>
                                                        </table>
                                                        <!-- End Table -->
                                                        <br>
                                                        <!-- Date-->
							<div class="control-group">
							<label class="control-label" for="dateneeded">Date Needed</label>
							<div class="controls">
                                                        <input id="dateneeded" name="dateneeded" type="date" class="form-control" required="" form="form_a">
							<script src="../js/jquery-1.9.1.min.js"></script>
                                                        <script src="../js/bootstrap-datepicker.js"></script>
                                                        <script type="text/javascript">
							// When the document is ready
							$(document).ready(function () {
							$('#dateneeded').datepicker({
					                format: "yyyy-mm-dd"
							});  
							});
							</script>
							</div>
							</div>
                                                        <!-- Text input-->
							<div class="control-group">
							<label class="control-label" for="bankname">Blood Bank</label>
							<div class="controls">
                                                            <input id="bankname" name="bankname" type="text" placeholder="bank name" class="form-control" required="">
                                                        </div>
							</div>
                                                        <!-- Text input-->
							<div class="control-group">
							  <label class="control-label" for="bankaddress">Address</label>
							   <div class="controls">
                                                               <input id="bankaddress" name="bankaddress" type="text" placeholder="Bank Address" class="form-control"required="">
							    
							  </div>
							</div>
                                                        <!-- End -->
							<!-- Text input-->
							<div class="control-group">
							  <label class="control-label" for="contactdetails">Contact Number</label>
							   <div class="controls">
                                                               <input id="contactdetails" name="contactdetails" type="text" placeholder="contact number" class="form-control" required="">
							    
							  </div>
							</div>
                                                        <!--End-->
                                                        <!-- Text input-->
							<div class="control-group">
							  <label class="control-label" for="reason">Reason</label>
							  <div class="controls">
                                                              <textarea id="reason" name="reason" placeholder="Enter text here..."class="form-control" required=""></textarea>
							    
							  </div>    
							</div>
							<!-- End -->
					
							<!--Buttons-->
							<div class="panel-footer">	
								<div class="form-actions text-center forms">
                                                                    <button type="submit" class="btn btn-success" name="submit">Request</button>
                                                                        <a class="btn" href="c_Philippines_1.php">Cancel</a>
								</div>		
						  	</div>	
                                                        </form>
					</div>
                                      </div>
                        </div>
				</div>	
                       <!-- End of Form -->

<script>
$(document).ready(function(){
    $("#show").click(function(){
        $("#shows").show();
    });
    $("#show").click(function(){
        $("#shows1").show();
    });
    $("#show1").click(function(){
        $("#shows2").show();
    });
    });
</script>
	<?php 
		include('footer.php');
	?>

</body>
</html>