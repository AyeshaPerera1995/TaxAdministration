<!DOCTYPE html>
<?php 
include("db.php");

if (isset($_GET['cusid']) & isset($_GET['qtype']) & isset($_GET['ya']) & isset($_GET['ap']) 
    & isset($_GET['discount']) & isset($_GET['wc']) & isset($_GET['arreares']) & isset($_GET['awc']) 
    & isset($_GET['pq'])) {

    $cid = $_GET['cusid'];
    $q_type = $_GET['qtype'];
    $ya = $_GET['ya'];
    $ap = $_GET['ap'];
    $dis = $_GET['discount'];
    $wc = $_GET['wc'];
    $arr = $_GET['arreares'];
    $awc = $_GET['awc'];
    $pq = $_GET['pq'];

    $get_t = "select * from tax_valuation where cus_id='$cid'";
    $run_t = mysqli_query($con, $get_t);
    $row_t = mysqli_fetch_array($run_t);
    $assno = $row_t['ass_no'];
    $t_tax = $row_t['total_tax'];

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

    <!--    alert-->
    <script src="sweetalert/sweetalert2.all.min.js"></script>

</head>

<body class="host_version"> 

 <?php include 'pay_receipt.php'; ?>

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
                
            </div>
        </nav>
    </header>
    <!-- End header -->


     <div id="overviews" class="section lb">
        <div class="container">
            <!-- <div class="section-title row text-center"> -->
                <!-- <div class="col-md-6 offset-md-3"> -->
                    <center><h2><b>- Payment Details -</b></h2></center><br>
                    
                <div class="row">
                    <div class="col-md-6  offset-md-3">
                        <form action="card_details_quater.php" method="post" role="form">
                            <div class="form-group">
                                <label>Payment Method</label>
                                <div class="radio">
                                    <label>
                                    <input type="radio" name="optionsRadios" value="card"/>  Credit or Debit Card
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                    <input type="radio" name="optionsRadios" value="paypal"/>  Paypal
                                </label>
                                </div>
                                            
                            </div>

                            <!-- Hidden id's -->
                            <input name="cid" type="hidden" value="<?php echo $_GET['cusid'];?>" />
                            <input name="qt" type="hidden" value="<?php echo $_GET['qtype'];?>" />
                            <input name="ap" type="hidden" value="<?php echo $_GET['ap'];?>" />
                            <input name="discount" type="hidden" value="<?php echo $_GET['discount'];?>" />
                            <input name="wc" type="hidden" value="<?php echo $_GET['wc'];?>" />
                            <input name="arreares" type="hidden" value="<?php echo $_GET['arreares'];?>" />
                            <input name="awc" type="hidden" value="<?php echo $_GET['awc'];?>" />
                            <input name="pq" type="hidden" value="<?php echo $_GET['pq'];?>" />
                            <input name="ya" type="hidden" value="<?php echo $_GET['ya'];?>" />

                            <input name="t_tax" type="hidden" value="<?php echo $t_tax;?>" />
                            <input name="ass_no" type="hidden" value="<?php echo $assno;?>" />
                            <!-- Hidden id's -->

                            <div class="form-group">
                                <label>Card Holder's Name</label>
                                <input required="" class="form-control" name="name" type="text" value="" />
                            </div>
                            <div class="form-group">
                                <label>Card Number</label>
                                <input required="" class="form-control" name="card_num" type="number" value="" />
                            </div>
                             <div class="form-group">
                                <label>CSV Number</label>
                                <input required="" class="form-control" name="csv_num" type="number" value="" />
                                <small class="form-text text-muted">(Card Security Value)</small>
                            </div>
                             <div class="form-group">
                                <label>Expire Date</label>
                                <input required="" class="form-control" name="ex_date" type="text" value="" />
                                 <small class="form-text text-muted">(mm/yyyy)</small>
                            </div>
                            <div class="form-group">
                                <label>Amount of Tax Payable</label>
                                <input disabled="" class="form-control" value="Rs. <?php echo round(
                                $_GET['ap'],2); ?>" />
                            </div>
    <div class="message-box">
        <button type="submit" name="paytax" class="btn social btn-danger btn-flat">Pay Tax Amount
        </button>                        
    </div>                                    
                            </form>
                            </div>
                                 
    </div>
</div>

               <!-- </div> -->
            <!-- </div>end title -->
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

<?php
if (isset($_POST['paytax'])) {

$p_method = $_POST['optionsRadios'];
$name = $_POST['name'];
$c_number = $_POST['card_num'];
$csv_number = $_POST['csv_num'];
$exp_date = $_POST['ex_date'];

$id = $_POST['cid'];
$q_type = $_POST['qt'];
$ap = $_POST['ap'];
$pq = $_POST['pq'];
$discount = $_POST['discount'];
$wc = $_POST['wc'];
$arreares = $_POST['arreares'];
$year_arreares = $_POST['ya'];
$awc = $_POST['awc'];
$assno = $_POST['ass_no'];
$t_tax = $_POST['t_tax'];

$total_wc = $wc+$awc;

$c_year = date('Y');
// $c_year = date('Y', strtotime('2021-01-01'));
$c_date = date('Y-m-d');

$count = 0;
if ($pq==0) {
   $count = 4;
}elseif ($pq==1) {
    $count = 3;
}elseif ($pq==2) {
    $count = 2;
}elseif ($pq==3) {
    $count = 1;
}


$insertQPD = "insert into quater_paid_details(year,quater_type,status,paid_date,cus_id) 
values('$c_year','$q_type','1','$c_date','$id')";
$runQPD = mysqli_query($con, $insertQPD);


if ($runQPD) {
//   echo "<script>alert('Added Paid Quater!')</script>";
}

$insertPay = "insert into payment(payment_method,card_number,card_holder_name,CSV_number,expire_date,paid_date,pay_status,year,cus_id,arreares,awc,warrant_cost,discount) values('$p_method', '$c_number', '$name', '$csv_number', '$exp_date', '$c_date','1','$c_year','$id','$arreares','$awc', '$wc','$discount')";
$runPay = mysqli_query($con, $insertPay);

if ($runPay) {
//    echo "<script>alert('Add data to payment table')</script>";
    $get_payid = "select * from payment where cus_id ='$id' AND paid_date='$c_date' ORDER BY payment_id DESC";
    $run_payid = mysqli_query($con, $get_payid);
    $row_payid = mysqli_fetch_array($run_payid);
    $pay_id = $row_payid['payment_id'];


$insertPR = "insert into payment_receipt(date, cus_id, premises_id, arreares, warrant_cost, rates, amount_paid,discount, print_desc,status,payment_id) values('$c_date', '$id', '$assno', '$arreares', '$total_wc','$t_tax','$ap','$discount','Paid','1','$pay_id')";
$runPR = mysqli_query($con, $insertPR);

if ($runPR) {
//    echo "<script>alert('Add data to payment receipt table')</script>";

$update_tv = "update tax_valuation set arreares = '$year_arreares' where cus_id='$id'";
$run_tv = mysqli_query($con, $update_tv);

if ($run_tv) {
//    echo "<script>alert('update tv')</script>";

    // get receipt id
    $get_rid = "select * from payment_receipt where cus_id ='$id' AND date='$c_date' ORDER BY receipt_no DESC";
    $run_rid = mysqli_query($con, $get_rid);
    $row_rid = mysqli_fetch_array($run_rid);
    $receipt_id = $row_rid['receipt_no'];

    echo "<script>
    			swal({
                    type: 'success',
                    text:'Paid Tax Amount Successfully !',
                    showConfirmButton: true,
                    confirmButtonText: 'OK'
                })
                .then(willDelete => {
  				if (willDelete) {
    			window.open('summary.php?rno=$receipt_id','_self')
  				}
				});
                </script>";

//    echo "<script>window.open('summary.php?rno=$receipt_id','_self')</script>";
}
   
}


}

}

 ?>