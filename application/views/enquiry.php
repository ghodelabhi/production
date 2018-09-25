<section id="inner-headline">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<ul class="breadcrumb">
					<li><a href="#"><i class="fa fa-home"></i></a><i class="icon-angle-right"></i></li>
					<li class="active">Enquiry</li>
				</ul>
			</div>
		</div>
	</div>
	</section>
	<section id="content">
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

	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
			    <h2>Enquiry Form <small>-  Send an enquiry and one of our representative will get back to you shortly...  -</small></h2>
			    <hr class="colorgraph">
			    <div id="sendmessage">Your message has been sent. Thank you!</div>
                <div id="errormessage"></div>
                <form action="<?php echo site_url(); ?>send-enquiry" method="post" role="form" class="contactForm">
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" id="name" value="<?php echo set_value('name'); ?>" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                        <div class="validation"></div>
                        			<?php
									if(form_error('name')){
										echo form_error('name','<p class="err">', '</p>');
									}
									?>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="email" id="email" value="<?php echo set_value('email'); ?>" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                        <div class="validation"></div>
                        			<?php
									if(form_error('email')){
										echo form_error('email','<p class="err">', '</p>');
									}
									?>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="phone" id="phone" onkeypress="return isNumber(event)" value="<?php echo set_value('phone'); ?>" placeholder="Your Phone" data-rule="minlen:4" data-msg="Please enter at least 10" />
                        <div class="validation"></div>
                        			<?php
									if(form_error('phone')){
										echo form_error('phone','<p class="err">', '</p>');
									}
									?>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="location" id="location" value="<?php echo set_value('location'); ?>" placeholder="Location" data-rule="minlen:4" data-msg="Please enter your location" />
                        <div class="validation"></div>
                        			<?php
									if(form_error('location')){
										echo form_error('location','<p class="err">', '</p>');
									}
									?>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"><?php echo set_value('message'); ?></textarea>
                        <div class="validation"></div>
                        			<?php
									if(form_error('message')){
										echo form_error('message','<p class="err">', '</p>');
									}
									?>
                    </div>
                    <div class="image"><?php echo $image['image'];  ?></div>
                    <a href='javascript:void(0)' class ='refresh' onclick="referh()"><img id='ref_symbol' src ="<?php echo base_url(); ?>assets/img/refresh.png" height="20px" width="20px"></a>
                    <div class="form-group">
                        <input type="text" name="captcha" placeholder=" Enter Captcha" id="captcha"/>
                        			<?php
									if(form_error('captcha')){
										echo form_error('captcha','<p class="err">', '</p>');
									}
									?>
                       
                    </div>
                    <div class="text-center"><button type="submit" class="btn btn-theme btn-block btn-md">Send Enquiry</button></div>
                </form>
                <hr class="colorgraph">

			</div>
		</div>
	</div>
	</section>
	<script type="text/javascript">
	// Ajax post for refresh captcha image.
            
                function referh(){
                    jQuery.ajax({
                        type: "POST",
                        url: "<?php echo base_url(); ?>" + "EnquiryController/captcha_refresh",
                        success: function(res) {
                            if (res)
                            {
                                  jQuery("div.image").html(res);
                            }
                        }
                    });
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