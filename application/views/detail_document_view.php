<!-- About Stylesheet -->
<link rel="stylesheet" href="<?php echo site_url('assets/sass/') ?>courses.css">

<header id="fh5co-header" class="fh5co-cover js-fullheight" role="banner" style="background-image: url('https://images.unsplash.com/photo-1450107579224-2d9b2bf1adc8?ixlib=rb-0.3.5&s=0b0fc084bc0625659cbdd0f04b191f62&auto=format&fit=crop&w=1350&q=80');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="display-t js-fullheight">
                    <div class="display-tc js-fullheight animate-box" data-animate-effect="fadeIn">
                        <h1><?php echo $this->lang->line('detail-document'); ?></h1>
                        <?php if ($detail['type'] == 0): ?>
                            <a href="<?php echo $detail['url'] ?>" class="btn btn-primary" download="<?php echo $detail['url'] ?>" target="_blank">
                                Download now!
                            </a>
                        <?php else: ?>
                            <?php if (get_cookie('remember_email')): ?>
                                <a href="<?php echo $detail['url'] ?>" class="btn btn-primary" download="<?php echo $detail['url'] ?>" target="_blank">
                                    Download now!
                                </a>
                                <?php else: ?>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#register"><?php echo $this->lang->line('register') ?>!</button>
                                <?php endif ?>
                        <?php endif ?>
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
                    <h2><?php echo $detail['document_title'] ?></h2>
                </div>
                <div class="section-body">
                    <p><?php echo $detail['document_description'] ?></p>
                    <?php echo $detail['document_content'] ?>
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


