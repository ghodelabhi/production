<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active"><?php echo $title;?></li>
			</ol>
		</div><!--/.row-->

		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading"><?php echo $title;?> <a href="<?php echo site_url(); ?>admin/add-edit-category" class="btn btn-primary flt_right">Add</a></div>
					<div class="panel-body">
						<table data-toggle="table" data-url="tables/data2.json" >
						    <thead>
						    <tr>
						        <th data-field="id" data-align="right">S.No.</th>
						        <th data-field="name">User</th>
						        <th data-field="email">Email</th>
						        <th data-field="phone">Phone</th>
						        <th data-field="date">Date</th>
						        <th data-field="action">Action</th>
						    </tr>
						    </thead>
						    <tbody>
						    <?php $c=1; foreach ($enquiry as $enquirys) { ?>
						    	<tr>
						        <td><?php echo $c; ?></td>
						        <td><?php echo $enquirys->user_name; ?></td>
								<td><?php echo $enquirys->email; ?></td>
								<td><?php echo $enquirys->phone; ?></td>
								<td><?php echo $enquirys->created_at; ?></td>
								<td><a href="javascript:void(0)" onclick="showEnquiery('<?php echo $enquirys->id; ?>')" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-eye-open"></span></a></td>
						    	</tr>
						   <?php $c++; } ?>
						    

						    </tbody>
						</table>
					</div>
				</div>
			</div><!-- /.row -->
		
	</div>
<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    <span id="loadContent">

    </span>
      
      
    </div>
  </div>
<!-- //Model -->
<script type="text/javascript">
function showEnquiery(id){  //alert(id);
     	$.ajax({
		  url: "show-enquiry",
		  async: false,
		  type: "POST",
		  data: {id:id},
		  success: function(data) {
		  	$( "#loadContent" ).html(data);
		  }
		})
     }
</script>
