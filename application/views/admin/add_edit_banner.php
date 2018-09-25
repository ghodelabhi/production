<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active"><?php echo $title;?></li>
			</ol>
		</div><!--/.row-->
		<?php if($this->session->flashdata('message')){?>
  <div class="alert alert-success">      
    <?php echo $this->session->flashdata('message')?>
  </div>
<?php } ?>
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Banner</h1>
			</div>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading"><?php echo $title;?></div>
					<div class="panel-body">
						<div class="col-md-6">
							<form role="form" method="post" action="<?php echo site_url(); ?>admin/banner/addeditdata" enctype="multipart/form-data">
							
								<div class="form-group">
									<label>Banner Title</label>
									<input class="form-control" type="text" name="banner_title" value="<?php if(isset($get_banner->banner_title)){ echo $get_banner->banner_title; } ?>">
									<input class="form-control" type="hidden" name="id" value="<?php if(isset($get_banner->id)){echo $get_banner->id;} ?>">
								</div>
								<?php if(isset($get_banner->id)){ ?>
								<?php if($get_banner->image==''){ $image='no-image.jpg';}
								else{ $image=$get_banner->image; } ?>
								<img src="<?php echo base_url(); ?>assets/img/slides/flexslider/<?php echo $image ; ?>" alt="" height="200" width="200">
								<div class="form-group">
									<label>Image</label>
									<input class="form-control" name="image" type="file" value="">
								</div>
								<?php }else{ ?>
								<div class="form-group">
									<label>Banner Image</label>
									<input class="form-control" name="image" type="file" value="">
								</div>
								<?php } ?>

						<?php if($this->session->flashdata('errors')){?>
						<?php echo $this->session->flashdata('errors')?>
						<?php } ?>

							<?php if(isset($getCategory->id)){ $btn = 'UPDATE'; }else{ $btn='ADD';} ?>									
							<input type="submit" class="btn btn-primary" value="<?php echo $btn; ?>">
							</div>
							
						</form>
					</div>
				</div>
			</div><!-- /.col-->
		</div><!-- /.row -->
		
	</div>

