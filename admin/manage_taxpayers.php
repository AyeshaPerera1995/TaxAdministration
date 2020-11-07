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
                    <h2>Manage Tax Payers</h2>   
                        <h5>Welcome to <b>Habaraduwa Pradeshiya Sabha</b> Admin Dashboard </h5>
                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />

                 <div class="row">
                  <div class="col-md-12">
                    <div class="custombutton">
                    <center><a href="addnew_taxpayer.php" class="hover-btn-new"><span><i class="fas fa-user-plus"></i>   Add New TaxPayer
                    </span></a></center></div>
                  </div>                  
                 </div>
               
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Tax Payers Information
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-manageTaxPayers">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Image</th>
                                            <th>NIC</th>
                                            <th>Address</th>
                                            <th>Email</th>
                                            <th>Edit Info</th>
                                            <th>Current Status</th>
                                            <th>Change Status</th>
                                            <th>More Details</th>
											
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
//                                            load all the payers to the table
                                            $get_users = "select * from customer";
                                            $run_users = mysqli_query($con, $get_users);
                                            while ($row_users = mysqli_fetch_array($run_users)) {
                                                $cid = $row_users['cus_id'];
                                                $name = $row_users['name'];
                                                $image = $row_users['image'];
                                                $address = $row_users['address'];
                                                $email = $row_users['email'];
                                                $nic = $row_users['nic']; 
                                                $status = $row_users['status'];  ;                  

                                            ?>

                                         <tr>
                                            <td><?php echo $name; ?></td>
                                            <td align="center"><img src="user_images/<?php echo $image; ?>"width="70" height="80"></td>
                                            <td><?php echo $nic; ?></td>
                                            <td><?php echo $address; ?></td>
                                            <td><?php echo $email; ?></td> 
                                        <td align="center"><button class="btn btn-warning btn-sm"><a href="edit_taxpayer.php?cus_id=<?php echo $cid; ?>">Edit</a></button></td>
                                                
                                        <?php
                                            if ($status == 1) {
                                        ?>
                                            <td><?php echo 'Active User'; ?></td>  
                                            <td align="center"><button class="btn btn-danger btn-sm"><a href="manage_taxpayers.php?deactive=<?php echo $cid; ?>">Deactive</a></button></td>
                                        <?php
                                            } else if($status==0) {
                                        ?>
                                            <td><?php echo 'Deactive User'; ?></td> 
                                            <td align="center"><button class="btn btn-success btn-sm"><a href="manage_taxpayers.php?active=<?php echo $cid; ?>">Active</a></button></td>
                                        <?php
                                            }
                                        ?>
                                        
                                            <!-- <td><center><a style="border-radius: 20px;" class="btn btn-default"><i style="color: red;" class="fas fa-user-times"></i></a></center></td> -->

                                            <td align="center"><button class="btn btn-info btn-sm"><a href="single_taxpayer.php?cus_id=<?php echo $cid; ?>">More Details</a></button></td>
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

<?php

//Active and deactivate users
if (isset($_GET['deactive'])) {
    $did = $_GET['deactive'];

    $update_duser = "update customer set status='0' where cus_id='$did'";
    $run_duser = mysqli_query($con, $update_duser);

    if ($run_duser) {
        echo "<script>window.open('manage_taxpayers.php','_self')</script>";
    }
}

if (isset($_GET['active'])) {
    $aid = $_GET['active'];

    $update_auser = "update customer set status='1' where cus_id='$aid'";
    $run_auser = mysqli_query($con, $update_auser);

    if ($run_auser) {
        echo "<script>window.open('manage_taxpayers.php','_self')</script>";
    }
}

?>
