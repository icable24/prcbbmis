<?php
error_reporting(E_ALL ^ E_DEPRECATED);
include 'viewuser.php';
require 'dbconnect.php';

$id =$_REQUEST['delid'];

$con = mysql_connect("localhost","username","password");
if (!$con)
{
die('Could not connect: ' . mysql_error());
}

mysql_select_db("database", $con);

// sending query
mysql_query("DELETE FROM user WHERE userid = '$id'")
or die(mysql_error());      

?>