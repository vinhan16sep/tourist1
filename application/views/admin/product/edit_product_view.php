<link rel="stylesheet" href="<?php echo site_url('assets/sass/admin/') ?>detail.css">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Cập nhật
            <small>
                Thực Đơn
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
                                    <label for="image_shared">Hình ảnh đang dùng</label>
                                    <br>
                                    <?php foreach (json_decode($detail['image']) as $key => $value): ?>
                                        <div class="item col-md-3 row_<?php echo $key ?>">
                                            <div class="mask-sm">
                                                <img src="<?php echo base_url('assets/upload/'. $controller .'/'. $detail['slug'] .'/'. $value); ?>" width=150px>
                                                <i class="fa fa-times-circle fa-2x" onclick="remove_image('product',  <?php echo $detail['id'] ?>, '<?php echo $value ?>', <?php echo $key ?>)" ></i>
                                            </div>
                                        </div>
                                    <?php endforeach ?>

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
                                                        echo form_input($k .'_'. $key, $detail['metakeywords_'. $key], 'class="form-control" id="metakeywords_'.$key.'"');
                                                        }elseif($k == 'metadescription' && in_array($k, $request_language_template)){
                                                            echo form_label($val, $k .'_'. $key);
                                                            echo form_error($k .'_'. $key);
                                                            echo form_input($k .'_'. $key, $detail['metadescription_'. $key], 'class="form-control" id="metadescription_'.$key.'"');
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
                                <div class="col-md-12" style="padding: 0px;">
                                    <label class="col-md-12" for="">
                                            Nhập số ngày Tour
                                    </label>
                                    <div class="col-md-10">
                                        <?php  
                                            echo form_input("numberdate", (int)$tour_date['numberdate'], 'class="form-control" onkeypress=" return isNumberKey(event)" id="numberdate"');
                                        ?>
                                    </div>
                                    <div class="col-md-2">
                                        <span class="btn btn-primary form-control append-date" id="button-numberdate">Xác nhận</span>
                                    </div>
                                </div>
                                <div class="col-md-12" style="padding: 0px;">
                                    <div class="col-md-12" style="margin-top: 10px;">
                                        <ul class="nav nav-pills nav-justified language" role="tablist">
                                            <?php $i = 0; ?>
                                            <?php foreach ($page_languages as $key => $value): ?>
                                                <li role="presentation" class="<?php echo ($i == 0)? 'active' : '' ?>">
                                                    <a href="#<?php echo $key ?>1" aria-controls="<?php echo $key ?>1" role="tab" data-toggle="tab">
                                                        <span class="badge"><?php echo $i + 1 ?></span> <?php echo $value ?>
                                                    </a>
                                                </li>
                                                <?php $i++; ?>
                                            <?php endforeach ?>
                                        </ul>
                                        <hr>
                                    </div>
                                    <div class="col-md-12 tab-content">
                                        <?php $i = 0; ?>
                                        <?php foreach ($template as $key => $value): ?>
                                            <div role="tabpanel" class="tab-pane <?php echo ($i == 0)? 'active' : '' ?>" id="<?php echo $key ?>1">
                                                <div class="title-content-date showdate <?php echo $key; ?>">
                                                    <?php for($i=0; $i < $tour_date['numberdate']; $i++): ?>
                                                        <div class="btn btn-primary collapsed col-xs-12 btn-margin" type="button" data-toggle="collapse" href="#<?php echo "showdatecontent_".$key."_".$i; ?>" aria-expanded="true" aria-controls="messageContent"><?php echo ($key == 'vi')?'Nội dung Đầy đủ Ngày '.($i+1):'Content full date  '.($i+1); ?></div>
                                                        <div class="no_border">
                                                            <div class="collapse" id="<?php echo "showdatecontent_".$key."_".$i; ?>">
                                                                <div class="title-content-date date <?php echo $key; ?>">
                                                                    <?php
                                                                        echo form_input('id_date_'. $key.'[]', (int)$tour_date_full[$key][$i]['id'], 'class="form-control" style="display:none;" id="id_date_'.$key.'_'.$i.'"');
                                                                        echo form_label(($key == 'vi')?'Tiêu đề ngày '.($i+1):'Title date '.($i+1), 'title_date'.'_'. $key.'[]','class="title_date"   id="label_title_date_'.$key.'_'.$i.'" ');
                                                                        echo form_error('title_date_'. $key.'[]');
                                                                        echo form_input('title_date_'. $key.'[]',$tour_date_full[$key][$i]['title'], 'class="form-control" id="title_date_'.$key.'_'.$i.'"');
                                                                        echo form_label(($key == 'vi')?'Nội dung ngày '.($i+1):'Content date '.($i+1), 'content_date'.'_'. $key.'[]','class="content_date"  id="label_content_date_'.$key.'_'.$i.'" ');
                                                                        echo form_error('content_date_'. $key.'_'.$i);
                                                                        echo form_textarea('content_date_'. $key.'[]',$tour_date_full[$key][$i]['content'], 'class="tinymce-area form-control" id="content_date_'.$key.'_'.$i.'" rows="3"');
                                                                    ?>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    <?php endfor;?>
                                                </div>
                                            </div>
                                            <?php $i++; ?>
                                        <?php endforeach ?>
                                    </div>
                                    <div class="col-md-12 tab-content">
                                        <span class="append-date" id="append-date"><i class="fa-2x fa fa-plus-square"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>                <div class="box box-default">
                    <div class="box-body">
                        <div class="col-xs-12">
                            <ul class="nav nav-tabs" role="tablist" id="nav-product">
                                <li role="presentation" id="content-home" class="active"><button href="#home" class="btn btn-primary" aria-controls="home" role="tab" data-toggle="tab">Home</button></li>
                                <li role="presentation" id="add-date"><button href="#add-date" class="btn btn-primary" aria-controls="add-date" role="tab" data-toggle="tab">Profile</button></li>
                                <?php echo form_submit('submit_shared', 'OK', 'class="btn btn-primary" id="submit-shared" '); ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
        </section>
    </div>

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
