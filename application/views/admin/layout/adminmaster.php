<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo $title;?></title>

<link href="<?php echo base_url(); ?>assets/admin/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/admin/css/datepicker3.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/admin/css/styles.css" rel="stylesheet">

<!--Icons-->
<script src="<?php echo base_url(); ?>assets/admin/js/lumino.glyphs.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/js/html5shiv.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/js/respond.min.js"></script>
<!--[if lt IE 9]>

<![endif]-->

<script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script>
<script type="text/javascript">
        bkLib.onDomLoaded(function() { nicEditors.allTextAreas() }); // convert all text areas to rich text editor on that page

        bkLib.onDomLoaded(function() {
             new nicEditor().panelInstance('area1');
        }); // convert text area with id area1 to rich text editor.

        bkLib.onDomLoaded(function() {
             new nicEditor({fullPanel : true}).panelInstance('area2');
        }); // convert text area with id area2 to rich text editor with full panel.
</script>


</head>

<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#"><span>Pinkcity</span>Admin</a>
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Pinkcity <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<!--<li><a href="#"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Profile</a></li>
							<li><a href="#"><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"></use></svg> Settings</a></li>-->
							<li><a href="<?php echo site_url(); ?>admin/logout"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</a></li>
						</ul>
					</li>
				</ul>
			</div>
							
		</div><!-- /.container-fluid -->
	</nav>
		
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form>
		<ul class="nav menu">
			<li <?php if($this->uri->segment(2)=='dashboard') {?> class="active" <?php } ?>><a href="<?php echo site_url(); ?>admin/dashboard"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Dashboard</a></li>
			<li <?php if($this->uri->segment(2)=='category') {?> class="active" <?php } ?>><a href="<?php echo site_url(); ?>admin/category"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"></use></svg> Category</a></li>
			<li <?php if($this->uri->segment(2)=='sub-category') {?> class="active" <?php } ?>><a href="<?php echo site_url(); ?>admin/sub-category"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg>Sub Category</a></li>
			<li <?php if($this->uri->segment(2)=='enquiry') {?> class="active" <?php } ?>><a href="<?php echo site_url(); ?>admin/enquiry"><svg class="glyph stroked table"><use xlink:href="#stroked-table"></use></svg> Enquiry Users</a></li>
			<li <?php if($this->uri->segment(2)=='video') {?> class="active" <?php } ?>><a href="<?php echo site_url(); ?>admin/video"><svg class="glyph stroked pencil"><use xlink:href="#stroked-pencil"></use></svg> Video</a></li>
			<li <?php if($this->uri->segment(2)=='product') {?> class="active" <?php } ?>><a href="<?php echo site_url(); ?>admin/product"><svg class="glyph stroked table"><use xlink:href="#stroked-table"></use></svg> Product</a></li>
			
			<!--<li><a href="panels.html"><svg class="glyph stroked app-window"><use xlink:href="#stroked-app-window"></use></svg> Alerts &amp; Panels</a></li>
			<li><a href="icons.html"><svg class="glyph stroked star"><use xlink:href="#stroked-star"></use></svg> Icons</a></li> -->
			<!--<li class="parent ">
				<a href="#">
					<span data-toggle="collapse" href="#sub-item-1"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg></span> Accessories 
				</a>
				<ul class="children collapse" id="sub-item-1">
					<li>
						<a class="" href="<?php echo site_url(); ?>admin/accessory/accessory_image">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Add Image
						</a>
					</li>
					<li>
						<a class="" href="<?php echo site_url(); ?>admin/accessory/accessory_title">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Title
						</a>
					</li>
					
				</ul>
			</li>-->
			<li class="parent ">
				<a href="#">
					<span data-toggle="collapse" href="#sub-item-1"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg></span> Services 
				</a>
				<ul class="children collapse" id="sub-item-1">
					<li>
						<a class="" href="<?php echo site_url(); ?>admin/services/cc">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg>CC
						</a>
					</li>
					<li>
						<a class="" href="<?php echo site_url(); ?>admin/services/amc">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> AMC
						</a>
					</li>
					<li>
						<a class="" href="<?php echo site_url(); ?>admin/services/repair">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Repair
						</a>
					</li>
					
				</ul>
			</li>
			<li <?php if($this->uri->segment(2)=='accessory') {?> class="active" <?php } ?>><a href="<?php echo site_url(); ?>admin/accessory"><svg class="glyph stroked table"><use xlink:href="#stroked-table"></use></svg> Accessories</a></li>
			
			<li <?php if($this->uri->segment(2)=='about') {?> class="active" <?php } ?>><a href="<?php echo site_url(); ?>admin/about"><svg class="glyph stroked table"><use xlink:href="#stroked-table"></use></svg> About</a></li>
			<li <?php if($this->uri->segment(2)=='brand') {?> class="active" <?php } ?>><a href="<?php echo site_url(); ?>admin/brand"><svg class="glyph stroked table"><use xlink:href="#stroked-table"></use></svg> Brand</a></li>
			<li <?php if($this->uri->segment(2)=='banner') {?> class="active" <?php } ?>><a href="<?php echo site_url(); ?>admin/banner"><svg class="glyph stroked table"><use xlink:href="#stroked-table"></use></svg> Banner</a></li>
			
			<!--<li role="presentation" class="divider"></li>
			<li><a href="login.html"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Login Page</a></li>-->
		</ul>

	</div><!--/.sidebar-->
		
	<!-- content part -->
	<?php $this->load->view($content) ?>
    <!-- //content part` --><!--/.main-->
    	

	<script src="<?php echo base_url(); ?>assets/admin/js/jquery-1.11.1.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/admin/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/admin/js/chart.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/admin/js/chart-data.js"></script>
	<script src="<?php echo base_url(); ?>assets/admin/js/easypiechart.js"></script>
	<script src="<?php echo base_url(); ?>assets/admin/js/easypiechart-data.js"></script>
	<script src="<?php echo base_url(); ?>assets/admin/js/bootstrap-datepicker.js"></script>
	<script src="<?php echo base_url(); ?>assets/admin/js/bootstrap-table.js"></script>
	<script>
		$('#calendar').datepicker({
		});

		!function ($) {
		    $(document).on("click","ul.nav li.parent > a > span.icon", function(){          
		        $(this).find('em:first').toggleClass("glyphicon-minus");      
		    }); 
		    $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	</script>	
</body>

</html>
