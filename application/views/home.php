<section id="featured" class="bg">
	<!-- start slider -->

			
	<!-- start slider -->
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
	<!-- Slider -->
        <div id="main-slider" class="main-slider flexslider">
            <ul class="slides">
              <li>
                <img src="<?php echo base_url(); ?>assets/img/slides/flexslider/1.jpg" alt="" />
                <div class="flex-caption">
                    <h3>Calibration Certificate</h3> 
					
					
                </div>
              </li>
              <li>
                <img src="<?php echo base_url(); ?>assets/img/slides/flexslider/2.jpg" alt="" />
                <div class="flex-caption">
                    <h3>Annual Maintenance Contract</h3> 
					
					
                </div>
              </li>
              <li>
                <img src="<?php echo base_url(); ?>assets/img/slides/flexslider/3.jpg" alt="" />
                <div class="flex-caption">
                    <h3>All Type of Electronic Balances</h3> 
					
					
                </div>
              </li>
            </ul>
        </div>
	<!-- end slider -->
			</div>
		</div>
	</div>	


	</section>
	<!--<section class="callaction">
	<div class="container">
		<div class="row">
							<div class="col-lg-8">
								<div class="cta-text">
									<h2>Awesome site template <span>corporate</span> business</h2>
									<p> Etiam adipiscing, justo quis feugiat.Suspendisse eu erat quam. Vivamus porttitor eros quis nisi lacinia sed interdum</p>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="cta-btn">
									<a href="#" class="btn btn-theme btn-lg">Grab it now <i class="fa fa-angle-right"></i></a>
								</div>
							</div>	
		</div>
	</div>
	</section>-->
	
	<section id="content">
		<!-- clients -->
		<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="text-center">
					<h2>Our <span class="highlight">Brand</span></h2>					
					
				</div>
			</div>		
		</div>
		</div>
		<div class="container">
				<div class="row">
							<?php foreach ($getBrand as $getBrands) { ?>
								<div class="col-xs-6 col-md-2 aligncenter client">
									<img src="<?php echo base_url(); ?>assets/img/brand/<?php echo $getBrands->image; ?>" alt="<?php echo $getBrands->image; ?>" class="img-responsive">
									<h3><?php echo $getBrands->brand_name; ?></h3>
								</div>	
							<?php } ?>
						
				</div>
		</div>
		
		<!-- divider -->
		<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="solidline">
				</div>
			</div>
		</div>
		</div>
		<!-- end divider -->
		
		<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="row">
					<div class="col-sm-12 col-lg-12">
						<h4>About our company</h4>
						<p><?php echo substr($get_about->description,0,1000); ?></p>
					</div>
					
				</div>
			</div>
		</div>
		</div>
		
		<!-- divider -->
		<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="blankline">
				</div>
			</div>
		</div>
		</div>
		<!-- end divider -->
		
	<!-- parallax  -->
	<div id="parallax1" class="parallax text-light text-center marginbot50" data-stellar-background-ratio="0.5">	
           <div class="container">
				<div class="row appear stats">
					<div class="col-xs-6 col-sm-3 col-md-3">
						<div class="align-center color-white txt-shadow">
							<div class="icon">
								<!--<i class="fa fa-clock-o fa-5x"></i>-->
							</div>
						<strong  class="number">Customer</strong><br />
						<span class="text">Service</span>
						</div>
					</div>
					<div class="col-xs-6 col-sm-3 col-md-3">
						<div class="align-center color-white txt-shadow">
							<div class="icon">
								<!--<i class="fa fa-clock-o fa-5x"></i>-->
							</div>
						<strong  class="number">Product</strong><br />
						<span class="text">Service</span>
						</div>
					</div>
					<div class="col-xs-6 col-sm-3 col-md-3">
						<div class="align-center color-white txt-shadow">
							<div class="icon">
								<!--<i class="fa fa-clock-o fa-5x"></i>-->
							</div>
						<strong  class="number">Best</strong><br />
						<span class="text">Price</span>
						</div>
					</div>
					<div class="col-xs-6 col-sm-3 col-md-3">
						<div class="align-center color-white txt-shadow">
							<div class="icon">
								<!--<i class="fa fa-clock-o fa-5x"></i>-->
							</div>
						<strong  class="number">Easily</strong><br />
						<span class="text">Contact</span>
						</div>
					</div>
				</div>
            </div>
	</div>	 
	
    
		
		
		<!-- divider -->
		<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="solidline">
				</div>
			</div>
		</div>
		</div>
		<!-- end divider -->
	
		<!-- Portfolio Projects -->
		<div class="container marginbot50">
		<div class="row">
			<div class="col-lg-12">
				<h4 class="heading">Our Products</h4>

				<div id="grid-container" class="cbp-l-grid-projects">
					<ul>
						<?php foreach ($getProduct as $getProducts) { ?>
							<li class="cbp-item graphic" style="width: 249px; height: 400px; transform: translate3d(584px, 0px, 0px);">
							<div class="cbp-caption">
								<div class="cbp-caption-defaultWrap">
									<img src="<?php echo base_url(); ?>assets/img/products/<?php echo $getProducts->image; ?>" alt="<?php echo $getProducts->image; ?>" height="100%" width="100%" />
								</div>
								<div class="cbp-caption-activeWrap">
									<div class="cbp-l-caption-alignCenter">
										<div class="cbp-l-caption-body">
											<a href="<?php echo site_url(); ?>weighing-scales/<?php echo preg_replace("/[\s-]+/", "-",$getProducts->category); ?>/<?php echo preg_replace("/[\s_]/", "-",$getProducts->title); ?>/<?php echo $getProducts->id; ?>" class="cbp-l-caption-buttonRight" >VIEW</a>
										</div>
									</div>
								</div>
							</div>
							<div class="cbp-l-grid-projects-title"><?php echo $getProducts->title; ?></div>
							
						</li>
						<?php } ?>
						
						
					</ul>
				</div>
				
				<!--<div class="cbp-l-loadMore-button">
					<a href="ajax/loadMore.html" class="cbp-l-loadMore-button-link">LOAD MORE</a>
				</div>-->

			</div>
		</div>
		</div>
		
		
		<!-- divider -->
		<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="solidline">
				</div>
			</div>
		</div>
		</div>
		<!-- end divider -->
		
		<!-- clients -->
		<!--<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="text-center">
					<h2>Our <span class="highlight">Brand</span></h2>					
					
				</div>
			</div>		
		</div>
		</div>
		<div class="container">
				<div class="row">
								<div class="col-xs-6 col-md-2 aligncenter client">
									<h3>Shimadzu</h3>
								</div>											
													
								<div class="col-xs-6 col-md-2 aligncenter client">
									<h3>Mettler</h3>
								</div>											
													
								<div class="col-xs-6 col-md-2 aligncenter client">
									<h3>Essae</h3>
								</div>											
													
								<div class="col-xs-6 col-md-2 aligncenter client">
									<h3>Tanita</h3>
								</div>									
								
								<div class="col-xs-6 col-md-2 aligncenter client">
									<h3>Jet</h3>
								</div>									
								

				</div>
		</div>-->
	
	</section>