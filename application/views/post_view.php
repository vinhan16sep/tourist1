<!-- About Stylesheet -->
<link rel="stylesheet" href="<?php echo site_url('assets/sass/') ?>blogs.min.css">

<section class="cover">
    <img src="<?php echo base_url('assets/post_category/'.$category['image']); ?>" alt="cover">
</section>

<section class="content section container-fluid">
    <div class="container">
        <div class="row">
            <div class="section-header col-xs-12">
                <h1><?php echo $category['title']; ?></h1>
                <div class="line">
                    <div class="line-primary"></div>
                </div>
            </div>
            <?php
                if($result){
                    foreach($result as $key => $val){
                ?>
					<div class="item col-md-4 col-sm-6 col-xs-12">
						<div class="inner">
							<div class="head">
								<div class="mask">
									<img src="<?php echo site_url('assets/upload/post/' . $val['image']); ?>" alt="image blog">
								</div>
							</div>
							<div class="body">
								<h4 class="post-subtitle"><?php echo $val['parent_title']; ?></h4>
								<a href="<?php echo base_url('bai-viet/' . $val['slug']) ?>">
									<h2 class="post-title"><?php echo $val['title']; ?></h2>
								</a>
								<p class="post-description"><?php echo $val['description']; ?></p>
							</div>
							<div class="foot">
								<a href="<?php echo base_url('bai-viet/' . $val['slug']) ?>" class="btn btn-primary" role="button">
									<?php echo $this->lang->line('see-detail') ?>
								</a>
							</div>
						</div>
					</div>
                <?php
                    }
                }
                ?>
                <div class="col-md-6 col-md-offset-5 page">
                    <?php echo (isset($page_links))? $page_links : '';?>
                </div>
        </div>
    </div>
</section>