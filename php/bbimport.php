<?php

error_reporting(E_ALL ^ E_DEPRECATED);
include '../import.php';
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
            $sql = "INSERT into bloodbank(bankname, bankaddress, contactdetails, country) values ('$emapData[0]','$emapData[1]','$emapData[2]','$emapData[3]')";
            mysql_query($sql);
        }
        fclose($file);
        echo 'CSV File has been successfully Imported';
        header('Location: ../import.php');
    }
    else
        echo 'Invalid File:Please Upload CSV File';
}
?>