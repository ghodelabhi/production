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
				<h1 class="page-header">Sub Category</h1>
			</div>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading"><?php echo $title;?></div>
					<div class="panel-body">
						<div class="col-md-6">
							<form role="form" method="post" action="<?php echo site_url(); ?>admin/addeditsubcategory">
						<?php if($this->session->flashdata('errors')){?>
						<?php echo $this->session->flashdata('errors')?>
						<?php } ?>
								<div class="form-group">
									<label>Category</label>
									<select name="category" class="form-control">
										<option value="">--select category--</option>
										<?php foreach ($getCategory as $getCategorys ) { ?>
										<option value="<?php echo $getCategorys->id; ?>" <?php if(isset($getSubCategory->category_id)){ if($getCategorys->id==$getSubCategory->category_id){ echo 'selected';}  } ?> ><?php echo $getCategorys->category; ?></option>
										<?php } ?>
									</select>
									
								</div>
								<div class="form-group">
									<label>Sub Category</label>
									<input class="form-control" type="text" name="subcategory" value="<?php if(isset($getSubCategory->sub_category)){ echo $getSubCategory->sub_category; } ?>">
									<input class="form-control" type="hidden" name="id" value="<?php if(isset($getSubCategory->id)){echo $getSubCategory->id;} ?>">
								</div>
						

							<?php if(isset($getCategory->id)){ $btn = 'UPDATE'; }else{ $btn='ADD';} ?>									
							<input type="submit" class="btn btn-primary" value="<?php echo $btn; ?>">
							</div>
							
						</form>
					</div>
				</div>
			</div><!-- /.col-->
		</div><!-- /.row -->
		
	</div>

