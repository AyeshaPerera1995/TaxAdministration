<!DOCTYPE html>
<?php 
include("db.php");

 ?>
<html lang="en">

    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
     <!-- Site Metas -->
    <title>Habaraduwa Pradeshiya Sabha</title>  
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/icon.png" type="image/x-icon" />
    <link rel="apple-touch-icon" href="images/icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="style.css">
    <!-- ALL VERSION CSS -->
    <link rel="stylesheet" href="css/versions.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">

    <!-- Modernizer for Portfolio -->
    <script src="js/modernizer.js"></script>
    <script src="sweetalert/sweetalert2.all.min.js"></script>

</head>
<body class="host_version"> 

	<?php include 'loginModel.php'; ?>

    <!-- LOADER -->
	<div id="preloader">
		<div class="loader-container">
			<div class="progress-br float shadow">
				<div class="progress__item"></div>
			</div>
		</div>
	</div>
	<!-- END LOADER -->	
	
	<!-- Start header -->
	<header class="top-navbar">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container-fluid">
				<a class="navbar-brand" href="index.php">
					<img src="images/logo.png" alt="" />
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-host" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
					<span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbars-host">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item active"><a class="nav-link" href="index.php">Home</a></li>
						<li class="nav-item"><a class="nav-link" href="about_us.php">About Us</a></li>

						<li class="nav-item"><a class="nav-link" href="gallery.php">Gallery</a></li>
						<li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
						<?php 
							if (isset($_SESSION['user_email'])) {
						 ?>
						 <li class="nav-item"><a class="nav-link" href="customer.php">My Account</a></li>
						 <?php  
						 		}
						 ?>
					</ul>

<?php 
if (!isset($_SESSION['user_email'])) {
?>

<ul class="nav navbar-nav navbar-right">
    <li><a class="hover-btn-new log orange" href="#" data-toggle="modal" data-target="#login"><span>Login</span></a></li>
</ul>

<?php   
} else {
 ?>

<ul class="nav navbar-nav navbar-right">
    <li><a class="hover-btn-new log orange" href="logout.php"><span>LogOut</span></a></li>
</ul>

 <?php 
}
  ?>
					
				</div>
			</div>
		</nav>
	</header>
	<!-- End header -->

	<!-- Start Slide Show -->	
	<div id="carouselExampleControls" class="carousel slide bs-slider box-slider" data-ride="carousel" data-pause="hover" data-interval="false" >
		<!-- Indicators -->
		<ol class="carousel-indicators">
			<li data-target="#carouselExampleControls" data-slide-to="0" class="active"></li>
			<li data-target="#carouselExampleControls" data-slide-to="1"></li>
			<li data-target="#carouselExampleControls" data-slide-to="2"></li>
			<li data-target="#carouselExampleControls" data-slide-to="3"></li>
		</ol>
		<div class="carousel-inner" role="listbox">
			<div class="carousel-item active">
				<div id="home" class="first-section" style="background-image:url('images/slide_images/slider-01.jpg');">
					<div class="dtab">
						<div class="container">
							<div class="row">
								<div class="col-md-12 col-sm-12 text-right">
									<div class="big-tagline">
										<h2><strong>Habaraduwa </strong> Pradeshiya Sabha</h2>
										<p class="lead">You can do Online Tax Payments in a Easy Way ! </p>
											<a href="contact.php" class="hover-btn-new"><span>Contact Us</span></a>
											&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
											<a href="index.php" class="hover-btn-new"><span>Read More</span></a>
									</div>
								</div>
							</div><!-- end row -->            
						</div><!-- end container -->
					</div>
				</div><!-- end section -->
			</div>
			<div class="carousel-item">
				<div id="home" class="first-section" style="background-image:url('images/slide_images/slider-02.jpg');">
					<div class="dtab">
						<div class="container">
							<div class="row">
								<div class="col-md-12 col-sm-12 text-left">
									<div class="big-tagline">
										<h2 data-animation="animated zoomInRight">Efficient <strong>Service</strong></h2>
										<p class="lead" data-animation="animated fadeInLeft">You can do Online Tax Payments in a Easy Way ! </p>
											<a href="contact.php" class="hover-btn-new"><span>Contact Us</span></a>
											&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
											<a href="index.php" class="hover-btn-new"><span>Read More</span></a>
									</div>
								</div>
							</div><!-- end row -->            
						</div><!-- end container -->
					</div>
				</div><!-- end section -->
			</div>
			<div class="carousel-item">
				<div id="home" class="first-section" style="background-image:url('images/slide_images/slider-03.png');">
					<div class="dtab">
						<div class="container">
							<div class="row">
								<div class="col-md-12 col-sm-12 text-center">
									<div class="big-tagline">
										<h2><strong>Habaraduwa </strong> Pradeshiya Sabha</h2>
										<p class="lead">You can do Online Tax Payments in a Easy Way ! </p>
											<a href="contact.php" class="hover-btn-new"><span>Contact Us</span></a>
											&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
											<a href="index.php" class="hover-btn-new"><span>Read More</span></a>
									</div>
								</div>
							</div><!-- end row -->            
						</div><!-- end container -->
					</div>
				</div><!-- end section -->
			</div>
			<div class="carousel-item">
				<div id="home" class="first-section" style="background-image:url('images/slide_images/slider-04.jpg');">
					<div class="dtab">
						<div class="container">
							<div class="row">
								<div class="col-md-12 col-sm-12 text-left">
									<div class="big-tagline">
										<h2 data-animation="animated zoomInRight">Efficient <strong>Service</strong></h2>
										<p class="lead" data-animation="animated fadeInLeft">You can do Online Tax Payments in a Easy Way ! </p>
											<a href="contact.php" class="hover-btn-new"><span>Contact Us</span></a>
											&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
											<a href="index.php" class="hover-btn-new"><span>Read More</span></a>
									</div>
								</div>
							</div><!-- end row -->            
						</div><!-- end container -->
					</div>
				</div><!-- end section -->
			</div>
			<!-- Left Control -->
			<a class="new-effect carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
				<span class="fa fa-angle-left" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>

			<!-- Right Control -->
			<a class="new-effect carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
				<span class="fa fa-angle-right" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
	</div>
	<!-- End Slide Show -->	

	<!-- Start About Us-->
    <div id="overviews" class="section wb">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                    <div class="message-box">
                        <h4>Habaraduwa Pradeshiya Sabha</h4>
                        <h2>Welcome to Habaraduwa Pradeshiya Sabha Official Web Site</h2>
                        <p> Habaraduwa is the 8th largest pradeshiya sabha out of the Divisions in Galle District and located very close to the coastal region. This division is situated about 3 miles inward to the country, adjacent to coastal region. </p>

                        <p> As per Northern and Eastern coordinates, the pradeshiya sabha lies between 5-55 and 6-55 of Northern Latitudes and 80-15 and 80-25 of Eastern Longitudes. </p>

                        <a href="about_us.php" class="hover-btn-new orange"><span>Read More</span></a>
                    </div><!-- end messagebox -->
                </div><!-- end col -->
				
				<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                    <div class="post-media wow fadeIn">
                        <img src="images/b.jpg" alt="" class="img-fluid img-rounded">
                    </div><!-- end media -->
                </div><!-- end col -->
			</div>
			<div class="row align-items-center">
				<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                    <div class="post-media wow fadeIn">
                        <img src="images/bann.jpg" alt="" class="img-fluid img-rounded">
                    </div><!-- end media -->
                </div><!-- end col -->
				
				<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                    <div class="message-box">
                        <h2>We are Here for Your Service</h2>
                        <p> Total extent of Habaraduwa Pradeshiya Sabha is about 4680 hectare and the area of about 727 hectare is covered by inland water bodies. There are four internal reservoirs in this Divisional Secretariat Division. Namely, they are Koggala Oya, Thalduwa River, Pol Oya and Waggalmodara Ela. Koggala Oya is the largest among all these and consisting of 14 islands of different sizes. Allanduwa, Kokduwa, Ganduwa, Kuruluduwa, Thalathuduwa, Kadduwa and Madolduwa are to name a few. The largest is the Allanduwa and a novel was written based on Madolduwa by renowned author, Martin Wickramasinghe. </p>

                        <p> Buddhist monasteries are located in Thalatuduwa and Weduwa islands extending to approximately 20 acres. Human settlements have taken place only in Gamduwa out of these islands.</p>

                        <a href="about_us.php" class="hover-btn-new orange"><span>Read More</span></a>
                    </div><!-- end messagebox -->
                </div><!-- end col -->
				
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end section -->
    <!-- End About Us-->

<!-- Start History-->
    <section class="section lb page-section">
		<div class="container">
			 <div class="section-title row text-center">
                <div class="col-md-8 offset-md-2">
                    <h3>Historical Background</h3>
                    <p class="lead">This a brief Description about Habaraduwa and its Historical Value.</p>
                </div>
            </div><!-- end title -->
			<div class="timeline">
				<div class="timeline__wrap">
					<div class="timeline__items">
						<div class="timeline__item">
							<div class="timeline__content img-bg-01">
								<p> In the past Habaraduwa  was called “Habaraduwa”  It has been changed gradually and the name “ Habaraduwa”  is in use today.
                                    It is mentioned in the Kokila Sandeshaya that in the 15 th century Iron Wood trees (Na trees) were found in this Habaraduwa area. </p>
							</div>
						</div>
						<div class="timeline__item">
							<div class="timeline__content img-bg-02">
								<p> It further described that the leaf buds of these Iron Wood trees became Red in colour for goddess to apply Laksa on their feet.
                                    Archipelago in Koggala Oya, Rumassala Hill, Walle Devalaya, Ranwella Purana Viharaya and Hirigal Devalaya are few places of historically important.
                                </p>
							</div>
						</div>
						<div class="timeline__item">
							<div class="timeline__content img-bg-03">
								<p> Rumassala hill traces its roots to the great Hindu epic Ramayanaya. In the epic, the incredibly powerful medicinal herbs which can relieve diseases are grown in Rumassala reserve. </p>
							</div>
						</div>
						<div class="timeline__item">
							<div class="timeline__content img-bg-04">
								<p> It was believed that there was an incredibly powerful medicinal herb in the Rumassala Hill used to heal Rama who had been wounded by Lakshman. In 545 AC Cosmos Indicaleustcs makes a citation about Galle in his chronicle. </p>
							</div>
						</div>
						<div class="timeline__item">
							<div class="timeline__content img-bg-01">
								<p> Further Hanuman was sent to India to fetch the medicines from the Himalayas in order to heal injured soldiers in the battle of Rama and Ravana. While Hanuman was lifting a part of Himalayas, a chunk of it “fell down”and that is called the “Rumassala” whereas the area is known as Unawatuna.</p>
							</div>
						</div>
						<div class="timeline__item">
							<div class="timeline__content img-bg-02">
								<p> Walle Devalaya is located on the East end of the Rumassala Hill. As a past driven practice ancients made vows to God at Walle Devalaya before going to sea. Two centuries since the ancients claim that the salts brought from Hambanthota to Walle Devalaya through sailing ships were distributed by bullock carts.</p>
							</div>
						</div>
						<div class="timeline__item">
							<div class="timeline__content img-bg-03">
								<p> It was believed that the present Unawatuna hospital had been the official residence for Dutch Governer at that time. Flowers were grown in the residence by the Governer and today it is famous by the name of “Malwatta”. </p>
							</div>
						</div>
						<div class="timeline__item">
							<div class="timeline__content img-bg-04">
								<p> In the past Governers of the Malwatta used to visit the coast through Unawatuna Dutch Lake by the boat.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End History-->

	<!-- Start Choose Plan -->
    <div id="plan" class="section lb">
        <div class="container">
            <div class="section-title text-center">
                <h3>- Tax Information -</h3>
                <p>Here is a brief description about tax details and tax discount and warrant percentages.. </p>
            </div><!-- end title -->

            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="message-box">
                        <ul class="nav nav-pills nav-stacked" id="myTabs">
                            <li><a class="active" href="#tab1" data-toggle="pill">Residential</a></li>
                            <li><a href="#tab2" data-toggle="pill">Business</a></li>
                        </ul>
                    </div>
                </div><!-- end col -->
            </div>

            <hr class="invis">

            <div class="row">
                <div class="col-md-12">
                    <div class="tab-content">
                        <div class="tab-pane active fade show" id="tab1">
                            <div class="row text-center">
                                <div class="col-md-3">
                                </div>

                                <div class="col-md-6">
                                    <div class="pricing-table pricing-table-highlighted">
                                        <div class="pricing-table-header grd1">
                                            <h2>For Residential Premisses</h2>
                                            <h3>Tax Percentages</h3>
                                        </div>
                                        <div class="pricing-table-space"></div>
                                        <div class="pricing-table-features">
                                            <p><i class="fa fa-link"></i> <strong>6%</strong> Percentage of Assessment Tax</p>
                                            <p><i class="fa fa-link"></i> <strong>5%</strong> Discount Percentage</p>
                                            <p><i class="fa fa-link"></i> <strong>15%</strong> Warrant Percentage</p><hr>
                                            <p><i class="fa fa-life-ring"></i> <strong>10%</strong> Special Discount Percentage</p>
                                            <p style="line-height: 0;">(If you are paid total tax amount before 31 st of January)</p><br>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                </div>
                            </div><!-- end row -->
                        </div><!-- end pane -->

                        <div class="tab-pane fade" id="tab2">
                            <div class="row text-center">
                                <div class="col-md-3">
                                </div>

                                <div class="col-md-6">
                                    <div class="pricing-table pricing-table-highlighted">
                                        <div class="pricing-table-header grd1">
                                            <h2>For Business Premisses</h2>
                                            <h3>Tax Percentages</h3>
                                        </div>
                                        <div class="pricing-table-space"></div>
                                        <div class="pricing-table-features">
                                            <p><i class="fa fa-link"></i> <strong>6%</strong> Percentage of Assessment Tax</p>
                                            <p><i class="fa fa-link"></i> <strong>5%</strong> Discount Percentage</p>
                                            <p><i class="fa fa-link"></i> <strong>20%</strong> Warrant Percentage</p><hr>
                                            <p><i class="fa fa-life-ring"></i> <strong>10%</strong> Special Discount Percentage</p>
                                            <p style="line-height: 0;">(If you are paid total tax amount before 31 st of January)</p><br>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                </div>
                            </div><!-- end row -->
                        </div><!-- end pane -->
                    </div><!-- end content -->
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end section -->
    <!-- End Choose Plan -->

    <!-- Start Logos -->
    <div class="section-title text-center">
        <p style="font-size: 30px; margin-top: 50px;">Service Cluster of Pradeshiya Sabha </p>
    </div><!-- end title -->
    <div class="parallax section dbcolor">

        <div class="container">

            <div class="row logos">
                <div class="col-md-2 col-sm-2 col-xs-6 wow fadeInUp">
                    <a href="#"><img src="images/logo_1.png" alt="" class="img-repsonsive"></a>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-6 wow fadeInUp">
                    <a href="#"><img src="images/logo_2.png" alt="" class="img-repsonsive"></a>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-6 wow fadeInUp">
                    <a href="#"><img src="images/logo_3.png" alt="" class="img-repsonsive"></a>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-6 wow fadeInUp">
                    <a href="#"><img src="images/logo_4.png" alt="" class="img-repsonsive"></a>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-6 wow fadeInUp">
                    <a href="#"><img src="images/logo_5.png" alt="" class="img-repsonsive"></a>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-6 wow fadeInUp">
                    <a href="#"><img src="images/logo_6.png" alt="" class="img-repsonsive"></a>
                </div>

            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end section -->
    <!-- End Logos -->

   <!-- Start Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-xs-12">
                    <div class="widget clearfix">
                        <div class="widget-title">
                            <h3>Call Ask Know</h3>
                        </div>
                        <p> For all the Government citizen <br>services information...</p>
						<div class="footer-right">
							<ul class="footer-links-soi">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-github"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="#"><i class="fa fa-pinterest"></i></a></li>
							</ul><!-- end links -->
						</div>						
                    </div><!-- end clearfix -->
                </div><!-- end col -->

				<div class="col-lg-4 col-md-4 col-xs-12">
                    <div class="widget clearfix">
                        <div class="widget-title">
                            <h3>Information Link</h3>
                        </div>
                        <ul class="footer-links">
                            <li><a href="index.php">Home</a></li>
                            <li><a href="about_us.php">About Us</a></li>
                            <li><a href="gallery.php">Gallery</a></li>
							<li><a href="contact.php">Contact Us</a></li>
                        </ul><!-- end links -->
                    </div><!-- end clearfix -->
                </div><!-- end col -->
				
                <div class="col-lg-4 col-md-4 col-xs-12">
                    <div class="widget clearfix">
                        <div class="widget-title">
                            <h3>Contact Details</h3>
                        </div>

                        <?php
                        $get_a = "select * from pradeshiya_sabha";
                        $run_a = mysqli_query($con, $get_a);
                        $row_a = mysqli_fetch_array($run_a);
                        ?>

                        <ul class="footer-links">
                            <li><a href="#"><?php echo $row_a['email'];?></a></li>
                            <li><?php echo $row_a['address'];?></li>
                            <li><?php echo $row_a['telephone1'];?></li>
                            <li><?php echo $row_a['telephone2'];?></li>
                        </ul><!-- end links -->
                    </div><!-- end clearfix -->
                </div><!-- end col -->
				
            </div><!-- end row -->
        </div><!-- end container -->
    </footer><!-- end footer -->
    <!-- End Footer -->

    <div class="copyrights">
        <div class="container">
            <div class="footer-distributed">
                <div class="footer-center">                   
                    <p class="footer-company-name">All Rights Reserved. &copy; <script>document.write(new Date().getFullYear());</script><a href="#"> Habaraduwa Pradeshiya Sabha</a> Design By : <a href="#">Infinity (-)</a></p>
                </div>
            </div>
        </div><!-- end container -->
    </div><!-- end copyrights -->

    <a href="#" id="scroll-to-top" class="dmtop global-radius"><i class="fa fa-angle-up"></i></a>

    <!-- ALL JS FILES -->
    <script src="js/all.js"></script>
    <!-- ALL PLUGINS -->
    <script src="js/custom.js"></script>
	<script src="js/timeline.min.js"></script>
	<script>
		timeline(document.querySelectorAll('.timeline'), {
			forceVerticalMode: 700,
			mode: 'horizontal',
			verticalStartPosition: 'left',
			visibleItems: 4
		});
	</script>
</body>
</html>