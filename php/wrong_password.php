<!DOCTYPE html>
<html lang="en">

	<head>
		<title>Bacolod City Water District</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="../css/bootstrap.min.css">
		<link rel="stylesheet" href="../css/style.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script src="../js/bootstrap.min.js"></script>

	</head>

	<body>

		
		<div class="container-fluid header">
			<div class="row">
				<div class="col-lg-1" id="image"><img src="../img/baciwa_logo.png" width="90" height="90"/></div>
				<div class="col-lg-11" id="label">
					<p><span id="desc">Bacolod City Water District</span><br/>
					Negros Occidental, Philippine 6100</p>
				</div>
			</div>
		</div>
		
		<div class="container-fluid wrapper">
		<div class="row">
			<div class="col-lg-8 text-center content">
				<div class="jumbotron thesis-title">
					<img src="../img/baciwa_thesis.png" /><br/>
					<h2>Planting Activity</h2>
					<p>Management System</p>
				</div>
			</div>
			<div class="col-lg-4">
				
                <div class="container loginContainer">
                    <div class="card card-container">
                        <img id="profile-img" class="profile-img-card" src="../img/tree_logo.png" />
                        <p id="profile-name" class="profile-name-card"></p>
                        <form class="form-signin" name="loginform" method="POST" action="../php/checklogin.php">
                            <span id="reauth-email" class="reauth-email"></span>
                            <input type="text" id="inputText" name="username" class="form-control" placeholder="Username" required autofocus>
                            <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
                            <div id="remember" class="checkbox">
                                <label>
                                    <input type="checkbox" class="checkbox-control" value="remember-me"> Remember me
                                </label>
                            </div>
                            <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Log in</button><br>
							<span style="color:white;">*Your username or password is incorrect </span>
                        </form><!-- /form -->
                    </div><!-- /card-container -->
                </div><!-- /container -->
			</div>
		</div>
		</div>	

	</body>
</html>