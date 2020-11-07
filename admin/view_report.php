<!DOCTYPE html>
<?php
include('includes/db.php');

if (isset($_GET['rid'])){
    $rid = $_GET['rid'];
    $get_r = "select * from report_details where idReports='$rid'";
    $run_r = mysqli_query($con, $get_r);

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
            <?php
            $get_report = "select * from reports where idReports='$rid'";
            $run_report = mysqli_query($con, $get_report);
            $row_report = mysqli_fetch_array($run_report);
            $month = $row_report['month'];
            $year = $row_report['year'];
            $total = $row_report['total'];
            $g_date = $row_report['date'];
            $g_time = $row_report['time'];
            ?>

                    <div class="row" style="border: 0.5px solid green; margin: 2px; border-radius: 8px;">
                        <center>
                            <h2>- Habaraduwa Pradeshiya Sabha -</h2>
                            <h3 style="color: #eea412;">Monthly Report</h3>
                            <h4 style="color: #eea412; font-weight: bolder;"><?php echo "$month"." - "."$year";?></h4>
                        </center>
                        <hr>

                        <div class="row">
                            <div class="col-md-1" style="margin-left: 770px;">
                                <h5>Date :</h5>
                                <h5>Time :</h5>
                            </div>
                            <div class="col-md-2">
                                <h5 style="font-weight: bold;"><?php echo $g_date;?></h5>
                                <h5 style="font-weight: bold;"><?php echo $g_time;?></h5>
                            </div>
                        </div>
                        <?php
                        $get_admin = "select * from pradeshiya_sabha";
                        $run_admin = mysqli_query($con,$get_admin);

                        $row_admin = mysqli_fetch_array($run_admin);
                        $email = $row_admin['email'];
                        $address = $row_admin['address'];
                        $tel1 = $row_admin['telephone1'];
                        $tel2 = $row_admin['telephone2'];
                        ?>
                        <div class="row" style="margin-left: 10px;">
                            <h5 style="font-weight: bold; color: green;"><?php echo $email;?></h5>
                            <h5 style="line-height: 20px; font-weight: bold;"><?php echo "Habaraduwa Pradeshiya Sabha"."<br>"."$address";?></h5>
                            <h5 style="font-weight: bold;"><?php echo "$tel1"." / "."$tel2";?></h5>

                        </div><br>

                        <!-- //start table -->
                        <div class="row" style="margin: 10px;">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover" id="dataTables-manageTaxPayers">
                                        <thead>
                                        <tr>
                                            <th>Customer</th>
                                            <th>Paid Date</th>
                                            <th>Paid Amount</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        while ($row_r = mysqli_fetch_array($run_r)){
                                            $name = $row_r['customer'];
                                            $p_date = $row_r['paid_date'];
                                            $amount = $row_r['amount'];
                                        ?>
                                                <tr>
                                                    <td><?php echo $name;?></td>
                                                    <td><?php echo $p_date;?></td>
                                                    <td><?php echo 'Rs. '.round($amount,2);?></td>
                                                </tr>
                                        <?php
                                        }
                                        ?>
                                        <tr>
                                            <td></td>
                                            <td style="font-size: 20px; font-weight: bold; color: #eea412;">Total Income</td>
                                            <td style="font-size: 20px; font-weight: bold;"><?php echo 'Rs. '.round($total,2);?></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- end table -->




                    </div>
            <br>
            <button style="float: right; width: 110px; margin-right: 8px;" type="button" class="btn btn-success"><a href="searchReports.php">Back</a></button>
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