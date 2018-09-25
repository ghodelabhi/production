<section id="inner-headline">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<ul class="breadcrumb">
					<li><a href="<?php echo base_url(); ?>"><i class="fa fa-home"></i></a><i class="icon-angle-right"></i></li>
					<li class="active">Product<i class="icon-angle-right"></i></li>
					<li class="active"><?php echo ucwords(preg_replace("/[\s-]+/", " ",$categoryName)); ?></li>
				</ul>
			</div>
		</div>
	</div>
	</section>
	<section id="content">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h4 class="heading">Our Products</h4>

				<!--<div id="filters-container" class="cbp-l-filters-button">
					<div data-filter="*" class="cbp-filter-item-active cbp-filter-item">All<div class="cbp-filter-counter"></div></div>
					<div data-filter=".identity" class="cbp-filter-item">Identity<div class="cbp-filter-counter"></div></div>
					<div data-filter=".web-design" class="cbp-filter-item">Web Design<div class="cbp-filter-counter"></div></div>
					<div data-filter=".graphic" class="cbp-filter-item">Graphic<div class="cbp-filter-counter"></div></div>
					<div data-filter=".logo" class="cbp-filter-item">Logo<div class="cbp-filter-counter"></div></div>
				</div>-->
				

				<div id="grid-container" class="cbp-l-grid-projects">
					<ul>
						<?php foreach ($getAllProduct as $getAllProducts) {  ?>
							<li class="cbp-item graphic" style="width: 249px; height: 400px; transform: translate3d(584px, 0px, 0px);">
							<div class="cbp-caption">
								<div class="cbp-caption-defaultWrap">
									<img src="<?php echo base_url(); ?>assets/img/products/<?php echo $getAllProducts->image; ?>" alt="<?php echo $getAllProducts->image; ?>" height="100%" width="100%" />
								</div>
								<div class="cbp-caption-activeWrap">
									<div class="cbp-l-caption-alignCenter">
										<div class="cbp-l-caption-body">
											<a href="<?php echo site_url(); ?>weighing-scales/<?php echo preg_replace("/[\s-]+/", "-",$categoryName); ?>/<?php echo preg_replace("/[\s_]/", "-",$getAllProducts->title); ?>/<?php echo $getAllProducts->id; ?>" class="cbp-l-caption-buttonRight" >VIEW</a>
						
										</div>
									</div>
								</div>
							</div>
							<a href="<?php echo site_url(); ?>weighing-scales/<?php echo preg_replace("/[\s-]+/", "-",$categoryName); ?>/<?php echo preg_replace("/[\s_]/", "-",$getAllProducts->title); ?>/<?php echo $getAllProducts->id; ?>">
							<div class="cbp-l-grid-projects-title"><?php echo $getAllProducts->title; ?></div>
							</a>
						</li>
					<?php	} ?>
						
						
					</ul>
				</div>
				
				<!--<div class="cbp-l-loadMore-button">
					<a href="ajax/loadMore.html" class="cbp-l-loadMore-button-link">LOAD MORE</a>
				</div>-->

			</div>
		</div>
	</div>
	</section>