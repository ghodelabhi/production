<section id="inner-headline">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<ul class="breadcrumb">
					<li><a href="#"><i class="fa fa-home"></i></a><i class="icon-angle-right"></i></li>
					<li class="active">Accessories</li>
				</ul>
			</div>
		</div>
	</div>
	</section>
	<section id="content">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				
			<?php foreach ($getTitle as $key => $getTitles) { ?>
			<h3><?php echo $getTitles->title; ?></h3>
			<img src="<?php echo base_url(); ?>assets/img/accessory/<?php echo $getTitles->image; ?>" alt="<?php echo $getTitles->image; ?>" height="300px" width="300px"/>
			<p><?php echo $getTitles->description; ?></p>
			<?php } ?>
		
		
		</div>
		</div>
		
		
	</div>
	</section>