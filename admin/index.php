<!DOCTYPE html>
<?php
session_start();
include("includes/db.php");

if (!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('admin_login.php?not_admin=You are not an Admin!','_self')</script>";
} else {
    ?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Panel</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="assets/css/style.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

    <link href="assets/css/all.css" rel="stylesheet">
    <link href="assets/css/regular.css" rel="stylesheet">


</head>
<body>
    <div id="wrapper">
        <!-- /. NAV TOPBAR  -->
        <?php include 'includes/topbar.php';?>
         
        <!-- /. NAV LEFTBAR  -->
        <?php include 'includes/leftbar.php';?>
 
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Admin Dashboard</h2>   
                        <h5>Welcome to <b>Habaraduwa Pradeshiya Sabha</b> Admin Dashboard... </h5>
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
                <div class="row">

            <div class="col-md-3 col-sm-6 col-xs-6">           
			  <div class="panel panel-back noti-box">
                <a href="manage_taxpayers.php">
                        <span class="icon-box bg-color-red set-icon">
                            <i class="fas fa-users"></i>
                        </span>
                    </a>
                <div class="text-box" >
                    <a href="manage_taxpayers.php" class="main-text">Manage</a>
                    <p class="text-muted">TaxPayers</p>
                </div>
             </div>
		    </div>

            <div class="col-md-3 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <a href="reports.php">
                <span class="icon-box bg-color-green set-icon">
                    <i class="far fa-window-restore"></i>
                </span>
            </a>
                <div class="text-box" >
                    <a href="reports.php" class="main-text">Generate</a>
                    <p class="text-muted">Reports</p>
                </div>
             </div>
		     </div>

            <div class="col-md-3 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <a href="admin_settings.php">
                <span class="icon-box bg-color-blue set-icon">
                    <i class="fas fa-user-shield"></i>
                </span>
            </a>
                <div class="text-box" >
                    <a href="admin_settings.php" class="main-text">Admin</a>
                    <p class="text-muted">Settings</p>
                </div>
             </div>
		     </div>

            <div class="col-md-3 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <a href="send_remind.php">
                <span class="icon-box bg-color-brown set-icon">
                    <i class="far fa-bell"></i>
                </span>
            </a>
                <div class="text-box" >
                    <a href="send_remind.php" class="main-text">Send</a>
                    <p class="text-muted">Reminders</p>
                </div>
             </div>
		     </div>

			</div>
                 <!-- /. ROW  -->

                <hr />                
                           
           <!-- ROW START -->
        <div class="row">
            <div style="margin:15px 90px 15px 24px;background: linear-gradient(#0d0d0d,#333333,#0d0d0d);" class="col-md-3 col-sm-12 col-xs-12"><br>
                        <section>
                            <div class="twt-feed blue-bg">
                                <div class="corner-ribon black-ribon">
                                    <i class="fas fa-user-shield"></i>
                                </div>
                                <div class="fas fa-user-shield wtt-mark"></div>

                                <div class="row">
                                   <h2 style="color: white; font-weight: bold; margin-left: 10px;">Admin</h2>
                                        <label style="line-height:0px; font-weight: normal;margin-left: 10px;">Habaraduwa</label>
                                        <label style="font-weight: normal;">Pradeshiya Sabha</label>
                                                                     
                                </div>
                            </div>

                            <div class="weather-category twt-category">
                                <ul>
                                    <li>
                                        <h5><a href="admin_editProfile.php">Edit</a></h5>
                                        Profile
                                    </li>
                                    <li>
                                        <h5><a href="admin_changePass.php">Change</a></h5>
                                        Password
                                    </li>
                                   
                                </ul>
                            </div>
                            
                        </section>
                    </div>

                    <div style="margin:15px 90px 15px 15px;background: linear-gradient(#0d0d0d,#333333,#0d0d0d);" class="col-md-3 col-sm-12 col-xs-12"><br>
                        <section>
                            <div class="twt-feed blue-bg">
                                <div class="corner-ribon black-ribon">
                                    <i class="fas fa-users"></i>
                                </div>
                                <div class="fas fa-users wtt-mark"></div>

                                <div class="row">                                                                       
                                        <h2 style="color: white; font-weight: bold; margin-left: 10px;">Tax Payers </h2>
                                        <label style="line-height:0px; font-weight: normal;margin-left: 10px;">Habaraduwa</label>
                                        <label style="font-weight: normal;">Pradeshiya Sabha</label>
                                   
                                                                     
                                </div>
                            </div>

                            <div class="weather-category twt-category">
                                <ul>
                                    <li>
                                        <h5><a href="addnew_taxpayer.php">Add</a></h5>
                                        TaxPayer
                                    </li>
                                
                                    <li>
                                        <h5><a href="manage_taxpayers.php">Edit</a></h5>
                                        TaxPayer
                                    </li>
                                </ul>
                            </div>
                            
                        </section>
                    </div>

                    <div style="margin:15px;background: linear-gradient(#0d0d0d,#333333,#0d0d0d);" class="col-md-3 col-sm-12 col-xs-12"><br>
                        <section>
                            <div class="twt-feed blue-bg">
                                <div class="corner-ribon black-ribon">
                                    <i class="fas fa-desktop"></i>
                                </div>
                                <div class="fas fa-desktop wtt-mark"></div>

                                <div class="row">
                                    <h2 style="color: white; font-weight: bold; margin-left: 10px;">Reports / Alerts </h2>
                                        <label style="line-height:0px; font-weight: normal;margin-left: 10px;">Habaraduwa</label>
                                        <label style="font-weight: normal;">Pradeshiya Sabha</label>
                                                                     
                                </div>
                            </div>

                            <div class="weather-category twt-category">
                                <ul>
                                    <li>
                                        <h5><a href="reports.php">Monthly</a></h5>
                                        Reports
                                    </li>
                                    <li>
                                        <h5><a href="send_remind.php">Send</a></h5>
                                        Reminders
                                    </li>
                                   
                                </ul>
                            </div>
                            
                        </section>
                    </div>

        </div>
        <!-- ROW END -->
<hr>
        <!-- ROW Start -->
                <div class="row"> 

                    <div class="col-md-4 col-sm-12 col-xs-12">                       
                        <div class="panel panel-primary text-center no-boder bg-color-brown">
                            <div class="panel-body">
                            <a href="manage_taxpayers.php"><i class="fas fa-search fa-3x"></i>
                            <h3>Search</h3></a>
                            </div>
                            <div class="panel-footer back-footer-brown">
                            Tax Payers                           
                            </div>
                        </div>                      
                    </div>

                    <div class="col-md-4 col-sm-12 col-xs-12">                       
                        <div class="panel panel-primary text-center no-boder bg-color-red">
                            <div class="panel-body">
                            <a href="searchReports.php"><i class="fas fa-search fa-3x"></i>
                            <h3>Search</h3></a>
                            </div>
                            <div class="panel-footer back-footer-red">
                            Monthly Reports                           
                            </div>
                        </div>                         
                    </div>

                    <div class="col-md-4 col-sm-12 col-xs-12">                       
                        <div class="panel panel-primary text-center no-boder bg-color-green">
                            <div class="panel-body">
                            <a href="searchHistory.php"><i class="fas fa-search fa-3x"></i>
                            <h3>Search</h3></a>
                            </div>
                            <div class="panel-footer back-footer-green">
                            Payment History                           
                            </div>
                        </div>                         
                    </div>

           </div>

                 
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- MORRIS CHART SCRIPTS -->
     <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>

  <?php
        }
    ?>
