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
                    <h2><?php echo $detail['title'] ?></h2>
                </div>
                <div class="section-body">
                    <p><?php echo $detail['description'] ?></p>
                    <?php echo $detail['content'] ?>
                </div>
                <div class="section-footer">
                    <ul class="list-inline">
                        <div class="fb-share-button" data-href="" data-layout="button_count" data-size="large" data-mobile-iframe="true"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fdiamondtour.matocreative.vn%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Chia sẻ</a></div>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
