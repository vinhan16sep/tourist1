<!-- About Stylesheet -->
<link rel="stylesheet" href="<?php echo site_url('assets/sass/') ?>blogs.css">

<section class="cover">
	<div class="overlay"></div>
    <?php if (count($result) >0 ): ?>
        <img src="<?php echo base_url('/assets/upload/localtion/' . $result[count($result)-1]['slug'] . '/' . $result[count($result)-1]['image']) ?>" alt="cover">
    <?php else: ?>
        <img src="<?php echo base_url('/assets/image/horizontal.jpg') ?>" alt="cover">
    <?php endif ?>
	
</section>
<section class="content section container-fluid">
    <div class="container">
        <div class="row">
            <div class="left col-md-12 col-sm-12 col-xs-12">
                <div class="section-header">
                    <h1><?php echo $this->lang->line('location');?></h1>
                    <div class="line">
                        <div class="line-primary"></div>
                    </div>
                </div>

                <div class="row">
                    <?php
                    if($result){
                        foreach($result as $key => $val){
                    ?>
                        <div class="item col-xs-12 col-sm-6 col-md-4">
                            <div class="wrapper">
                                <div class="mask">
                                    <a href="<?php echo base_url('diem-den/' . $val['slug']) ?>">
                                        <img src="<?php echo site_url('assets/upload/localtion/' . $val['slug'] . '/' . $val['image']); ?>" alt="image">
                                    </a>
                                </div>
                                <div class="head">
                                    <h4 class="post-subtitle"><?php echo $val['area']; ?></h4>
                                    <h2 class="post-title"><?php echo $val['title']; ?></h2>
                                </div>
                                <div class="body">
                                    <p class="post-description"><?php echo $val['content']; ?></p>
                                </div>
                                <div class="foot">
                                    <a href="<?php echo base_url('diem-den/' . $val['slug']) ?>" class="btn btn-primary" role="button">
                                        <?php echo $this->lang->line('see-detail'); ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>
            <div class="col-sm-6 col-sm-offset-3 col-xs-12 page">
                <?php echo $page_links; ?>
            </div>
           <!--  <div class="right col-md-3 col-sm-4 col-xs-12">
                <div class="section-header">
                    <h1><?php echo $this->lang->line('blogs') ?></h1>
                    <div class="line">
                        <div class="line-primary"></div>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</section>