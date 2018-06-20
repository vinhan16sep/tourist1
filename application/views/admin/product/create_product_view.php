
<div class="content-wrapper" id="create-product-view">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Thêm mới
            <small>
                Tour
            </small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <?php if ($this->session->flashdata('message_error')): ?>
                    <div class="alert alert-warning alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-warning"></i> Alert!</h4>
                        <?php echo $this->session->flashdata('message_error'); ?>
                    </div>
                <?php endif ?>
                <?php
                    echo form_open_multipart('', array('class' => 'form-horizontal','id' => 'register-form'));
                ?>
                <ul class="nav nav-tabs" role="tablist"></ul>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active" id="home">
                        <div class="box box-default">
                            <div class="box-body">
                                <div class="col-xs-12">
                                    <h4 class="box-title">Thông tin cơ bản</h4>
                                </div>
                                <div class="row">
                                    <span><?php echo $this->session->flashdata('message'); ?></span>
                                </div>
                                <img src="" alt="">
                                <div class="col-xs-12">
                                    <?php
                                    echo form_label('Hình ảnh', 'image_shared');
                                    echo form_error('image_shared');
                                    echo form_upload('image_shared', set_value('image_shared'), 'class="form-control" id="image_shared" ');
                                    ?>
                                </div>
                                <div class="col-xs-12">
                                    <?php
                                    echo form_label('Hình ảnh Map', 'image_localtion');
                                    echo form_error('image_localtion');
                                    echo form_upload('image_localtion', set_value('image_localtion'), 'class="form-control" id="image_localtion"');
                                    ?>
                                </div>
                                <div class="col-xs-12">
                                    <?php
                                    echo form_label('Slug', 'slug_shared');
                                    echo form_error('slug_shared');
                                    echo form_input('slug_shared', set_value('slug_shared'), 'class="form-control" id="slug_shared" readonly');
                                    ?>
                                </div>
                                <div class="col-xs-12">
                                    <label>Date:</label>
                                    <div class="input-group date">
                                      <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                      </div>
                                      <input type="text" name="date" class="form-control pull-right" id="datepicker" readonly>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <?php
                                    echo form_label('Giá tour', 'price');
                                    echo form_error('price');
                                    echo form_input('price', "", 'class="form-control" id="price" placeholder ="Đơn vị tiền: VNĐ" onkeypress=" return isNumberKey(event)"');
                                    ?>
                                </div>
                                <div class="col-xs-12">
                                    <?php
                                    echo form_label('Giá tour cho người lớn', 'priceadults');
                                    echo form_error('priceadults');
                                    echo form_input('priceadults', "", 'class="form-control" id="priceadults" placeholder ="Đơn vị : Phần trăm (%)" onkeypress=" return isNumberKey(event)"');
                                    ?>
                                </div>
                                <div class="col-xs-12">
                                    <?php
                                    echo form_label('Giá tour cho trẻ em', 'pricechildren');
                                    echo form_error('pricechildren');
                                    echo form_input('pricechildren', "", 'class="form-control" id="pricechildren" placeholder ="Đơn vị : Phần trăm (%)" onkeypress=" return isNumberKey(event)"');
                                    ?>
                                </div>
                                <div class="col-xs-12">
                                    <?php
                                    echo form_label('Giá tour cho em bé', 'priceinfants');
                                    echo form_error('priceinfants');
                                    echo form_input('priceinfants', "", 'class="form-control" id="priceinfants" placeholder ="Đơn vị : Phần trăm (%)" onkeypress=" return isNumberKey(event)"');
                                    ?>
                                </div>
                                <div class="col-xs-12">
                                    <?php
                                    echo form_label('Giảm giá', 'percen');
                                    echo form_error('percen');
                                    echo form_input('percen', "", 'class="form-control" id="percen" placeholder ="Đơn vị : Phần trăm (%)" onkeypress=" return isNumberKey(event)"');
                                    ?>
                                </div>
                                <div class="col-xs-12">
                                    <?php
                                    echo form_label('Vị trí đến', 'localtion');
                                    echo form_error('localtion');
                                    echo form_input('localtion', "", 'class="form-control" id="localtion" placeholder ="VD:Hanoi, Halong Bay, Hue, Hoian, Saigon, Cu Chi"');
                                    ?>
                                </div>
                                <div class="col-xs-12">
                                    <select name="parent_id_shared" id="parent_id_shared" class="form-control">
                                        <option selected="" value="">Chọn danh mục</option>
                                        <?php echo $product_category; ?>
                                    </select>
                                </div>
                                <div>
                                    <div class="col-xs-12">
                                        <ul class="col-xs-12 nav nav-pills nav-justified language" role="tablist">
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
                                                    <div class=" col-xs-12">
                                                        <?php
                                                        if($k == 'title' && in_array($k, $request_language_template)){
                                                            echo form_label($val, $k .'_'. $key);
                                                            echo form_error($k .'_'. $key);
                                                            echo form_input($k .'_'. $key, set_value($k .'_'. $key), 'class="form-control" id="title_'.$key.'"');
                                                        }elseif($k == 'description' && in_array($k, $request_language_template)){
                                                            echo form_label($val, $k .'_'. $key);
                                                            echo form_error($k .'_'. $key);
                                                            echo form_textarea($k .'_'. $key, set_value($k .'_'. $key, '', false), 'class="form-control" rows="5" id="description_'.$key.'" ');
                                                        }elseif($k == 'content' && in_array($k, $request_language_template)){
                                                            echo form_label($val, $k .'_'. $key);
                                                            echo form_error($k .'_'. $key);
                                                            echo form_textarea($k .'_'. $key, set_value($k .'_'. $key, '', false), 'class="tinymce-area form-control" rows="5" ');
                                                        }elseif($k == 'metakeywords' && in_array($k, $request_language_template)){
                                                        echo form_label($val, $k .'_'. $key);
                                                        echo form_error($k .'_'. $key);
                                                        echo form_input($k .'_'. $key, set_value($k .'_'. $key, '', false), 'class="form-control" id="metakeywords_'.$key.'" ');
                                                        }elseif($k == 'metadescription' && in_array($k, $request_language_template)){
                                                            echo form_label($val, $k .'_'. $key);
                                                            echo form_error($k .'_'. $key);
                                                            echo form_input($k .'_'. $key, set_value($k .'_'. $key, '', false), 'class="form-control" id="metadescription_'.$key.'" ');
                                                        }elseif($k == 'tripnodes' && in_array($k, $request_language_template)){
                                                            echo form_label($val, $k .'_'. $key);
                                                            echo form_error($k .'_'. $key);
                                                            echo form_textarea($k .'_'. $key, set_value($k .'_'. $key, '', false), 'class="tinymce-area form-control" rows="5" ');
                                                        }elseif($k == 'detailsprice' && in_array($k, $request_language_template)){
                                                            echo form_label($val, $k .'_'. $key);
                                                            echo form_error($k .'_'. $key);
                                                            echo form_textarea($k .'_'. $key, set_value($k .'_'. $key, '', false), 'class="tinymce-area form-control" rows="5" ');
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
                                        <?php  
                                            echo form_input("number", set_value("number"), 'class="form-control" onkeypress=" return isNumberKey(event)" id="numberdate"');
                                        ?>
                                    </div>
                                    <div class="col-md-2" style="margin-top:5px;">
                                        <span class="btn btn-primary form-control append-date" id="button-numberdate">Xác nhận</span>
                                    </div>
                                </div>

                                <div class="col-md-12" id="content-full-date">
                                </div>
                                <div class="col-md-12 tab-content">
                                    <span class="append-date" id="append-date"><i class="fa-2x fa fa-plus-square"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box box-default">
                        <div class="box-body">
                            <div class="col-xs-12">
                            <ul class="nav nav-tabs" role="tablist" id="nav-product">
                                <a class="btn btn-primary" id="go-back" onclick="history.back(-1);" >Go back</a>
                                <li role="presentation" id="content-home" class="active"><button href="#home" class="btn btn-primary" aria-controls="home" role="tab" data-toggle="tab">Tour</button></li>
                                <li role="presentation" id="add-date"><button href="#add-date" class="btn btn-primary" aria-controls="add-date" role="tab" data-toggle="tab">Tour date</button></li>
                                <input type="button" name="submit_shared" id="submit-shared" value="OK" class="btn btn-primary">
                            </ul>
                            </div>
                        </div>
                    </div>
                    <div class="hidden">
                        <input type="text" name="datetitle_vi[]" value=""/>
                        <input type="text" name="datecontent_vi[]" value=""/>
                        <input type="text" name="datetitle_en[]" value=""/>
                        <input type="text" name="datecontent_en[]" value=""/>
                        <input type="file" name="dateimg[]" multiple="">
                        <input type="text" name="librarylocaltion[]">
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </section>
</div>
<script type="text/javascript" src="<?php echo base_url('assets/js/');?>jquery.validate.js"></script>
<script src="<?php echo base_url('assets/js/admin/');?>admin.js" type="text/javascript" charset="utf-8" async defer></script>
<script type="text/javascript">
    function isNumberKey(evt)
    {
       var charCode = (evt.which) ? evt.which : event.keyCode;
       if (charCode > 31 && (charCode < 48 || charCode > 57) || charCode == 190 || charCode == 196)
          return false;
       return true;
    }
</script>
<script>
  $(function () {
    //Date picker
    $('#datepicker').datepicker({
      autoclose: true,
      format: 'dd/mm/yyyy',
    })
  })
</script>