
<!DOCTYPE html>
<html lang="en">
    <head>
    </head>
    <body>
<?php
include 'header.php';
?>
        <br><br>
        
    <center> 
        <div style="background-color: white; width: 5in; height: 5in">
<form enctype="multipart/form-data" method="post" role="form">
    <div class="form-group">
          <br><br>
        <label for="exampleInputFile" style="font-family: times new roman; font-size: 30px">Import File.</label>
        <br><br><br><br>
        <!-- Select Basic -->
							<div class="control-group">
						
							  <div class="controls">
                                                              <form action="" method="post">
                                                              <select id="categs" name="country" class="form-control" style="width: 3in">
                                                                <option value="none">-Select File to Import-</option>
                                                                <option value="1" id="d" name="d" onchange="toggleStatus()">Donor</option>
                                                                <option value="2" id="p" name="p" onchange="toggleStatus()">Patient</option>
                                                                <option value="3" id="bb" name="bb" onchange="toggleStatus()">Blood Bank</option>
                                                                
                                                                
							    </select>
                                                           
             			</div>
        <br>
        <input type="file" name="file" id="file">
        <br><br>
        <p class="help-block">Only Excel/CSV File Import.</p>
    </div>
    <br>
    <button type="submit" class="btn btn-default" name="Import" value="Import" id="Import" style="background-color: #ffcc66 ;height: 1in; width: 3in; font-family: times new roman; font-size: 30px">Upload</button>
</form>
        </div>
    </center>
    <br><br><br><br>

    <?php 
		include('footer.php');
	?>
    </body>
</html>
<div id="i1">
<?php
    echo $filename=$_FILES["file"]["tmp_name"];
    if($_FILES["file"]["size"] > 0)
    {
        $file = fopen($filename, "r");
        //$sql_data = "SELECT * FROM prod_list_1 ";
        if (($emapData = fgetcsv($file, 10000, ",")) !== FALSE)
        {
            //print_r($emapData);
            //exit();
            $sql = "INSERT into donor (did, dfname, dmname, dlname, daddress, dbirthdate, dgender, dreligion, dcontact, dtype, dnationality, demail, dregdate, dremarks, bloodinfo) values ('$emapData[0]','$emapData[1]','$emapData[2]','$emapData[3]','$emapData[4]','$emapData[5]','$emapData[6]','$emapData[7]','$emapData[8]','$emapData[9]','$emapData[10]','$emapData[11]','$emapData[12]','$emapData[13]','$emapData[14]')";
            mysql_query($sql);
        }
        fclose($file);
        
        header('Location: import.php');
    }
    else{
        echo 'Invalid File:Please Upload CSV File';
    }
?>
</div>
<div id="i2">
    <?php

if(isset($_POST["Import"]))
{
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
        
        header('Location: import.php');
    }
    else
        echo 'Invalid File:Please Upload CSV File';
}
?>
</div>

<div id="i3">
<?php

if(isset($_POST["Import"]))
{
    echo $filename=$_FILES["file"]["tmp_name"];
    if($_FILES["file"]["size"] > 0)
    {
        $file = fopen($filename, "r");
        //$sql_data = "SELECT * FROM prod_list_1 ";
        while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE)
        {
            //print_r($emapData);
            //exit();
            $sql = "INSERT into bloodbank(bankname, bankaddress, contactdetails, country) values ('$emapData[0]','$emapData[1]','$emapData[2]','$emapData[3]')";
            mysql_query($sql);
        }
        fclose($file);
        
        header('Location: import.php');
    }
    else
        echo 'Invalid File:Please Upload CSV File';
}
?>
</div>

 <script>

	
  function toggleStatus() {
    if ($('#bb').is(':selected')) {
        $('#f3 :input').removeAttr('disabled');
        //
    } else {
        $('#f2 :input').attr('disabled', true);
    }
        
    if ($('#p').is(':selected')) {
        $('#f2 :input').removeAttr('disabled');
        //
    } else {
        $('#f2 :input').attr('disabled', true);
    }

    if ($('#d').is(':selected')) {
        $('#f1 :input').removeAttr('disabled');
        //
    } else {
        $('#f1 :input').attr('disabled', true);
    }				                                                                                         $('#f1: input').attr('disabled', true);
    }
	
       
    
</script>