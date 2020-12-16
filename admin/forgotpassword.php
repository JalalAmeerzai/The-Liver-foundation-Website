<?php


require('DBConnect.php');

    $error = "none";
    $messageSuccess = "none";

    if(isset($_SESSION["username"] , $_SESSION["password"])){

        
        
    }else{

        if(isset($_POST['forgotbtn'])){
            if(isset($_POST['forgotemail'])){
                
                $email = $_POST['forgotemail'] ;
                
                //$query = "SELECT user_name , user_password FROM users WHERE user_name = $username AND user_password = $password ";
                $query = "SELECT * FROM users WHERE user_email ='".$email."';";
                $result = mysqli_query($connection, $query);
    
                
    
                if (mysqli_num_rows($result) == 1) {
                    
                    $row = mysqli_fetch_assoc($result);
                    $credentialsUsername = $row['user_name'];
                    $credentialsPassword = $row['user_password'];

                    include('sendmail.php');
                    
                    
    
                }
                else{

                    $error = "block";

                }
    
    
            }
        }

    }
    

?>












<!doctype html>
<!--[if lt IE 8]><html class="no-js lt-ie8"> <![endif]-->
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <title>Forgot Password | The Liver Foundation</title>
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
       
            
            
            
            
            
            
            <!-- .page-content -->
            
                <!-- .page-content-wrapper -->
                <div class="page-content-wrapper">
                    <div class="page-content-inner">
                        <!-- .page-content-inner -->
                        <div id="page-header" class="clearfix">
                            
                            <div class="page-header">
                                <br>
                            <img src="img/logo.png" class=""  style="display:block; margin-left: auto; margin-right: auto;">
                                <hr>
                                
                            </div>
                            
                        </div>
                        
                        
                       
                        <!-- / .row -->
                        <!-- End .row -->
                        
                         <div class="row">
                            
                             <div class="col-lg-12">
                                <!-- col-lg-6 start here -->
                               
                                <div class="col-lg-4 col-md-12">
                                    <!-- col-lg-4 start here -->
                                        
                                </div>
                                        
                                        
                                        
                                      
                                        
                                        
                                        
                                  <div class="col-lg-4 col-md-12">
                                    <!-- col-lg-4 start here -->
                                        <div class="panel panel-default " style="border:0;">
                                            <!-- Start .panel -->
                                            <div class="panel-heading" style=" background-color:rgba(155,32,97,.8);">

                                                <h3 class="panel-title" style="text-align:center; font-size:25px; color:white">Forgot Password</h3>
                                            </div>
                                            <div class="panel-body" style="text-align:center">

                                            <div class="alert alert-danger" role="alert" style="display:<?php echo $error;?>">
                                                Something Went Wrong! Try Again.                                               
                                            </div>

                                            <div class="alert alert-success" role="alert" style="display:<?php echo $messageSuccess;?>">
                                                Credentials Sent To Your Email                                               
                                            </div>
                                                
                                                <h4 id="subc"><i class="fa fa-key" style="color:#9b2061"></i></h4>
                                                <br>
                                                

                                                <form action="forgotpassword.php" method="post" class="form-horizontal group-border stripped" role="form">

                                                    <div class="form-group">
                                                        
                                                        <div class="col-sm-12">
                                                            <input type="Email" class="form-control" id="" placeholder="Enter Email" required name="forgotemail">
                                                        </div>

                                                        


                                                        

                                                        <div class="">
                                                            <button type="submit" class="btn btn-default " id="subcbtn" style="margin-top:30px;" name="forgotbtn"><i class="fa fa-envelope" aria-hidden="true"></i> Send Verification</button>
                                                        </div>

                                                        <span style="margin-top:40px">Remember Your <a href="login.php" style="color: rgba(155,32,97,1)">Password?</a></span>

                                                    </div>

                                                    

                                                    


                                                </form>
                                               

                                            </div>
                                            <br>
                                        </div>
                                    <!-- End .panel -->

                                </div>
                                    
                                        
                                  
                                 <div class="col-lg-4 col-md-12">
                                    <!-- col-lg-4 start here -->
                                        
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