<section id="inner-headline">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<ul class="breadcrumb">
					<li><a href="#"><i class="fa fa-home"></i></a><i class="icon-angle-right"></i></li>
					<li><a href="#"><?php echo ucwords(preg_replace("/[\s-]+/", " ",$categoryName)); ?></a><i class="icon-angle-right"></i></li>
					<li class="active"><?php echo ucwords(preg_replace("/[\s-]+/", " ",$productName)); ?></li>
				</ul>
			</div>
		</div>
	</div>
	</section>
	<section id="content">
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<h3><?php echo $getProductDetails->title; ?></h3>
				<img src="<?php echo base_url(); ?>assets/img/products/<?php echo $getProductDetails->image; ?>" alt="" class="" height="300" width="300" />
	
			</div>
			<div class="col-lg-6">
				<!-- Description -->
				<h4>&nbsp;</h4>
				<dl>
					<dt><?php echo $getProductDetails->title; ?></dt>
					<dd>&nbsp;</dd>
					<dt>Product Downloads</dt>
					<?php if($getProductDetails->pdf_file=='') {?>
					<dd>no pdf file</dd>
					<?php }else{ ?>
					<dd><a target="_blank" href="<?php echo base_url(); ?>assets/pdf/<?php echo $getProductDetails->pdf_file; ?>">click here for download PDF Brouchure</a></dd>
					<?php } ?>
					<dd>&nbsp;</dd>
					<dt>&nbsp;</dt>
					<dd>If you have any queries regarding "<?php echo $getProductDetails->title; ?>"
call us at +91 9828 335534</dd>
				</dl>
				<BR><BR>
				<a href="<?php echo site_url(); ?>enquiry" class="btn btn-primary">SEND ENQUIERY</a>

			</div>
		</div>
		<!-- Descriptions -->
		<div class="row">
			<div class="col-lg-6">
				<!-- Description -->
				<h4>Description</h4>
				<p><?php echo $getProductDetails->description; ?></p>
			</div>
			<!-- Horizontal Description -->
			<div class="col-lg-6">
				<h4>Technical Specification</h4>
				<table class="table">
					<thead>
						<tr>
							<th>Model</th>
							<th>Capacity</th>
							<th>Accuracy</th>
							<th>Pan Size</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><?php if($getProductDetails->sp1==""){ echo "-";} else{ echo $getProductDetails->sp1; } ?></td>
							<td><?php if($getProductDetails->sp2==""){ echo "-";} else{ echo $getProductDetails->sp2; } ?></td>
							<td><?php if($getProductDetails->sp3==""){ echo "-";} else{ echo $getProductDetails->sp3; } ?></td>
							<td><?php if($getProductDetails->sp4==""){ echo "-";} else{ echo $getProductDetails->sp4; } ?></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>

	</div>
	</section>