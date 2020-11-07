<?php
$con = mysqli_connect("localhost", "root", "", "tax_administration");

if (mysqli_connect_errno()){
    echo "Failed to connect MySql: ". mysqli_connect_error();
}



function getQuater($c_date){
global $con;

$Q1_sdate = date("m-d",strtotime("January 01"));
$Q1_edate = date("m-d",strtotime("March 31"));

$Q2_sdate = date("m-d",strtotime("April 01"));
$Q2_edate = date("m-d",strtotime("June 30"));

$Q3_sdate = date("m-d",strtotime("July 01"));
$Q3_edate = date("m-d",strtotime("September 30"));

$Q4_sdate = date("m-d",strtotime("October 01"));
$Q4_edate = date("m-d",strtotime("December 31"));


if (($c_date>=$Q1_sdate) && ($c_date<=$Q1_edate)) {
	return 'Q1';
    
}else if(($c_date>=$Q2_sdate) && ($c_date<=$Q2_edate)){
	return 'Q2';

}else if (($c_date>=$Q3_sdate) && ($c_date<=$Q3_edate)) {
	return 'Q3';

}else if (($c_date>=$Q4_sdate) && ($c_date<=$Q4_edate)) {
	return 'Q4';

}

}





function getPayStatus($id){
global $con;
$c_year = date('Y');
// $c_year = date('Y', strtotime('2021-01-01'));

$getQPD = "select * from quater_paid_details where year='$c_year' AND cus_id='$id'";
$runQPD = mysqli_query($con, $getQPD);
$rowsQPD = mysqli_num_rows($runQPD);

if ($rowsQPD==0) {
	return '0';
}else if ($rowsQPD==1) {
	return '1';
}else if ($rowsQPD==2) {
	return '12';
}else if ($rowsQPD==3) {
	return '123';
}else if ($rowsQPD==4) {
	return '1234';
}

}