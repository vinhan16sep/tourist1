<!-- About Stylesheet -->
<link rel="stylesheet" href="<?php echo site_url('assets/sass/') ?>contact.css">

<section class="cover">
	<img src="https://images.unsplash.com/photo-1529933072015-5a5248282ad0?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=883900194a4936e1179604d72bf128ff&auto=format&fit=crop&w=1951&q=80" alt="cover">
</section>

<div id="contact" class="content section container-fluid">
    <div class="container">
		<div class="section-header">
			<h1><?php echo $this->lang->line('contact') ?></h1>
			<div class="line">
				<div class="line-primary"></div>
			</div>
		</div>
        <div class="row">
			<div class="col-md-6 col-sm-6 ">
				<div class="map">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d496.1999166287312!2d105.78880213555111!3d21.034565785845203!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab49908d7957%3A0xe40660bf5855e892!2sKaraoke+Kevin+31!5e0!3m2!1svi!2s!4v1527562356627" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
				</div>
			</div>
            <div class="col-md-6  col-sm-6 ">

                <?php
                echo form_open_multipart('', array('class' => 'form-horizontal'));
                ?>

                <div class="form-group col-xs-12">
                    <?php
                    echo form_label($this->lang->line('contact-name') .' (*)', 'contact_name');
                    echo form_error('contact_name');
                    echo form_input('contact_name', set_value('contact_name'), 'class="form-control" id="contact_name"');
                    ?>
                </div>
                <div class="form-group col-xs-12">
                    <?php
                    echo form_label($this->lang->line('contact-mail') .' (*)', 'contact_mail');
                    echo form_error('contact_mail');
                    echo form_input('contact_mail', set_value('contact_mail'), 'class="form-control" id="contact_mail"');
                    ?>
                </div>
                <div class="form-group col-xs-12">
                    <?php
                    echo form_label($this->lang->line('contact-phone') .' (*)', 'contact_phone');
                    echo form_error('contact_phone');
                    echo form_input('contact_phone', set_value('contact_phone'), 'class="form-control" id="contact_phone"');
                    ?>
                </div>
                <div class="form-group col-xs-12">
                    <?php
                    echo form_label($this->lang->line('contact-message'), 'contact_message');
                    echo form_error('contact_message');
                    echo form_textarea('contact_message', set_value('contact_message'), 'class="form-control" id="contact_message"');
                    ?>
                </div>
                <div class="form-group col-xs-12">
                    <?php echo form_submit('submit', $this->lang->line('contact-send'), 'class="btn btn-primary"'); ?>
                </div>

                <?php echo form_close(); ?>

            </div>
        </div>

    </div>
</div>