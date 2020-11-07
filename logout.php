<?php
include("db.php");

if (isset($_GET['email'])) {
$email = $_GET['email'];

date_default_timezone_set("Asia/Colombo");
$c_time = date("h:i:s A");

$update_loghis = "update log_history set out_time='$c_time' where account_email='$email' ORDER BY loghistory_id DESC";
$run_loghis = mysqli_query($con, $update_loghis);

}

session_start();

session_destroy();

echo "<script>window.open('index.php','_self')</script>";

?>