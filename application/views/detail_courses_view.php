<!-- About Stylesheet -->
<link rel="stylesheet" href="<?php echo site_url('assets/sass/') ?>courses.css">

<header id="fh5co-header" class="fh5co-cover js-fullheight" role="banner" style="background-image: url('http://www.gettingsmart.com/wp-content/uploads/2017/07/College-Students-Using-Laptops-Feature-Image.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="display-t js-fullheight">
                    <div class="display-tc js-fullheight animate-box" data-animate-effect="fadeIn">
                        <h1><?php echo $this->lang->line('detail-courses'); ?></h1>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#register-courses"><?php echo $this->lang->line('register'); ?>!</button>
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
                    <h2><?php echo $detail['courses_title'] ?></h2>
				</div>
				<div class="section-body">
                    <p><?php echo $detail['courses_description'] ?></p>
                    <?php echo $detail['courses_content'] ?>
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
	<button class="btn btn-primary btn-fixed" data-toggle="modal" data-target="#register">
		<i class="fa fa-2x fa-pencil-square-o" aria-hidden="true"></i>
	</button>
</div>


