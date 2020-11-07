<!DOCTYPE html>
<?php
include("includes/db.php");

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
                     <h2>Send Reminders</h2>   
                        <h5>Welcome to <b>Habaraduwa Pradeshiya Sabha</b> Admin Dashboard </h5>
                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
                 <br><br><br>





                <div class="row">
                    <div class="col-md-12">
                        <!-- Advanced Tables -->
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-reminder">
                                        <thead>
                                        <tr>
                                            <th>Customer</th>
                                            <th>Quater One</th>
                                            <th>Quater Two</th>
                                            <th>Quater Three</th>
                                            <th>Quater Four</th>
                                            <th></th>


                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $c_year = date('Y');
                                        $get_pq = "select DISTINCT cus_id from quater_paid_details where year='$c_year'";
                                        $run_pq = mysqli_query($con, $get_pq);
                                        while ($row_pq = mysqli_fetch_array($run_pq)) {
                                            $cid = $row_pq['cus_id'];

//                                            get cus name
                                            $get_cus = "select * from customer where cus_id = '$cid'";
                                            $run_cus = mysqli_query($con, $get_cus);
                                            $row_cus = mysqli_fetch_array($run_cus);
                                            $cname = $row_cus['name'];

                                            $get_q = "select * from quater_paid_details where cus_id ='$cid' AND year='$c_year'";
                                            $run_q = mysqli_query($con,$get_q);
                                            $row_q = mysqli_num_rows($run_q);
                                            if ($row_q==1){
                                            ?>
                                            <tr>
                                                <td><?php echo $cname;?></td>
                                                <td><span style="background: darkgreen; padding:5px; color: #ffffff;">Paid</span></td>
                                                <td><span style="background: red; padding:5px; color: #ffffff;">Not Paid</span></td>
                                                <td><span style="background: red; padding:5px; color: #ffffff;">Not Paid</span></td>
                                                <td><span style="background: red; padding:5px; color: #ffffff;">Not Paid</span></td>
                                                <td align="center"><button class="btn btn-sm btn-primary"><a href="create_remind.php?row=<?php echo $row_q;?>&cid=<?php echo $cid;?>">Send Payment Reminder</a></button></td>
                                            </tr>
                                                <?php
                                            }elseif ($row_q==2){
                                                ?>
                                                <tr>
                                                    <td><?php echo $cname;?></td>
                                                    <td><span style="background: darkgreen; padding:5px; color: #ffffff;">Paid</span></td>
                                                    <td><span style="background: darkgreen; padding:5px; color: #ffffff;">Paid</span></td>
                                                    <td><span style="background: red; padding:5px; color: #ffffff;">Not Paid</span></td>
                                                    <td><span style="background: red; padding:5px; color: #ffffff;">Not Paid</span></td>
                                                    <td align="center"><button class="btn btn-sm btn-primary"><a href="create_remind.php?row=<?php echo $row_q;?>&cid=<?php echo $cid;?>">Send Payment Reminder</a></button></td>
                                                </tr>
                                                <?php
                                            }elseif ($row_q==3){
                                                ?>
                                                <tr>
                                                    <td><?php echo $cname;?></td>
                                                    <td><span style="background: darkgreen; padding:5px; color: #ffffff;">Paid</span></td>
                                                    <td><span style="background: darkgreen; padding:5px; color: #ffffff;">Paid</span></td>
                                                    <td><span style="background: darkgreen; padding:5px; color: #ffffff;">Paid</span></td>
                                                    <td><span style="background: red; padding:5px; color: #ffffff;">Not Paid</span></td>
                                                    <td align="center"><button class="btn btn-sm btn-primary"><a href="create_remind.php?row=<?php echo $row_q;?>&cid=<?php echo $cid;?>">Send Payment Reminder</a></button></td>
                                                </tr>
                                                <?php
                                            }elseif ($row_q==4){
                                                ?>
                                                <td><?php echo $cname;?></td>
                                                <td><span style="background: darkgreen; padding:5px; color: #ffffff;">Paid</span></td>
                                                <td><span style="background: darkgreen; padding:5px; color: #ffffff;">Paid</span></td>
                                                <td><span style="background: darkgreen; padding:5px; color: #ffffff;">Paid</span></td>
                                                <td><span style="background: darkgreen; padding:5px; color: #ffffff;">Paid</span></td>
                                                <td></td>
                                        <?php
                                            }
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
            $('#dataTables-reminder').dataTable();
        });
    </script>
    <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
   
</body>
</html>
