<!DOCTYPE html>
<?php
session_start();
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
    <!--alert-->
    <script src="../sweetalert/sweetalert2.all.min.js"></script>
</head>

<body style="background: #000;">
    
    <div class="sufee-login d-flex align-content-center flex-wrap">
            <div class="container">
                <div class="login-content"><br><br>
                    <center>
                        <h4 style="color: red; font-weight: bold;"><?php echo @$_GET['not_admin']; ?></h4>
                        <h4 style="color: white; font-weight: bold;"><?php echo @$_GET['logged_in']; ?></h4>
                        <h4 style="color: green; font-weight: bold;"><?php echo @$_GET['logged_out']; ?></h4>
                        <h3 style="color: white;">- Admin Login -</h3>
                    </center>
                    <div class="login-form">
                        <form action="admin_login.php" method="post">
                            <div class="form-group">
                                <label>Email address</label>
                                <input required="" type="email" name="logemail" class="form-control" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input required="" type="password" name="logpass" class="form-control" placeholder="Password">
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"> Remember Me
                                </label>
                                <label class="pull-right">
                                    <a href="#"><b>Forgotten Password?</b></a>
                                </label>

                            </div>
                            <button type="submit" name="a_login" class="btn btn-danger btn-flat">Sign in</button><br><br>                              
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/custom.js"></script>

</body>

</html>

<?php
    if (isset($_POST['a_login'])) {

    $email = $_POST['logemail'];
    $pass = $_POST['logpass'];

    $s_admin = "select * from pradeshiya_sabha where email='$email' AND password='$pass'";
    $run_admin = mysqli_query($con, $s_admin);
    $check_admin = mysqli_num_rows($run_admin);

    if ($check_admin ==0) {
        echo "<script>
    			swal({
                    type: 'error',
                    title:'Wrong Email or Password !!',
                    showConfirmButton: true,
                    confirmButtonText: 'OK'
                });
                </script>";

    } else {
        $_SESSION['admin_email'] = $email;
        echo "<script>
    			swal({
                    type: 'success',
                    title:'You logged in successfully !',
                    showConfirmButton: true,
                    confirmButtonText: 'OK'
                })
                .then(willDelete => {
  				if (willDelete) {
    			window.open('index.php?logged_in=You logged in successfully!','_self')
  				}
				});
                </script>";
    }
}

?>