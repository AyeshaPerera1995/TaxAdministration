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

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <script>
        function validateNic() {
        const nic = document.getElementById("nic").value;  
    
    // should be requred
     if(nic=='') {
        document.getElementById("msg").innerHTML = "Enter the NIC number!";             
     }
     else if(nic.length==10){  
    const lastLetter = nic[nic.length-1];
    const numbers = nic.slice(0,nic.length-1);
   if((lastLetter==='V' || lastLetter==='X') && !isNaN(numbers)){             
    document.getElementById("msg").innerHTML = "";  
   }else{
    document.getElementById("msg").innerHTML = "Invalid Old NIC number!";             
       }
     }
  // if length 13
     else if(nic.length==12){
   // only digits
   if(!isNaN(nic)){
    document.getElementById("msg").innerHTML = "";  
   }
   else {
    document.getElementById("msg").innerHTML = "Invalid New NIC number!";             
   }
     }
     else {
        document.getElementById("msg").innerHTML = "Invalid NIC number!";             
     }
}


// validate Number 
 function validateNumber(){
    const tel = document.getElementById("tel").value;  
    if (tel.length==10 && !isNaN(tel)) {   
        document.getElementById("telMsg").innerHTML = "";     
    }else if(tel==""){
        document.getElementById("telMsg").innerHTML = "Enter a Telephone Number !"; 
    }else{
        document.getElementById("telMsg").innerHTML = "Invalid Number !";  
    }

 }

 // validate Mobile 
 function validateMobile(){
    const tel = document.getElementById("mobile").value;  
    if (tel.length==10 && !isNaN(tel)) {   
        document.getElementById("mobMsg").innerHTML = "";     
    }else if(tel==""){
        document.getElementById("mobMsg").innerHTML = "Enter a Mobile Number !"; 
    }else{
        document.getElementById("mobMsg").innerHTML = "Invalid Number !";  
    }

 }

    </script>
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
                     <h2>Register New TaxPayer</h2>   
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
                            <form name="taxPayerForm" action="addnew_taxpayer.php" onsubmit="return validateForm()" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Full Name</label>
                                        <input required="" type="text" class="form-control" name="fullname" placeholder="Full Name">
                                    </div>                                   
                                    <div class="form-group">
                                        <label>Residence Address</label><br>
                                        <textarea style="padding:10px;" required="" name="address" cols="56" rows="5" placeholder="Address"></textarea>                                   
                                    </div>
                                    <div class="form-group">
                                        <label>NIC</label>
                                        <input type="text" id="nic" name="nic" class="form-control" onmouseout="validateNic()" placeholder="NIC Number">                                       
                                        <span id="msg" style="color:red; font-weight:bold;"></span>
                                    </div>
                                    <div class="form-group">
                                        <label>Tel Number</label>
                                        <input required="" type="number" id="tel" name="tel" onmouseout="validateNumber()" class="form-control" placeholder="Telephone">
                                        <!-- <small class="form-text text-muted">ex. (099) 9999999</small> -->
                                        <span id="telMsg" style="color:red; font-weight:bold;"></span>
                                        
                                    </div>
                                    <div class="form-group">
                                        <label>Mobile</label>
                                        <input required="" type="number" id="mobile" name="mobile" onmouseout="validateMobile()" class="form-control" placeholder="Mobile">
                                        <!-- <small class="form-text text-muted">ex. (099) 9999999</small> -->
                                        <span id="mobMsg" style="color:red; font-weight:bold;"></span>
                                    </div>
                                    <div class="form-group">
                                        <label>Select Image</label>
                                        <input required="" type="file" name="user_image" class="form-control-file">
                                    </div>
                                                                                                 
                                    <hr style="margin-bottom: 0;">
                                    <p style="font-weight: bold; margin-top: 0;">Tax Details.... </p>
                                    <div class="form-group">
                                        <label>Grama Niladari Division</label>
                                        <input required="" type="text" class="form-control" name="grama" placeholder="Grama Niladari Division">
                                    </div>  
                                    <div class="form-group">
                                        <label>Deed No</label>
                                        <input required="" type="text" class="form-control" name="deed" placeholder="Deed No">
                                    </div> 
                                    <div class="form-group">
                                        <label>Assessment No</label>
                                        <input required="" type="text" class="form-control" name="assno" placeholder="Assessment No">
                                    </div>  
                                    <div class="form-group">
                                        <label>Property</label>
                                        <input required="" type="text" class="form-control" name="property" placeholder="Property">
                                    </div> 
                                     <div class="form-group">
                                        <label>Property Type</label>
                                        <select style="color: #aaadb2;"class="form-control" name="pro_type">
                                            <option value="0">Select Prperty Type</option>
                                            <option value="Residential">Residential</option>
                                            <option value="Business">Business</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Annual Value as Assessed</label>
                                        <input required="" type="text" class="form-control" name="a_value" placeholder="Annual Value">
                                    </div> 

                                    <hr>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input required="" type="email" class="form-control" name="email" placeholder="Email">
                                    </div>
                                    <br>
                                    <button type="submit" name="register" class="btn social btn-danger btn-flat m-b-30 m-t-30">Register TaxPayer</button>
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

if (isset($_POST['register'])) {
    $name = $_POST['fullname'];
    $address = $_POST['address'];
    $nic = $_POST['nic'];
    $tel = $_POST['tel'];
    $mobile = $_POST['mobile'];

    $grama = $_POST['grama'];
    $deed = $_POST['deed'];
    $assno = $_POST['assno'];
    $property = $_POST['property'];
    $pro_type = $_POST['pro_type'];
    $a_value = $_POST['a_value'];
    $t_tax= ($a_value*6)/100;
    $q_tax= $t_tax/4;

    $email = $_POST['email'];
    $pass = 'HPS123';

    $user_image = $_FILES['user_image']['name'];
    $user_image_tmp = $_FILES['user_image']['tmp_name'];

    move_uploaded_file($user_image_tmp, "user_images/$user_image");

    // check the user email is available
    $sel_email = "select * from account where email='$email'";
    $run_email = mysqli_query($con, $sel_email);

    if (mysqli_num_rows($run_email) > 0) {
        echo "<script>
    			swal({
                    type: 'error',
                    title:'Duplicate Email! Try Again..',
                    showConfirmButton: true,
                    confirmButtonText: 'OK'
                });
                </script>";
//        echo "<script>alert('Duplicate Email! Try Again..')</script>";
//        echo "<script>window.open('addnew_taxpayer.php','_self')</script>";
    }else if(mysqli_num_rows($run_email) == 0){
    //    echo "<script>alert('insert customer')</script>";
    $insert_user = "insert into customer (name,image,address,email,nic,tel_no,mobile,status) 
    values ('$name','$user_image','$address','$email','$nic','$tel','$mobile',1)";
    $run_user = mysqli_query($con, $insert_user);
//    echo "<script>alert('....')</script>";
    if ($run_user) {    
//    echo "<script>alert('done')</script>";
        $sel_user="select * from customer where name='$name' AND email='$email' AND nic='$nic' AND 
        tel_no='$tel'";
        $run_loguser = mysqli_query($con, $sel_user);
        $row_user = mysqli_fetch_array($run_loguser);
        $cus_id = $row_user['cus_id'];

        $insert_tax = "insert into tax_valuation (ass_no,property,property_type,annual_value,total_tax,gnd,deed_no,quater_tax,arreares,cus_id,pay_status) values ('$assno','$property','$pro_type','$a_value','$t_tax','$grama','$deed','$q_tax',0,'$cus_id',0)";
        $run_tax = mysqli_query($con,$insert_tax);
        // echo "<script>alert('insert valu')</script>";

        $insert_login = "insert into account (nic,password,status,cus_id) values ('$nic','$pass','1',
        '$cus_id')";
        $run_login = mysqli_query($con, $insert_login);

        if ($run_login) {



// **************************************************************************send a sms 
  
// require __DIR__ . '/vendor/autoload.php';
// use Twilio\Rest\Client;

// Your Account SID and Auth Token from twilio.com/console
// To set up environmental variables, see http://twil.io/secure
// $account_sid = getenv('AC00c9b4d9d1422c434dc778a5bf94bdf9');
// $auth_token = getenv('c757f38d887975b15e330542fd2c0b3f');
// In production, these should be environment variables. E.g.:
// $auth_token = $_ENV["TWILIO_AUTH_TOKEN"]

// A Twilio number you own with SMS capabilities
// $twilio_number = "+12057511028";

// $client = new Client($account_sid, $auth_token);
// $client->messages->create(
    // Where to send a text message (your cell phone?)
//     $mobile,
//     array(
//         'from' => $twilio_number,
//         'body' => 'You are registerd for the Tax Payment System in Habaraduwa Pradeshiya Sabha. Now you can Pay Online!'
//     )
// );

// **************************************************************************send a sms 



            echo "<script>
    			swal({
                    type: 'success',
                    title:'TaxPayer Added Successfully!',
                    showConfirmButton: true,
                    confirmButtonText: 'OK'
                })
                .then(willDelete => {
  				if (willDelete) {
    			window.open('manage_taxpayers.php','_self')
  				}
				});
                </script>";

        }else{
            echo "<script>
    			swal({
                    type: 'error',
                    title:'Account Error',
                    showConfirmButton: true,
                    confirmButtonText: 'OK'
                });
                </script>";
        }

        // } // pro_type checked...

    }else{
        echo "<script>
    			swal({
                    type: 'error',
                    title:'Account Error',
                    showConfirmButton: true,
                    confirmButtonText: 'OK'
                });
                </script>";
    }

    }


}


 ?>
