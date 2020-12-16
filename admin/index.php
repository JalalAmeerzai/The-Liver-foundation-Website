<?php

    require('DBConnect.php');
    require('logincheck.php');

    $query = "SELECT sum(stats_patients_treated) , sum(stats_camps_conducted) FROM stats";
    $result = mysqli_query($connection, $query);
    
    if (mysqli_num_rows($result) == 1){
        $row = mysqli_fetch_assoc($result);
        $noOfPatients = $row["sum(stats_patients_treated)"] ;
        $noOfCamps = $row["sum(stats_camps_conducted)"] ;
    }

    $query = "SELECT doctors_number FROM doctors";
    $result = mysqli_query($connection, $query);
    
    if (mysqli_num_rows($result) == 1){
        $row = mysqli_fetch_assoc($result);
        $noOfDoctors = $row["doctors_number"] ;
    }



    $query = "SELECT sum(finance_trust_receipts) , sum(finance_cinic_receipts) , sum(finance_trust_operations) , sum(finance_cinic_operations) FROM finance";
    $result = mysqli_query($connection, $query);
    
    if (mysqli_num_rows($result) == 1){
        $row = mysqli_fetch_assoc($result);
        $trustReceipts = $row["sum(finance_trust_receipts)"];
        $clinicReceipts = $row["sum(finance_cinic_receipts)"];
        $trustOperations = $row["sum(finance_trust_operations)"];
        $clinicOperations = $row["sum(finance_cinic_operations)"];
        $totalReceipts = $trustReceipts + $clinicReceipts ; 
        $totalExpenditures = $trustOperations + $clinicOperations ; 


        
    }
                    
               
                

?>


<!doctype html>
<!--[if lt IE 8]><html class="no-js lt-ie8"> <![endif]-->
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <title>Dashboard | The Liver Foundation</title>
        <!-- Mobile specific metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1 user-scalable=no">
        <!-- Force IE9 to render in normal mode -->
        <!--[if IE]><meta http-equiv="x-ua-compatible" content="IE=9" /><![endif]-->
        <meta name="author" content="" />
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <meta name="application-name" content="" />
        <!-- Import google fonts - Heading first/ text second -->
        <link href='http://fonts.googleapis.com/css?family=Quattrocento+Sans:400,700' rel='stylesheet' type='text/css'>
        <!-- Css files -->
        <!-- Icons -->
        <link href="css/icons.css" rel="stylesheet" />
        <!-- Bootstrap stylesheets (included template modifications) -->
        <link href="css/bootstrap.css" rel="stylesheet" />
        <!-- Plugins stylesheets (all plugin custom css) -->
        <link href="css/plugins.css" rel="stylesheet" />
        <!-- Main stylesheets (template main css file) -->
        <link href="css/main.css" rel="stylesheet" />
        <!-- Custom stylesheets ( Put your own changes here ) -->
        <link href="css/custom.css" rel="stylesheet" />
        <!-- Fav and touch icons -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="img/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="img/ico/apple-touch-icon-57-precomposed.png">
        <link rel="icon" href="img/ico/favicon.ico" type="image/png">
        <!-- Windows8 touch icon ( http://www.buildmypinnedsite.com/ )-->
        <meta name="msapplication-TileColor" content="#3399cc" />
    </head>
    <body>
        <!--[if lt IE 9]>
      <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
        <!-- .page-navbar -->
        <div id="header" class="page-navbar">
            <!-- .navbar-brand -->
            <a href="index.php" class="navbar-brand hidden-xs hidden-sm">
                <img src="img/logo.png" class="logo hidden-xs" alt="Dynamic logo">
                <img src="img/logosm.png" class="logo-sm hidden-lg hidden-md" alt="Dynamic logo">
                 
            </a>
            <!-- / navbar-brand -->
            <!-- .no-collapse -->
            <div id="navbar-no-collapse" class="navbar-no-collapse">
                <!-- top left nav -->
                <ul class="nav navbar-nav">
                    <li class="toggle-sidebar" id="menubut">
                        <a href="#">
                            <i class="fa fa-reorder"></i>
                            <span class="sr-only">Collapse sidebar</span>
                        </a>
                    </li>
                    
                </ul>
                <!-- / top left nav -->
                <!-- top right nav -->
                <ul class="nav navbar-nav navbar-right">
                    
                    <li id="otherbut">
                        <a href="settings.php">
                            <i class="fa fa-cog"></i>
                            <span class="sr-only">Settings</span>
                        </a>
                        
                    </li>
                    <li id="otherbut">
                        <a href="login.php">
                            <i class="fa fa-power-off" ></i>
                            <span class="sr-only">Logout</span>
                        </a>
                    </li>
                   
                </ul>
                <!-- / top right nav -->
            </div>
            <!-- / collapse -->
        </div>
        <!-- / page-navbar -->
        <!-- #wrapper -->
        <div id="wrapper">
            <!-- .page-sidebar -->
            <aside id="sidebar" class="page-sidebar hidden-md hidden-sm hidden-xs">
                <!-- Start .sidebar-inner -->
                <div class="sidebar-inner">
                    <!-- Start .sidebar-scrollarea -->
                    <div class="sidebar-scrollarea">
                        <!--  .sidebar-panel -->
                        <div class="sidebar-panel">
                            <h5 class="sidebar-panel-title">Account</h5>
                        </div>
                        <!-- / .sidebar-panel -->
                        <div class="user-info clearfix">
                            <img src="img/avatars/128.jpg" alt="avatar">
                            <span class="name">Mr. Bilal</span>
                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-xs"><i class="fa fa-user"></i>
                                </button>
                                <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">Admin 
                                </button>
                                
                            </div>
                        </div>
                        <!--  .sidebar-panel -->
                        <div class="sidebar-panel">
                            <h5 class="sidebar-panel-title">Navigation</h5>
                        </div>
                        <!-- / .sidebar-panel -->
                        <!-- .side-nav -->
                        <div class="side-nav">
                            <ul class="nav">
                                <li><a href="index.php" class="active"><i class="fa fa-laptop"></i><span class="txt">Dashboard</span></a>
                                </li>
                                
                               
                                <li>
                                    <a href="events.php"><i class="fa fa-calendar"></i><span class="txt">Events</span></a>
                                    
                                </li>
                                <li>
                                    <a href="finances.php"><i class="l-ecommerce-receipt-dollar"></i><span class="txt">Finances</span></a>
                                    
                                </li>
                                <li>
                                    <a href="stats.php"><i class="fa fa-user-md"></i><span class="txt">Hospital Information</span></a>
                                   
                                </li>
                                
                               
                                
                                
                               
                            </ul>
                        </div>
                        <!-- / side-nav -->
                        <!--  .sidebar-panel -->
                        
                        
                    </div>
                    <!-- End .sidebar-scrollarea -->
                </div>
                <!-- End .sidebar-inner -->
            </aside>
            <!-- / page-sidebar -->
           
            
            
            
            
            
            
            <!-- .page-content -->
            <div class="page-content sidebar-page clearfix">
                <!-- .page-content-wrapper -->
                <div class="page-content-wrapper">
                    <div class="page-content-inner">
                        <!-- .page-content-inner -->
                        <div id="page-header" class="clearfix">
                            
                            <div class="page-header">
                                <h2>Dashboard</h2>
                                <span class="txt">Welcome to The Liver Foundation</span>
                            </div>
                            
                        </div>
                        
                        
                        
                        <div class="row">
                            <!-- .row -->
                           
                            <!-- / .col-md-3 -->
                           
                            <!-- / .col-md-3 -->
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                <!-- .col-md-3 -->
                                <div class="panel panel-success tile ">
                                    <!-- Start .panel -->
                                    <div class="panel-heading">
                                        <h4 class="panel-title">Patients Treated &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h4>
                                    </div>
                                    <div class="panel-body pt0">
                                        <div class="progressbar-stats-1">
                                            <div class="stats">
                                                <i class="fa fa-heartbeat" style="color : white; font-size:30px;"></i> 
                                                <div class="stats-number" data-from="0" data-to="<?php echo $noOfPatients?>" style="color : white; font-size:30px;">0</div>
                                            </div>
                                            <div class="progress animated-bar flat transparent progress-bar-xs mb10 mt0">
                                                <div class="progress-bar progress-bar-white" role="progressbar" data-transitiongoal="35"></div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <!-- End .panel -->
                            </div>
                            <!-- / .col-md-3 -->
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                <!-- .col-md-3 -->
                                <div class="panel panel-danger tile ">
                                    <!-- Start .panel -->
                                    <div class="panel-heading">
                                        <h4 class="panel-title" style="color : white">Doctors Available &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h4>
                                    </div>
                                    <div class="panel-body pt0">
                                        <div class="progressbar-stats-1 dark">
                                            <div class="stats">
                                                <i class="fa fa-group" style="color : white; font-size:30px;"></i> 
                                                <div class="stats-number money" data-from="0" data-to="<?php echo $noOfDoctors?>" style="color : white; font-size:30px;">0</div>
                                            </div>
                                            <div class="progress animated-bar flat transparent progress-bar-xs mb10 mt0">
                                                <div class="progress-bar progress-bar-white" role="progressbar" data-transitiongoal="55"></div>
                                            </div>
                                           
                                        </div>
                                    </div>
                                </div>
                                <!-- End .panel -->
                            </div>
                            
                             <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                <!-- .col-md-3 -->
                                <div class="panel yellowback tile ">
                                    <!-- Start .panel -->
                                    <div class="panel-heading">
                                        <h4 class="panel-title" style="color : white">Free Camps &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h4>
                                    </div>
                                    
                                    <div class="panel-body pt0">
                                        <div class="progressbar-stats-1 dark">
                                            <div class="stats">
                                                <i class="	fa fa-calendar-plus-o" style="color : white; font-size:30px;"></i> 
                                                <div class="stats-number money" data-from="0" data-to="<?php echo $noOfCamps?>" style="color : white; font-size:30px;">0</div>
                                            </div>
                                            <div class="progress animated-bar flat transparent progress-bar-xs mb10 mt0">
                                                <div class="progress-bar progress-bar-white" role="progressbar" data-transitiongoal="55"></div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <!-- End .panel -->
                            </div>
                            
                             
                                <!-- End .panel -->
                            </div>
                            <!-- / .col-md-3 -->
                        </div>
                        <!-- / .row -->
                        <div class="row"style="display:none">
                            <!-- Start .row -->
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <!-- col-lg-8 start here -->
                                <div class="col-lg-12 col-sm-12 col-xs-12 p0">
                                    <!-- col-lg-9 start here -->
                                    <div class="panel panel-default plain btrr0 bbrr0" data-mh="payments">
                                        <!-- Start .panel -->
                                        <div class="panel-heading">
                                            <h4 class="panel-title" style="text-align:center; font-size: 25px;"><i class="fa fa-dollar"></i> Sales and Profits</h4>
                                             <form>
                                                 
                                                 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="supselectdiv1">
                                                    <select class="form-control select1"  id="barchartselect">
                                                        <option value="">Profit</option>
                                                        <option value="" selected>Sales</option>

                                                    </select>
                                                </div>
                                                 
                                            </form>
                                            <br><br><br>
                                            
                                            
                                            
                                            
                                        </div>
                                         
                                   
                                        
                                       
                                        
                                        
                                        <div class="panel-body">
                                                <div class="canvas-holder">
                                                    <canvas id="bar-chartjs-Monthly-Sales" height="1"></canvas>
                                                    <canvas id="bar-chartjs-Weekly-Sales" height="1" style="display:none;"></canvas>
                                                    <canvas id="bar-chartjs-Yearly-Sales" height="1" style="display:none"></canvas>
                                                    <canvas id="bar-chartjs-Monthly-Profit" height="1"></canvas>
                                                    <canvas id="bar-chartjs-Weekly-Profit" height="1" style="display:none;"></canvas>
                                                    <canvas id="bar-chartjs-Yearly-Profit" height="1" style="display:none"></canvas>
                                                    
                                                </div>
                                            
                                        </div>
                                    </div>
                                    <!-- End .panel -->
                                </div>
                               
                            </div>
                            <!-- col-lg-8 end here -->
                            
                            
                            
                            
                            
                            
                           
                            <!-- col-lg-4 end here -->
                        </div>
                        <!-- End .row -->
                       
                        
                        
                        
                        <div class="row" style="display:none">
                            <!-- Start .row -->
                            <div class="col-lg-1"></div>
                            <div class=" col-lg-5 col-md-12">
                                <div class="panel panel-default ">
                                    <div class="panel-heading" style=" color:rgba(155,32,97,1);">
                                            <h4 class="panel-title" style="text-align: center; font-size:25px; color:rgba(155,32,97,1);"><i class="fa fa-comment" style="font-size:25px; color:rgba(155,32,97,1);"></i>Unread Messages</h4>

                                    </div>
                                    
                                    <div class="panel-body">
                                        
                                <div class="col-lg-12 col-md-12">
                                    <!-- col-lg-4 start here -->
                                        <div class="panel panel-default plain" style="border:0;">
                                            <!-- Start .panel -->
                                            <div class="panel-heading">

                                                <h3 class="panel-title" style="text-align:center; font-size:25px;">Inbox</h3>
                                            </div>
                                            <div class="panel-body" style="text-align:center">
                                                
                                                <h4 id="subc"><i class="fa fa-envelope-o" style="color:rgba(155,32,97,1);"></i></h4>
                                                <br>
                                                <h3 class="panel-title" style="text-align:center; font-size:18px;"><i class="l-basic-elaboration-briefcase-check"></i> Unread Messages :<span style="color:rgba(155,32,97,1)"> 5</span></h3>
                                                <br>
                                                <a href="messages.php" id="subcbtn" class="">View All</a>

                                            </div>
                                            <br>
                                        </div>
                                    <!-- End .panel -->

                                    </div>
                            
                            
                            
                            
                            
                                 <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12" style="display:none">
                                    <!-- col-lg-4 start here -->

                                    <div class="panel panel-default plain" style="border:0;">

                                        <!-- Start .panel -->
                                        <div class="panel-heading" >
                                            <h4 class="panel-title" style="text-align: center; font-size:25px;"></h4>

                                        </div>
                                        <div class="panel-body">
                                            
                                            <div class="text-center">
                                                <div id="customer-exp" class="custom-progressbar blue" style="width:180px;height:180px;">
                                                    <div class="percent">55
                                                    </div>
                                                    <div class="description"></div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <!-- End .panel -->
                                </div>
                                    </div>
                                   
                               
                                </div>
                            </div>
                            
                            
                            
                            <div class="col-lg-5">
                                <!-- col-lg-6 start here -->
                                <div class="panel panel-default ">
                                    <!-- Start .panel -->
                                    <div class="panel-heading" style="">
                                        <h4 class="panel-title" style="text-align:center; font-size:25px; color:rgba(155,32,97,1);"><i class=" l-ecommerce-megaphone" style="font-size:25px; color:rgba(155,32,97,1);"></i>Events</h4>
                                    </div>
                                    <div class="panel-body">
                                        <ul class="timeline timeline-icons">
                                            <li>
                                                <p>
                                                    World Hepatitis Day 2019 <a href="" style="color:#9b2061">view</a>
                                                    <span class="timeline-icon"><i class="fa fa-calendar-plus-o" style="color: green; font-size:15px;"></i></span>
                                                    <span class="timeline-date">Dec 10, 22:00</span>
                                                </p>
                                            </li>
                                            <li>
                                                <p>
                                                    World Hepatitis Day 2019 <a href="" style="color:#9b2061">view</a>
                                                    <span class="timeline-icon"><i class="fa fa-calendar-plus-o" style="color: green; font-size:15px;"></i></span>
                                                    <span class="timeline-date">Dec 10, 22:00</span>
                                                </p>
                                            </li>
                                            <li>
                                                <p>
                                                    World Hepatitis Day 2019 <a href="" style="color:#9b2061">view</a>
                                                    <span class="timeline-icon"><i class="fa fa-calendar-plus-o" style="color: green; font-size:15px;"></i></span>
                                                    <span class="timeline-date">Dec 10, 22:00</span>
                                                </p>
                                            </li>
                                            <li>
                                                <p>
                                                    World Hepatitis Day 2019 <a href="" style="color:#9b2061">view</a>
                                                    <span class="timeline-icon"><i class="fa fa-calendar-plus-o" style="color: green; font-size:15px;"></i></span>
                                                    <span class="timeline-date">Dec 10, 22:00</span>
                                                </p>
                                            </li>
                                            
                                            
                                           
                                            
                                        </ul>
                                        <br>
                                       <h4 style="text-align:center"> <a href="events.php" class="btn btn-default timeline-load-more-btn" ><i class="fa fa-plus"></i> View All </a></h4>
                                    </div>
                                </div>
                                <!-- End .panel -->
                            </div>
                        
                        </div>
                        <!-- End .row -->
                        
                         <div class="row">
                            
                             <div class="col-lg-12">
                                <!-- col-lg-6 start here -->
                               
                                <div class="col-lg-4 col-md-12">
                                    <!-- col-lg-4 start here -->
                                        <div class="panel panel-default " style="border:0;">
                                            <!-- Start .panel -->
                                            <div class="panel-heading" style=" background-color:rgba(155,32,97,.8);">

                                                <h3 class="panel-title" style="text-align:center; font-size:25px; color:white">Finances</h3>
                                            </div>
                                            <div class="panel-body" style="text-align:center">
                                                
                                                <h4 id="subc"><i class="fa fa-pie-chart" style="color:#9b2061"></i></h4>
                                                <br>
                                                <h3 class="panel-title" style="text-align:center; font-size:18px;">
                                                     Total Receipts
                                                    <br>
                                                    <div class="stats-number cash" data-from="<?php echo $totalReceipts; ?>" data-to="83175038" style="color:#9b2061; font-size:25px; padding-top:10px">0</div>
                                                </h3>
                                                 <br>
                                                <h3 class="panel-title" style="text-align:center; font-size:18px;">
                                                     Total Expenditures
                                                    <br>
                                                    <div class="stats-number cash" data-from="0" data-to="<?php echo $totalExpenditures; ?>" style="color:#9b2061; font-size:25px; padding-top:10px">0</div>
                                                </h3>
                                               

                                            </div>
                                            <br>
                                        </div>
                                    <!-- End .panel -->

                                </div>
                                        
                                        
                                        
                                      
                                        
                                        
                                        
                                  <div class="col-lg-4 col-md-12">
                                    <!-- col-lg-4 start here -->
                                        <div class="panel panel-default " style="border:0;">
                                            <!-- Start .panel -->
                                            <div class="panel-heading" style=" background-color:rgba(155,32,97,.8);">

                                                <h3 class="panel-title" style="text-align:center; font-size:25px; color:white">Receipts</h3>
                                            </div>
                                            <div class="panel-body" style="text-align:center">
                                                
                                                <h4 id="subc"><i class="l-ecommerce-graph3" style="color:#9b2061"></i></h4>
                                                <br>
                                                <h3 class="panel-title" style="text-align:center; font-size:18px;">
                                                     Trust Receipts
                                                    <br>
                                                    <div class="stats-number cash" data-from="0" data-to="<?php echo $trustReceipts; ?>" style="color:#9b2061; font-size:25px; padding-top:10px">0</div>
                                                </h3>
                                                 <br>
                                                <h3 class="panel-title" style="text-align:center; font-size:18px;">
                                                     Clinic Receipts
                                                    <br>
                                                    <div class="stats-number cash" data-from="0" data-to="<?php echo $clinicReceipts; ?>" style="color:#9b2061; font-size:25px; padding-top:10px">0</div>
                                                </h3>
                                               

                                            </div>
                                            <br>
                                        </div>
                                    <!-- End .panel -->

                                </div>
                                    
                                        
                                  
                                 <div class="col-lg-4 col-md-12">
                                    <!-- col-lg-4 start here -->
                                        <div class="panel panel-default " style="border:0;">
                                            <!-- Start .panel -->
                                            <div class="panel-heading" style=" background-color:rgba(155,32,97,.8);">

                                                <h3 class="panel-title" style="text-align:center; font-size:25px; color:white"">Expenditures</h3>
                                            </div>
                                            <div class="panel-body" style="text-align:center">
                                                
                                                <h4 id="subc"><i class="l-ecommerce-banknotes" style="color:#9b2061;"></i></h4>
                                                <br>
                                                <h3 class="panel-title" style="text-align:center; font-size:18px;">
                                                     Trust Operations
                                                    <br>
                                                    <div class="stats-number cash" data-from="0" data-to="<?php echo $trustOperations; ?>" style="color:#9b2061; font-size:25px; padding-top:10px">0</div>
                                                </h3>
                                                 <br>
                                                <h3 class="panel-title" style="text-align:center; font-size:18px;">
                                                     Clinic Operations
                                                    <br>
                                                    <div class="stats-number cash" data-from="0" data-to="<?php echo $clinicOperations; ?>" style="color:#9b2061; font-size:25px; padding-top:10px">0</div>
                                                </h3>
                                               

                                            </div>
                                            <br>
                                        </div>
                                    <!-- End .panel -->

                                </div>
                                        
                                        
                                        
                                  
                                
                                        
                                        
                                        
                                
                                </div>
                                <!-- End .panel -->
                            </div>
                        
                        
                        
                        </div>
                    </div>
                    <!-- / .page-content-inner -->
                </div>
                <!-- / page-content-wrapper -->
            </div>
            <!-- / page-content -->
        </div>
        <!-- / #wrapper -->
        <div id="footer" class="clearfix sidebar-page">
            <!-- Start #footer  -->
            <p class="pull-left">
                Admin Portal | <a href=""  target="_blank" style="color:rgb(155,32,97)">The Liver Foundation</a>
            </p>
            <p class="pull-right">
                
                Designed by 
                <a href="#" class="ml5 mr25" style="color:rgb(155,32,97)">Team NVP</a>
            </p>
        </div>
        <!-- End #footer  -->
        <!-- Back to top -->
        <div id="back-to-top"><a href="#">Back to Top</a>
        </div>
        <!-- Javascripts -->
        <!-- Load pace first -->
        <script src="plugins/core/pace/pace.min.js"></script>
        <!-- Important javascript libs(put in all pages) -->
        <script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script>
        window.jQuery || document.write('<script src="js/libs/jquery-2.1.1.min.js">\x3C/script>')
        </script>
        <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
        <script>
        window.jQuery || document.write('<script src="js/libs/jquery-ui-1.10.4.min.js">\x3C/script>')
        </script>
        <!--[if lt IE 9]>
  <script type="text/javascript" src="js/libs/excanvas.min.js"></script>
  <script type="text/javascript" src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
  <script type="text/javascript" src="js/libs/respond.min.js"></script>
<![endif]-->
        <!-- Bootstrap plugins -->
        <script src="js/bootstrap/bootstrap.js"></script>
        <!-- Core plugins ( not remove ) -->
        <script src="js/libs/modernizr.custom.js"></script>
        <!-- Handle responsive view functions -->
        <script src="js/jRespond.min.js"></script>
        <!-- Custom scroll for sidebars,tables and etc. -->
        <script src="plugins/core/slimscroll/jquery.slimscroll.min.js"></script>
        <script src="plugins/core/slimscroll/jquery.slimscroll.horizontal.min.js"></script>
        <!-- Remove click delay in touch -->
        <script src="plugins/core/fastclick/fastclick.js"></script>
        <!-- Increase jquery animation speed -->
        <script src="plugins/core/velocity/jquery.velocity.min.js"></script>
        <!-- Quick search plugin (fast search for many widgets) -->
        <script src="plugins/core/quicksearch/jquery.quicksearch.js"></script>
        <!-- Bootbox fast bootstrap modals -->
        <script src="plugins/ui/bootbox/bootbox.js"></script>
        <!-- Other plugins ( load only nessesary plugins for every page) -->
        <script src="js/libs/date.js"></script>
        <script src="plugins/charts/flot/jquery.flot.custom.js"></script>
        <script src="plugins/charts/flot/jquery.flot.pie.js"></script>
        <script src="plugins/charts/flot/jquery.flot.resize.js"></script>
        <script src="plugins/charts/flot/jquery.flot.time.js"></script>
        <script src="plugins/charts/flot/jquery.flot.growraf.js"></script>
        <script src="plugins/charts/flot/jquery.flot.categories.js"></script>
        <script src="plugins/charts/flot/jquery.flot.stack.js"></script>
        <script src="plugins/charts/flot/jquery.flot.orderBars.js"></script>
        <script src="plugins/charts/flot/jquery.flot.tooltip.min.js"></script>
        <script src="plugins/charts/flot/jquery.flot.curvedLines.js"></script>
        <script src="plugins/charts/sparklines/jquery.sparkline.js"></script>
        <script src="plugins/charts/progressbars/progressbar.js"></script>
        <script src="plugins/ui/waypoint/waypoints.js"></script>
        <script src="plugins/ui/weather/skyicons.js"></script>
        <script src="plugins/ui/notify/jquery.gritter.js"></script>
        <script src="plugins/misc/vectormaps/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="plugins/misc/vectormaps/maps/jquery-jvectormap-world-mill-en.js"></script>
        <script src="plugins/misc/countTo/jquery.countTo.js"></script>
        <script src="js/jquery.dynamic.js"></script>
        <script src="js/main.js"></script>
        <script src="plugins/forms/bootstrap-datepicker/bootstrap-datepicker.js"></script>
         <script src="plugins/forms/fancyselect/fancySelect.js"></script>
        <script src="plugins/forms/select2/select2.js"></script>
        <script src="plugins/forms/maskedinput/jquery.maskedinput.js"></script>
        <script src="plugins/forms/dual-list-box/jquery.bootstrap-duallistbox.js"></script>
        <script src="plugins/forms/spinner/jquery.bootstrap-touchspin.js"></script>
        <script src="plugins/forms/bootstrap-datepicker/bootstrap-datepicker.js"></script>
        <script src="plugins/forms/bootstrap-timepicker/bootstrap-timepicker.js"></script>
        <script src="plugins/forms/bootstrap-colorpicker/bootstrap-colorpicker.js"></script>
        <script src="plugins/forms/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>
       <script src="plugins/charts/chartjs/Chart.js"></script>
<!--    -->
   
  
        <script src="js/pages/user.js"></script>
    
   
        
    </body>
</html>