<!-- About Stylesheet -->
<link rel="stylesheet" href="<?php echo site_url('assets/sass/') ?>blogs.css">

<section class="cover">
	<img src="<?php echo site_url('assets/upload/post/' . $detail['image']); ?>" alt="image blog">
</section>

<div class="detail">
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
