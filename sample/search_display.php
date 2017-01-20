<?php 
include '../donorlist.php';
	  if(isset($_POST['submit'])){ 
	  if(isset($_GET['go'])){ 
	  if(preg_match("/^[  a-zA-Z]+/", $_POST['name'])){ 
	  $fname=$_POST['fname']; 
	  //connect  to the database 
	  $db=mysql_connect  ("localhost", "root",  "") or die ('I cannot connect to the database  because: ' . mysql_error()); 
	  //-select  the database to use 
	  $mydb=mysql_select_db("prcbbmis"); 
	  //-query  the database table 
	  $sql="SELECT  did, dfname, dmname, dlname FROM donor WHERE dfname LIKE '%" . $dfname .  "%' OR dlname LIKE '%" . $dlname ."%'"; 
	  //-run  the query against the mysql query function 
	  $result=mysql_query($sql); 
	  //-create  while loop and loop through result set 
	  while($row=mysql_fetch_array($result)){ 
	          $dfname  =$row['dfname']; 
	          $dmname=$row['dmname']; 
                  $dlname=$row['dlname'];
	          $did=$row['did']; 
	  //-display the result of the array 
	  echo "<ul>\n"; 
	  echo "<li>" . "<a  href=\"sample.php?id=$did\">"   .$dfname . " " . $dlname .  "</a></li>\n"; 
	  echo "</ul>"; 
	  } 
	  } 
	  else{ 
	  echo  "<p>Please enter a search query</p>"; 
	  } 
	  } 
	  } 
?> 