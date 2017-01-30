<?php 
	include_once 'login_success.php';
	require 'dbconnect.php';

	$id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    if ( null==$id ) {
        header("Location: viewpatient.php");
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM patient where pid = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        Database::disconnect();
    }
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>

	<?php 
		include('header.php');
	?>
	<div class="container">
        <div class="container col-lg-offset-2 col-lg-8 content">
        <div class="panel panel-heading">   
            <h2>Remove Patient from the list?</h2>
        </div>
        <div class="panel panel-info">    
                <div class="panel panel-body"> 
                    <form class="form-horizontal" action="./php/patient_delete.php" method="post">
                        <input type="hidden" name="id" value="<?php echo $id;?>"/>
                        <?php
                            $pdo = Database::connect();
                            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            $sql = "SELECT * FROM patient where pid = ?";
                            $q = $pdo->prepare($sql);
                            $q->execute(array($id));
                            $data = $q->fetch(PDO::FETCH_ASSOC);
                            Database::disconnect();
                            
                            echo '<div class="alert alert-warning" role="alert">Proceed in deleting this patient: '.$data['pfname'].' ?</div>';
                        ?>
                            <div class="panel panel-footer">
                                <button type="submit" class="btn btn-danger">Yes</button>
                                <a class="btn" href="viewpatient.php">No</a>
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