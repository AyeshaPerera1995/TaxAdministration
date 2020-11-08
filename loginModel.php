<?php 
session_start();
include("db.php");
include("functions/function.php");
 ?>

<!-- Modal Start-->
	<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header tit-up">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Customer Login</h4>
			</div>
			<div class="modal-body customer-box">
				<h1 style="font-weight:bold;">Login Form</h1>
				<div class="tab-content">
					<div class="tab-pane active" id="Login">
						<form action="index.php" method="post" role="form" class="form-horizontal">
							<div class="form-group">
								<div class="col-sm-12">
									<input class="form-control" name="nic" id="exampleInputPassword1" placeholder="Username" type="text">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12">
									<input class="form-control" name="pass" id="password" placeholder="Password" type="password">
								</div>
							</div>
							<div class="row">
								<div class="col-sm-10">
									<button type="submit" name="log" class="btn btn-light btn-radius btn-brd grd1">
										Login
									</button>
<!--									<a class="for-pwd" href="#">Forgot your password?</a>-->
								</div>
							</div>
						</form>
					</div>					
				</div>
			</div>
		</div>
	  </div>
	</div>
	<!-- Modal End-->

	<?php 

	if (isset($_POST['log'])) {
    $nic = $_POST['nic'];
    $pass = $_POST['pass'];
    $c_date = date("Y.m.d");
    $alert_date = date("m-d");
    // $alert_date = date("m-d",strtotime("December 30"));

    date_default_timezone_set("Asia/Colombo");
    $c_time = date("h:i:s A");

    // check the customer is available
    $sel_cus = "select * from customer where status='1' AND nic='$nic'";
    $run_cus = mysqli_query($con, $sel_cus);
    $row_cus = mysqli_fetch_array($run_cus);
	$cid = $row_cus['cus_id'];
	$email = $row_cus['email'];
    // mysqli_num_rows($run_cus) > 0

    if ($row_cus!=0) {
		// echo "<script>alert('Have')</script>";
		// ' OR 1=1 #
		$sel_acc = "select * from account where nic='' OR 1=1 #' AND password='$pass' AND cus_id='$cid'";
    	// $sel_acc = "select * from account where nic='$nic' AND password='$pass' AND cus_id='$cid'";
    	$run_acc = mysqli_query($con, $sel_acc);
    	$row_acc = mysqli_fetch_array($run_acc);

    	if ($row_acc!=0) {

    	// Send data to log history
		$insert_loghis = "insert into log_history (date,in_time,status,account_email) values 
		('$c_date','$c_time',1,'$email')";
        $run_loghis = mysqli_query($con, $insert_loghis);

    	$_SESSION['user_email'] = $email;
            echo "<script>
    			swal({
                    type: 'success',
                    text:'Welcome... Logging Successfully !',
                    showConfirmButton: true,
                    confirmButtonText: 'OK'
                });
                </script>";

    		// Payment Alert Boxes
    		$quater = getQuater($alert_date);

    		if ($quater=='Q1') {
    			echo "<script>
    			swal({
                    type: 'info',
                    title: 'Payment Reminder!',
                    text: 'This is first quater. Check your payment details and complete your payments. If you are already paid, please ignore this message. Thank You !',
                    showConfirmButton: true,
                    confirmButtonText: 'GOT IT'
                })
                .then(willDelete => {
  				if (willDelete) {
    			window.open('customer.php','_self')
  				}
				});
                </script>";
    			if ($alert_date == date("m-d",strtotime("January 01"))) {
    				echo "<script>
    			swal({
                    type: 'info',
                    title: 'Payment Reminder!',
                    text: 'First quater is started today. Check your payment details and complete your payments. If you are already paid, please ignore this message. Thank You !',
                    showConfirmButton: true,
                    confirmButtonText: 'GOT IT'
                })
                .then(willDelete => {
  				if (willDelete) {
    			window.open('customer.php','_self')
  				}
				});
                </script>";
    			}
    			if ($alert_date == date("m-d",strtotime("March 30"))) {
    				echo "<script>
    			swal({
                    type: 'info',
                    title: 'Payment Reminder!',
                    text: 'First quater is ended tommorow. Check your payment details and complete your payments. If you are already paid, please ignore this message. Thank You !',
                    showConfirmButton: true,
                    confirmButtonText: 'GOT IT'
                })
                .then(willDelete => {
  				if (willDelete) {
    			window.open('customer.php','_self')
  				}
				});
                </script>";
    			}

    		}elseif ($quater=='Q2') {
    			echo "<script>
    			swal({
                    type: 'info',
                    title: 'Payment Reminder!',
                    text: 'This is second quater. Check your payment details and complete your payments. If you are already paid, please ignore this message. Thank You !',
                    showConfirmButton: true,
                    confirmButtonText: 'GOT IT'
                })
                .then(willDelete => {
  				if (willDelete) {
    			window.open('customer.php','_self')
  				}
				});
                </script>";

				if ($alert_date == date("m-d",strtotime("April 01"))) {
    				echo "<script>
    			swal({
                    type: 'info',
                    title: 'Payment Reminder!',
                    text: 'Second quater is started today. Check your payment details and complete your payments. If you are already paid, please ignore this message. Thank You !',
                    showConfirmButton: true,
                    confirmButtonText: 'GOT IT'
                })
                .then(willDelete => {
  				if (willDelete) {
    			window.open('customer.php','_self')
  				}
				});
                </script>";
    			}
    			if ($alert_date == date("m-d",strtotime("June 29"))) {
    				echo "<script>
    			swal({
                    type: 'info',
                    title: 'Payment Reminder!',
                    text: 'Second quater is ended tommorow. Check your payment details and complete your payments. If you are already paid, please ignore this message. Thank You !',
                    showConfirmButton: true,
                    confirmButtonText: 'GOT IT'
                })
                .then(willDelete => {
  				if (willDelete) {
    			window.open('customer.php','_self')
  				}
				});
                </script>";
    			}

    		}elseif ($quater=='Q3') {
    			echo "<script>
    			swal({
                    type: 'info',
                    title: 'Payment Reminder!',
                    text: 'This is third quater. Check your payment details and complete your payments. If you are already paid, please ignore this message. Thank You !',
                    showConfirmButton: true,
                    confirmButtonText: 'GOT IT'
                })
                .then(willDelete => {
  				if (willDelete) {
    			window.open('customer.php','_self')
  				}
				});
                </script>";

				if ($alert_date == date("m-d",strtotime("July 01"))) {
    				echo "<script>
    			swal({
                    type: 'info',
                    title: 'Payment Reminder!',
                    text: 'Third quater is started today. Check your payment details and complete your payments. If you are already paid, please ignore this message. Thank You !',
                    showConfirmButton: true,
                    confirmButtonText: 'GOT IT'
                })
                .then(willDelete => {
  				if (willDelete) {
    			window.open('customer.php','_self')
  				}
				});
                </script>";
    			}
    			if ($alert_date == date("m-d",strtotime("September 29"))) {
    				echo "<script>
    			swal({
                    type: 'info',
                    title: 'Payment Reminder!',
                    text: 'Third quater is ended tommorow. Check your payment details and complete your payments. If you are already paid, please ignore this message. Thank You !',
                    showConfirmButton: true,
                    confirmButtonText: 'GOT IT'
                })
                .then(willDelete => {
  				if (willDelete) {
    			window.open('customer.php','_self')
  				}
				});
                </script>";
    			}

    		}elseif ($quater=='Q4') {
    			echo "<script>
    			swal({
                    type: 'info',
                    title: 'Payment Reminder!',
                    text: 'This is forth quater. Check your payment details and complete your payments. If you are already paid, please ignore this message. Thank You !',
                    showConfirmButton: true,
                    confirmButtonText: 'GOT IT'
                })
                .then(willDelete => {
  				if (willDelete) {
    			window.open('customer.php','_self')
  				}
				});
                </script>";

                if ($alert_date == date("m-d",strtotime("October 01"))) {
    				echo "<script>
    			swal({
                    type: 'info',
                    title: 'Payment Reminder!',
                    text: 'Forth quater is started today. Check your payment details and complete your payments. If you are already paid, please ignore this message. Thank You !',
                    showConfirmButton: true,
                    confirmButtonText: 'GOT IT'
                })
                .then(willDelete => {
  				if (willDelete) {
    			window.open('customer.php','_self')
  				}
				});
                </script>";
    			}
    			if ($alert_date == date("m-d",strtotime("December 30"))) {
    				echo "<script>
    			swal({
                    type: 'info',
                    title: 'Payment Reminder!',
                    text: 'Forth quater is ended tommorow. Check your payment details and complete your payments and year arreares. If you are already done, please ignore this message. Thank You !',
                    	showConfirmButton: true,
                    	confirmButtonText: 'GOT IT'
                })
                .then(willDelete => {
  				if (willDelete) {
    			window.open('customer.php','_self')
  				}
				});
                </script>";
    			}
    		}
    		   		
			// Payment Alert Boxes

    	}else if ($row_acc==0) {
            echo "<script>
    			swal({
                    type: 'error',
                    text:'Error! Try Again..',
                    showConfirmButton: true,
                    confirmButtonText: 'OK'
                });
                </script>";
    	}
    	
    }else  if ($row_cus==0){
        echo "<script>
    			swal({
                    type: 'error',
                    text:'Error! Try Again..',
                    showConfirmButton: true,
                    confirmButtonText: 'OK'
                });
                </script>";
    }

}

	 ?>