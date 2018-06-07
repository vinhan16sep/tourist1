<style type="text/css">
    .image-file{
        display: none;
    }

    [class*='close-'] {
      color: #777;
      font: 14px/100% arial, sans-serif;
      position: absolute;
      right: 5px;
      text-decoration: none;
      text-shadow: 0 1px 0 #fff;
      top: 5px;
    }

    .close-classic:after {
        content: '✖'; /* ANSI X letter */
         color: red;
    }
    .close-classic:hover{
        color: #ffffff;
    }
    /* Dialog */

    .dialog {
        border: 1px solid #ccc;
        border-radius: 5px;
        float: left;
        margin: 20px;
        position: relative;
        width: 150px;
    }
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Giới thiệu
            <small>Chi tiết</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="#"><i class="fa fa-dashboard"></i> Giới thiệu</a></li>
            <li class="active">Chi tiết</li>
        </ol>
    </section>
    
    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Chi tiết giới thiệu</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label>Hình ảnh</label><br>
                                <?php foreach (json_decode($detail['image']) as $key => $value): ?>
                                    <div class="dialog remove_<?php echo $key ?>"">
                                        <img src="<?php echo base_url('assets/upload/about/'.$value) ?>" width=150 style="cursor: pointer;" class="btn-active-img" data-id="<?php echo $detail['id'] ?>" data-image="<?php echo $value ?>" data-key="<?php echo $key ?>" >
                                        <a href="#" class="close-classic" data-id="<?php echo $detail['id'] ?>" data-image="<?php echo $value ?>" data-key="<?php echo $key ?>" ></a>
                                        <?php if ($value == $detail['avatar']): ?>
                                            <i class="fa fa-thumb-tack" aria-hidden="true" style="color: red"></i>
                                        <?php endif ?>
                                    </div>
                                <?php endforeach; ?>
                            </div>

                            <?php
                            echo form_open_multipart('', array('class' => 'form-horizontal'));
                            ?>
                            <div class="form-group col-xs-12">
                                <label for="slug_shared">Slug</label>
                                <input type="text" name="slug_shared" value="<?php echo $detail['slug'] ?>" class="form-control" id="slug_shared" readonly="">
                            </div>
                            <?php $count_image = count(json_decode($detail['image'])) ?>
                            <input type="hidden" name="count_image" value="<?php echo $count_image   ?>">
                            <div class="detail-info col-xs-12">
                                <?php
                                echo form_label('Thêm ảnh vào thư viện (ảnh không quá 1200 KB)', 'image_shared');
                                echo form_error('image_shared');
                                echo form_upload('image_shared[]','','multiple class="form-control" id="image"');
                                ?>
                                <span style="color: red"><?php echo $this->session->flashdata('message_error_image'); ?></span>
                                <br>
                                <br>
                            </div>

                            <div class="col-md-12">

                                <!-- Nav tabs -->
                                <ul class="nav nav-pills nav-justified" role="tablist">
                                    <li role="presentation" class="active">
                                        <a href="#vi" aria-controls="vi" role="tab" data-toggle="tab">
                                            <span class="badge">1</span> Tiếng Việt
                                        </a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#en" aria-controls="en" role="tab" data-toggle="tab">
                                            <span class="badge">2</span> English
                                        </a>
                                    </li>
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active" id="vi">
                                        <div class="form-group col-xs-12">
                                            <?php
                                            echo form_label('Tiêu đề', 'title_vi');
                                            echo form_error('title_vi');
                                            echo form_input('title_vi', $detail['title_vi'], 'class="form-control" id="title_vi"');
                                            ?>
                                        </div>
                                        <div class="form-group col-xs-12">
                                            <?php
                                            echo form_label('Nội dung', 'content_vi');
                                            echo form_error('content_vi');
                                            echo form_textarea('content_vi', $detail['content_vi'], 'class="tinymce-area form-control" id="content_vi"')
                                            ?>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="en">
                                        <div class="form-group col-xs-12">
                                            <?php
                                            echo form_label('Title', 'title_en');
                                            echo form_error('title_en');
                                            echo form_input('title_en', $detail['title_en'], 'class="form-control" id="title_en"');
                                            ?>
                                        </div>
                                        <div class="form-group col-xs-12">
                                            <?php
                                            echo form_label('Content', 'content_en');
                                            echo form_error('content_en');
                                            echo form_textarea('content_en', $detail['content_en'], 'class="tinymce-area form-control" id="content_en" ')
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="detail-info">
                                <div class="row">
                                    <div class="col-md-2 col-md-offset-9 btn-submit">
                                        <button type="submit" class="btn btn-primary">
                                            OK
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <?php echo form_close(); ?>
                        </div>

                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <!-- END ACCORDION & CAROUSEL-->
    </section>
</div>
