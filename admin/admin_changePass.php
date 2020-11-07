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
                     <h2>Admin Settings</h2>   
                        <h5>Welcome to <b>Habaraduwa Pradeshiya Sabha </b>  Admin Dashboard </h5>
                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />


                <center>
                    <h3><b>- Change Password -</b></h3><br>               
                </center>    
                <form action="admin_changePass.php" method="post">
                                <div class="login-content" style="margin-top: 0px;">
                                    <div class="login-form">
                                      
                                        <div class="form-group">
                                        <input type="password" required name="a_currentpass" class="form-control" placeholder="Current Password">
                                        </div>
                                        <div class="form-group">
                                        <input type="password" required name="a_newpass" class="form-control" placeholder="New Password">
                                        </div>
                                        <div class="form-group">
                                        <input type="password" required name="a_confirmpass" class="form-control" placeholder="Confirm Password">
                                        </div>
                                    </div>                                   
                                </div>
                                    <center>
                                        <div class="custombutton">
                                            <a class="hover-btn-new">
                                            <button type="submit" name="a_changepass"><span><i class="fas fa-key"></i>  Change Password</span>
                                            </button>
                                            </a>
                                        </div>
                                    </center>
                                    </form>
               
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
if (isset($_POST['a_changepass'])) {
    $current = $_POST['a_currentpass'];
    $new = $_POST['a_newpass'];
    $confirm = $_POST['a_confirmpass'];

    $get_pass = "select * from pradeshiya_sabha";
    $run_pass = mysqli_query($con, $get_pass);
    $row_pass = mysqli_fetch_array($run_pass);
    if ($row_pass['password']==$current){
        if ($new==$confirm){

            $update_adminpass = "update pradeshiya_sabha set password='$new' where email='taxadminhabaraduwa@gmail.com'";
            $run_adminpass = mysqli_query($con, $update_adminpass);
            if ($run_adminpass) {
                echo "<script>
    			swal({
                    type: 'success',
                    title:'Admin Password updated successfully !',
                    showConfirmButton: true,
                    confirmButtonText: 'OK'
                })
                .then(willDelete => {
  				if (willDelete) {
    			window.open('admin_settings.php','_self')
  				}
				});
                </script>";
            }

        }else{
            echo "<script>
    			swal({
                    type: 'error',
                    title:'Error! recheck enter details..',
                    showConfirmButton: true,
                    confirmButtonText: 'OK'
                });
                </script>";
        }
    }else{
            echo "<script>
    			swal({
                    type: 'error',
                    title:'Error! recheck enter details..',
                    showConfirmButton: true,
                    confirmButtonText: 'OK'
                });
                </script>";
    }

}

 ?>
