<!DOCTYPE html>

<?php
session_start();
include("includes/db.php");

if (isset($_GET['cus_id'])) {
    $cid = $_GET['cus_id'];
    $get_u = "select * from customer where cus_id='$cid'";
    $run_u = mysqli_query($con, $get_u);
    $row_u = mysqli_fetch_array($run_u);

    $get_t = "select * from tax_valuation where cus_id='$cid'";
    $run_t = mysqli_query($con, $get_t);
    $row_t = mysqli_fetch_array($run_t);

    $id = $row_u['cus_id'];
    $name = $row_u['name'];
    $img = $row_u['image'];
    $address = $row_u['address'];
    $email = $row_u['email'];
    $nic = $row_u['nic'];
    $tel = $row_u['tel_no'];
    $mobile = $row_u['mobile'];

    $grama = $row_t['gnd'];
    $deed = $row_t['deed_no'];
    $assno = $row_t['ass_no'];
    $property = $row_t['property'];
    $pro_type = $row_t['property_type'];
    $a_value = $row_t['annual_value'];


}

?>
<?php  
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
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="assets/css/style.css" rel="stylesheet" />

    <link href="assets/css/all.css" rel="stylesheet">
    <link href="assets/css/regular.css" rel="stylesheet">
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

    <!--alert-->
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
                     <h2>Update TaxPayer</h2>   
                        <h5>Welcome to <b>Habaraduwa Pradeshiya Sabha</b> Admin Dashboard </h5>
                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
               

<!--Content Area start-->
            <div style="background-color: #aaadb2;">
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <div class="login-content">
                            <div class="login-form">
                                <form action="" method="post" enctype="multipart/form-data">
                                      <div class="form-group">
                                        <label>Full Name</label>
                                        <input required="" type="text" class="form-control" value="<?php echo $name; ?>"name="fullname" placeholder="Full Name">
                                    </div>
                                     <div class="form-group">
                                        <label>Residence Address</label><br>
                                        <textarea style="padding:10px;" required="" name="address" cols="65" rows="5" placeholder="Address"><?php echo $address; ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>NIC</label>
                                        <input required="" type="text" name="nic" value="<?php echo $nic; ?>"class="form-control" placeholder="NIC Number">
                                    </div>
                                    <div class="form-group">
                                        <label>Tel Number</label>
                                        <input required="" type="number" name="tel" class="form-control" placeholder="Telephone" value="<?php echo $tel; ?>">
                                        <small class="form-text text-muted">ex. (999) 9999999</small>
                                    </div>
                                    <div class="form-group">
                                        <label>Mobile</label>
                                        <input required="" type="number" name="mobile" class="form-control" placeholder="Mobile" value="<?php echo $mobile; ?>">
                                        <small class="form-text text-muted">ex. (999) 9999999</small>
                                    </div>
                                    <div class="form-group">
                                        <label>Select Image</label>
                                        <input required="" type="file" name="user_image" class="form-control-file"><br>
                                        <img style="border:2px solid #000;" src="user_images/<?php echo $img; ?>" width="90" height="100">
                                    </div>
                                    <hr style="margin-bottom: 0;">
                                    <p style="font-weight: bold; margin-top: 0;">Tax Details.... </p>
                                    <div class="form-group">
                                        <label>Grama Niladari Division</label>
                                        <input required="" type="text" class="form-control" name="grama" value="<?php echo $grama; ?>" placeholder="Grama Niladari Division">
                                    </div>  
                                    <div class="form-group">
                                        <label>Deed No</label>
                                        <input required="" type="text" class="form-control" name="deed" placeholder="Deed No" value="<?php echo $deed; ?>">
                                    </div> 
                                    <div class="form-group">
                                        <label>Assessment No</label>
                                        <input required="" type="text" class="form-control" name="assno" value="<?php echo $assno; ?>" placeholder="Assessment No">
                                    </div>  
                                    <div class="form-group">
                                        <label>Property</label>
                                        <input required="" type="text" class="form-control" name="property" value="<?php echo $property; ?>" placeholder="Property">
                                    </div> 
                                    <div class="form-group">
                                        <label>Property Type</label>
                                        <select style="color: #aaadb2;"class="form-control" name="pro_type">
                                            <?php 
                                        if ($pro_type=='Residential') {
                                             ?>
                                            <option selected="" value="Residential">Residential</option>
                                            <option value="Business">Business</option>
                                             <?php 
                                                }else{
                                              ?>
                                            <option value="Residential">Residential</option>
                                            <option selected="" value="Business">Business</option>
                                              <?php 
                                                }
                                               ?>
                                            
                                        </select>
                                    </div> 
                                    <div class="form-group">
                                        <label>Annual Value as Assessed</label>
                                        <input required="" type="text" class="form-control" name="a_value" value="<?php echo $a_value; ?>">
                                    </div> 
                                    
                                    <br>
                                    <button type="submit" name="edit_user" class="btn social btn-danger btn-flat m-b-30 m-t-30">Update TaxPayer</button>
                                    <br><br>
                                </form>
                            </div>
                        </div>
                        </div>
                        <div class="col-md-2"></div>
                    </div>
                </div>


            </div>

            <!--Content Area over-->

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
}
 ?>

<?php

if (isset($_POST['edit_user'])) {

    $update_id = $id;
    $u_name = $_POST['fullname'];
    $u_address = $_POST['address'];
    $u_nic = $_POST['nic'];
    $u_tel = $_POST['tel'];
    $u_mobile = $_POST['mobile'];

    $u_grama = $_POST['grama'];
    $u_deed = $_POST['deed'];
    $u_assno = $_POST['assno'];
    $u_property = $_POST['property'];
    $u_protype = $_POST['pro_type'];
    $u_value = $_POST['a_value'];
    $t_tax= ($u_value*6)/100;
    $q_tax= $t_tax/4;

    $u_image = $_FILES['user_image']['name'];
    $u_image_tmp = $_FILES['user_image']['tmp_name'];

    move_uploaded_file($u_image_tmp, "user_images/$u_image");

    $update_user = "update customer set name='$u_name', image='$u_image', address='$u_address', 
    nic='$u_nic', tel_no='$u_tel', mobile='$u_mobile' where cus_id='$update_id'";
    $run_user = mysqli_query($con, $update_user);

    $update_tax = "update tax_valuation set ass_no='$u_assno',property='$u_property',property_type='$u_protype',annual_value='$u_value',total_tax='$t_tax',gnd='$u_grama',deed_no='$u_deed', quater_tax='$q_tax',arreares=0 where cus_id='$update_id'";
    $run_tax = mysqli_query($con, $update_tax);

    if ($run_user) {
        echo "<script>
    			swal({
                    type: 'success',
                    title:'Customer Details Updated Successfully !',
                    showConfirmButton: true,
                    confirmButtonText: 'OK'
                })
                .then(willDelete => {
  				if (willDelete) {
    			window.open('manage_taxpayers.php','_self')
  				}
				});
                </script>";
        
    }
}
?>
