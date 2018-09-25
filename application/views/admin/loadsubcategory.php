<div class="form-group">
									
	<label>Sub Category</label>
	<select name="subcategory" class="form-control">
	<option value="">--select sub category--</option>
	<?php foreach ($subCategory as $subCategorys ) { ?>
	<option value="<?php echo $subCategorys->id; ?>"><?php echo $subCategorys->sub_category; ?></option>
	<?php } ?>
	</select>	
</div>