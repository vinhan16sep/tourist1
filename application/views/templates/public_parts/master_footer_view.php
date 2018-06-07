<footer id="fh5co-footer" role="contentinfo" class="fh5co-section">
	<div class="container">
		<div class="row row-pb-md">
			<div class="col-md-4 fh5co-widget">
				<h4>myIELTS</h4>
				<!--<p>Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit. Eos cumque dicta adipisci architecto culpa amet.</p>-->
			</div>
			<div class="col-md-2 col-md-push-1 fh5co-widget">
				<h4>Menu</h4>
				<ul class="fh5co-footer-links">
					<li class="active">
						<a href="<?php echo base_url('') ?>"><?php echo $this->lang->line('homepage'); ?></a>
					</li>
					<li>
						<a href="<?php echo base_url('about') ?>"><?php echo $this->lang->line('about'); ?></a>
					</li>
					<li>
						<a href="<?php echo base_url('courses') ?>"><?php echo $this->lang->line('courses'); ?></a>
					</li>
					<li>
						<a href="<?php echo base_url('document') ?>"><?php echo $this->lang->line('document'); ?></a>
					</li>
					<li>
						<a href="<?php echo base_url('blogs') ?>"><?php echo $this->lang->line('blogs'); ?></a>
					</li>
					<li>
						<a href="<?php echo base_url('contact') ?>"><?php echo $this->lang->line('contact'); ?></a>
					</li>
				</ul>
			</div>

			<div class="col-md-2 col-md-push-1 fh5co-widget">
				<h4>Quick Links</h4>
				<ul class="fh5co-footer-links">
					<li><a href="<?php echo base_url('landing') ?>">Landing Page</a></li>
					<!--
					<li><a href="javascript:void(0);" data-toggle="modal" data-target="#register">Register and Get free books</a></li>
					-->
				</ul>
			</div>

			<div class="col-md-4 col-md-push-1 fh5co-widget">
				<h4>Contact Information</h4>
				<ul class="fh5co-footer-links">
					<li>6th floor, 66A Trần Thái Tông, <br> Dịch Vọng Hậu, Cầu Giấy, Hà Nội</li>
					<li><a href="tel://0915355490">+ 0915.355.490</a></li>
					<li><a href="mailto:myielts.edu.vn@gmail.com">myielts.edu.vn@gmail.com</a></li>
				</ul>
			</div>

		</div>

		<div class="row copyright">
			<div class="col-md-12 text-center">
				<p>
					<small class="block">&copy; 2018 myIELTS. All Rights Reserved.</small>
					<!--
						<small class="block">Designed by <a href="http://freehtml5.co/" target="_blank">FreeHTML5.co</a> Demo Images: <a href="http://unsplash.co/" target="_blank">Unsplash</a></small>
					-->
				</p>
				<p>
				<ul class="fh5co-social-icons">
					<li><a href="https://www.facebook.com/myielts.edu.vn/" target="_blank"><i class="icon-facebook2"></i></a></li>
					<!--
					<li><a href="#"><i class="icon-instagram"></i></a></li>
					<li><a href="#"><i class="icon-linkedin2"></i></a></li>
					-->
				</ul>
				</p>
			</div>
		</div>

	</div>
</footer>
</div>

<div class="gototop js-top">
	<a href="#" class="js-gotop"><i class="icon-arrow-up22"></i></a>
</div>

<!-- Modal -->
<div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="registerCourseLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="registerCourseLabel">Register</h4>
            </div>
            <div class="modal-body">
                <div class="modal-cover">
                    <img src="http://www.gettingsmart.com/wp-content/uploads/2017/07/College-Students-Using-Laptops-Feature-Image.jpg" alt="register cover">
                </div>
                <div class="modal-text">
                    <?php
                    echo form_open_multipart('', array('class' => 'form-horizontal', 'id' => 'register-form'));
                    ?>
                    <div class="col-xs-12">
                        <label>Book Registered</label>
                    </div>
                    <div class="form-group col-xs-12">
                        <?php
                        echo form_label($this->lang->line('register-name') .' (*)', 'register_name');
                        echo form_error('register_name');
                        echo form_input('register_name', set_value('register_name'), 'class="form-control" id="register_name"');
                        ?>
                    </div>

                    <div class="form-group col-xs-12">
                        <?php
                        echo form_label($this->lang->line('register-phone') .' (*)', 'register_phone');
                        echo form_error('register_phone');
                        echo form_input('register_phone', set_value('register_phone'), 'class="form-control" id="register_phone"');
                        ?>
                    </div>
                    <div class="form-group col-xs-12 col-sm-4">
                        <label><?php echo $this->lang->line('register-age'); ?></label>
                        <input type="number" class="form-control" id="register_age" name="register_age" min="0">
                    </div>
                    <div class="form-group col-xs-12 col-sm-8">
                        <?php
                        echo form_label($this->lang->line('register-office'), 'register_workplace');
                        echo form_error('register_workplace');
                        echo form_input('register_workplace', set_value('register_workplace'), 'class="form-control" id="register_workplace"');
                        ?>
                    </div>
                    <div class="form-group col-xs-12">
                        <?php
                        echo form_label($this->lang->line('register-email') .' (*)', 'register_mail');
                        echo form_error('register_mail');
                        echo form_input('register_mail', set_value('register_mail'), 'class="form-control" id="register_mail"');
                        ?>
                    </div>
                    <div class="form-group col-xs-12">
                        <?php
                        echo form_label('Password (*)', 'register_password');
                        echo form_error('register_password');
                        echo form_password('register_password', set_value('register_password'), 'class="form-control" id="register_password"');
                        ?>
                    </div>
                    <div class="form-group col-xs-12">
                        <?php
                        echo form_label('Confirm Password (*)', 'register_confirm_password');
                        echo form_error('register_confirm_password');
                        echo form_password('register_confirm_password', set_value('register_confirm_password'), 'class="form-control" id="register_confirm_password"');
                        ?>
                    </div>
                    <div class="col-xs-12">
                        <?php echo form_submit(array('type' => 'submit', 'name' => 'submit'), 'Register to get Download Link', 'class="btn btn-primary btn-register"'); ?>
						<br>
                    </div>

                    <?php echo form_close(); ?>
                </div>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="register-courses" tabindex="-1" role="dialog" aria-labelledby="registerCourseLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="registerCourseLabel">Register</h4>
            </div>
            <div class="modal-body">
                <div class="modal-cover">
                    <img src="http://www.gettingsmart.com/wp-content/uploads/2017/07/College-Students-Using-Laptops-Feature-Image.jpg" alt="register cover">
                </div>
                <div class="modal-text">
                    <?php
                    echo form_open_multipart('', array('class' => 'form-horizontal', 'id' => 'register-courses-form'));
                    ?>
                    <div class="col-xs-12">
                        <label>Courses Registered</label>
                    </div>
                    <div class="form-group col-xs-12">
                        <?php
                        echo form_label($this->lang->line('register-name') .' (*)', 'register_courses_name');
                        echo form_error('register_courses_name');
                        echo form_input('register_courses_name', set_value('register_courses_name'), 'class="form-control" id="register-courses-name"');
                        ?>
                    </div>
                    <div class="form-group col-xs-12">
                        <?php
                        echo form_label($this->lang->line('register-email') .' (*)', 'register_courses_mail');
                        echo form_error('register_courses_mail');
                        echo form_input('register_courses_mail', set_value('register_courses_mail'), 'class="form-control" id="register-courses-mail"');
                        ?>
                    </div>
                    <div class="form-group col-xs-12">
                        <?php
                        echo form_label($this->lang->line('register-phone') .' (*)', 'register_courses_phone');
                        echo form_error('register_courses_phone');
                        echo form_input('register_courses_phone', set_value('register_courses_phone'), 'class="form-control" id="register-courses-phone"');
                        ?>
                    </div>
                    <div class="form-group col-xs-12 col-sm-4">
                        <label><?php echo $this->lang->line('register-age'); ?></label>
                        <input type="number" class="form-control" id="register-courses-age" name="register_courses_age" min="0">
                    </div>
                    <div class="form-group col-xs-12 col-sm-8">
                        <?php
                        echo form_label($this->lang->line('register-office'), 'register_courses_workplace');
                        echo form_error('register_courses_workplace');
                        echo form_input('register_courses_workplace', set_value('register_courses_workplace'), 'class="form-control" id="register-courses-workplace"');
                        ?>
                    </div>
                    <input type="hidden" name="courses_id" value="" id="courses-id">
                    <div class="col-xs-12">
                        <?php echo form_submit(array('type' => 'submit', 'name' => 'submit'), 'Courses Registered', 'class="btn btn-primary btn-register"'); ?>
                        <br>
                    </div>

                    <?php echo form_close(); ?>
                </div>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>
<div id="encypted_ppbtn" style="display: none;">
    <div class="modal fade" role="dialog" style="display: block; opacity: .5; background-color: rgba(0,0,0,.65);">
        <div class="modal-dialog" style="color:#fff; text-align:center; padding-top:300px;">
            <i class="fa fa-2x fa-spinner fa-spin" aria-hidden="true"></i>
        </div>
    </div>
</div>


<script src="<?php echo site_url('assets/js/') ?>client.js"></script>

</body>
</html>
