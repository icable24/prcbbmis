<?php
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
                
	
                if($bankname == $bankname){
                    $pdo = Database::connect();
                   $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                   $sql = "SELECT bankname FROM bloodbank WHERE status LIKE 'registered'";
                   $q = $pdo->prepare($sql);
                   $q->execute(array($id));
                   $data = $q->fetch(PDO::FETCH_ASSOC);
                   Database::disconnect();
	
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO user (fname, mname, lname, username, password, usertype) values(?, ?, ?, ?, ?, ?)";
			$q = $pdo->prepare($sql);
            $q->execute(array($fname, $mname, $lname, $username, $password, $usertype));
            Database::disconnect();
            header("Location: ../viewuser.php");
        }else{
            echo "Unregister blood bank";
        }
     }
	
?>