<?php 
	include ('login_success.php');
?>
<?php 
	require('dbconnect.php');

	$id = null;
	if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }

    if ( null==$id ) {
        header("Location: donorlist.php");
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM screening where scrid = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        Database::disconnect();
    }

    $uname = $_SESSION['login_username'];

    $pdo = Database::connect();
    $user = $pdo->prepare("SELECT * FROM user WHERE username like '$uname'");
    $user->execute();
    $user = $user->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Philippine Red Cross Blood Bank Management Information System</title>
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
                        &nbsp;&nbsp; Donor's Profile
                    </h2>
                </div>
                <?php if($user['usertype'] == 'Admin'){ ?>
                <div class="col-md-6 text-right" style="padding-top:20px;">
                    <a href="screening.php?id=<?php echo $_GET['id'] ?>" class="btn btn-primary btn-md"><span class="glyphicon glyphicon-edit"></span>&nbsp;&nbsp;Edit</a>
                </div>
                <?php } ?>
            </div>
            <?php 
            include 'donor_side.php'
            ?>
            <div class="col-lg-8">
                            
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h4>Screening</h4>
                        </div>
                        
                        <div class="panel-body">
                            <form class="form-horizontal" method="post">

                                <!-- Text input-->
                                <div class="control-group">
                                    <label class="control-label">Donor ID</label>
                                    <input class="form-control" placeholder="Donor ID" value="<?php echo 'D03-' . $id ?>" disabled> 
                                </div>

                                <div class="control-group">
                                  <label class="control-label">Weight</label><label class="control-label eg">(in Kg)</label>
                                  <div class="controls">
                                    <input class="form-control" disabled="" value="<?php echo $data['weight']?>">
                                    
                                  </div>
                                </div>

                                <!-- Text input-->
                                <div class="control-group">
                                  <label class="control-label">Specific Gravity</label><label class="control-label eg">()</label>
                                  <div class="controls">
                                    <input class="form-control" value="<?php echo $data['spgravity']?>" disabled>
                                    
                                  </div>
                                </div>

                                <!-- Text input-->
                                <div class="control-group">
                                  <label class="control-label">Hemoglobin</label><label class="control-label eg">()</label>
                                  <div class="controls">
                                    <input class="form-control" value="<?php echo $data['hemgb']?>" disabled="">
                                    
                                  </div>
                                </div>


                                <!-- Text input-->
                                <div class="control-group">
                                    <label class="control-label">Hematocrit</label><label class="control-label eg">()</label>
                                    <div class="controls">
                                        <input class="form-control" value="<?php echo $data['hemtcrt'] ?>" disabled="">
                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="control-group">
                                    <label class="control-label">Red Blood Cell</label><label class="control-label eg">()</label>
                                    <div class="controls">
                                        <input class="form-control" value="<?php echo $data['rbc'] ?>" disabled="">
                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="control-group">
                                    <label class="control-label" >White Blood Cell</label>
                                    <div class="controls">
                                        <input class="form-control" value="<?php echo $data['wbc'] ?>" disabled="">
                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="control-group">
                                    <label class="control-label">Platelet Count</label><label class="control-label eg">()</label>
                                    <div class="controls">
                                        <input class="form-control" value="<?php echo $data['pltcount'] ?>" disabled="">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Remarks</label>
                                    <div class="controls">
                                        <input class="form-control" value="<?php echo $data['remarks'] ?>" disabled="">
                                    </div>
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
                            </form>
                        </div>
                    </div>      
                </div>
            </div>

    <?php 
        include('footer.php');
    ?>

</body>
</html>