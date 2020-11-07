<?php 
include("db.php");
include("mpdf/mpdf.php");
 ?>

<!-- Modal Start-->
	<div class="modal fade" id="pay_receipt<?php echo $rn;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog modal-dialog-centered modal-md" role="document">
		<div class="modal-content">
			<div class="modal-header tit-up">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Payment Receipt</h4>
			</div>
			<div class="modal-body">
				<center>
				<h2>Habaraduwa Pradeshiya Sabha</h2>
				<h4 style="margin: 0; padding: 0; line-height: 0; color: #eea412;">- Assessment Tax Bill -</h4><br>
				</center>

<?php
	$id = $rn;
    $get_r = "select * from payment_receipt where receipt_no ='$id'";
    $run_r = mysqli_query($con, $get_r);
    $row_r = mysqli_fetch_array($run_r);
    $date = $row_r['date'];
    $p_id = $row_r['premises_id'];
    $arr = $row_r['arreares'];
    $wc = $row_r['warrant_cost'];
    $r = $row_r['rates'];
    $ap = $row_r['amount_paid'];
    $dis = $row_r['discount'];
    $desc = $row_r['print_desc'];
    $cid = $row_r['cus_id'];

    $get_c = "select * from customer where cus_id='$cid'";
	$run_c = mysqli_query($con, $get_c);
    $row_c = mysqli_fetch_array($run_c);
    $name = $row_c['name'];

?>


				<div class="tab-content">
					<div class="tab-pane active">
						<form action="" method="post" role="form">
                            <center>
                            <table>
                            	<tr>
                            		<td><label style="font-weight: bold;">Receipt No</label></td>
                            		<td><input disabled="" style="margin-left: 20px;" class="form-control" value="<?php echo $id;?>"></td>
                            	</tr>

                            	<tr>
                            		<td><label style="font-weight: bold;">Receipt Date</label></td>
                            		<td><input disabled="" style="margin-left: 20px;" class="form-control" value="<?php echo $date;?>"></td>
                            	</tr>
                            	<tr>
                            		<td><label style="font-weight: bold;">Premises ID</label></td>
                            		<td><input disabled="" style="margin-left: 20px;" class="form-control" value="<?php echo $p_id;?>"></td>
                            	</tr>
                            	<tr>
                            		<td><label style="font-weight: bold;">Name</label></td>
                            		<td><input disabled="" style="margin-left: 20px;" class="form-control" value="<?php echo $name;?>"></td>
                            	</tr>
                            	<tr>
                            		<td><label style="font-weight: bold;">Arreares</label></td>
                            		<td><input disabled="" style="margin-left: 20px;" class="form-control" value="<?php echo "Rs.".round($arr,2);?>"></td>
                            	</tr>
                            	<tr>
                            		<td><label style="font-weight: bold;">Warrant Cost</label></td>
                            		<td><input disabled="" style="margin-left: 20px;" class="form-control" value="<?php echo "Rs.".round($wc,2);?>"></td>
                            	</tr>
                            	<tr>
                            		<td><label style="font-weight: bold;">Rates</label></td>
                            		<td><input disabled="" style="margin-left: 20px;" class="form-control" value="<?php echo "Rs.".round($r,2);?>"></td>
                            	</tr>
                            	<tr>
                            		<td><label style="font-weight: bold;">Amount Paid</label></td>
                            		<td><input disabled="" style="margin-left: 20px;" class="form-control" value="<?php echo "Rs.".round($ap,2);?>"></td>
                            	</tr>
                            	<tr>
                            		<td><label style="font-weight: bold;">Discount</label></td>
                            		<td><input disabled="" style="margin-left: 20px;" class="form-control" value="<?php echo "Rs.".round($dis,2);?>"></td>
                            	</tr>
                            	<tr>
                            		<td><label style="font-weight: bold;">Description</label></td>
                            		<td><input disabled="" style="margin-left: 20px;" class="form-control" value="<?php echo $desc;?>"></td>
                            	</tr>
                            	
                            </table>
                            </center>
							<br>
							<div class="row">								
								<button style="margin-left: 210px;" type="submit" name="getpdf" class="btn btn-light btn-radius btn-brd grd1">
										Save Receipt PDF
								</button>

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
	if(isset($_POST['getpdf'])){
		ob_start();
	?>


		<br>
		<h1 style="margin-left: 200px;color: red;">- Habaraduwa Pradeshiya Sabha -</h1>
		<h2 style="margin-left: 300px;">Assessment Tax Bill</h2>
		<br>
        <p style="margin-left: 100px;">Receipt No : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $id;?></p>
        <p style="margin-left: 100px;">Receipt Date : &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $date;?></p>
        <hr><br><br>
        <table style="margin-left: 120px;">
                            	<tr>
                            		<td><label style="font-weight: bold;">Premises ID</label></td>
                            		<td><input size="100" class="form-control" value="<?php echo $p_id;?>"></td>
                            	</tr>
                            	<tr>
                            		<td><label style="font-weight: bold;">Name</label></td>
                            		<td><input size="100" class="form-control" value="<?php echo $name;?>"></td>
                            	</tr>
                            	<tr>
                            		<td><label style="font-weight: bold;">Arreares</label></td>
                            		<td><input size="100" class="form-control" value="<?php echo "Rs.".round($arr,2);?>"></td>
                            	</tr>
                            	<tr>
                            		<td><label style="font-weight: bold;">Warrant Cost</label></td>
                            		<td><input size="100" class="form-control" value="<?php echo 
                                    "Rs.".round($wc,2);?>"></td>
                            	</tr>
                            	<tr>
                            		<td><label style="font-weight: bold;">Rates</label></td>
                            		<td><input size="100" class="form-control" value="<?php echo 
                                    "Rs.".round($r,2);?>"></td>
                            	</tr>
                            	<tr>
                            		<td><label style="font-weight: bold;">Amount Paid</label></td>
                            		<td><input size="100" class="form-control" value="<?php echo 
                                    "Rs.".round($ap,2);?>"></td>
                            	</tr>
                            	<tr>
                            		<td><label style="font-weight: bold;">Discount</label></td>
                            		<td><input size="100" class="form-control" value="<?php echo 
                                    "Rs.".round($dis,2);?>"></td>
                            	</tr>
                            	<tr>
                            		<td><label style="font-weight: bold;">Description</label></td>
                            		<td><input size="100" class="form-control" value="<?php echo $desc;?>"></td>
                            	</tr>
                            	
                            </table>




        <?php
		$body = ob_get_clean();

        $body = iconv("UTF-8","UTF-8//IGNORE",$body);

        
        $mpdf=new \mPDF('c','A4','','' , 0, 0, 0, 0, 0, 0); 

        //write html to PDF
        $mpdf->WriteHTML($body);
 
        //output pdf
        // $mpdf->Output('demo.pdf','D');
        
        $r_name = "Reports/".$id."1234567890receipt.pdf";
        //open in browser
        // $mpdf->Output();

        //save to server
        $mpdf->Output($r_name,'F');
//        echo "<script>alert('Save Payment Receipt...')</script>";
        echo "<script>
    			swal({
                    type: 'success',
                    text:'Save Payment Receipt...',
                    showConfirmButton: true,
                    confirmButtonText: 'OK'
                });
                </script>";

		}
        ?>


	