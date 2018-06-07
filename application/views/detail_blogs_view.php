<!-- About Stylesheet -->
<link rel="stylesheet" href="<?php echo site_url('assets/sass/') ?>courses.css">

<header id="fh5co-header" class="fh5co-cover js-fullheight" role="banner" style="background-image: url('https://images.unsplash.com/photo-1450107579224-2d9b2bf1adc8?ixlib=rb-0.3.5&s=0b0fc084bc0625659cbdd0f04b191f62&auto=format&fit=crop&w=1350&q=80');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="display-t js-fullheight">
                    <div class="display-tc js-fullheight animate-box" data-animate-effect="fadeIn">
                        <h1><?php echo $this->lang->line('detail-blog'); ?></h1>

                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<div id="fh5co-detail" class="fh5co-section">
    <div class="container">
        <div class="row">
            <div class="left col-md-8 col-md-offset-2 col-sm-12">
                <div class="section-heading">
                    <h2><?php echo $detail['blog_title'] ?></h2>
                </div>
                <div class="section-body">
                    <p><?php echo $detail['blog_description'] ?></p>
                    <?php echo $detail['blog_content'] ?>
                </div>
                <div class="section-footer">
                    <p>Shared:</p>
                    <ul class="list-inline">
                        <li><a href=""><i class="fa fa-facebook-f"></i> Facebook </a></li>
                    </ul>
                </div>
            </div>



        </div>
    </div>
</div>

<div class="btn-register">
    <button class="btn btn-primary btn-fixed" data-toggle="modal" data-target="#register-course">
        <i class="fa fa-2x fa-pencil-square-o" aria-hidden="true"></i>
    </button>
</div>

<div class="modal fade" id="register-course" tabindex="-1" role="dialog" aria-labelledby="registerCourseLabel">
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
                    echo form_open_multipart('', array('class' => 'form-horizontal'));
                    ?>
                    <div class="col-xs-12">
                        <label>Book Registered</label>
                        <h3>Book 101</h3>
                    </div>
                    <div class="form-group col-xs-12">
                        <?php
                        echo form_label('Full Name (*)', 'register_name');
                        echo form_error('register_name');
                        echo form_input('register_name', set_value('register_name'), 'class="form-control" id="register_name"');
                        ?>
                    </div>
                    <div class="form-group col-xs-12">
                        <?php
                        echo form_label('Email (*)', 'register_mail');
                        echo form_error('register_mail');
                        echo form_input('register_mail', set_value('register_mail'), 'class="form-control" id="register_mail"');
                        ?>
                    </div>
                    <div class="form-group col-xs-12">
                        <?php
                        echo form_label('Your phone number (*)', 'register_phone');
                        echo form_error('register_phone');
                        echo form_input('register_phone', set_value('register_phone'), 'class="form-control" id="register_phone"');
                        ?>
                    </div>
                    <div class="form-group col-xs-12 col-sm-4">
                        <label>Your age</label>
                        <input type="number" class="form-control" id="register_age" name="register_age" min="0">
                    </div>
                    <div class="form-group col-xs-12 col-sm-8">
                        <?php
                        echo form_label('Workplace/ School', 'register_workplace');
                        echo form_error('register_workplace');
                        echo form_input('register_workplace', set_value('register_workplace'), 'class="form-control" id="register_workplace"');
                        ?>
                    </div>
                    <div class="col-xs-12">
                        <?php echo form_submit('submit', 'Register to get Download Link', 'class="btn btn-primary"'); ?>
                        <br>
                        <small>We will send a link within an email to download your requested book</small>
                    </div>

                    <?php echo form_close(); ?>
                </div>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>
