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
                    <h2>Search Monthly Reports</h2>
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
                             Monthly Reports Information
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-manageTaxPayers">
                                    <thead>
                                        <tr>
                                            <th>Report ID</th>
                                            <th>Month</th>
                                            <th>Total Amount</th>
                                            <th>Generated Date</th>
                                            <th>Generated Time</th>
                                            <th>View Monthly Report</th>
											
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
//                                            load all the reports to the table
                                            $get_reports = "select * from reports";
                                            $run_reports = mysqli_query($con, $get_reports);
                                            while ($row_reports = mysqli_fetch_array($run_reports)) {
                                                $id = $row_reports['idReports'];
                                                $month = $row_reports['month'];
                                                $total = $row_reports['total'];
                                                $date = $row_reports['date'];
                                                $time = $row_reports['time'];
                                            ?>

                                         <tr>
                                            <td><?php echo $id; ?></td>
                                            <td><?php echo $month; ?></td>
                                            <td><?php echo 'Rs. '.round($total,2); ?></td>
                                            <td><?php echo $date; ?></td>
                                             <td><?php echo $time; ?></td>
                                             <td align="center"><a class="btn btn-warning btn-sm" href="view_report.php?rid=<?php echo $id;?>"><span>View Report</span></a></td>
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
