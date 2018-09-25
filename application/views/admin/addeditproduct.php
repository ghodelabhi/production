
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
				<h1 class="page-header">Product</h1>
			</div>
		</div><!--/.row-->

				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading"><?php echo $title;?></div>
					<div class="panel-body">
						<?php if($this->session->flashdata('errors')){?>
						<?php echo $this->session->flashdata('errors')?>
						<?php } ?>
						<div class="col-md-6">
							<form role="form" method="post" action="<?php echo site_url(); ?>admin/product/addeditproduct" enctype="multipart/form-data">
								<div class="form-group">
									<input class="form-control" type="hidden" name="id" value="<?php if(isset($getProduct->id)){ echo $getProduct->id; } ?>">
									<label>Category</label>
									<select name="category" class="form-control" onchange="selectSubCategory(this.value)">
										<option value="">--select category--</option>
										<?php foreach ($getCategory as $getCategorys ) { ?>
										<option value="<?php echo $getCategorys->id; ?>" <?php if(isset($getProduct->id)){ if($getCategorys->id==$getProduct->category_id){ echo 'selected';}  } ?> ><?php echo $getCategorys->category; ?></option>
										<?php } ?>
									</select>	
								</div>
								
								<span id="loadSubCategory">
								<?php if(isset($getProduct->id)){ ?>
								<div class="form-group"><label>Category Type</label>
								<select name="subcategory" class="form-control">
								<option value="">--select category--</option>
								<?php foreach ($getSubCategory as $getSubCategorys ) { ?>
								<option value="<?php echo $getSubCategorys->id; ?>" <?php if(isset($getProduct->id)){ if($getSubCategorys->id==$getProduct->sub_category_id){ echo 'selected';}  } ?>><?php echo $getSubCategorys->sub_category; ?></option>
								<?php } ?>
								</select>	
								</div>

								<?php } ?>
								</span>
							
								<div class="form-group">
									<label>Product Title</label>
									<input class="form-control" type="text" name="product" value="<?php if(isset($getProduct->id)){ echo $getProduct->title; } ?>">
								</div>
								<div class="form-group">
									<label>Model</label>
									<input class="form-control" type="text" name="sp1" value="<?php if(isset($getProduct->id)){ echo $getProduct->sp1; } ?>">
								</div>
								<div class="form-group">
									<label>Capacity</label>
									<input class="form-control" type="text" name="sp2" value="<?php if(isset($getProduct->id)){ echo $getProduct->sp2; } ?>">
								</div>
								<div class="form-group">
									<label>Accuracy</label>
									<input class="form-control" type="text" name="sp3" value="<?php if(isset($getProduct->id)){ echo $getProduct->sp3; } ?>">
								</div>
								<div class="form-group">
									<label>Pan Size</label>
									<input class="form-control" type="text" name="sp4" value="<?php if(isset($getProduct->id)){ echo $getProduct->sp4; } ?>">
								</div>

								<div class="form-group">
									<label>Description</label>
									<textarea class="form-control" name="description" id="description" style="width:100%;height:200px;">
									       <?php if(isset($getProduct->id)){ echo $getProduct->description; } ?>
									 </textarea>
								</div>

								<?php if(isset($getProduct->id)){ ?>
								<?php if($getProduct->image==''){ $image='no-image.jpg';}
								else{ $image=$getProduct->image; } ?>
								<img src="<?php echo base_url(); ?>assets/img/products/<?php echo $image ; ?>" alt="" height="200" width="200">
								<div class="form-group">
									<label>Image</label>
									<input class="form-control" name="image" type="file" value="">
								</div>
								<?php }else{ ?>
								<div class="form-group">
									<label>Image</label>
									<input class="form-control" name="image" type="file" value="">
								</div>
								<?php } ?>


								<div class="form-group">
									<label>PDF</label>
									<?php if(isset($getProduct->id)){ ?>
									<p><a target="_blank" href="<?php echo base_url(); ?>assets/pdf/<?php echo $getProduct->pdf_file; ?>"><?php echo $getProduct->pdf_file; ?></a></p>
									<?php } ?>
									<input class="form-control" name="pdf" type="file" value="">
								</div>

						
							<?php if(isset($getProduct->id)){ $btn = 'UPDATE'; }else{ $btn='ADD';} ?>									
							<input type="submit" class="btn btn-primary" value="<?php echo $btn; ?>">
							</div>
							
						</form>
					</div>
				</div>
			</div><!-- /.col-->
		</div><!-- /.row -->
		
	</div>

<script type="text/javascript">
function selectSubCategory(id){ 
	$.ajax({
      url: "<?php echo site_url() ?>"+"admin/loadSubCategory",
      async: false,
      type: "POST",
      data: {id: id},
      success: function(data) {
       $( "#loadSubCategory" ).html( data );
      }
    })
}

function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}
</script>