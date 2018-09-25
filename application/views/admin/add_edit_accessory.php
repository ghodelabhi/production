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
				<h1 class="page-header">Accessory Title</h1>
			</div>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading"><?php echo $title;?></div>
					<div class="panel-body">
						<div class="col-md-6">
							<form role="form" method="post" action="<?php echo site_url(); ?>admin/accessory/addeditdata" enctype="multipart/form-data">  
							
								<div class="form-group">
									<label>Accessory Name</label>
									<input class="form-control" type="text" name="title" value="<?php if(isset($get_accessory->title)){ echo $get_accessory->title; } ?>">
									<input class="form-control" type="hidden" name="id" value="<?php if(isset($get_accessory->id)){echo $get_accessory->id;} ?>">
								</div>
								<?php if(isset($get_accessory->id)){ ?>
								<?php if($get_accessory->image==''){ $image='no-image.jpg';}
								else{ $image=$get_accessory->image; } ?>
								<img src="<?php echo base_url(); ?>assets/img/accessory/<?php echo $image ; ?>" alt="" height="200" width="200">
								<div class="form-group">
									<label>Accessory Image</label>
									<input class="form-control" name="image" type="file" value="">
								</div>
								<?php }else{ ?>
								<div class="form-group">
									<label>Accessory Image</label>
									<input class="form-control" name="image" type="file" value="">
								</div>
								<?php } ?>
								<div class="form-group">
									<label>Description</label>
									<textarea class="form-control" name="description" style="width:100%;height:200px;">
										<?php if(isset($get_accessory->id)){ echo $get_accessory->description;} ?>
									</textarea>
								</div>

						<?php if($this->session->flashdata('errors')){?>
						<?php echo $this->session->flashdata('errors')?>
						<?php } ?>

							<?php if(isset($getTitle->id)){ $btn = 'UPDATE'; }else{ $btn='ADD';} ?>									
							<input type="submit" class="btn btn-primary" value="<?php echo $btn; ?>">
							</div>
							
						</form>
					</div>
				</div>
			</div><!-- /.col-->
		</div><!-- /.row -->
		
	</div>

