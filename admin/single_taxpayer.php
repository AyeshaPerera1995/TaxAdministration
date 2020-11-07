<!DOCTYPE html>

<?php
session_start();
include("includes/db.php");

if (isset($_GET['cus_id'])) {
    $cid = $_GET['cus_id'];
    $get_u = "select * from customer where cus_id='$cid'";
    $run_u = mysqli_query($con, $get_u);
    $row_u = mysqli_fetch_array($run_u);

    $get_t = "select * from tax_valuation where cus_id='$cid'";
    $run_t = mysqli_query($con, $get_t);
    $row_t = mysqli_fetch_array($run_t);

    $id = $row_u['cus_id'];
    $name = $row_u['name'];
    $img = $row_u['image'];
    $address = $row_u['address'];
    $email = $row_u['email'];
    $nic = $row_u['nic'];
    $tel = $row_u['tel_no'];
    $mobile = $row_u['mobile'];

    $grama = $row_t['gnd'];
    $deed = $row_t['deed_no'];
    $assno = $row_t['ass_no'];
    $property = $row_t['property'];
    $pro_type = $row_t['property_type'];
    $a_value = $row_t['annual_value'];

}
?>

<?php  
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
    <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="assets/css/style.css" rel="stylesheet" />
    
    <link href="assets/css/all.css" rel="stylesheet">
    <link href="assets/css/regular.css" rel="stylesheet">
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
   <!-- TABLE STYLES-->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

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
                     <h2>Tax Payer Information...</h2>   
                        <h5>Welcome to <b>Habaraduwa Pradeshiya Sabha</b> Admin Dashboard </h5>
                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />

    <div class="row">
        <div class="col-md-12 col-sm-12">
                    <div class="panel panel-default">
                        <!-- <div class="panel-heading">
                            Basic Tabs
                        </div> -->
                        <div class="panel-body pane">
                            <ul class="nav nav-tabs">
                                <li class="active"><a class="tabstyle" href="#generalinfo" data-toggle="tab"><i class="fas fa-users"></i>General Information</a>
                                </li>
                                <li><a class="tabstyle" href="#taxdetails" data-toggle="tab"><i class="fas fa-file-invoice"></i>Tax Details</a>
                                </li>
                                <li><a class="tabstyle" href="#paymenthistory" data-toggle="tab"><i class="fas fa-coins"></i>Payment History</a>
                                </li>
                                <li class=""><a class="tabstyle" href="#logdetails" data-toggle="tab"><i class="fas fa-clipboard-list"></i>Logging History</a>
                                </li>
<!--                                <li class=""><a class="tabstyle" href="#reminders" data-toggle="tab"><i class="fas fa-user-clock"></i>Send Reminders</a>-->
<!--                                </li>-->
                            </ul>

                            <div class="tab-content">
                                <div class="tab-pane fade active in" id="generalinfo">
                                    <h4><b>General Information...</b></h4>
                                    <center>
                                        <img src="user_images/<?php echo $img; ?>" width="140px" height="140px" alt="Image Here" style="border-radius: 80px; border:2px solid #555;">
                                    </center>                                   
                                <div class="login-content" style="margin-top: 0px;">
                                    <div class="login-form">
                                        <div class="form-group">
                                        <label>Full Name</label>
                                        <input type="text" disabled="" class="form-control" value="<?php echo $name; ?>">
                                        </div>
                                        <div class="form-group">
                                        <label>Nic</label>
                                        <input type="text" disabled="" class="form-control" value="<?php echo $nic; ?>">
                                        </div>
                                        <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" disabled="" class="form-control" value="<?php echo $email; ?>">
                                        </div>
                                        <div class="form-group">
                                        <label>Tel</label>
                                        <input type="text" disabled="" class="form-control" value="<?php echo $tel; ?>">
                                        </div>
                                        <div class="form-group">
                                        <label>Mobile</label>
                                        <input type="text" disabled="" class="form-control" value="<?php echo $mobile; ?>">
                                        </div>
                                        <div class="form-group">
                                        <label>Address</label>
                                        <input type="text" disabled="" class="form-control" value="<?php echo $address; ?>">
                                        </div>
                                    </div>
                                </div>    
                                </div>

                                <div class="tab-pane fade" id="taxdetails">
                                    <h4><b>Tax Details...</b></h4>
                                <div class="login-content" style="margin-top: 0px;">
                                    <div class="login-form">
                                        <div class="form-group">
                                        <label>Grama Niladari Division</label>
                                        <input type="text" disabled="" class="form-control" value="<?php echo $grama; ?>">
                                        </div>
                                        <div class="form-group">
                                        <label>Deed No</label>
                                        <input type="text" disabled="" class="form-control" value="<?php echo $deed; ?>">
                                        </div>
                                        <div class="form-group">
                                        <label>Assessment No</label>
                                        <input type="text" disabled="" class="form-control" value="<?php echo $assno; ?>">
                                        </div>
                                        <div class="form-group">
                                        <label>Property</label>
                                        <input type="text" disabled="" class="form-control" value="<?php echo $property; ?>">
                                        </div>
                                        <div class="form-group">
                                        <label>Property Type</label>
                                        <input type="text" disabled="" class="form-control" value="<?php echo $pro_type; ?>">
                                        </div>
                                        <div class="form-group">
                                        <label>Annual Value as Assessed</label>
                                        <input type="text" disabled="" class="form-control" value="<?php echo 'Rs.',$a_value ?>">
                                        </div>
                                    </div>
                                </div>    
                                </div>

                            <div class="tab-pane fade" id="paymenthistory">                                 
                                    <h4><b>Payment History...</b></h4><br>
<!-- Advanced Tables -->
                    
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Card Holder</th>
                                            <th>Card Number</th>
                                            <th>Payment Method</th>
                                            <th>Paid Date</th>
                                            <th>View Payment Receipt</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php

                                    $get_p = "select * from payment where cus_id='$cid'";
                                    $run_p = mysqli_query($con, $get_p);
                                    while ($row_p = mysqli_fetch_array($run_p)){
                                        $id = $row_p['payment_id'];
                                        $ch = $row_p['card_holder_name'];
                                        $cn = $row_p['card_number'];
                                        $pm = $row_p['payment_method'];
                                        $pd = $row_p['paid_date'];
                                    ?>
                                        <tr>
                                            <td><?php echo $ch;?></td>
                                            <td><?php echo $cn;?></td>
                                            <td><?php echo $pm;?></td>
                                            <td><?php echo $pd;?></td>
                                            <input type="hidden" id="pid" value="<?php echo $id;?>">
                                            <td align="center"><a class="btn btn-danger btn-sm" href="view_payreceipt.php?pid=<?php echo $id;?>&cid=<?php echo $cid;?>">View Receipt</a></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>

                                    </tbody>
                                </table>
                            </div>
                                                                   
                    <!--End Advanced Tables -->    
                            </div>

                            <div class="tab-pane fade" id="logdetails">
                                <h4><b>Logging History...</b></h4><br>
                                <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example1">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>In Time</th>
                                            <th>Out Time</th>
                                            <th>Status</th>
                                                                                       
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
                                        $status = $row_log['status'];
                                    ?>
                                        <tr>
                                            <td><?php echo $d;?></td>
                                            <td><?php echo $in;?></td>
                                            <td><?php echo $out;?></td>
                                            <?php
                                            if ($status==1){
                                            ?>
                                                <td align="center"><span style="background: darkgreen; padding:5px; color: #ffffff;"><?php echo 'Login Success';?></span></td>
                                            <?php
                                            }
                                            if ($status==0){
                                            ?>
                                            <td align="center"><span style="background: red; padding:5px; color: #ffffff;"><?php echo 'Login Fail';?></span></td>
                                            <?php
                                            }
                                            ?>
                                        </tr>
                                    <?php
                                    }
                                    ?>

                                    </tbody>
                                </table>
                            </div>                                   
                        </div>

                                <div class="tab-pane fade" id="reminders">
                                    <h4><b>Send Reminders...</b></h4>
                                    <br>
                                    <div class="form-group">
                                        <label>Due Payment Date :</label>
                                        <input type="text"disabled="" class="form-control" placeholder="21 June 2020">
                                        </div>
                                        <center>
                                        <div class="form-group">
                                        <textarea rows="10" cols="50" placeholder="Reminder Here"></textarea>
                                        <br><br>
                                        <div class="custombutton">
                    <center><a href="addnew_taxpayer.php" class="hover-btn-new"><span><i class="far fa-bell"></i>   Send Alert to TaxPayer
                    </span></a></center></div>
                                        </div>
                                        </center>
                                </div>
                            </div>
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
     <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
    <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
    <script>
            $(document).ready(function () {
                $('#dataTables-example1').dataTable();
            });
    </script>
         <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>

</body>
</html>

<?php 
}
 ?>
