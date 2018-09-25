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
				<h1 class="page-header">Video</h1>
			</div>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading"><?php echo $title;?></div>
					<div class="panel-body">
						<div class="col-md-6">
							<form role="form" method="post" action="<?php echo site_url(); ?>admin/video/addeditvideo">
						<?php if($this->session->flashdata('errors')){?>
						<?php echo $this->session->flashdata('errors')?>
						<?php } ?>
								<div class="form-group">
									<label>Title</label>
									<input class="form-control" type="text" name="title" value="<?php if(isset($getVideo->title)){ echo $getVideo->title; } ?>">
									<input class="form-control" type="hidden" name="id" value="<?php if(isset($getVideo->id)){echo $getVideo->id;} ?>">
								</div>

								<div class="form-group">
									<label>Link</label>
									<input class="form-control" type="text" name="link" value="<?php if(isset($getVideo->link)){ echo $getVideo->link; } ?>">
								</div>

						

							<?php if(isset($getVideo->id)){ $btn = 'UPDATE'; }else{ $btn='ADD';} ?>									
							<input type="submit" class="btn btn-primary" value="<?php echo $btn; ?>">
							</div>
							
						</form>
					</div>
				</div>
			</div><!-- /.col-->
		</div><!-- /.row -->
		
	</div>

