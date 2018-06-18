<link rel="stylesheet" href="<?php echo site_url('assets/sass/admin/') ?>detail.css">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Cập nhật
            <small>
                Tour
            </small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <?php
                echo form_open_multipart('', array('class' => 'form-horizontal','id' => 'register-form'));
                ?>
                <ul class="nav nav-tabs" role="tablist"></ul>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active" id="home">
                        <div class="box box-default">
                            <div class="box-body">
                                <div class="col-xs-12">
                                    <h4 class="box-title">Basic Information</h4>
                                </div>
                                <div class="row">
                                    <span><?php echo $this->session->flashdata('message'); ?></span>
                                </div>
                                <div class="col-xs-12">
                                    <?php if (!empty(json_decode($detail['image']))): ?>
                                        <label for="image_shared">Hình ảnh đang dùng</label>
                                        <br>
                                        <?php foreach (json_decode($detail['image']) as $key => $value): ?>
                                            <div class="item col-md-3 row_<?php echo $key ?>">
                                                <div class="mask-sm">
                                                    <i class="glyphicon glyphicon-remove" onclick="remove_image('product',  <?php echo $detail['id'] ?>, '<?php echo $value ?>', <?php echo $key ?>)" ></i>
                                                    <img src="<?php echo base_url('assets/upload/'. $controller .'/'. $detail['slug'] .'/'. $value); ?>">
                                                </div>
                                            </div>
                                        <?php endforeach ?>
                                    <?php endif ?>
                                    <br>
                                </div>
                                <div class="col-xs-12">
                                    <?php
                                    echo form_label('Ảnh đại diện', 'image_shared');
                                    echo form_error('image_shared');
                                    echo form_upload('image_shared[]', set_value('image_shared'), 'class="form-control" id="image_shared" multiple');
                                    ?>
                                    <br>
                                </div>
                                <div class="col-xs-12">
                                    <?php
                                    echo form_label('Slug', 'slug_shared');
                                    echo form_error('slug_shared');
                                    echo form_input('slug_shared', $detail['slug'], 'class="form-control" id="slug_shared" readonly');
                                    ?>
                                </div>


                                <div class="col-xs-12">
                                    <select name="parent_id_shared" id="parent_id_shared" class="form-control">
                                        <?php echo $product_category; ?>
                                    </select>
                                </div>

                                <div>
                                    <div class="col-xs-12"">
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
                                    </div>
                                    <hr>
                                    <div class="tab-content">
                                        <?php $i = 0; ?>
                                        <?php foreach ($template as $key => $value): ?>
                                            <div role="tabpanel" class="tab-pane <?php echo ($i == 0)? 'active' : '' ?>" id="<?php echo $key ?>">
                                                <?php foreach ($value as $k => $val): ?>
                                                    <div class="col-xs-12">
                                                        <?php
                                                        if($k == 'title' && in_array($k, $request_language_template)){
                                                            echo form_label($val, $k .'_'. $key);
                                                            echo form_error($k .'_'. $key);
                                                            echo form_input($k .'_'. $key, trim($detail['title_'. $key]), 'class="form-control" id="title_'.$key.'"');
                                                        }elseif($k == 'description' && in_array($k, $request_language_template)){
                                                            echo form_label($val, $k .'_'. $key);
                                                            echo form_error($k .'_'. $key);
                                                            echo form_textarea($k .'_'. $key,  trim($detail['description_'. $key]), 'class="form-control" rows="5" id="description_'.$key.'" ');
                                                        }elseif($k == 'content' && in_array($k, $request_language_template)){
                                                            echo form_label($val, $k .'_'. $key);
                                                            echo form_error($k .'_'. $key);
                                                            echo form_textarea($k .'_'. $key,  trim($detail['content_'. $key]), 'class="tinymce-area form-control" rows="5" id="content_'.$key.'" ');
                                                        }elseif($k == 'metakeywords' && in_array($k, $request_language_template)){
                                                        echo form_label($val, $k .'_'. $key);
                                                        echo form_error($k .'_'. $key);
                                                        echo form_input($k .'_'. $key, trim($detail['metakeywords_'. $key]), 'class="form-control" id="metakeywords_'.$key.'"');
                                                        }elseif($k == 'metadescription' && in_array($k, $request_language_template)){
                                                            echo form_label($val, $k .'_'. $key);
                                                            echo form_error($k .'_'. $key);
                                                            echo form_input($k .'_'. $key, trim($detail['metadescription_'. $key]), 'class="form-control" id="metadescription_'.$key.'"');
                                                        }
                                                        ?>
                                                    </div>
                                                <?php endforeach ?>
                                            </div>
                                            <?php $i++; ?>
                                        <?php endforeach ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="add-date">
                        <div class="box box-default">
                            <div class="box-body">
                                <div class="col-xs-12">
                                    <h4 class="box-title">Thông tin cơ bản</h4>
                                </div>
                                <div class="row">
                                    <span><?php echo $this->session->flashdata('message'); ?></span>
                                </div>
                                <div class="col-md-12" style="padding: 0px;margin-bottom: 10px;">
                                    <label class="col-md-12" for="">
                                            Nhập số ngày Tour
                                    </label>
                                    <div class="col-md-10" style="margin-top:5px;">
                                        <div class="col-xs-12" style="padding: 0px">
                                            <?php  
                                                echo form_input("number", (int)count($detail['datetitle_vi']), 'class="form-control" onkeypress=" return isNumberKey(event)" id="numberdate"');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-md-2" style="margin-top:5px;">
                                        <span class="btn btn-primary form-control append-date" id="button-numberdate">Xác nhận</span>
                                    </div>
                                </div>
                                <div class="col-md-12" id="content-full-date">
                                    <?php for ($i=0; $i < count($detail['datecontent_vi']); $i++): ?>
                                        <div class="vi">
                                            <div role="tabpanel" class="tab-pane active" id="<?php echo $i; ?>">
                                                <div class="title-content-date showdate <?php echo $i; ?>">
                                                    <div class="btn btn-primary col-xs-12 btn-margin" type="button" data-toggle="collapse" href="#showdatecontent_<?php echo $i; ?>" aria-expanded="true" aria-controls="messageContent" style="padding:10px 0px;margin-bottom:3px;">
                                                        <div class="col-xs-11">Nội dung Đầy đủ Ngày <?php echo $i+1; ?></div>
                                                    </div>
                                                    <div class="no_border">
                                                        <div class="collapse in" id="showdatecontent_<?php echo $i; ?>">
                                                            <div class="col-xs-12 title-content-date date " style="margin-top:-5px;">
                                                            <?php
                                                                echo form_label('Hình ảnh ngày '.($i+1), 'img_date_'.$i,'class="img_date"   id="label_img_date_'.$i.'" ');
                                                                echo form_upload('img_date_'.$i.'[]',"",'class="form-control" id="img_date_'.$i.'"');
                                                                echo form_label('Phương tiện đi ngày '.($i+1), 'vehicles');
                                                                echo form_error('vehicles');
                                                                echo form_dropdown('vehicles_'.$i, $request_vehicles,$detail['vehicles'][$i], 'class="form-control" id="vehicles_'.$i.'"');
                                                            ?>
                                                                <div style="margin-top: 10px;">
                                                                    <ul class="nav nav-pills nav-justified language" role="tablist">
                                                                        <?php $number = 0; ?>
                                                                        <?php foreach ($page_languages as $key => $value) : ?>
                                                                            <?php $active = ($number == 0)?'active':''; ?>
                                                                            <li role="presentation" class="<?php echo $active; ?>">
                                                                                <a href="#<?php echo $key.$i;?>" aria-controls="<?php echo $key.$i;?>" role="tab" data-toggle="tab">
                                                                                    <span class="badge"><?php echo $number + 1; ?></span><?php echo $value; ?>
                                                                                </a>
                                                                            </li>
                                                                            <?php $number++; ?>
                                                                        <?php endforeach; ?>
                                                                        <?php $number = 0; ?>
                                                                    </ul>
                                                                </div>
                                                                <div class="tab-content">
                                                                    <?php foreach ($page_languages as $key => $value) : ?>
                                                                        <?php $active = ($number == 0)?'active':''; ?>
                                                                        <div role="tabpanel" class="tab-pane <?php echo $active;?>" id="<?php echo $key.$i; ?>">
                                                                            <div class="col-xs-12" style="padding:0px">
                                                                            <?php
                                                                                echo form_label(($key == 'vi')?'Tiêu đề ngày '.($i+1):'Title date '.($i+1), 'title_date_'.$i.'_'. $key,'class="title_date"   id="label_title_date_'.$key.'_'.$i.'" ');
                                                                                echo form_error('title_date_'.$i.'_'. $key);
                                                                                echo form_input('title_date_'.$i.'_'. $key,$detail['datetitle_'.$key][$i], 'class="form-control" id="title_date_'.$key.'_'.$i.'"');
                                                                                echo form_label(($key == 'vi')?'Nội dung ngày '.($i+1):'Content date '.($i+1),'content_date_'.$i.'_'. $key,'class="content_date"  id="label_content_date_'.$key.'_'.$i.'" ');
                                                                                echo form_error('content_date_'.$i.'_'. $key);
                                                                                echo form_textarea('content_date_'.$i.'_'. $key,$detail['datecontent_'.$key][$i], 'class="tinymce-area form-control" id="content_date_'.$key.'_'.$i.'" rows="3"');
                                                                            ?>
                                                                            </div>
                                                                        </div>
                                                                        <?php $number++;?>
                                                                    <?php endforeach; ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endfor; ?>
                                </div>
                                <div class="col-md-12 tab-content">
                                    <span class="append-date" id="append-date"><i class="fa-2x fa fa-plus-square"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>                <div class="box box-default">
                    <div class="box-body">
                        <div class="col-xs-12">
                            <ul class="nav nav-tabs" role="tablist" id="nav-product">
                                <a class="btn btn-primary" id="go-back" onclick="history.back(-1);" >Go back</a>
                                <li role="presentation" id="content-home"><button href="#home" class="btn btn-primary" aria-controls="home" role="tab" data-toggle="tab">Tour</button></li>
                                <li role="presentation" id="add-date"><button href="#add-date" class="btn btn-primary" aria-controls="add-date" role="tab" data-toggle="tab">Tour date</button></li>
                                <input type="button" name="submit_shared" id="submit-shared" value="OK" class="btn btn-primary">
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="hidden">
                    <input type="text" name="titledate_vi[]" value=""/>
                    <input type="text" name="contentdate_vi[]" value=""/>
                    <input type="text" name="titledate_en[]" value=""/>
                    <input type="text" name="contentdate_en[]" value=""/>
                    <input type="text" name="numberdatehidden" value="<?php echo count($detail['datecontent_vi']);?>"/>
                </div>
                <?php echo form_close(); ?>
            </div>
        </section>
    </div>
<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.js"></script>
<script src="<?php echo base_url('assets/js/admin/');?>admin.js" type="text/javascript" charset="utf-8" async defer></script>
<script type="text/javascript">
    $(".collapse").css("height","0px");
    numberdate = $(".title-content-date.showdate.vi .title-content-date.date.vi").length;
    if(numberdate>=2){
        $($(".title-content-date.date.vi .title_date")[numberdate-1]).before("<span class='remove' onclick='removeDate();'><i class='glyphicon glyphicon-remove'></i></span>");
        $($(".title-content-date.date.en .title_date")[numberdate-1]).before("<span class='remove' onclick='removeDate();'><i class='glyphicon glyphicon-remove'></i></span>");
    }
    function isNumberKey(evt)
    {
       var charCode = (evt.which) ? evt.which : event.keyCode;
       if(charCode == 59 || charCode == 46)
        return true;
       if (charCode > 31 && (charCode < 48 || charCode > 57))
          return false;
       return true;
    }
</script>
