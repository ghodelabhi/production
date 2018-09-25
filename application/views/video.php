<section id="inner-headline">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<ul class="breadcrumb">
					<li><a href="#"><i class="fa fa-home"></i></a><i class="icon-angle-right"></i></li>
					<li class="active">Videos</li>
				</ul>
			</div>
		</div>
	</div>
	</section>
	<section id="content">
	<div class="container">
		<div class="row">
			<?php foreach ($getVideo as $getVideos) { ?>
				<div class="col-lg-4">
				<h4><?php echo $getVideos->title; ?></h4>
				<iframe width="100%" height="215" src="<?php echo $getVideos->link; ?>" frameborder="0" allowfullscreen></iframe>
				
			</div>
				
		<?php } ?>
		</div>
		
		
		
	</div>
	</section>