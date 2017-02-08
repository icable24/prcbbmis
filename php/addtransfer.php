<?php
	require '../dbconnect.php';

	if(!empty($_POST)){

		//variables
                $name = $_POST['requester'];
                $mname = $_POST['mname'];
                $lname = $_POST['lname'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$bankname = $_POST['bankname'];
                $usertype = $_POST['usertype'];
                
	
                $pdo = Database::connect();
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "INSERT INTO user (fname, mname, lname, username, password, bankname, usertype) values(?, ?, ?, ?, ?, ?, ?)";
                $q = $pdo->prepare($sql);     
                $q->execute(array($fname, $mname, $lname, $username, $password, $bankname, $usertype));
                Database::disconnect();
                header("Location: ../viewuser.php");
                
     }
	
?>