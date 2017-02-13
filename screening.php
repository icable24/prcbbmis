<?php 
	include 'login_success.php';
	require 'dbconnect.php';

	$id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    if ( null==$id ) {
        header("Location: donorlist.php");
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM donor where did = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        Database::disconnect();
    }

    $pdo2 = Database::connect();
    $pdo2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql2 = "SELECT * FROM screening WHERE scrid = ?";
    $q2 = $pdo2->prepare($sql2);
    $q2->execute(array($id));
    $data2 = $q2->fetch(PDO::FETCH_ASSOC);
    Database::disconnect();
?>
<!DOCTYPE html>
<html lang="en">
<head>
		<!-- CSS import Files -->
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="./jquery-timepicker-1.3.2/jquery.timepicker.min.css">
        <link rel="stylesheet" href="./css/custom_style.css">

      
        <!-- JQuery and Javascript File -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="./jquery-timepicker-1.3.2/jquery.timepicker.min.css"></script>
</head>
<body>
	<!--Header edit @ header.php-->
	<?php 
		include('header.php')  
	?>

	<!-- MAIN PAGE -->
			<!--Form Starts Here-->
		<div class="container">
            <div class="row col-lg-offset-3">
                <div class="col-md-4">
                    <h2>
                        &nbsp;&nbsp; Screening
                    </h2>
                </div>
            </div>
            <?php 
                include 'donor_side.php'
            ?>
			<div class="col-lg-8">
	
				<div class="panel panel-info">
					<div class="panel-heading">
                        <h4><?php echo $data['dfname'] . ' ' . substr($data['dmname'], 0 , 1) . '. ' . $data['dlname'] ?></h4>
                    </div>	
					<div class="panel-body">
                            <form class="form-horizontal" method="post" action="./php/addscreening.php">

                                <!-- Text input-->
                                <input class="form-control" type="hidden" id="did" name="did" value="<?php echo $data['did']?>">
                                <div class="control-group">
                                    <label class="control-label" for="did">Donor ID</label>
                                    <div class="controls">
                                        <input id="did" type="text"  class="form-control" value="<?php echo 'D03-' . $data['did'] ?>" disabled>                             
                                  </div>
                                </div>

                                <div class="control-group">
                                  <label class="control-label" for="spgravity">Weight</label><label class="control-label eg">(in Kg)</label>
                                  <div class="controls">
                                    <input class="form-control" id="weight" name="weight" required="" value="<?php echo $data2['weight'] ?>">
                                    
                                  </div>
                                </div>

                                <!-- Text input-->
                                <div class="control-group">
                                  <label class="control-label" for="spgravity">Specific Gravity</label><label class="control-label eg">()</label>
                                  <div class="controls">
                                    <input class="form-control" id="spgravity" name="spgravity" required="" value="<?php echo $data2['spgravity'] ?>">
                                    
                                  </div>
                                </div>

                                <!-- Text input-->
                                <div class="control-group">
                                  <label class="control-label" for="hemgb">Hemoglobin</label><label class="control-label eg">()</label>
                                  <div class="controls">
                                    <input class="form-control" id="hemgb" name="hemgb" required="" value="<?php echo $data2['hemgb'] ?>">
                                    
                                  </div>
                                </div>


                                <!-- Text input-->
                                <div class="control-group">
                                    <label class="control-label" for="hemtcrt">Hematocrit</label><label class="control-label eg">()</label>
                                    <div class="controls">
                                        <input class="form-control" id="hemtcrt" name="hemtcrt" required="" value="<?php echo $data2['hemtcrt'] ?>">
                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="control-group">
                                    <label class="control-label" for="rbc">Red Blood Cell</label><label class="control-label eg">()</label>
                                    <div class="controls">
                                        <input class="form-control" id="rbc" name="rbc" required="" value="<?php echo $data2['rbc'] ?>">
                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="control-group">
                                    <label class="control-label" for="wbc">White Blood Cell</label>
                                    <div class="controls">
                                        <input class="form-control" id="wbc" name="wbc" required="" value="<?php echo $data2['wbc'] ?>">
                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="control-group">
                                    <label class="control-label" for="pltcount">Platelet Count</label><label class="control-label eg">()</label>
                                    <div class="controls">
                                        <input class="form-control" id="pltcount" name="pltcount" required="" value="<?php echo $data2['pltcount'] ?>">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="remarks">Remarks</label>
                                    <div class="controls">
                                        <select id="remarks" name="remarks" class="form-control" required="">
                                            <option></option>
                                            <option <?php if($data2['remarks'] == 'Accepted') echo 'selected="selected"'; ?>>Accepted</option>
                                            <option <?php if($data2['remarks'] == 'Deferred') echo 'selected="selected"'; ?>>Deferred</option>
                                            <option <?php if($data2['remarks'] == 'Temporarily Deferred') echo 'selected="selected"'; ?>>Temporarily Deferred</option>
                                        </select>
                                    </div>
                                </div>

                            <!-- Text input-->
                            <div class="control-group" hidden="">
                                <label class="control-label" for="reason">Reason</label>
                                <div class="controls">
                                    <input id="reason" name="reason" type="text" placeholder="Reasons" class="form-control" autocomplete="off">
                                </div>
                            </div>  


                        </div>
							<!--Buttons-->
							<div class="panel-footer">	
								<div class="form-actions text-center forms">
									<button type="submit" class="btn btn-success">Submit</button>
									<a class="btn" href="viewscreening.php?id=<?php echo $_GET['id']?>">Back</a>
								</div>		
						  	</div>		
						</form>
					</div>
				</div>		
			</div>
		</div>

	<?php 
		include('footer.php');
	?>

</body>
</html