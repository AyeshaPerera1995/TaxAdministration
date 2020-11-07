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

    <script src="../sweetalert/sweetalert2.all.min.js"></script>
</head>

<body style="background-color: #0A0A0A;">


</body>
</html>

<?php
if (isset($_GET['row']) & isset($_GET['cid'])) {
    $row = $_GET['row'];
    $cid = $_GET['cid'];
    $c_date = date("Y.m.d");
    date_default_timezone_set("Asia/Colombo");
    $c_time = date("h:i:sa");
    $message = '';
    if ($row==1){
        $message = 'You have to pay for the Second,Third and Forth Quaters. Check your Payment History. Thank You !';
    }elseif ($row==2){
        $message = 'You have to pay for the Third and Forth Quaters. Check your Payment History. Thank You !';
    }elseif ($row==3){
        $message = 'You have to pay for the Forth Quater. Check your Payment History. Thank You !';
    }

//    save reminder
    $save_remind = "insert into reminder(cus_id,message,date,time) values('$cid','$message','$c_date','$c_time')";
    $run_remind = mysqli_query($con, $save_remind);
    if ($run_remind){
        echo "<script>
    			swal({
                    type: 'success',
                    title:'Payment Alert send to the customer successfully !',
                    showConfirmButton: true,
                    confirmButtonText: 'OK'
                })
                .then(willDelete => {
  				if (willDelete) {
    			window.open('send_remind.php','_self')
  				}
				});
                </script>";
    }

}
?>