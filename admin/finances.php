<?php
    
    require('DBConnect.php');
    require('logincheck.php');

    $error = "none";
    $messageSuccess = "none";

    if(isset($_GET["delete"])){
        if($_GET["delete"] == "successful")
            $messageSuccess = "block";
        else if($_GET["delete"] == "unsuccessful")
            $error = "block";
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
        <title>Finances | The Liver Foundation</title>
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
           
            <!-- / page-sidebar -->
            <!-- / page-sidebar -->
            <!-- Start #right-sidebar -->
            
            
            
            <!-- End #right-sidebar -->
            <!-- .page-content -->
            <div class="page-content sidebar-page right-sidebar-page clearfix">
                <!-- .page-content-wrapper -->
                <div class="page-content-wrapper">
                    <div class="page-content-inner">
                        <!-- Start .page-content-inner -->
                        <div id="page-header" class="clearfix">
                            <div class="page-header">
                                <h2>Finances</h2>
                                <span class="txt">Listing the audited information regarding trusts finances.</span>
                            </div>
                            
                        </div>
                        <!-- Start .row -->






                         


                        
                        <div class="row">
                            <div class="col-lg-12">
                                <!-- col-lg-12 start here -->
                                <div class="panel panel-default plain ">
                                    <!-- Start .panel -->
                                    
                                    
                                  
                                    <div class="panel-body">

                            
                            
                            <div class="alert alert-danger" role="alert" style="display:<?php echo $error;?>">
                                Something Went Wrong! Try Again.                                               
                            </div>

                            <div class="alert alert-success" role="alert" style="display:<?php echo $messageSuccess;?>">
                                Record Deleted Successfully                                               
                            </div>



                            <div class="col-lg-4 col-md-12">
                                <!-- col-lg-4 start here -->
                                <div class="panel panel-default plain">
                                    <!-- Start .panel -->
                                    <div class="panel-heading">
                                
                                        <h3 class="panel-title" style="text-align:center; font-size:25px;">Finances</h3>
                                    </div>
                                    <div class="panel-body" style="text-align:center">
                                        
                                        <h4 id="subc"><i class="fa fa-pie-chart text-success" style=""></i></h4>
                                        <br>
                                        <h3 class="panel-title" style="text-align:center; font-size:18px;">Total Receipts :<span class="text-success"> <?php echo $totalReceipts ?></span></h3>
                                        <br>
                                        <h3 class="panel-title" style="text-align:center; font-size:18px;">Total Expenditures :<span class="text-success""> <?php echo $totalExpenditures ?></span></h3>
                                        
                                        
                                    </div>
                                    <br>
                                </div>
                                <!-- End .panel -->
                            </div>


                            <div class="col-lg-4 col-md-12">
                                <!-- col-lg-4 start here -->
                                <div class="panel panel-default plain">
                                    <!-- Start .panel -->
                                    <div class="panel-heading">
                                
                                        <h3 class="panel-title" style="text-align:center; font-size:25px;">Receipts</h3>
                                    </div>
                                    <div class="panel-body" style="text-align:center">
                                        
                                        <h4 id="subc"><i class="l-ecommerce-graph3 text-danger" ></i></h4>
                                        <br>
                                        <h3 class="panel-title" style="text-align:center; font-size:18px;">Trust Receipts :<span class="text-danger"> <?php echo $trustReceipts ?></span></h3>
                                        <br>
                                        <h3 class="panel-title" style="text-align:center; font-size:18px;">Clinic Receipts :<span class="text-danger"> <?php echo $clinicReceipts ?></span></h3>
                                        
                                        
                                    </div>
                                    <br>
                                </div>
                                <!-- End .panel -->
                            </div>


                            <div class="col-lg-4 col-md-12">
                                <!-- col-lg-4 start here -->
                                <div class="panel panel-default plain">
                                    <!-- Start .panel -->
                                    <div class="panel-heading">
                                
                                        <h3 class="panel-title" style="text-align:center; font-size:25px;">Expenditures</h3>
                                    </div>
                                    <div class="panel-body" style="text-align:center">
                                        
                                        <h4 id="subc"><i class="l-ecommerce-banknotes text-warning" ></i></h4>
                                        <br>
                                        <h3 class="panel-title" style="text-align:center; font-size:18px;">Trust Operations :<span class="text-warning"> <?php echo $trustOperations ?></span></h3>
                                        <br>
                                        <h3 class="panel-title" style="text-align:center; font-size:18px;">Clinic Operations :<span class="text-warning"> <?php echo $clinicOperations ?></span></h3>
                                        
                                        
                                    </div>
                                    <br>
                                </div>
                                <!-- End .panel -->
                            </div>


                                    
                                        <div class="col-lg-4"></div>
                                        <div class="col-lg-4"></div>
                                        <div style="col-lg-4">
                                            
                                               
                                             
                                            
                                            <div style="col-lg-12">
                                                <a href="addfinance.php"><button type="submit" class="btn btn-default" id="subcbtnyellow" style="float:right; margin:0 5px 15px 5px" > <i class="fa fa-plus"> </i> Add Finance Information</button></a>
                                            </div>
                                            
                                            
                                            
                                           
                                            
                                            
                                            
                                               
                                                
                                        </div>
                                        
                                         <br>
                                                <br>
                                                
                                        
                                        <table id="basic-datatables" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                            <thead >
                                                <tr style="background-color: rgba(155,32,97,1); color: white; ">
                                                    
                                                    <th title="item">Year</th>
                                                    <th title="source">Trust Receipts</th>
                                                    <th title="source id">Clinic Receipts</th>
                                                    <th title="source price">Trust Operations</th>
                                                    <th title="target">Clinic Operations</th>
                                                    
                                                    <th title="Edit" class="tableedit" style="">Update</th>
                                                </tr>
                                            </thead>
                                            
                                            <tbody>

                                            <?php
                                            
                                                $query = "SELECT * FROM finance";
                                                $result = mysqli_query($connection, $query);
                                                
                                                if (mysqli_num_rows($result) >0 ){
                                                    while($row = mysqli_fetch_assoc($result)){

                                                        echo "<tr>
                                                   
                                                                <td>".$row["finance_id"]."</td>
                                                                <td>".$row["finance_trust_receipts"]."</td>
                                                                <td>".$row["finance_cinic_receipts"]."</td>
                                                                <td>".$row["finance_trust_operations"]."</td>
                                                                <td>".$row["finance_cinic_operations"]."</td>
                                                                
                                                                <td >
                                                                    <div id='editDiv'>
                                                                
                                                                        <div id='btndiv' >
                                                                            <a title='edit' href='editfinance.php?year=".$row["finance_id"]."'><i class='fa fa-edit' id='tablebtns' style='background-color: #66BB6A; color:white' ></i></a>
                                                                            <a title='delete' ><i class='fa fa-trash-o ".$row["finance_id"]."' style='background-color: #EF5350; color:white' id='tablebtns' data-toggle='modal' data-target='#modal-style3' onClick='getLink(this)' ></i></a>
                                                                        </div>
                                                             
                                                                    </div>
                                                                </td>
    
                                                            </tr>";
                                                    }
                                                }
                                                      

                                            ?>
                                                
                                                

                                                
                                                
                                                 
                                                 
                                                
                                                
                                                
                                                
                                               
                                            </tbody>
                                        </table>
                                        
                                        
                                        
                                        
                                    </div>
                                    
                                    
                                 
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                     <div class="modal fade modal-style2" id="modal-style3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        
                                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header" style="background-color:rgba(0, 153, 204,1);">
                                    <button type="button" class="close" data-dismiss="modal" style="color:white">
                                        <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                                    </button>
                                    <h4 class="modal-title" id="mySmallModalLabel" style="color:white; text-align: center">Are sure, you want to delete this information?</h4>
                                </div>
                                <div class="modal-body">
                                    
                                        
                                        <div class="form-group">
                                            <div class="col-lg-12">
                                                
                                                    <a href="delfinance.php" id="deleteButton"><button  class="btn btn-default col-lg-4" id="delgreen" style="width:100%">Yes, delete the information</button></a>
                                           
                                            </div>
                                        </div>
                                        
                                         <div class="form-group">
                                            <div class="col-lg-12">
                                                
                                            <button class="btn btn-default col-lg-4" data-dismiss="modal" id="delred" style="width:100%">Cancel</button>
                                           
                                            </div>
                                        </div>
                                        
                                        
                                        
                                                    
                                    
                                </div>
                                        
                                    </div>
                                </div>
                            </div>
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                     

                                    
                                    
                                    
                                    
                                    
                                </div>
                                <!-- End .panel -->
                            </div>
                            <!-- col-lg-12 end here -->
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                        </div>
                        <!-- End .row -->
                    </div>
                    <!-- End .page-content-inner -->
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


        <script>
            function getLink(obj){
                var a = $(obj).attr('class');
                var idArray = a.split(" ");
                var id = idArray[2];
                
                document.getElementById("deleteButton").href="delfinance.php?year="+id; 
            }
        </script>
    
   
        
    </body>
</html>