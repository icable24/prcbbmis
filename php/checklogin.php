<?php
include('../connect.php');
$tbl_name="user"; // Table name 

session_start();
{
    $user=$_POST['username'];
    $pass=$_POST['password'];
    $fetch=mysql_query("SELECT userid FROM `$tbl_name` WHERE 
                         username='$user' and password='$pass'");
    $count=mysql_num_rows($fetch);
    if($count!="")
    {
    $_SESSION['login_username']=$user;
    header("Location:../home.php"); 
    }
    else
    {
       header('Location:../wrong_password.php');
	   
    }
}
?>