<!-- About Stylesheet -->
<link rel="stylesheet" href="<?php echo site_url('assets/sass/') ?>blogs.css">

<section class="cover">
	<img src="<?php echo site_url('assets/upload/localtion/' . $detail['slug'] .'/'. $detail['image']); ?>" alt="image blog">
</section>

<div id="detail-post" class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="left col-sm-9 col-xs-12">
                <div>
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
                <div>
                    <div class="schedule col-sm-12 col-xs-12" style="padding: 0px;">
                        <div class="panel-group" id="schedule" role="tablist" aria-multiselectable="true">
                            <form action="" method="post" accept-charset="utf-8">
                                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash() ?>" id="csrf" />
                                <div class="row">
                                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                        <label for="name"><?php echo $this->lang->line('first-and-last-name');?></label><input type="text" name="name" value="" class="form-control" id="name" placeholder="<?php echo $this->lang->line('first-and-last-name');?>">
                                        <span class="name_error" style="color: red"></span>
                                    </div>
                                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                        <label for="email">Email</label><input type="text" name="email" value="" class="form-control" id="email" placeholder="Email">
                                        <span class="email_error" style="color: red"></span>
                                    </div>
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <label for="content"><?php echo $this->lang->line('comments');?></label><textarea name="content" cols="40" rows="10" class="form-control" id="content"></textarea>
                                        <span class="content_error" style="color: red"></span>
                                    </div>
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <input type="hidden" name="product_id" id="product_id" value="<?php echo $detail['id'];?>">
                                        <input type="hidden" name="comment_type" id="comment_type" value="2">
                                        <input type="submit" name="submit" value="<?php echo $this->lang->line('send-comments');?>" class="btn btn-primary hvr-icon-forward submit-comment" style="">
                                    </div>
                                </div>
                            </form>

                            <div id="comment">
                                <?php if (isset($comment)): ?>
                                    <div class="show-comment">
                                        <?php foreach ($comment as $key => $value): ?>
                                            <div class="media cmt">
                                                <div class="media-left">
                                                    <img class="media-object" src="<?php echo site_url('assets/img/comment_ava.png') ?>" alt="Comment Avatar" width="64">
                                                </div>
                                                <div class="media-body">
                                                    <h3 class="media-heading" style="color: #f4aa1c"><?php echo $value['name'] ?>:</h3>
                                                    <span><?php echo $value['content'] ?></span>
                                                    <span style="float: right; font-size: 1em"><?php echo date_format(date_create($value['created_at']), 'd-m-Y') ?></span>
                                                </div>
                                            </div>
                                        <?php endforeach ?>
                                    </div>
                                <?php else: ?>
                                    <div class="media cmt">
                                        <p class="cmt_error"><?php echo $this->lang->line('there-are-no-comments-for-this-tour-yet'); ?></p>
                                    </div>
                                <?php endif ?>
                                <div id="comment_readmore" style="display: none;">
                                    <input type="hidden" name="count-comment" id="count-comment" value="<?php echo $count_comment ?>">
                                    <button class="btn btn-primary btn-sm center-block" type="submit"><?php echo $this->lang->line('see-more-comments');?></button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="right col-sm-3 col-xs-12">
                <div class="section-header">
                    <div class="row">
                        <div class="left col-xs-12">
                            <h1><?php echo $this->lang->line('relative-location'); ?></h1>
                        </div>
                    </div>
                </div>
                <?php foreach ($localtion_array as $key => $value): ?>
                    <div class="row">
                        <div class="item col-xs-12">
                            <div class="wrapper">
                                <div class="mask">
                                    <a href="<?php echo base_url('diem-den/'.$value['slug']) ?>">
                                        <img src="<?php echo base_url('assets/upload/localtion/'.$value['slug'].'/'.$value['image']) ?>" alt="" style="width: 100%;">
                                    </a>
                                </div>
                                <div class="head">
                                    <h4 class="post-subtitle"><?php echo $value['area'];?></h4>
                                    <h2 class="post-title" title="<?php echo $value['title'];?>"><?php echo $value['title'];?></h2>
                                </div>
                                <div class="body">
                                    <p class="post-description"><?php echo $value['description'];?></p>
                                </div>
                                <div class="foot">
                                    <a href="<?php echo base_url('diem-den/' . $value['slug']) ?>" class="btn btn-primary" role="button">
                                        <?php echo $this->lang->line('see-detail'); ?>
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
<script src="<?php echo base_url('assets/js/detail_product.js') ?>"></script>