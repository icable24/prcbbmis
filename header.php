<style type="text/css">
   ul.dropdown-menu>li:focus, .dropdown-menu>li:hover{
        background-color: #cc0000;
   }
   ul.dropdown-menu>li>a:hover  {
    background-color: #cc0000;
   }

</style><?php
    include_once 'login_success.php';
    
    require 'dbconnect.php';
    $username = $_SESSION['login_username'];
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM user WHERE username like  '$username'";
    $q = $pdo->prepare($sql);
    $q->execute();
    $user = $q->fetch(PDO::FETCH_ASSOC);

    $pdo = Database::connect();
    $notification = $pdo->prepare("
    SELECT SQL_CALC_FOUND_ROWS * 
    FROM examination
    WHERE remarks LIKE 'Pending'
    ");
    $notification->execute();
    $notification = $notification->fetchAll(PDO::FETCH_ASSOC);
    $total_exam_pending = $pdo->query("SELECT FOUND_ROWS() as total")->fetch()['total'];

    $notification = $pdo->prepare("
    SELECT SQL_CALC_FOUND_ROWS * 
    FROM screening
    WHERE remarks LIKE 'Pending'
    ");
    $notification->execute();
    $notification = $notification->fetchAll(PDO::FETCH_ASSOC);
    $total_screen_pending = $pdo->query("SELECT FOUND_ROWS() as total")->fetch()['total'];

    $total_notif = ((int)$total_exam_pending + (int)$total_screen_pending);
?>
<!DOCTYPE html>

<html>
    <head>
        <link rel="icon" type="image/png" href="img/PRClogo.png">
        <link href="css/header.css" rel="stylesheet" type="text/css"/>
        <link href="./css/custom_style.css" rel="stylesheet" type="text/css"/>
        <link href="css/font-awesome.min.css" rel="s tylesheet" type="text/css"/>
        
        <title>Philippine Red Cross Blood Bank Management Information System</title>
        <link rel="icon" type="image/png" href="img/PRClogo.png">
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="./css/bootstrap.min.css" type="text/css"/>
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    </head>

	<body>
        <!--HEADER-->
        <nav class="navbar navbar-inverse">
            <div class="container-fluid header">
            	
            		<div class="col-md-1" style="margin-right:0px">
                        <a href="home.php"><img src="./img/PRClogo.png" alt="thesis-logo" id="logo"/></a>
                	</div>
                    <div class="col-md-8">
                		<span style="font-size:42px; letter-spacing: 1px; margin-left: 10px;" >PHILIPPINE RED CROSS</span><br>
                		<span style="font-size:20px;padding-top:0px; letter-spacing: 1px; margin-left: 10px;">10th LACSON STREET, BACOLOD CITY, 6100 NEGROS OCCIDENTAL</span>
            		</div>
                    
                    <div class="pull-right">    

                        <div class="navbar navbar-right" style="background-color: #cc0000; margin-left: 10px; margin-top: 10px; min-height: 0px">
                            <a data-toggle="dropdown" style="color: white">
                                <span><?php echo $user['fname'] ?></span><b class="caret"> </b>
                                <ul class="dropdown-menu lihover" style="background-color: #ff3333;">
                                <?php if($user['usertype'] == 'Admin'){?>
                                    <li><a href="viewuser.php"><i class="glyphicon glyphicon-th-list"></i> User's List</a></li>
                                    <li class="divider"></li>                           
                                <?php } ?>
                                    <li><a href="./php/logout.php"><i class="glyphicon glyphicon-log-out"></i> Log Out</a></li>
                                </ul>
                            </a>
                        </div>
                        <?php if($user['usertype'] == 'Admin'){?>
                            <div class="navbar navbar-right" style="background-color: #cc0000; margin-left: 10px; margin-top: 10px; min-height: 0px">
                                <a data-toggle="dropdown" style="color: white">
                                <span class="glyphicon glyphicon-envelope"><span class="notification-counter"><?php if($total_notif > 0){
                                    echo $total_notif;
                                    } ?></span><b class="caret"> </b></span>
                                    
                                    <ul class="dropdown-menu lihover" style="background-color: #ff3333;">
                                    <?php if($total_screen_pending > 0){ ?>
                                        <li><a href="notification.php"><?php echo $total_screen_pending; ?> Donor Screening <br/>is Pending</a></li>
                                    <?php } ?>
                                    
                                    <?php if($total_exam_pending > 0){ ?>
                                        <li class="divider"></li>
                                        <li><a href="notification.php"><?php echo $total_exam_pending; ?> Donor Examination <br> is Pending</a></li>
                                    <?php } ?>
                                    </ul>
                                    <?php } ?>
                                </a>
                            </div>
                    </div>
                </div>
    	
            <!-- NAV BAR-->
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>                        
                </button>
            <div class="page_title_container" style="margin-top:0px">	
                <div class="collapse navbar-collapse" id="myNavbar"">
                    <ul class="nav navbar-nav">
                        <li class="dropdown menus">
                            <a href="#" data-toggle="dropdown ">PROFILES</a>
                            <ul class="dropdown-menu submenus">
                                <li><a href="donorlist.php">DONOR</a></li>
                                <li><a href="viewpatient.php">PATIENT</a></li>
                                <?php if($user['usertype'] == 'Admin'){?>
                                            <li><a href="viewbloodbank.php" >BLOOD BANK</a></li>
                                        
                                <?php } ?>       
                            </ul>
                        </li>
                        <li class="dropdown menus">
                            <a href="home.php" data-toggle="dropdown">TRANSACTIONS</a>
                            <ul class="dropdown-menu submenus">
                                <li><a href="viewcollection.php">BLOOD COLLECTION</a></li>
                                <li><a href="viewrequest.php">BLOOD REQUEST</a></li>
                                <li><a href="viewdispensing.php" >DISPENSING</a></li>
                                <li><a href="viewactivityscheduling.php" >ACTIVITY SCHEDULING</a></li>
                                <li><a href="viewtest.php" >BLOOD TEST</a></li>
                                <li><a href="inventory_list.php" >BLOOD INVENTORY</a></li>
                            </ul>
                        </li>
                         <?php if($user['usertype'] == 'Admin'){?>
                        <li><a href="report.php">REPORTS</a></li>
                        <li class="dropdown menus">
                            <a href="#" data-toggle="dropdown">MAINTENANCE</a>
                            <ul class="dropdown-menu submenus">
                                <li><a href="import.php">IMPORT</a></li>
                                <li><a href="export.php">BACK-UP</a></li>
                            </ul>  
                        </li>
                        <?php } ?> 
                        <li><a href="map.php">MAPS</a></li>
                           
                        
                    </ul>
                </div>  
        </nav>
    </body>
</html>
