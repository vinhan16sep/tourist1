<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Cập nhật
            <small>
                Danh Mục
            </small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-default">
                    <div class="box-body">
                        <?php
                        echo form_open_multipart('', array('class' => 'form-horizontal'));
                        ?>
                        <div class="col-xs-12">
                            <h4 class="box-title">Basic Information</h4>
                        </div>
                        <div class="row">
                            <span><?php echo $this->session->flashdata('message'); ?></span>
                        </div>
                        <div class="row">
                            <label class="col-xs-12" for="image_shared">Hình ảnh đang dùng</label>
                            <br>
                            <?php foreach (json_decode($detail['image']) as $key => $value): ?>
                                <div class="<?php echo (count(json_decode($detail['image']))>2)?'col-md-3 ':'';?>col-xs-6 row_<?php echo $key; ?>" style="margin-bottom: 10px;">
                                    <div  style="background-color: #363636;position: relative;">
                                        <img src="<?php echo base_url('assets/upload/'. $controller .'/'.$detail['slug'].'/'. $value); ?> " width=100% style="padding: 13px;height: <?php echo (count(json_decode($detail['image']))>2)?'200':'300';?>px;">
                                        <span class="glyphicon glyphicon-remove" style="position: absolute;right:0%;color: white; cursor: pointer;" onclick="remove_image('product_category','<?php echo $detail['id'] ?>','<?php echo $value; ?>','<?php echo $key;?>')"></span>
                                    </div>
                                </div>
                            <?php endforeach ?>
                            <br>
                        </div>
                        <div class="form-group col-xs-12">
                            <?php
                            echo form_label('Ảnh đại diện', 'image_shared');
                            echo form_error('image_shared');
                            echo form_upload('image_shared[]', set_value('image_shared'), 'class="form-control" multiple');
                            ?>
                            <br>
                        </div>
                        <div class="form-group col-xs-12">
                            <?php
                            echo form_label('Slug', 'slug_shared');
                            echo form_error('slug_shared');
                            echo form_input('slug_shared', $detail['slug'], 'class="form-control" id="slug_shared" readonly');
                            ?>
                        </div>

                        <div class="form-group col-xs-12">
                            <?php
                            echo form_label('Danh Mục', 'parent_id_shared');
                            echo form_error('parent_id_shared');
                            ?>
                            <select name="parent_id_shared" class="form-control" <?php echo $detail['check_parent_id'];?>>
                                <?php if ($detail['parent_id'] == 0): ?>
                                    <option value="0">Danh mục gốc</option>
                                <?php endif ?>
                                <?php echo $product_category; ?>
                            </select>
                        </div>

                        <div>
                            <ul class="nav nav-pills nav-justified" role="tablist">
                                <?php $i = 0; ?>
                                <?php foreach ($page_languages as $key => $value): ?>
                                    <li role="presentation" class="<?php echo ($i == 0)? 'active' : '' ?>">
                                        <a href="#<?php echo $key ?>" aria-controls="<?php echo $key ?>" role="tab" data-toggle="tab">
                                            <span class="badge"><?php echo $i + 1 ?></span> <?php echo $value ?>
                                        </a>
                                    </li>
                                <?php $i++; ?>
                                <?php endforeach ?>
                                
                            </ul>
                            <hr>
                            <div class="tab-content">
                                <?php $i = 0; ?>
                                <?php foreach ($template as $key => $value): ?>
                                    <div role="tabpanel" class="tab-pane <?php echo ($i == 0)? 'active' : '' ?>" id="<?php echo $key ?>">
                                        <?php foreach ($value as $k => $val): ?>
                                            <div class="form-group col-xs-12">
                                                <?php
                                                    if($k == 'title' && in_array($k, $request_language_template)){
                                                        echo form_label($val, $k .'_'. $key);
                                                        echo form_error($k .'_'. $key);
                                                        echo form_input($k .'_'. $key, trim($detail['title_'. $key]), 'class="form-control" id="title_'.$key.'" '.$detail['check_parent_id']);
                                                    }elseif($k == 'description' && in_array($k, $request_language_template)){
                                                        echo form_label($val, $k .'_'. $key);
                                                        echo form_error($k .'_'. $key);
                                                        echo form_textarea($k .'_'. $key,  trim($detail['description_'. $key]), 'class="form-control" rows="5"');
                                                    }elseif($k == 'content' && in_array($k, $request_language_template)){
                                                        echo form_label($val, $k .'_'. $key);
                                                        echo form_error($k .'_'. $key);
                                                        echo form_textarea($k .'_'. $key,  trim($detail['content_'. $key]), 'class="tinymce-area form-control" rows="5"');
                                                    }elseif($k == 'metakeywords' && in_array($k,$request_language_template)){
                                                        echo form_label($val, $k .'_'. $key);
                                                        echo form_error($k .'_'. $key);
                                                        echo form_input($k .'_'. $key, $detail['metakeywords_'. $key], 'class="form-control"');
                                                    }elseif($k == 'metadescription' && in_array($k, $request_language_template)){
                                                        echo form_label($val, $k .'_'. $key);
                                                        echo form_error($k .'_'. $key);
                                                        echo form_input($k .'_'. $key, $detail['metadescription_'. $key], 'class="form-control"');
                                                    }
                                                ?>
                                            </div>
                                        <?php endforeach ?>
                                    </div>
                                <?php $i++; ?>
                                <?php endforeach ?>
                            </div>
                        </div>
                        <?php echo form_submit('submit_shared', 'OK', 'class="btn btn-primary"'); ?>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script type="text/javascript">
    $("[name=submit_shared]").click(function() {
        $('input,select').removeAttr('disabled');
    });
</script>
<script type="text/javascript" src="<?php echo base_url('assets/js/admin/script.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/admin/common.js') ?>"></script>

