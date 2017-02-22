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
    
    $notification = $pdo->prepare("
    SELECT SQL_CALC_FOUND_ROWS * 
    FROM transfer
    WHERE remarks LIKE 'pending'
    ");
    $notification->execute();
    $notification = $notification->fetchAll(PDO::FETCH_ASSOC);
    $total_transbych_pending = $pdo->query("SELECT FOUND_ROWS() as total")->fetch()['total'];
    
    $notification = $pdo->prepare("
    SELECT SQL_CALC_FOUND_ROWS * 
    FROM bycountry
    WHERE remarks LIKE 'pending'
    ");
    $notification->execute();
    $notification = $notification->fetchAll(PDO::FETCH_ASSOC);
    $total_transbyc_pending = $pdo->query("SELECT FOUND_ROWS() as total")->fetch()['total'];

    $notification = $pdo->prepare("
    SELECT SQL_CALC_FOUND_ROWS * 
    FROM bloodrequest
    WHERE status LIKE 'Pending' 
    ");
    $notification->execute();
    $notification = $notification->fetchAll(PDO::FETCH_ASSOC);
    $total_request_pending = $pdo->query("SELECT FOUND_ROWS() AS total")->fetch()['total'];
    

    $notification = $pdo->prepare("
    SELECT SQL_CALC_FOUND_ROWS * 
    FROM componentsprep
    WHERE remarks LIKE 'Pending' 
    ");
    $notification->execute();
    $notification = $notification->fetchAll(PDO::FETCH_ASSOC);
    $total_prep_pending = $pdo->query("SELECT FOUND_ROWS() AS total")->fetch()['total'];


    $total_notif = ((int)$total_exam_pending + (int)$total_screen_pending + (int)$total_request_pending + (int)$total_prep_pending) + (int)$total_transbyc_pending + (int)$total_transbych_pending;

    $pdo = Database::connect();
    $d = $pdo->prepare("
        SELECT SQL_CALC_FOUND_ROWS * 
        FROM donor 
    ");
    $d->execute();
    $d = $d->fetchAll(PDO::FETCH_ASSOC);
    $pdo2 = Database::connect();
    $pdo2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql2 = $pdo2->prepare("
            SELECT * FROM examination WHERE examid = ? 
        "); 
    $pdo3 = Database::connect();
    $pdo3->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql3 = $pdo3->prepare("
            SELECT * FROM screening WHERE scrid = ? 
        "); 

    foreach ($d as $row) {
        $sql2->execute(array($row['did']));
        $d1 = $sql2->fetchAll(PDO::FETCH_ASSOC);

        $sql3->execute(array($row['did']));
        $d2 = $sql3->fetchAll(PDO::FETCH_ASSOC);

        $pdo4 = Database::connect();
        $pdo4->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql4 = $pdo4->prepare("SELECT * FROM bloodinformation WHERE bloodid = ?");
        $sql4->execute(array($row['bloodinfo']));
        $d3 = $sql4->fetch(PDO::FETCH_ASSOC);

        for($i = 0; $i < count($d1) && $i < count($d2); $i++ ){
            $exams = $d1[$i];
            $screens = $d2[$i];
            $sql4 = 'UPDATE donor SET dremarks = ? WHERE did = ?';
            $q = $pdo->prepare($sql4);

            if($exams['remarks'] == 'Accepted' && $screens['remarks'] == 'Accepted'){
                $q->execute(array('Accepted', $row['did']));
            }elseif($exams['remarks'] == 'Deferred' || $screens['remarks'] == 'Deferred'){
                $q->execute(array('Deferred', $row['did']));
            }elseif($exams['remarks'] == 'Temporarily Deferred' || $screens['remarks'] == 'Temporarily Deferred'){
                $q->execute(array('Temporarily Deferred', $row['did']));
            }                                   else{
                $q->execute(array('Pending', $row['did']));
            }
        }   
    }
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
                                <span class="glyphicon glyphicon-bell"><span class="notification-counter">
                                    <?php if($total_notif > 0){
                                        echo $total_notif;
                                        } ?></span><b class="caret"> </b></span>
                                        
                                        <ul class="dropdown-menu lihover" style="background-color: #ff3333;">
                                            <?php if($total_screen_pending > 0){ ?>
                                                <li><a href="notification.php"><?php echo $total_screen_pending; ?> Donor Screening <br>is Pending</a></li>
                                            <?php } ?>
                                            
                                            <?php if($total_exam_pending > 0){ ?>
                                                <hr class="notif-divider" />
                                                <li><a href="notification.php"><?php echo $total_exam_pending; ?> Donor Examination <br> is Pending</a></li>
                                            <?php } ?>

                                            <?php if($total_request_pending > 0){ ?>
                                                <hr class="notif-divider"/>
                                                <li><a href="notification.php"><?php echo $total_request_pending; ?> Blood 
                                                Request <br> waiting for Approval</a></li>
                                            <?php } ?>

                                            <?php if($total_prep_pending > 0){ ?>
                                                <hr class="notif-divider"/>
                                                <li><a href="notification.php"><?php echo $total_prep_pending; ?>  
                                                Components<br> Preparation is Pending</a></li>
                                            <?php } ?>
                                                
                                            <?php if($total_transbyc_pending > 0){ ?>
                                                <hr class="notif-divider"/>
                                                <li><a href="notification.php"><?php echo $total_transbyc_pending; ?>  
                                                Blood Transfer<br>by Country<br> Request is Pending</a></li>
                                            <?php } ?>
                                            
                                            <?php if($total_transbych_pending > 0){ ?>
                                                <hr class="notif-divider"/>
                                                <li><a href="notification.php"><?php echo $total_transbych_pending; ?>  
                                                Blood Transfer by <br>Chapter/Hospital<br> Request is Pending</a></li>
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
                                <li><a href="components_prep.php">COMPONENTS PREP</a></li>
                                <li><a href="viewtest.php" >SEROLOGY</a></li>
                                <li><a href="inventory_list.php" >BLOOD INVENTORY</a></li>
                                <li><a href="viewrequest.php">BLOOD REQUEST</a></li>
                                <li><a href="viewdispensing.php" >DISPENSING</a></li>
                                <li><a href="viewtransfer.php">BLOOD TRANSFER</a></li>
                                <li><a href="viewactivityscheduling.php" >ACTIVITY SCHEDULING</a></li>
                            </ul>
                        </li>
                         <?php if($user['usertype'] == 'Admin'){ ?>
                        <li><a href="report.php">REPORTS</a></li>
                        
                        <li> <a href="export.php">BACK-UP</a> </li>
                        
                        <li><a href="map.php">MAP</a></li>
                         <?php } ?>  
                        <?php if($user['usertype'] == 'PRC User'){ ?>
                        <li><a href="PRC_Map.php">MAP</a></li>
                        <?php } ?>
                        
                    </ul>
                </div>  
        </nav>
    </body>
</html>
