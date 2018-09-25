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
					<div class="panel-heading"><?php echo $title;?> <a href="<?php echo site_url(); ?>admin/add-edit-subcategory" class="btn btn-primary flt_right">Add</a></div>
					<div class="panel-body">
						<table data-toggle="table" data-url="tables/data2.json" >
						    <thead>
						    <tr>
						        <th data-field="id" data-align="right">S.No.</th>
						        <th data-field="category">Category</th>
						        <th data-field="name">Sub Category</th>
						        <th data-field="status">Status</th>
						        <th data-field="action">Action</th>
						    </tr>
						    </thead>
						    <tbody>
						    <?php $c=1; foreach ($getSubCategory as $getSubCategorys) { ?>
						    	<tr>
						        <td><?php echo $c; ?></td>
						         <td><?php echo $getSubCategorys->category; ?></td>
						        <td><?php echo $getSubCategorys->sub_category; ?></td>
						        <?php if($getSubCategorys->status=='t'){
						        		$action = 'active';
						        		$class='btn-success';
						        		$status = 't';
						         }else{
						         		$class='btn-danger';
						        		$action = 'In-active';
						        		$status = 'f';
						        } ?>
						        <td><a href="javascript:void(0)" onclick="changeStatus('<?php echo $getSubCategorys->id ?>','<?php echo $status ?>')"><span id="msg<?php echo $getSubCategorys->id ?>"><i class="btn <?php echo $class; ?> btn-sm"><?php echo $action; ?></i></span></a></td>
						        <td><a href="<?php echo site_url(); ?>admin/add-edit-subcategory/<?php echo $getSubCategorys->id; ?>"><span class="glyphicon glyphicon-edit"></span></a>&nbsp;&nbsp;<a href="javascript:void(0)" onclick="return deleteSubCategory('<?php echo $getSubCategorys->id ?>');"><span class="glyphicon glyphicon-trash"></span></a></td>
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
    function deleteSubCategory(id){ 
       var r=confirm("Do you want to delete this?")
        if (r==true)
          window.location = url+"admin/deletesubcategory/"+id;
        else
          return false;
        } 

     function changeStatus(id,status){ 
     	$.ajax({
		  url: "subcategory-status",
		  async: false,
		  type: "POST",
		  data: {id:id,status:status},
		  success: function(data) {
		  	if(data=='t'){
		  		$( "#msg"+id ).html( "<i class='btn btn-success btn-sm'>Active</i>" );
		  	}else{
		  		$( "#msg"+id ).html( "<i class='btn btn-danger btn-sm'>In-active</i>" );
		  	}
			location.reload();
		  }
		})
     }
</script>