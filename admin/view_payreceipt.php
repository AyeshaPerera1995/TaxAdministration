<!DOCTYPE html>
<?php
include('includes/db.php');

if (isset($_GET['pid']) & isset($_GET['cid'])){
$cid = $_GET['cid'];

$pid = $_GET['pid'];
$get_pr = "select * from payment_receipt where payment_id='$pid'";
$run_pr = mysqli_query($con, $get_pr);
$row_pr = mysqli_fetch_array($run_pr);

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

    <script src="../sweetalert/sweetalert2.all.min.js"></script>
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

            <div class="row" style="border: 0.5px solid green; margin: 2px; border-radius: 8px;">
                <center>
                    <h3>Habaraduwa Pradeshiya Sabha</h3>
                    <h4 style="color: #eea412;">- Assessment Tax Bill -</h4>
                </center>
                <hr>
                <?php
                $get_a = "select * from pradeshiya_sabha";
                $run_a = mysqli_query($con, $get_a);
                $row_a = mysqli_fetch_array($run_a);
                $cid = $row_pr['cus_id'];
                $get_u = "select * from customer where cus_id='$cid'";
                $run_u = mysqli_query($con, $get_u);
                $row_u = mysqli_fetch_array($run_u);
                ?>
                <div class="row" style="margin-left: 10px;">
                    <h5 style="font-weight: bold; color: green;"><?php echo $row_a['email'];?></h5>
                    <h5 style="line-height: 20px; font-weight: bold;"><?php echo "Habaraduwa Pradeshiya Sabha"."<br>".$row_a['address'];?></h5>

                </div><br>
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-2"> </div>
                        <div class="col-md-8">
                            <form role="form" class="form-horizontal">

                                <div class="form-group">
                                    <div class="col-sm-3">
                                        <label>Receipt No.</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input class="form-control" disabled value="<?php  echo $row_pr['receipt_no'];?>" type="text">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-3">
                                        <label>Receipt Date</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input class="form-control" disabled value="<?php  echo $row_pr['date'];?>" type="text">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-3">
                                        <label>Premises ID</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input class="form-control" disabled value="<?php  echo $row_pr['premises_id'];?>" type="text">
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <div class="col-sm-3">
                                        <label>Name</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input class="form-control" disabled value="<?php  echo $row_u['name'];?>" type="text">
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <div class="col-sm-3">
                                        <label>Arreares</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input class="form-control" disabled value="<?php  echo 'Rs. '.round($row_pr['arreares'],2);?>" type="text">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-3">
                                        <label>Warrant Cost</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input class="form-control" disabled value="<?php  echo 'Rs. '.round($row_pr['warrant_cost'],2);?>" type="text">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-3">
                                        <label>Rates</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input class="form-control" disabled value="<?php  echo 'Rs. '.round($row_pr['rates'],2);?>" type="text">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-3">
                                        <label>Amount Paid</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input class="form-control" disabled value="<?php  echo 'Rs. '.round($row_pr['amount_paid'],2);?>" type="text">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-3">
                                        <label>Discount</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input class="form-control" disabled value="<?php  echo 'Rs. '.round($row_pr['discount'],2);?>" type="text">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-3">
                                        <label>Description</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input class="form-control" disabled value="<?php  echo $row_pr['print_desc'];?>" type="text">
                                    </div>
                                </div>

                            </form><br>
                        </div>
                        <div class="col-md-2"> </div>
                    </div>

                </div>


            </div>
            <br>
            <button style="float: right; width: 110px; margin-right: 8px;" type="button" class="btn btn-success"><a href="single_taxpayer.php?cus_id=<?php echo $cid;?>">Back</a></button>
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
<!-- CUSTOM SCRIPTS -->
<script src="assets/js/custom.js"></script>


</body>
</html>

<?php
}
?>
