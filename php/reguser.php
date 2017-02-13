<?php
error_reporting(E_ALL ^ E_DEPRECATED);
	require '../dbconnect.php';

	if(!empty($_POST)){

		//variables
                $fname = $_POST['fname'];
                $mname = $_POST['mname'];
                $lname = $_POST['lname'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$bankname = $_POST['bankname'];
                $usertype = $_POST['usertype'];
                
                
                $pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$checkusername = "SELECT username FROM user WHERE username ='$username'";
		$result = $pdo->query($checkusername);
		$numberOfRows = $result->rowcount();
                
                if($numberOfRows > 0){
			header("Location: ../usercreate.php?error=username");
		}else{
                    
		$sql = "INSERT INTO user (fname, mname, lname, username, password, bankname, usertype) values(?, ?, ?, ?, ?, ?, ?)";
                $q = $pdo->prepare($sql);     
                $q->execute(array($fname, $mname, $lname, $username, $password, $bankname, $usertype));
                Database::disconnect();
                header("Location: ../viewuser.php");
                }
        }
	
?>