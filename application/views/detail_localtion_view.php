<!-- About Stylesheet -->
<link rel="stylesheet" href="<?php echo site_url('assets/sass/') ?>blogs.css">

<section class="cover">
	<img src="<?php echo site_url('assets/upload/localtion/' . $detail['slug'] .'/'. $detail['image']); ?>" alt="image blog">
</section>

<div id="detail-post" class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="left col-sm-9 col-xs-12">
                <div class="big-title">
                    <h4 class="subtitle">
                        <?php echo $detail['area'] ?>
                    </h4>
                    <h1 class="title">
                        <?php echo $detail['title'] ?>
                    </h1>
                </div>

                <article>
                    <img src="<?php echo base_url('assets/upload/localtion/'.$detail['slug'].'/'.$detail['image']) ?>" alt="" style="width: 100%;">

                    <p><?php echo $detail['content'] ?></p>
                </article>

                <div class="foot">
                    <ul class="list-inline">
                        <div class="fb-share-button" data-href="" data-layout="button_count" data-size="large" data-mobile-iframe="true"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fvajra.matocreative.vn%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Chia sẻ</a></div>
                    </ul>
                </div>
            </div>
            <div class="right col-sm-3 col-xs-12">
                <div class="section-header">
                    <div class="row">
                        <div class="left col-xs-12">
                            <h1>Thư viện liên quan</h1>
                        </div>
                    </div>
                </div>
                <?php foreach ($localtion_array as $key => $value): ?>
                    <div class="row">
                        <div class="item col-xs-12">
                            <div class="wrapper">
                                <div class="mask">
                                    <a href="<?php echo base_url('thu-vien/'.$value['slug']) ?>">
                                        <img src="<?php echo base_url('assets/upload/localtion/'.$value['slug'].'/'.$value['image']) ?>" alt="" style="width: 100%;">
                                    </a>
                                </div>
                                <div class="head">
                                    <h4 class="post-subtitle"><?php echo $value['area'];?></h4>
                                    <h2 class="post-title"><?php echo $value['title'];?></h2>
                                </div>
                                <div class="body">
                                    <p class="post-description"><?php echo $value['content'];?></p>
                                </div>
                                <div class="foot">
                                    <a href="<?php echo base_url('thu-vien/' . $value['slug']) ?>" class="btn btn-primary" role="button">
                                        Xem chi tiết
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>

    </div>
</div>
<!-- <div class="detail">
    <div class="container">
        <div class="row">
            <div class="left col-md-8 col-md-offset-2 col-sm-12">
                <div class="section-heading">
                    <h2><?php echo $detail['title'] ?></h2>
                </div>
                <div class="section-body">
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
</div> -->
