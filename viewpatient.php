<?php include('login_success.php') ?>
<!-- <?php 
	require 'dbconnect.php';

// User Input
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$perPage = isset($_GET['per-page']) && $_GET['per-page'] <= 50 ? (int)$_GET['per-page'] : 10;

// Positioning
$start = ($page > 1) ? ($page * $perPage) - $perPage : 0;

// Query
$pdo = Database::connect();
$patient = $pdo->prepare("
	SELECT SQL_CALC_FOUND_ROWS * 
	FROM patient 
	LIMIT {$start},{$perPage}
");
$patient->execute();

$patient = $patient->fetchAll(PDO::FETCH_ASSOC);

// Pages
$total = $pdo->query("SELECT FOUND_ROWS() as total")->fetch()['total'];
$pages = ceil($total / $perPage);
?> -->
<!--Start of Html-->
<!DOCTYPE html>
<html>
<head>

</head>
<body>
        <style>

#myInput {
  background-image: url('./img/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}

#myTable {
  border-collapse: collapse;
  width: 100%;
  border: 1px solid #ddd;
  font-size: 18px;
}

#myTable th, #myTable td {
  text-align: left;
  padding: 12px;
}

#myTable tr {
  border-bottom: 1px solid #ddd;
}

#myTable tr.header, #myTable tr:hover {
  background-color: #f1f1f1;
}
</style>

	<?php 
		include('header.php');
	?>
	<div class="container">
		<div class="col-lg-12">
			<div class="row" style="border-bottom:solid 1px;margin-bottom:15px;">
					<div class="col-md-7">
						<h2>Patient List</h2>
					</div>
					<div class="col-md-5 text-right" style="padding-top:20px;">
                                           <!-- Import -->
                                            <a class="btn btn-success btn-md" data-toggle="modal" data-target="#myImport" style="background-color: #0088cc; border-color: #0088cc" title="Import"><span class="glyphicon glyphicon-import"></span></a>
                                            <!--end-->
                                            <a href="patientcreate.php" class="btn btn-success btn-md" title="Add Patient"><span class="glyphicon glyphicon-plus-sign"></span></a>
                                               
                                        </div>
				</div>
                      <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search.." title="Type in" style="width: 3in">
	      	<br>
			<div class="table-responsive">
                            <table class="table table-hover table-striped" id="myTable">
					<thead>
						<tr class="alert-info">
							<th class="text-center">Patient ID</th>
							<th class="text-center">Patient Name</th>
							<th class="text-center">Registration Date</th>
							<th class="text-center">Action</th>
						</tr>
					</thead>
					<tbody>					
						<?php
						require 'dbconnect.php';
							$pdo = Database::connect();
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = 'SELECT * FROM patient ORDER BY pid DESC';							
							foreach ($pdo->query($sql) as $row) {
								echo '<tr>';
									echo '<td>'. $row['pid'] . '</td>';
									echo '<td>'.$row['pfname']. ' ' . substr($row['pmname'],0,1) .'. ' . $row['plname'].'</td>';
									echo '<td>'.$row['pregdate'].'</td>';
									echo '<td class="text-center">
												<a class="btn btn-warning btn-md" href="patientupdate.php?id='.$row['pid'].'" data-toggle="tooltip" title="Update"><span class="glyphicon glyphicon-edit"></span></a>
												<a class="btn btn-danger btn-md" href="patientdelete.php?id='.$row['pid'].'" data-toggle="tooltip" title="Delete"><span class="glyphicon glyphicon-trash"></span></a>
								  		  </td>';
								echo '</tr>';
							}
							Database::disconnect();
						?>
					</tbody>
				</table>
<script>
function myFunction() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
			</div>
			<nav class="text-center">
				  <ul class="pagination">
					<?php if($page > 1){?>
						<li>
						  <a href="?page=<?php echo $page-1; ?>&per-page=<?php echo $perPage; ?>" aria-label="Previous">
							<span aria-hidden="true">&laquo;</span>
						  </a>
						</li>
					<?php }?>
					
					<?php for($x = 1; $x <= $pages; $x++) : ?>
						<li <?php if($page === $x){ echo 'class="active"'; }?> ><a href="?page=<?php echo $x; ?>&per-page=<?php echo $perPage; ?>"><?php echo $x; ?></a></li>
					<?php endfor; ?>
					
					<?php if($page < $pages){?>
						<li>
						  <a href="?page=<?php echo $page+1; ?>&per-page=<?php echo $perPage; ?>" aria-label="Next">
							<span aria-hidden="true">&raquo;</span>
						  </a>
						</li>
					<?php }?>
					
				  </ul>
			</nav>
		</div>
	</div>
   <!-- Delete Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document" >
			<div class="modal-content" style="margin-top:40%;">
				<div class="modal-header btn-danger">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Delete Patient</h4>
				</div>
				<form class="form-horizontal" action="./php/patient_delete.php" method="post">
					<div class="modal-body content">
						<input type="text" name="delid" id="deleteTextField" value="<?php echo $id;?>"/>
						<div class="alert alert-danger" role="alert">Are you sure you want to remove this patient from the system?</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
						<button type="submit" class="btn btn-danger">Delete</button>
					</div>
				</form>
			</div>
		</div>
  	</div>
   <!-- end -->
   <!-- Import -->
   <div class="modal fade" id="myImport" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document" >
			<div class="modal-content" style="margin-top:50%;">
                            <div class="modal-header" style="background-color: #99ccff">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Import Patient</h4>
				</div>
                            
				<form enctype="multipart/form-data" method="post" role="form">
                                    <center>
                                        <br>
                                            <input type="file" name="file" id="file">
                                                    <br><br>
                                                    <p class="help-block">Only Excel/CSV File Import.</p>
                                        
                                    
                                    </center>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                <a href="./php/patient_import.php"><button type="submit" class="btn" style="background-color: #ddd" name="Import" value="Import" id="Import">Import</button></a>
					</div>
                                                    </div>
				</form>
			</div>
		</div>
  	</div>

<!-- end -->

<!--edit @ footer.php-->
<?php
	include('footer.php');
?>

<?php
error_reporting(E_ALL ^ E_DEPRECATED);
if(isset($_POST["Import"]))
{
    //First we need to make a connection with the database
    $host='localhost'; // Host Name.
    $db_user= 'root'; //User Name
    $db_password= '';
    $db= 'prcbbmis'; // Database Name.
    $conn=mysql_connect($host,$db_user,$db_password) or die (mysql_error());
    mysql_select_db($db) or die (mysql_error());
    echo $filename=$_FILES["file"]["tmp_name"];
    if($_FILES["file"]["size"] > 0)
    {
        $file = fopen($filename, "r");
        //$sql_data = "SELECT * FROM prod_list_1 ";
        while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE)
        {
            //print_r($emapData);
            //exit();
            $sql = "INSERT into patient(pid, pfname, pmname, plname, paddress, pbirthdate, pgender, pcontact, pregdate) values ('$emapData[0]','$emapData[1]','$emapData[2]','$emapData[3]','$emapData[4]','$emapData[5]','$emapData[6]','$emapData[7]','$emapData[8]')";
            mysql_query($sql);
        }
        fclose($file);
        
        header('Location: ../viewpatient.php');
    }
    else
        echo 'Invalid File:Please Upload CSV File';
}
?>
</body>
</html>