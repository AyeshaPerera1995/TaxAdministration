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
                        <h5>Welcome to <b>Habaraduwa Pradeshiya Sabha</b> Admin Dashboard </h5>
                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />

                  <center>
                    <h3><b>- Edit Contact Information -</b></h3><br>               
                </center>
                <?php
                $get_a = "select * from pradeshiya_sabha";
                $run_a = mysqli_query($con, $get_a);
                $row_a = mysqli_fetch_array($run_a);
                ?>
                    <form action="admin_editProfile.php" method="post">
                                <div class="login-content" style="margin-top: 0px;">
                                    <div class="login-form">
                                        <div class="form-group">
                                        <label>Email</label>
                                        <input style="color: #6c757d;" disabled type="email" required="" name="a_email" class="form-control" value="<?php echo $row_a['email'];?>">
                                        </div>
                                        <div class="form-group">
                                        <label>Address</label>
                                        <input style="color: #6c757d;" type="text" required="" name="a_address" class="form-control" value="<?php echo $row_a['address'];?>">
                                        </div>
                                        <div class="form-group">
                                        <label>Telephone 1</label>
                                        <input style="color: #6c757d;" type="tel" required="" name="a_tel1" class="form-control" value="<?php echo $row_a['telephone1'];?>">
                                        </div>
                                        <div class="form-group">
                                        <label>Telephone 2</label>
                                        <input style="color: #6c757d;" type="tel" required="" name="a_tel2" class="form-control" value="<?php echo $row_a['telephone2'];?>">
                                        </div>
                                    </div>
                                </div>  
                                <center>
                                        <div class="custombutton">
                                            <a class="hover-btn-new">
                                            <button type="submit" name="a_edit"><span><i class="fas fa-edit"></i>  Edit Information</span>
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
if (isset($_POST['a_edit'])) {

    $address = $_POST['a_address'];
    $tel1 = $_POST['a_tel1'];
    $tel2 = $_POST['a_tel2'];
    $update_admin = "update pradeshiya_sabha set address='$address',telephone1='$tel1',telephone2='$tel2' where email='taxadminhabaraduwa@gmail.com'";
    $run_admin = mysqli_query($con, $update_admin);
    if ($run_admin) {
        echo "<script>
    			swal({
                    type: 'success',
                    title:'Admin Information updated successfully !',
                    showConfirmButton: true,
                    confirmButtonText: 'OK'
                })
                .then(willDelete => {
  				if (willDelete) {
    			window.open('admin_editProfile.php','_self')
  				}
				});
                </script>";
    }
}

 ?>
