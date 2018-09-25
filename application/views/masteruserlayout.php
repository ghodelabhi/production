<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title><?php echo $title;?></title>
<link rel="icon" href="<?php echo base_url(); ?>assets/img/favicon.png" type="image/x-icon"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="Bootstrap 3 template for corporate business" />
<!-- css -->
<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" />
<link href="<?php echo base_url(); ?>assets/plugins/flexslider/flexslider.css" rel="stylesheet" media="screen" />	
<link href="<?php echo base_url(); ?>assets/css/cubeportfolio.min.css" rel="stylesheet" />
<link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" />

<!-- Theme skin -->
<link id="t-colors" href="<?php echo base_url(); ?>assets/skins/default.css" rel="stylesheet" />

	<!-- boxed bg -->
	<link id="bodybg" href="<?php echo base_url(); ?>assets/bodybg/bg1.css" rel="stylesheet" type="text/css" />
</head>
<body>



<div id="wrapper">
	<!-- start header -->
	<header>
			<div class="top">
				<div class="container">
					<div class="row">
						<div class="col-md-6">
							<ul class="topleft-info">
								<li><i class="fa fa-phone"></i> +91 9828 335534</li>
							</ul>
						</div>
						<div class="col-md-6">
						<div id="sb-search" class="sb-search">
							<form>
								<input class="sb-search-input" placeholder="Enter your search term..." type="text" value="" name="search" id="search">
								<input class="sb-search-submit" type="submit" value="">
								<span class="sb-icon-search" title="Click to start searching"></span>
							</form>
						</div>


						</div>
					</div>
				</div>
			</div>	
			
        <div class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo site_url(); ?>">PINKCITY scales</a>
                </div>
                <div class="navbar-collapse collapse ">
                    <ul class="nav navbar-nav">
                        <li class="active">
						<a href="<?php echo site_url(); ?>">Home</a>
						</li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle " data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false">Products <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu">
                               <?php  foreach ($getCategory as $getCategorys) { ?>
                                <li class="dropdown-submenu">
									<a href="<?php echo site_url(); ?>weighing-scales/<?php echo preg_replace("/[\s_]/", "-",$getCategorys->category); ?>/<?php echo $getCategorys->id; ?>" ><?php echo $getCategorys->category; ?></a>
									
										
										<ul class="dropdown-menu">
										<?php  foreach ($getSubCategory as $getSubCategorys) { 
											if($getSubCategorys->category_id==$getCategorys->id){ ?>
										<li><a href="<?php echo site_url(); ?>weighing-scales/<?php echo preg_replace("/[\s_]/", "-", $getSubCategorys->sub_category); ?>/<?php echo $getSubCategorys->id; ?>"><?php echo $getSubCategorys->sub_category; ?></a></li>
											
										<?php } } ?>

										</ul>
										

								</li>
								<?php } ?>
								<li><a href="<?php echo site_url(); ?>weighing-scales/accessories">Accessories</a></li>
								
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="<?php echo site_url(); ?>services" class="dropdown-toggle " data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false">Services <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu">
								<li><a href="<?php echo site_url(); ?>services">Calibration Certificate</a></li>
								<li><a href="<?php echo site_url(); ?>services">Annual Maintenance Contract</a></li>
								<li><a href="<?php echo site_url(); ?>services">Repair</a></li>
								
                            </ul>
                        </li>
                        
						
                        <li><a href="<?php echo site_url(); ?>enquiry">Enquiry</a></li>
                        <li><a href="<?php echo site_url(); ?>videos">Videos</a></li>
                    	<li><a href="<?php echo site_url(); ?>about-us">About Us</a></li>
                        <li><a href="<?php echo site_url(); ?>contact-us">Contact</a></li>  
				
						
                    </ul>
                </div>
            </div>
        </div>
	</header>
	<!-- end header -->
    
	<!-- content part -->
	<?php $this->load->view($content) ?>
    <!-- //content part -->
	
	<footer>
	<div class="container">
		<div class="row">
			<div class="col-sm-3 col-lg-3">
				<div class="widget">
					<h4>Get in touch with us</h4>
					<address>
					<strong>PINKCITY SCALES</strong><br>
					 T-82 RAISAR PLAZA INDIRA BAZAR<br>
					 JAIPUR-302001 Rajasthan, India</address>
					<p>
						<i class="icon-phone"></i> 0141-2419131 <br>
						<i class="icon-envelope-alt"></i> info@pinkcityscales.com
					</p>
				</div>
			</div>
			<div class="col-sm-3 col-lg-3">
				<div class="widget">
					<h4>Product</h4>
					<ul class="link-list">
						<?php foreach ($getCategoryFooter as $getCategoryFooters) { ?>
							<li><a href="<?php echo site_url(); ?>weighing-scales/<?php echo preg_replace("/[\s_]/", "-",$getCategoryFooters->category); ?>/<?php echo $getCategoryFooters->id; ?>"><?php echo $getCategoryFooters->category; ?></a></li>
						<?php } ?>
						
						
					</ul>
				</div>
				
			</div>
			<div class="col-sm-3 col-lg-3">
				<div class="widget">
					<h4>Pages</h4>
					<ul class="link-list">
						<li><a href="<?php echo site_url(); ?>">Home</a></li>
						<li><a href="<?php echo site_url(); ?>services">Services</a></li>
						<li><a href="<?php echo site_url(); ?>enquiry">Enquiry</a></li>
						<li><a href="<?php echo site_url(); ?>about-us">About Us</a></li>
						<li><a href="<?php echo site_url(); ?>contact-us">Contact us</a></li>
					</ul>
				</div>
			</div>
			<div class="col-sm-3 col-lg-3">
				<div class="widget">
					<h4>Send Enquiery</h4>
					<!--<p>Fill your email and sign up for monthly newsletter to keep updated</p>
                    <div class="form-group multiple-form-group input-group">
                        <input type="email" name="email" class="form-control">-->
                        <span class="input-group-btn">
                        	<a href="<?php echo site_url(); ?>enquiry">
                            <button type="button" class="btn btn-theme btn-add">Send Enquiry</button></a>
                        </span>
                    </div>
				</div>
			</div>
		</div>
	</div>
	<div id="sub-footer">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="copyright">
						<p>&copy; Pinkcity Scales - All Right Reserved</p>
                        <div class="credits">
                            <!-- 
                                All the links in the footer should remain intact. 
                                You can delete the links only if you purchased the pro version.
                                Licensing information: https://bootstrapmade.com/license/
                                Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Sailor
                            -->
                            <a href="#">Design and Develope</a> by <a href="">Abhishek Ghodela</a>
                        </div>
					</div>
				</div>
				<div class="col-lg-6">
				<!--	<ul class="social-network">
						<li><a href="#" data-placement="top" title="Facebook"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#" data-placement="top" title="Twitter"><i class="fa fa-twitter"></i></a></li>
						<li><a href="#" data-placement="top" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
						<li><a href="#" data-placement="top" title="Pinterest"><i class="fa fa-pinterest"></i></a></li>
						<li><a href="#" data-placement="top" title="Google plus"><i class="fa fa-google-plus"></i></a></li>
					</ul>  -->
				</div>
			</div>
		</div>
	</div>
	</footer>
</div>
<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>

<!-- Placed at the end of the document so the pages load faster -->
<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/modernizr.custom.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.easing.1.3.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/flexslider/jquery.flexslider-min.js"></script> 
<script src="<?php echo base_url(); ?>assets/plugins/flexslider/flexslider.config.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.appear.js"></script>
<script src="<?php echo base_url(); ?>assets/js/stellar.js"></script>
<script src="<?php echo base_url(); ?>assets/js/uisearch.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.cubeportfolio.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/google-code-prettify/prettify.js"></script>
<script src="<?php echo base_url(); ?>assets/js/animate.js"></script>
<script src="<?php echo base_url(); ?>assets/js/custom.js"></script>

	
</body>
</html>