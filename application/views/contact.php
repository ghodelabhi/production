<section id="inner-headline">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<ul class="breadcrumb">
					<li><a href="#"><i class="fa fa-home"></i></a><i class="icon-angle-right"></i></li>
					<li class="active">Contact</li>
				</ul>
			</div>
		</div>
	</div>
	</section>
	<section id="content">
	<?php if($this->session->flashdata('email_sent')){?>
  <div class="alert alert-success">      
    <?php echo $this->session->flashdata('email_sent')?>
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
			    <h2>Contact us <small>get in touch with us by filling form below</small></h2>
			    <hr class="colorgraph">
			    <div id="sendmessage">Your message has been sent. Thank you!</div>
                <div id="errormessage"></div>
                <form action="<?php echo site_url(); ?>send-mail" method="post" role="form" class="contactForm">
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" value="<?php echo set_value('name'); ?>" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                        			<?php
									if(form_error('name')){
										echo form_error('name','<p class="err">', '</p>');
									}
									?>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="email" value="<?php echo set_value('email'); ?>" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                        			<?php
									if(form_error('email')){
										echo form_error('email','<p class="err">', '</p>');
									}
									?>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="subject" value="<?php echo set_value('subject'); ?>" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                        			<?php
									if(form_error('subject')){
										echo form_error('subject','<p class="err">', '</p>');
									}
									?>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"><?php echo set_value('message'); ?></textarea>
                        			<?php
									if(form_error('message')){
										echo form_error('message','<p class="err">', '</p>');
									}
									?>
                    </div>
                    
                    <div class="text-center"><button type="submit" class="btn btn-theme btn-block btn-md">Send Message</button></div>
                </form>
                <hr class="colorgraph">

			</div>
		</div>
	</div>
	<div class="map">
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3557.521683016924!2d75.8124289646807!3d26.918671333125108!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x396db6acee2bd603%3A0xae2a7cbb3a4e0ce3!2sPink+City+Scales!5e0!3m2!1sen!2sin!4v1487679378186" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
	</div>
	</section>