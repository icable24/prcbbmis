<?php
error_reporting(E_ALL ^ E_DEPRECATED);
function backup_Database($hostName,$userName,$password,$DbName,$tables = '*')
{
  
  // CONNECT TO THE DATABASE
  $con = mysql_connect($hostName,$userName,$password) or die(mysql_error());
  mysql_select_db($DbName,$con) or die(mysql_error());
  
  
  // GET ALL TABLES
  if($tables == '*')
  {
    $tables = array();
    $result = mysql_query('SHOW TABLES');
    while($row = mysql_fetch_row($result))
    {
      $tables[] = $row[0];
    }
  }
  else
  {
    $tables = is_array($tables) ? $tables : explode(',',$tables);
  }
  
  $return = 'SET FOREIGN_KEY_CHECKS=0;' . "\r\n";
  $return.= 'SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";' . "\r\n";
  $return.= 'SET AUTOCOMMIT=0;' . "\r\n";
  $return.= 'START TRANSACTION;' . "\r\n";
  
  
  foreach($tables as $table)
  {
    $result = mysql_query('SELECT * FROM '.$table) or die(mysql_error());
    $num_fields = mysql_num_fields($result) or die(mysql_error());
    
    $data.= 'DROP TABLE IF EXISTS '.$table.';';
    $row2 = mysql_fetch_row(mysql_query('SHOW CREATE TABLE '.$table));
    $data.= "\n\n".$row2[1].";\n\n";
    
    for ($i = 0; $i<$num_fields; $i++) 
    {
      while($row = mysql_fetch_row($result))
      {
        $data.= 'INSERT INTO '.$table.' VALUES(';
        for($x=0; $x<$num_fields; $x++) 
        {
          $row[$x] = addslashes($row[$x]);
		  $row[$x] = clean($row[$x]); // CLEAN QUERIES
          if (isset($row[$x])) { 
		  	$data.= '"'.$row[$x].'"' ; 
		  } else { 
		  	$data.= '""'; 
		  }
		  
          if ($x<($num_fields-1)) { 
		  	$data.= ','; 
		  }
        }  // end of the for loop 2
        $data.= ");\n";
      } // end of the while loop 
    } // end of the for loop 1
	
    $data.="\n\n\n";
  }  // end of the foreach*/
  
    $return .= 'SET FOREIGN_KEY_CHECKS=1;' . "\r\n";
	$return.= 'COMMIT;';
  
  //SAVE THE BACKUP AS SQL FILE
  $handle = fopen($DbName.'-Database-Backup-'.date('Y-m-d @ h-i-s').'.sql','w+');
  fwrite($handle,$data);
  fclose($handle);
   
   if($data)
   		return true;
   else
		return false;
 }  // end of the function
 
 
//  CLEAN THE QUERIES
function clean($str) {
	if(@isset($str)){
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysql_real_escape_string($str);
	}
	else{
		return 'NULL';
	}
}
 
 
?>
<?php
 // CALL TO THE FUNCTION
 $backup_response = backup_Database('localhost','root','','prcbbmis');
  if($backup_response) {
	echo 'Database Backup Successfully Created!';  
  }
  else {
	echo 'Errors in Database Backup Creating!';    
  }
 
?>