<!DOCTYPE html>
<?php
include('includes/db.php');
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
                <div class="row">
                    <div class="col-md-12">
                      <br>  
                         <h5>Choose <b>Month</b> :</h5>
    <form method="post" action="reports.php">
        <input type="month" name="r_month">
        <input class="btn btn-bg btn-success" type="submit" name="generate" value="Generate And Save Report >>">
    </form>  
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />

<?php

if (isset($_POST['generate'])) {
    $m = $_POST['r_month'];
    $array = explode("-",$m);
    $year = $array[0];
    $month = date("F", mktime(0, 0, 0, $array[1], 10));
    $c_date = date('Y.m.d');
    date_default_timezone_set("Asia/Colombo");
    $c_time = date("h:i:s a");

    $get_admin = "select * from pradeshiya_sabha";
    $run_admin = mysqli_query($con,$get_admin);
    
  while($row_admin = mysqli_fetch_array($run_admin)){
    $email = $row_admin['email'];
    $address = $row_admin['address'];
    $tel1 = $row_admin['telephone1'];
    $tel2 = $row_admin['telephone2'];
   
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
               <h5 style="font-weight: bold;"><?php echo "$c_date";?></h5>
               <h5 style="font-weight: bold;"><?php echo "$c_time";?></h5> 
            </div>
        </div>

        <div class="row" style="margin-left: 10px;">
               <h5 style="font-weight: bold; color: green;"><?php echo "$email";?></h5>
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
                                        $total = 0;

                                        $insert_report = "insert into reports (month,admin_email,date,time,year) values('$month','taxadminhabaraduwa@gmail.com','$c_date','$c_time','$year')";
                                        $run_report = mysqli_query($con,$insert_report);

                                        if ($run_report) {
                                            echo "<script>
    			swal({
                    type: 'success',
                    title:'Report Generated and Saved Successfully !',
                    showConfirmButton: true,
                    confirmButtonText: 'OK'
                });
                </script>";
                                        }

                                        //   get report ID
                                        $get_id = "select * from reports ORDER BY idReports DESC LIMIT 1";
                                        $run_id = mysqli_query($con, $get_id);
                                        $row_id = mysqli_fetch_array($run_id);
                                        $id = $row_id['idReports'];

                                            $get_pay = "select * from payment_receipt";
                                            $run_pay = mysqli_query($con, $get_pay);
                                            while ($row_pay = mysqli_fetch_array($run_pay)) {
                                                $cid = $row_pay['cus_id'];

                                              $get_c = "select * from customer where cus_id='$cid'";
                                              $run_c = mysqli_query($con, $get_c);
                                              $row_c = mysqli_fetch_array($run_c);
                                              $c_name = $row_c['name'];

                                                $date = $row_pay['date'];
                                                $array = date_parse_from_format("Y-m-d", $date);
                                                $m_num = $array["month"];
                                                $m_name = date("F", mktime(0, 0, 0, $m_num, 10)); 
                                                if ($month==$m_name) {
                                                  
                                                $amount_paid = $row_pay['amount_paid'];
                                                $total += $amount_paid;


                                            ?>

                                         <tr>
                                            <td><?php echo $c_name; ?></td>
                                            <td><?php echo $date; ?></td>
                                            <td><?php echo "Rs. ".round($amount_paid,2); ?></td>
                                      </tr>
                                          <?php
                                                    $insert_rd = "insert into report_details (customer,paid_date,amount,idReports) values('$c_name','$date','$amount_paid','$id')";
                                                    $run_rd = mysqli_query($con,$insert_rd);
//                                                    if ($run_rd) {
//                                                        echo "<script>alert('Report details saved Successfully!')</script>";
//                                                    }

                                        }
                                            }
//                                        update total
                                        $update_r = "update reports set total='$total' where idReports='$id'";
                                        $run_r = mysqli_query($con,$update_r);
//                                        if ($run_r){
//                                            echo "<script>alert('Report Update Successfully!')</script>";
//                                        }
                                          ?>
                                      <tr>
                                            <td></td>
                                            <td style="font-size: 20px; font-weight: bold; color: #eea412;">Total Income</td>
                                            <td style="font-size: 20px; font-weight: bold;"><?php echo "Rs. ".round($total,2); ?></td>
                                      </tr>
                                    </tbody>
                                </table>
                            </div>
                </div>
            </div>
<!-- end table -->

    </div>



<?php
}
    }
?>
              
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