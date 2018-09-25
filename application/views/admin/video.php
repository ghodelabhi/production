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
<?php if($this->session->flashdata('err_message')){?>
  <div class="alert alert-warning">      
    <?php echo $this->session->flashdata('err_message')?>
  </div>
<?php } ?>
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading"><?php echo $title;?> <a href="<?php echo site_url(); ?>admin/video/add-edit-video" class="btn btn-primary flt_right">Add</a></div>
					<div class="panel-body">
						<table data-toggle="table" data-url="tables/data2.json" >
						    <thead>
						    <tr>
						        <th data-field="id" data-align="right">S.No.</th>
						        <th data-field="tile">Title</th>
						        <th data-field="link">Link</th>
						        <th data-field="action">Action</th>
						    </tr>
						    </thead>
						    <tbody>
						    <?php $c=1; foreach ($getVideo as $getVideos) { ?>
						    	<tr>
						        <td><?php echo $c; ?></td>
						        <td><?php echo $getVideos->title; ?></td>
						       	<td><?php echo $getVideos->link; ?></td>
						        <td><a href="<?php echo site_url(); ?>admin/video/add-edit-video/<?php echo $getVideos->id; ?>"><span class="glyphicon glyphicon-edit"></span></a>&nbsp;&nbsp;<a href="javascript:void(0)" onclick="return deleteVideo('<?php echo $getVideos->id ?>');"><span class="glyphicon glyphicon-trash"></span></a></td>
						    	</tr>
						   <?php $c++; } ?>
						    

						    </tbody>
						</table>
					</div>
				</div>
			</div><!-- /.row -->
		
	</div>

<script type="text/javascript">
    var url="<?php echo site_url();?>";
    function deleteVideo(id){ 
       var r=confirm("Do you want to delete this?")
        if (r==true)
          window.location = url+"admin/video/deletevideo/"+id;
        else
          return false;
        } 

     
</script>