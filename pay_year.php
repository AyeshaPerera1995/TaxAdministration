<!DOCTYPE html>

<?php 
include("db.php");
// include("functions/function.php");

if (isset($_GET['cid'])) {

$id = $_GET['cid'];
$c_year = date('Y');
$p_year = $c_year-1; 

$get_t = "select * from tax_valuation where cus_id='$id'";
$run_t = mysqli_query($con, $get_t);
$row_t = mysqli_fetch_array($run_t);
$total_tax = $row_t['total_tax'];
$qta = $row_t['quater_tax'];
$pro_type = $row_t['property_type'];
$arreares = $row_t['arreares'];

}

 ?>

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
                    <li class="nav-item active"><a class="nav-link" href="contact.php">My Account</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!-- End header -->


     <div id="overviews" class="section lb">
        <div class="container">
            <div class="section-title row text-center">
                <div class="col-md-8 offset-md-2">
                    <h2><b>- Total Tax Details for <?php echo $c_year; ?> -</b></h2><br>

  <?php

$wc = 0;
$discount = 0;
$amount_paid = 0;
$amount_payable = 0;
$fullyear_dis = 10/100;
$dis_presentage = 5/100;
if ($pro_type =='Residential') {
    $wc_presentage = 15/100;
}else if($pro_type =='Business'){
    $wc_presentage = 20/100;
}

$awc = $arreares*$wc_presentage;

$c_month = date('m');
$c_date = date('m-d');
// $c_month = date('m', strtotime("March"));
// $c_date = date('m-d', strtotime("March 2"));
$quater = getQuater($c_date);
$paid_quaters = getPayStatus($id);

if ($quater=='Q1' AND $paid_quaters==0) {
    $amount_paid = 0;
//    echo "<script>alert('q1-0')</script>";
    if ($c_month==01) {
//        echo "<script>alert('january')</script>";
        $discount = $total_tax*$fullyear_dis;
        $amount_payable = ($total_tax+$arreares+$awc)-$discount; 
    }else if($c_month==02 || $c_month==03){
//        echo "<script>alert('Feb or March')</script>";
        $discount = ($qta*3)*$dis_presentage;
        $amount_payable = ($total_tax+$arreares+$awc)-$discount; 
    }   
} 

if ($quater=='Q1' AND $paid_quaters==1) {
    $amount_paid = $qta;
//    echo "<script>alert('q1-1')</script>";
    if ($c_month==01) {
//        echo "<script>alert('january')</script>";
        $discount = ($qta*3)*$dis_presentage;
        $amount_payable = (($qta*3)+$arreares+$awc)-$discount; 
        
    }else if($c_month==02 || $c_month==03){
//        echo "<script>alert('Feb or March')</script>";
        $discount = ($qta*3)*$dis_presentage;
        $amount_payable = (($qta*3)+$arreares+$awc)-$discount; 
    }
} 

if ($quater=='Q1' AND $paid_quaters==12) {
    $amount_paid = $qta*2;
//    echo "<script>alert('q1-12')</script>";
    if ($c_month==01) {
//        echo "<script>alert('january')</script>";
        $discount = ($qta*2)*$dis_presentage;
        $amount_payable = (($qta*2)+$arreares+$awc)-$discount; 
        
    }else if($c_month==02 || $c_month==03){
//        echo "<script>alert('Feb or March')</script>";
        $discount = ($qta*2)*$dis_presentage;
        $amount_payable = (($qta*2)+$arreares+$awc)-$discount;       
    }
} 

if ($quater=='Q1' AND $paid_quaters==123) {
    $amount_paid = $qta*3;
//    echo "<script>alert('q1-123')</script>";
    if ($c_month==01) {
//        echo "<script>alert('january')</script>";
        $discount = $qta*$dis_presentage;
        $amount_payable = ($qta+$arreares+$awc)-$discount; 
        
    }else if($c_month==02 || $c_month==03){
//        echo "<script>alert('Feb or March')</script>";
        $discount = $qta*$dis_presentage;
        $amount_payable = ($qta+$arreares+$awc)-$discount; 
    }
} 

if ($quater=='Q1' AND $paid_quaters==1234) {
//     echo "<script>alert('You Paid for this year..')</script>";
     $amount_payable = '0';
}

if ($quater=='Q2' AND $paid_quaters==0) {
    $amount_paid = 0;
//    echo "<script>alert('q2-0')</script>";
    if ($c_month==04) {
//        echo "<script>alert('April')</script>";
        $wc = $qta*$wc_presentage;
        $discount = ($qta*3)*$dis_presentage;
        $amount_payable = ($total_tax+$wc+$arreares+$awc)-$discount; 
        
    }else if($c_month==05 || $c_month==06){
//        echo "<script>alert('may or june')</script>";
        $wc = $qta*$wc_presentage;
        $discount = ($qta*2)*$dis_presentage;
        $amount_payable = ($total_tax+$wc+$arreares+$awc)-$discount;
    }
} 

if ($quater=='Q2' AND $paid_quaters==1) {
    $amount_paid = $qta;
//    echo "<script>alert('q2-1')</script>";
    if ($c_month==04) {
//        echo "<script>alert('April')</script>";
        $discount = ($qta*3)*$dis_presentage;
        $amount_payable = (($qta*3)+$arreares+$awc)-$discount;
        
    }else if($c_month==05 || $c_month==06){
//        echo "<script>alert('may or june')</script>";
        $discount = ($qta*2)*$dis_presentage;
        $amount_payable = (($qta*3)+$arreares+$awc)-$discount;       
    }
} 

if ($quater=='Q2' AND $paid_quaters==12) {
    $amount_paid = $qta*2;
//    echo "<script>alert('q2-12')</script>";
    if ($c_month==04) {
//        echo "<script>alert('April')</script>";
        $discount = ($qta*2)*$dis_presentage;
        $amount_payable = (($qta*2)+$arreares+$awc)-$discount;
    }else if($c_month==05 || $c_month==06){
//        echo "<script>alert('may or june')</script>";
        $discount = ($qta*2)*$dis_presentage;
        $amount_payable = (($qta*2)+$arreares+$awc)-$discount;
        
    }
} 

if ($quater=='Q2' AND $paid_quaters==123) {
    $amount_paid = $qta*3;
//    echo "<script>alert('q2-123')</script>";
    if ($c_month==04) {
//        echo "<script>alert('April')</script>";
        $discount = $qta*$dis_presentage;
        $amount_payable = ($qta+$arreares+$awc)-$discount;
        
    }else if($c_month==05 || $c_month==06){
//        echo "<script>alert('may or june')</script>";
        $discount = $qta*$dis_presentage;
        $amount_payable = ($qta+$arreares+$awc)-$discount;
        
    }
} 

if ($quater=='Q2' AND $paid_quaters==1234) {
//    echo "<script>alert('You Paid for this year..')</script>";
    $amount_payable = '0';
}

if ($quater=='Q3' AND $paid_quaters==0) {
    $amount_paid = 0;
//    echo "<script>alert('q3-0')</script>";
    if ($c_month==07) {
//        echo "<script>alert('july')</script>";
        $wc = ($qta*2)*$wc_presentage;
        $discount = ($qta*2)*$dis_presentage;
        $amount_payable = ($total_tax+$wc+$arreares+$awc)-$discount;
        
    }else if($c_month==8 || $c_month==9){
//        echo "<script>alert('Aug or Sep')</script>";
        $wc = ($qta*2)*$wc_presentage;
        $discount = $qta*$dis_presentage;
        $amount_payable = ($total_tax+$wc+$arreares+$awc)-$discount;       
    }
}  

if ($quater=='Q3' AND $paid_quaters==1) {
    $amount_paid = $qta;
//    echo "<script>alert('q3-1')</script>";
    if ($c_month==07) {
//        echo "<script>alert('july')</script>";
        $wc = $qta*$wc_presentage;
        $discount = ($qta*2)*$dis_presentage;
        $amount_payable = (($qta*3)+$wc+$arreares+$awc)-$discount; 
        
    }else if($c_month==8 || $c_month==9){
//        echo "<script>alert('Aug or Sep')</script>";
        $wc = $qta*$wc_presentage;
        $discount = $qta*$dis_presentage;
        $amount_payable = (($qta*3)+$wc+$arreares+$awc)-$discount;
    }
       
} 

if ($quater=='Q3' AND $paid_quaters==12) {
    $amount_paid = $qta*2;
//    echo "<script>alert('q3-12')</script>";
    if ($c_month==07) {
//        echo "<script>alert('july')</script>";
        $discount = ($qta*2)*$dis_presentage;
        $amount_payable = (($qta*2)+$wc+$arreares+$awc)-$discount;
    }else if($c_month==8 || $c_month==9){
//        echo "<script>alert('Aug or Sep')</script>";
        $discount = $qta*$dis_presentage;
        $amount_payable = (($qta*2)+$wc+$arreares+$awc)-$discount;
    }
       
} 

if ($quater=='Q3' AND $paid_quaters==123) {
    $amount_paid = $qta*3;
//    echo "<script>alert('q3-123')</script>";
    if ($c_month==07) {
//        echo "<script>alert('july')</script>";
        $discount = $qta*$dis_presentage;
        $amount_payable = ($qta+$wc+$arreares+$awc)-$discount;
    }else if($c_month==8 || $c_month==9){
//        echo "<script>alert('Aug or Sep')</script>";
        $discount = $qta*$dis_presentage;
        $amount_payable = ($qta+$wc+$arreares+$awc)-$discount;
    }
       
}

if ($quater=='Q3' AND $paid_quaters==1234) {
//    echo "<script>alert('You Paid for this year..')</script>";
    $amount_payable = '0';
}

if ($quater=='Q4' AND $paid_quaters==0) {
    $amount_paid = 0;
//    echo "<script>alert('q4-0')</script>";
    if ($c_month==10) {
//        echo "<script>alert('Oct')</script>";
        $wc = ($qta*3)*$wc_presentage;
        $discount = $qta*$dis_presentage;
        $amount_payable = ($total_tax+$wc+$arreares+$awc)-$discount;
        
    }else if($c_month==11 || $c_month==12){
//        echo "<script>alert('Nov or Dec')</script>";
        $wc = ($qta*3)*$wc_presentage;
        $amount_payable = ($total_tax+$wc+$arreares+$awc)-$discount;
    }
       
}  

if ($quater=='Q4' AND $paid_quaters==1) {
    $amount_paid = $qta;
//    echo "<script>alert('q4-1')</script>";
    if ($c_month==10) {
//        echo "<script>alert('Oct')</script>";
        $wc = ($qta*2)*$wc_presentage;
        $discount = $qta*$dis_presentage;
        $amount_payable = (($qta*3)+$wc+$arreares+$awc)-$discount;
        
    }else if($c_month==11 || $c_month==12){
//        echo "<script>alert('Nov or Dec')</script>";
        $wc = ($qta*2)*$wc_presentage;
        $amount_payable = ($qta*3)+$wc+$arreares+$awc;
    }
} 

if ($quater=='Q4' AND $paid_quaters==12) {
    $amount_paid = $qta*2;
//    echo "<script>alert('q4-12')</script>";
    if ($c_month==10) {
//        echo "<script>alert('Oct')</script>";
        $wc = $qta*$wc_presentage;
        $discount = $qta*$dis_presentage;
        $amount_payable = (($qta*2)+$wc+$arreares+$awc)-$discount;
    }else if($c_month==11 || $c_month==12){
//        echo "<script>alert('Nov or Dec')</script>";
        $wc = $qta*$wc_presentage;
        $amount_payable = (($qta*2)+$wc+$arreares+$awc);
    }
} 

if ($quater=='Q4' AND $paid_quaters==123) {
    $amount_paid = $qta*3;
//    echo "<script>alert('q4-123')</script>";
    if ($c_month==10) {
//        echo "<script>alert('Oct')</script>";
        $discount = $qta*$dis_presentage;
        $amount_payable = ($qta+$arreares+$awc)-$discount;
        
    }else if($c_month==11 || $c_month==12){
//        echo "<script>alert('Nov or Dec')</script>";
        $amount_payable = $qta+$arreares+$awc;
    }
}

if ($quater=='Q4' AND $paid_quaters==1234) {
//    echo "<script>alert('You Paid for this year..')</script>";
    $amount_payable = '0';
}

   ?>

<!-- table start -->
<div class="table-wrapper-scroll-y my-custom-scrollbar">
    <table class="table table-lg" cellspacing="0" width="100%">
  <tbody>
    <tr>
      <td><b>Total Tax Amount</b></td>
      <td style="float: right; margin-right: 100px; font-weight: bold;">Rs. <?php echo round($total_tax,2); ?></td> 
    </tr>
     <tr>
      <td><b>Quater Tax Amount</b></td>
      <td style="float: right; margin-right: 100px; font-weight: bold;">Rs. <?php echo round($qta,2); ?></td> 
    </tr>
    <tr>
      <td>Paid Tax Amount</td>
      <td style="float: right; margin-right: 100px;">Rs. <?php echo round($amount_paid,2); ?></td> 
    </tr>
    <tr>
      <td>Arreares</td>
      <td style="float: right; margin-right: 100px;">Rs. <?php echo round($arreares,2); ?></td> 
    </tr> 
    <tr>
      <td>Arreares Warrant Cost</td>
      <td style="float: right; margin-right: 100px;">Rs. <?php echo round($awc,2); ?></td> 
    </tr>   
    <tr>
      <td>Warrant Cost</td>
      <td style="float: right; margin-right: 100px;">Rs. <?php echo round($wc,2); ?></td> 
    </tr>
    <tr>
      <td>Eligible Discount</td>
      <td style="float: right; margin-right: 100px;">Rs. <?php echo round($discount,2); ?></td> 
    </tr> 
    <tr>
      <td style="color: red; font-weight: bold;">Amount of Tax Payable</td>
      <td style="float: right; margin-right: 100px; color: red; font-weight: bold;">Rs. 
      	<?php echo round($amount_payable,2); ?></td> 
    </tr> 
  </tbody>
</table>
</div>
<!-- table end -->

<?php 
if ($paid_quaters==1234) {   
 ?>
<div class="message-box">
    <h1 style="color: #eea412; font-weight: bold;">You Paid for this Year. Thank You!</h1>
</div>
<?php 
}else{
 ?>

<div class="message-box">
    <a href="card_details.php?cusid=<?php echo $id;?>&ap=<?php echo $amount_payable;?>&discount=<?php echo $discount;?>&wc=<?php echo $wc;?>&arreares=<?php echo $arreares;?>&awc=<?php echo $awc;?>&pq=<?php echo $paid_quaters;?>" class="hover-btn-new orange">
    <span>Pay Online</span></a> 
</div>

 <?php 
}
  ?>

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
                         <h3>Call Ask Know</h3>
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