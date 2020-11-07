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
   
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="assets/css/style.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
     <!-- TABLE STYLES-->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />

     <link href="assets/css/all.css" rel="stylesheet">
    <link href="assets/css/regular.css" rel="stylesheet">
</head>
<body>
    <div id="wrapper">
        <!-- /. NAV TOPBAR  -->
        <?php include 'includes/topbar.php';?>

        <!-- /. NAV TOP  -->
        <?php include 'includes/leftbar.php';?>

        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                    <h2>Search Payment History</h2>   
                        <h5>Welcome to <b>Habaraduwa Pradeshiya Sabha</b> Admin Dashboard </h5>
                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
               
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Payment History Information
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-manageTaxPayers">
                                    <thead>
                                        <tr>
                                            <th>Payment ID</th>
                                            <th>Customer</th>
                                            <th>Premises ID</th>
                                            <th>Payment Method</th>
                                            <th>Card Holder Name</th>
                                            <th>Paid Date</th>
                                            <th>Year</th>
                                            <th>Arreares</th>
                                            <th>Warrent Cost</th>
                                            <th>Discount</th>
                                            <th>Amount Paid</th>
											
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $get_pay = "select * from payment";
                                            $run_pay = mysqli_query($con, $get_pay);
                                            while ($row_pay = mysqli_fetch_array($run_pay)) {
                                                $pid = $row_pay['payment_id'];
                                                $pm = $row_pay['payment_method'];
                                                $chn = $row_pay['card_holder_name'];
                                                $pdate = $row_pay['paid_date'];
                                                $year = $row_pay['year'];
                                                $cid = $row_pay['cus_id'];
                                                $arr = $row_pay['arreares'];
                                                $awc = $row_pay['awc'];
                                                $wc = $row_pay['warrant_cost'];
                                                $dis = $row_pay['discount'];

                                                $get_user = "select * from customer where cus_id='$cid'";
                                                $run_user = mysqli_query($con,$get_user);
                                                $row_user = mysqli_fetch_array($run_user);

                                                $get_receipt = "select * from payment_receipt where payment_id='$pid'";
                                                $run_receipt = mysqli_query($con,$get_receipt);
                                                $row_receipt = mysqli_fetch_array($run_receipt);

                                            ?>

                                         <tr>
                                            <td><?php echo $pid; ?></td>
                                            <td><?php echo $row_user['name']; ?></td>
                                             <td><?php echo $row_receipt['premises_id']; ?></td>
                                            <td><?php echo $pm; ?></td>
                                            <td><?php echo $chn; ?></td>
                                             <td><?php echo $pdate; ?></td>
                                             <td><?php echo $year; ?></td>
                                             <td><?php echo 'Rs. '.round($arr,2); ?></td>
                                             <td><?php echo 'Rs. '.round($wc,2); ?></td>
                                             <td><?php echo 'Rs. '.round($dis,2); ?></td>
                                             <td><?php echo 'Rs. '.round($row_receipt['amount_paid'],2); ?></td>

                                         </tr>
                                                <?php
                                            }
                                            ?>

                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
        </div>
               
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
     <!-- /. WRAPPER  -->

    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-manageTaxPayers').dataTable();
            });
    </script>
         <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    <!-- delete Function -->
   
</body>
</html>

<?php 
}
 ?>
