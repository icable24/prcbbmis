<?php

    include('login_success.php');
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="./css/custom_style.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.theme.mis.css">
</head>
<body>

<?php 
	
	include('header.php');
       ?> 
    <br><br>
    <p style="font-size: 50px; text-align: center; color: black; font-weight: bold">Good Day! <br>
         <?php $_SESSION["username"] = $username; 
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM user WHERE username like  '$username'";
            $q = $pdo->prepare($sql);
            $q->execute();
            $user = $q->fetch(PDO::FETCH_ASSOC);

            echo $user['fname'];
         ?> </p>
    <br>
<center> <img src="img/welcome.png" alt=""/></center>
    <br><br>
        <?php 
	
	include ('footer.php');

?>

</body>
</html>