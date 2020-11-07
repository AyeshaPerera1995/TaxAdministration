<!DOCTYPE html>
<?php 
include("db.php");

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

    <style>
    .my-custom-scrollbar {
        position: relative;
        height: 300px;
        overflow: auto;
    }
    .table-wrapper-scroll-y {
        display: block;
    }

  #myPayInput , #myLogInput , #myRemindInput {
  background-image: url('images/mysearch.png'); 
  background-position: 15px 18px; /* Position the search icon */
  background-repeat: no-repeat; /* Do not repeat the icon image */
  width: 70%; /* Full-width */
  font-size: 16px; /* Increase font-size */
  padding: 13px 10px 10px 40px; /* Add some padding */
  border: 1px solid #ddd; /* Add a grey border */
  border-radius: 20px;
  margin-bottom: 12px; /* Add some space below the input */
}

    </style>

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
                        <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
                        <?php 
              if (isset($_SESSION['user_email'])) {
             ?>
             <li class="nav-item active"><a class="nav-link" href="customer.php">My Account</a></li>
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
    <li><a class="hover-btn-new log orange" href="logout.php?email=<?php echo $_SESSION['user_email']; ?>"><span>LogOut</span></a></li>
</ul>

 <?php 
}
  ?>
                </div>
            </div>
        </nav>
    </header>
    <!-- End header -->

    
    <!-- Get Customer Data -->
<?php 
$email = $_SESSION['user_email'];

    $get_u = "select * from customer where email='$email'";
    $run_u = mysqli_query($con, $get_u);
    $row_u = mysqli_fetch_array($run_u);
    $cid = $row_u['cus_id'];
//    echo "<script>alert('$cid')</script>";

    $sel_r = "select * from reminder where cus_id='$cid'";
    $run_r = mysqli_query($con, $sel_r);

//    echo mysqli_num_rows($run_r);
    while ($row_r = mysqli_fetch_array($run_r)){
        $m = $row_r['message'];

        echo "<script>
            swal({
            title: 'Payment Alert',
            text: '$m',
             });
        </script>";

    }


    $get_tax = "select * from tax_valuation where cus_id='$cid'";
    $run_tax = mysqli_query($con, $get_tax);
    $row_tax = mysqli_fetch_array($run_tax);

    $name = $row_u['name'];
    $img = $row_u['image'];
    $address = $row_u['address'];
    $nic = $row_u['nic'];
    $tel = $row_u['tel_no'];
    $mobile = $row_u['mobile'];

    $grama = $row_tax['gnd'];
    $deed = $row_tax['deed_no'];
    $assno = $row_tax['ass_no'];
    $property = $row_tax['property'];
    $a_value = $row_tax['annual_value'];

 ?>
 <!-- Get Customer Data -->


    <!-- Start Choose Plan -->
    <div id="plan" class="section lb">
        <div class="container">
            <div class="section-title text-center">
                <img src="admin/user_images/<?php echo $img; ?>" width="200px" height="200px" style="border:2px solid #555; border-radius: 100px;"><br><br>
                <h3><?php echo $name; ?></h3>
                <h4><b><?php echo $email; ?></b></h4>
                <p>You can do Online Tax Payments in a Easy Way ! </p>
            
                    <div class="message-box">
                        <a href="payment_details.php?cid=<?php echo $cid; ?>" class="hover-btn-new orange"><span>Pay Online</span></a> 
                    </div>

            </div><!-- end title -->

            <div class="row">
                <div class="col-md-12">
                    <div class="message-box">
                        <ul class="nav nav-pills nav-stacked" id="myTabs">
                        <li style="width: 220px;"><a class="active" href="#tab1" data-toggle="pill">Edit Profile</a></li>
                        <li style="width: 220px;"><a href="#tab2" data-toggle="pill">Change Password</a></li>
                        <li style="width: 220px;"><a href="#tab3" data-toggle="pill">Payment History</a></li>
                        <li style="width: 220px;"><a href="#tab4" data-toggle="pill">Logging History</a></li>
                            <li style="width: 220px;"><a href="#tab5" data-toggle="pill">Payment Reminders</a></li>
                        </ul>
                    </div>
                </div> <!-- end col -->

                
            </div>

            <hr class="invis">

            <div class="row">
                <div class="col-md-12">
                    <div class="tab-content">

                        <div class="tab-pane active fade show" id="tab1">
                            <div class="row text-center">                             
                               <div class="col-md-2"> </div>
                               <div class="col-md-8">
                    <!-- form start -->
                    <div class="contact_form">
                        <div id="message"></div>
                    <form action=""method="post" enctype="multipart/form-data">
                            <div class="row row-fluid">
                                <input type="hidden" name="cusid" value="<?php echo $cid;?>">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <input type="text" name="name" class="form-control" placeholder="Name" value="<?php echo $name; ?>">
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <input type="text" name="email" disabled class="form-control" placeholder="Email" value="<?php echo $email.'                                 (Read Only)'; ?>">
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                      <input required="" type="file" name="user_image" class="form-control">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <input type="number" name="tel" value="<?php echo $tel; ?>" class="form-control" placeholder="Telephone">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <input type="number" name="mobile" value="<?php echo $mobile; ?>"class="form-control" placeholder="Moble">
                                </div>
                                 <div class="col-lg-12 col-md-12 col-sm-12">
                                    <input type="text" name="nic" value="<?php echo $nic.'                                 (Read Only)'?>" class="form-control" disabled placeholder="NIC">
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <input type="text" name="address" value="<?php echo $address; ?>" class="form-control" placeholder="Address">
                                </div>
                                <div class="text-center pd">
                                    <button type="submit" name="editProfile" class="btn btn-light btn-radius btn-brd grd1 btn-block">Edit Profile</button>
                                </div>
                            </div>
                        </form>
                    </div> <!-- form end -->
                                </div> <!-- col-md-8 -->
                                <div class="col-md-2"> </div>
                            </div><!-- end row -->
                        </div><!-- end pane -->

                        <div class="tab-pane fade" id="tab2">
                            <div class="row text-center">
                               <div class="col-md-3"> </div>
                               <div class="col-md-6">
                                 <!-- form start -->
                    <div class="contact_form">
                        <div id="message"></div>
                    <form action="" method="post">
                            <div class="row row-fluid">
                                <input type="hidden" name="cusid" value="<?php echo $cid;?>">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <input type="password" name="c_pass" id="first_name" class="form-control" placeholder="Current Password">
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <input type="password" name="n_pass" id="last_name" class="form-control" placeholder="New Password">
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <input type="password" name="co_pass" id="email" class="form-control" placeholder="Confirm Password">
                                </div>
                                <div class="text-center pd">
                                    <button type="submit" name="changePass" class="btn btn-light btn-radius btn-brd grd1 btn-block">Change Password</button>
                                </div>
                            </div>
                        </form>
                    </div> <!-- form end -->   
                                </div> <!-- col-md-10 -->
                                <div class="col-md-3"> </div>
                            </div><!-- end row -->
                        </div><!-- end pane -->

                         <div class="tab-pane fade" id="tab3">
                           <div class="row text-center">
                               <div class="col-md-1"> </div>
                               <div class="col-md-10">

<input type="text" id="myPayInput" onkeyup="searchPay()" placeholder="Search Payment History...">
<!-- table start -->
<div class="table-wrapper-scroll-y my-custom-scrollbar">
    <table id="myPayTable" class="table table-striped table-bordered table-sm" cellspacing="0"
  width="100%">
  <thead>
    <tr>
      <th class="th-sm">Premises ID</th>
        <th class="th-sm">Year</th>
        <th class="th-sm">Paid Date</th>
      <th class="th-sm">Payment Method</th>
      <th class="th-sm">Total Rates</th>
      <th class="th-sm">Arreares</th>
      <th class="th-sm">Warrent Cost</th>
        <th class="th-sm">Discount</th>
        <th class="th-sm">Amount Paid</th>
    </tr>
  </thead>
  <tbody>

                                        <?php
                                            $get_pay = "select * from payment_receipt where cus_id='$cid'";
                                            $run_pay = mysqli_query($con, $get_pay);
                                            while ($row_pay = mysqli_fetch_array($run_pay)) {
                                                $id = $row_pay['payment_id'];
                                                $pdate = $row_pay['date'];
                                                $pid = $row_pay['premises_id'];
                                                $arr = $row_pay['arreares'];
                                                $wc = $row_pay['warrant_cost'];
                                                $rates = $row_pay['rates'];
                                                $amount = $row_pay['amount_paid'];
                                                $dis = $row_pay['discount'];

                                                $get_receipt = "select * from payment where payment_id='$id'";
                                                $run_receipt = mysqli_query($con,$get_receipt);
                                                $row_receipt = mysqli_fetch_array($run_receipt);
                                                $pm = $row_receipt['payment_method'];
                                                $year = $row_receipt['year'];

                                            ?>

    <tr>
        <td><?php echo $pid;?></td>
        <td><?php echo $year;?></td>
        <td><?php echo $pdate;?></td>
        <td><?php echo $pm;?></td>
        <td><?php echo 'Rs. '.round($rates,2);?></td>
        <td><?php echo 'Rs. '.round($arr,2);?></td>
        <td><?php echo 'Rs. '.round($wc,2);?></td>
        <td><?php echo 'Rs. '.round($dis,2);?></td>
        <td><?php echo 'Rs. '.round($amount,2);?></td>
    </tr>

    <?php
                                            }
 ?>

  </tbody>
  <tfoot>
    <tr>
        <th class="th-sm">Premises ID</th>
        <th class="th-sm">Year</th>
        <th class="th-sm">Paid Date</th>
        <th class="th-sm">Payment Method</th>
        <th class="th-sm">Total Rates</th>
        <th class="th-sm">Arreares</th>
        <th class="th-sm">Warrent Cost</th>
        <th class="th-sm">Discount</th>
        <th class="th-sm">Amount Paid</th>
    </tr>
  </tfoot>
</table>
</div>
<!-- table end -->     
                                </div> <!-- col-md-10 -->
                                <div class="col-md-1"> </div>
                            </div><!-- end row -->
                        </div><!-- end pane -->


                         <div class="tab-pane fade" id="tab4">
                           <div class="row text-center">
                               <div class="col-md-1"> </div>
                               <div class="col-md-10">
    
<input type="text" id="myLogInput" onkeyup="searchLog()" placeholder="Search Log History...">                                      
<!-- table start -->
<div class="table-wrapper-scroll-y my-custom-scrollbar">
    <table id="myLogTable" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th class="th-sm">Logged Date</th>
      <th class="th-sm">In Time</th>
      <th class="th-sm">Out Time</th>
    </tr>
  </thead>
  <tbody>
  <?php
  $get_log = "select * from log_history where account_email='$email'";
  $run_log = mysqli_query($con, $get_log);
  while ($row_log = mysqli_fetch_array($run_log)){
      $d = $row_log['date'];
      $in = $row_log['in_time'];
      $out = $row_log['out_time'];
  ?>
    <tr>
      <td><?php echo $d;?></td>
      <td><?php echo $in;?></td>
      <td><?php echo $out;?></td
    </tr>
  <?php
  }
  ?>

  </tbody>
  <tfoot>
    <tr>
      <th>Logged Date</th>
      <th>In Time</th>
      <th>Out Time</th>
    </tr>
  </tfoot>
</table>
</div>
<!-- table end -->
                                       
                                </div> <!-- col-md-10 -->
                                <div class="col-md-1"> </div>
                            </div><!-- end row -->
                        </div><!-- end pane -->

                <div class="tab-pane fade" id="tab5">
                    <div class="row text-center">
                               <div class="col-md-1"> </div>
                               <div class="col-md-10"><!-- col-md-10 start-->
                                   <input type="text" id="myRemindInput" onkeyup="searchRemind()" placeholder="Search Reminder History...">
                                   <!-- table start -->
                                   <div class="table-wrapper-scroll-y my-custom-scrollbar">
                                       <table id="myRemindTable" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                                           <thead>
                                           <tr>
                                               <th class="th-sm">Date</th>
                                               <th class="th-sm">Time</th>
                                               <th class="th-sm">Alert Messages</th>

                                           </tr>
                                           </thead>
                                           <tbody>
                                           <?php
                                           $sel_r = "select * from reminder where cus_id='$cid'";
                                           $run_r = mysqli_query($con, $sel_r);
                                           while ($row_r = mysqli_fetch_array($run_r)){

                                           $d= $row_r['date'];
                                           $t= $row_r['time'];
                                           $m = $row_r['message'];
                                           ?>
                                           <tr>
                                               <td><?php echo $d;?></td>
                                               <td><?php echo $t;?></td>
                                               <td><?php echo $m;?></td>

                                           </tr>
                                           <?php
                                           }
                                           ?>
                                           </tbody>

                                       </table>
                                   </div>
                                   <!-- table end -->
                               </div><!-- col-md-10 end -->
                               <div class="col-md-1"> </div>
                    </div> 
                </div>                      


                    </div><!-- end content -->
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end section -->
    <!-- End Choose Plan -->

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

<!-- This is about search data -->
    <script>
    function searchPay() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myPayInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myPayTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 1; i < tr.length; i++) {
    tr[i].style.display = "none";
    td = tr[i].getElementsByTagName("td");
    for (var j = 0; j < td.length; j++) {
      cell = tr[i].getElementsByTagName("td")[j];
      if (cell) {
        if (cell.innerHTML.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
          break;
        } 
      }
    }
   } // i for loop
}
</script>

<script>
    function searchLog() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myLogInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myLogTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 1; i < tr.length; i++) {
    tr[i].style.display = "none";
    td = tr[i].getElementsByTagName("td");
    for (var j = 0; j < td.length; j++) {
      cell = tr[i].getElementsByTagName("td")[j];
      if (cell) {
        if (cell.innerHTML.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
          break;
        } 
      }
    }
   } // i for loop
}
</script>

 <script>
     function searchRemind() {
         // Declare variables
         var input, filter, table, tr, td, i, txtValue;
         input = document.getElementById("myRemindInput");
         filter = input.value.toUpperCase();
         table = document.getElementById("myRemindTable");
         tr = table.getElementsByTagName("tr");

         // Loop through all table rows, and hide those who don't match the search query
         for (i = 1; i < tr.length; i++) {
             tr[i].style.display = "none";
             td = tr[i].getElementsByTagName("td");
             for (var j = 0; j < td.length; j++) {
                 cell = tr[i].getElementsByTagName("td")[j];
                 if (cell) {
                     if (cell.innerHTML.toUpperCase().indexOf(filter) > -1) {
                         tr[i].style.display = "";
                         break;
                     }
                 }
             }
         } // i for loop
     }
 </script>

</body>
</html>

<?php

if (isset($_POST['editProfile'])) {

    $id = $_POST['cusid'];
    $name = $_POST['name'];
    $tel = $_POST['tel'];
    $mobile = $_POST['mobile'];
    $nic = $_POST['nic'];
    $address = $_POST['address'];

    $u_image = $_FILES['user_image']['name'];
    $u_image_tmp = $_FILES['user_image']['tmp_name'];

    move_uploaded_file($u_image_tmp, "admin/user_images/$u_image");

    $update_user = "update customer set name='$name', image='$u_image', address='$address', nic='$nic', tel_no='$tel', mobile='$mobile' where cus_id='$id'";
    $run_user = mysqli_query($con, $update_user);

    if ($run_user) {
        echo "<script>
    			swal({
                    type: 'success',
                    text:'Update Details Successfully !',
                    showConfirmButton: true,
                    confirmButtonText: 'OK'
                })
                .then(willDelete => {
  				if (willDelete) {
    			window.open('customer.php','_self')
  				}
				});
                </script>";

    }
}


if (isset($_POST['changePass'])) {
    $c_pass = $_POST['c_pass'];
    $n_pass = $_POST['n_pass'];
    $co_pass = $_POST['co_pass'];
    $cid = $_POST['cusid'];

    $get_pass = "select * from account where cus_id='$cid'";
    $run_pass = mysqli_query($con, $get_pass);
    $row_pass = mysqli_fetch_array($run_pass);

    if ($row_pass['password'] == $c_pass) {
        if ($n_pass == $co_pass) {
            $update_account = "update account set password='$n_pass' where cus_id='$cid'";
            $run_account = mysqli_query($con, $update_account);
            if ($run_account) {
                echo "<script>
    			swal({
                    type: 'success',
                    text:'Password updated successfully !',
                    showConfirmButton: true,
                    confirmButtonText: 'OK'
                })
                .then(willDelete => {
  				if (willDelete) {
    			window.open('customer.php','_self')
  				}
				});
                </script>";
            }

        } else {
            echo "<script>
    			swal({
                    type: 'error',
                    text:'Error! recheck enter details..',
                    showConfirmButton: true,
                    confirmButtonText: 'OK'
                });
                </script>";
        }
    } else {
        echo "<script>
    			swal({
                    type: 'error',
                    text:'Error! recheck enter details..',
                    showConfirmButton: true,
                    confirmButtonText: 'OK'
                });
                </script>";
    }

}


?>