<!DOCTYPE html>
<html lang="en">

    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
     <!-- Site Metas -->
    <title>Habaraduwa Pradeshiya Sabha</title>  
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/icon.png" type="image/x-icon" />
    <link rel="apple-touch-icon" href="images/icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="style.css">
    <!-- ALL VERSION CSS -->
    <link rel="stylesheet" href="css/versions.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">

    <!-- Modernizer for Portfolio -->
    <script src="js/modernizer.js"></script>

</head>

<body class="host_version"> 

 <?php include 'loginModel.php'; ?>

    <!-- LOADER -->
    <div id="preloader">
        <div class="loader-container">
            <div class="progress-br float shadow">
                <div class="progress__item"></div>
            </div>
        </div>
    </div>
    <!-- END LOADER --> 
    
    <!-- Start header -->
    <header class="top-navbar">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">
                    <img src="images/logo.png" alt="" />
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-host" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbars-host">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="about_us.php">About Us</a></li>

                        <li class="nav-item"><a class="nav-link" href="gallery.php">Gallery</a></li>
                        <li class="nav-item active"><a class="nav-link" href="contact.php">Contact</a></li>
                        <?php 
                            if (isset($_SESSION['user_email'])) {
                         ?>
                         <li class="nav-item"><a class="nav-link" href="customer.php">My Account</a></li>
                         <?php  
                                }
                         ?>
                    </ul>
                    
<?php 
if (!isset($_SESSION['user_email'])) {
?>

<ul class="nav navbar-nav navbar-right">
    <li><a class="hover-btn-new log orange" href="#" data-toggle="modal" data-target="#login"><span>Login</span></a></li>
</ul>

<?php   
} else {
 ?>

<ul class="nav navbar-nav navbar-right">
    <li><a class="hover-btn-new log orange" href="logout.php"><span>LogOut</span></a></li>
</ul>

 <?php 
}
  ?>
                    
                </div>
            </div>
        </nav>
    </header>
    <!-- End header -->

 <div style=" background: url(images/bann.jpg)no-repeat; background-position:center;background-size: cover; height: 350px;">
     <div class="container text-center"><br><br>
         <h1 style="color: #000;font-weight: 600;text-transform: capitalize;padding-top: 11%;
            font-size: 48px;line-height: 0px;">Contact Us</h1>
     </div>
 </div>

     <div id="overviews" class="section lb">
        <div class="container">
            <div class="section-title row text-center">
                <div class="col-md-8 offset-md-2">
                    <h3>Need Help? Sure we are Online!</h3>
                <p class="lead">Let us give you more details about the special offers you have for payments. Please contact us from below details.. <br>We have many website customers who happy to connect with us!</p>
               </div>
            </div><!-- end title -->
        </div><!-- end container -->
    </div><!-- end section -->

 <!-- Start Logos -->
 <div class="section-title text-center">
     <p style="font-size: 30px; margin-top: 50px;">Service Cluster of Pradeshiya Sabha </p>
 </div><!-- end title -->
 <div class="parallax section dbcolor">

     <div class="container">

         <div class="row logos">
             <div class="col-md-2 col-sm-2 col-xs-6 wow fadeInUp">
                 <a href="#"><img src="images/logo_1.png" alt="" class="img-repsonsive"></a>
             </div>
             <div class="col-md-2 col-sm-2 col-xs-6 wow fadeInUp">
                 <a href="#"><img src="images/logo_2.png" alt="" class="img-repsonsive"></a>
             </div>
             <div class="col-md-2 col-sm-2 col-xs-6 wow fadeInUp">
                 <a href="#"><img src="images/logo_3.png" alt="" class="img-repsonsive"></a>
             </div>
             <div class="col-md-2 col-sm-2 col-xs-6 wow fadeInUp">
                 <a href="#"><img src="images/logo_4.png" alt="" class="img-repsonsive"></a>
             </div>
             <div class="col-md-2 col-sm-2 col-xs-6 wow fadeInUp">
                 <a href="#"><img src="images/logo_5.png" alt="" class="img-repsonsive"></a>
             </div>
             <div class="col-md-2 col-sm-2 col-xs-6 wow fadeInUp">
                 <a href="#"><img src="images/logo_6.png" alt="" class="img-repsonsive"></a>
             </div>

         </div><!-- end row -->
     </div><!-- end container -->
 </div><!-- end section -->
 <!-- End Logos -->

 <!-- Start Footer -->
 <footer class="footer">
     <div class="container">
         <div class="row">
             <div class="col-lg-4 col-md-4 col-xs-12">
                 <div class="widget clearfix">
                     <div class="widget-title">
                         <h3>About US</h3>
                     </div>
                     <p> For all the Government citizen <br>services information...</p>
                     <div class="footer-right">
                         <ul class="footer-links-soi">
                             <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                             <li><a href="#"><i class="fa fa-github"></i></a></li>
                             <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                             <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                             <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                         </ul><!-- end links -->
                     </div>
                 </div><!-- end clearfix -->
             </div><!-- end col -->

             <div class="col-lg-4 col-md-4 col-xs-12">
                 <div class="widget clearfix">
                     <div class="widget-title">
                         <h3>Information Link</h3>
                     </div>
                     <ul class="footer-links">
                         <li><a href="index.php">Home</a></li>
                         <li><a href="about_us.php">About Us</a></li>
                         <li><a href="gallery.php">Gallery</a></li>
                         <li><a href="contact.php">Contact Us</a></li>
                     </ul><!-- end links -->
                 </div><!-- end clearfix -->
             </div><!-- end col -->

             <div class="col-lg-4 col-md-4 col-xs-12">
                 <div class="widget clearfix">
                     <div class="widget-title">
                         <h3>Contact Details</h3>
                     </div>

                     <?php
                     $get_a = "select * from pradeshiya_sabha";
                     $run_a = mysqli_query($con, $get_a);
                     $row_a = mysqli_fetch_array($run_a);
                     ?>

                     <ul class="footer-links">
                         <li><a href="#"><?php echo $row_a['email'];?></a></li>
                         <li><?php echo $row_a['address'];?></li>
                         <li><?php echo $row_a['telephone1'];?></li>
                         <li><?php echo $row_a['telephone2'];?></li>
                     </ul><!-- end links -->
                 </div><!-- end clearfix -->
             </div><!-- end col -->

         </div><!-- end row -->
     </div><!-- end container -->
 </footer><!-- end footer -->
 <!-- End Footer -->

 <div class="copyrights">
     <div class="container">
         <div class="footer-distributed">
             <div class="footer-center">
                 <p class="footer-company-name">All Rights Reserved. &copy; <script>document.write(new Date().getFullYear());</script><a href="#"> Habaraduwa Pradeshiya Sabha</a> Design By : <a href="#">Infinity (-)</a></p>
             </div>
         </div>
     </div><!-- end container -->
 </div><!-- end copyrights -->

    <a href="#" id="scroll-to-top" class="dmtop global-radius"><i class="fa fa-angle-up"></i></a>

<!-- ALL JS FILES -->
    <script src="js/all.js"></script>
    <!-- ALL PLUGINS -->
    <script src="js/custom.js"></script>
    <script src="js/timeline.min.js"></script>
    <script>
        timeline(document.querySelectorAll('.timeline'), {
            forceVerticalMode: 700,
            mode: 'horizontal',
            verticalStartPosition: 'left',
            visibleItems: 4
        });
    </script>

</body>
</html>