<link rel="stylesheet" href="<?php echo site_url('assets/sass/admin/') ?>detail.css">


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Chi tiết
            <small>
                Thực Đơn
            </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="#"><i class="fa fa-dashboard"></i> Chi tiết</a></li>
            <li class="active">
                Thực Đơn
            </li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash() ?>" id="csrf" />
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <ul class="nav nav-tabs" role="tablist" id="nav-product">
                            <li role="presentation" class="active"><a href="#tour" class="btn btn-primary" aria-controls="tour" role="tab" data-toggle="tab">Tour</a></li>
                            <li role="presentation"><a href="#date-tour" class="btn btn-primary" aria-controls="date-tour" role="tab" data-toggle="tab">Date tour</a></li>
                            <li role="presentation"><a href="#img-tour" class="btn btn-primary" aria-controls="img-tour" role="tab" data-toggle="tab">Nơi đến các ngày của tour</a></li>
                        </ul>
                        <h3 class="box-title">Chi tiết</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade in active" id="tour">
                            <div class="box-body">
                                <div class="row">
                                    <?php if (!empty($detail['imglocaltion'])): ?>
                                        <div class="detail-image col-sm-6" style="margin-bottom: 5px;">
                                            <label>Hình ảnh localtion</label>
                                            <div class="row">
                                                    <div class="col-xs-12">
                                                        <div class="mask-sm">
                                                            <img src="<?php echo base_url('assets/upload/'.$controller.'/'.$detail['slug'].'/'.$detail['imglocaltion']) ?>" alt="anh-cua-<?php echo $detail['slug'] ?>" style="padding: 0px;">
                                                        </div>
                                                    </div>
                                            </div>
                                        </div>
                                    <?php endif ?>
                                    <?php if (!empty($detail['image'])): ?>
                                        <div class="detail-image col-sm-6" style="margin-bottom: 5px;">
                                            <label>Hình ảnh của tour</label>
                                            <div class="row">
                                                    <div class="col-xs-12">
                                                        <div class="mask-sm">
                                                            <img src="<?php echo base_url('assets/upload/'.$controller.'/'.$detail['slug'].'/'.$detail['image']) ?>" alt="anh-cua-<?php echo $detail['slug'] ?>" style="padding: 0px;">
                                                        </div>
                                                    </div>
                                            </div>
                                        </div>
                                    <?php endif ?>
                                    <div class="detail-info col-sm-12">
                                        <div class="table-responsive">
                                            <label>Thông tin</label>
                                            <table class="table table-striped">
                                                <tr>
                                                    <th>Đánh Giá</th>
                                                    <td style="">
                                                        <span class="rateit" data-rateit-value="<?php echo $rating ?>"  data-rateit-readonly="true" style="margin-top: 2px;"></span>
                                                        <span style="color:blue; padding-left: 10px;">
                                                            <?php echo $rating ?> Điểm / <?php echo $count_rating ?> Lượt đánh giá
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Slug</th>
                                                    <td><?php echo $detail['slug'] ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Danh Mục</th>
                                                    <td><?php echo $detail['parent_title'] ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Số ngày tour</th>
                                                    <td><?php echo count($detail['datetitle_vi']) ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Giá</th>
                                                    <td><?php echo $detail['price'] ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Giám giá</th>
                                                    <td><?php echo $detail['percen'] ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Những nơi đi</th>
                                                    <td><?php echo $detail['localtion'] ?></td>
                                                </tr>

                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-xs-12">
                                        <!-- Nav tabs -->
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

                                        <!-- Tab panes -->
                                        <div class="tab-content">
                                            <?php $i = 0; ?>
                                            <?php foreach ($template as $key => $value): ?>
                                                <div role="tabpanel" class="tab-pane <?php echo ($i == 0)? 'active' : '' ?>" id="<?php echo $key ?>">
                                                    <?php foreach ($value as $k => $val): ?>
                                                        <?php if(in_array($k, $request_language_template)): ?>
                                                            <div class="table-responsive">
                                                                <table class="table table-striped">
                                                                    <tbody>
                                                                        <?php if ($k == 'title' && in_array($k, $request_language_template)): ?>
                                                                            <tr>
                                                                                <th style="width: 140px"><?php echo $val;?>: </th>
                                                                                <td><?php echo $detail['title_'. $key] ?></td>
                                                                            </tr>
                                                                        <?php elseif($k == 'description' && in_array($k, $request_language_template)): ?>
                                                                            <tr>
                                                                                <th style="width: 140px"><?php echo $val;?>: </th>
                                                                                <td><?php echo $detail['description_'. $key] ?></td>
                                                                            </tr>
                                                                        <?php elseif($k == 'content' && in_array($k, $request_language_template)): ?>
                                                                            <tr>
                                                                                <th style="width: 140px"><?php echo $val;?>: </th>
                                                                                <td><?php echo $detail['content_'. $key] ?></td>
                                                                            </tr>
                                                                        <?php elseif($k == 'metakeywords' && in_array($k, $request_language_template)): ?>
                                                                            <tr>
                                                                                <th style="width: 140px"><?php echo $val;?>: </th>
                                                                                <td><?php echo $detail['metakeywords_'. $key] ?></td>
                                                                            </tr>
                                                                        <?php elseif($k == 'metadescription' && in_array($k, $request_language_template)): ?>
                                                                            <tr>
                                                                                <th style="width: 140px"><?php echo $val;?>: </th>
                                                                                <td><?php echo $detail['metadescription_'. $key] ?></td>
                                                                            </tr>
                                                                        <?php elseif($k == 'tripnodes' && in_array($k, $request_language_template)): ?>
                                                                            <tr>
                                                                                <th style="width: 140px"><?php echo $val;?>: </th>
                                                                                <td><?php echo $detail['tripnodes_'. $key] ?></td>
                                                                            </tr>
                                                                        <?php elseif($k == 'detailsprice' && in_array($k, $request_language_template)): ?>
                                                                            <tr>
                                                                                <th style="width: 140px"><?php echo $val;?>: </th>
                                                                                <td><?php echo $detail['detailsprice_'. $key] ?></td>
                                                                            </tr>
                                                                        <?php endif ?>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        <?php endif; ?>
                                                    <?php endforeach ?>
                                                </div>
                                                <?php $i++; ?>
                                            <?php endforeach ?>
                                        </div>

                                    </div>

                                </div>

                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="date-tour">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <?php
                                            if(!empty($detail['dateimg'])){
                                                $detailimg = json_decode($detail['dateimg']);
                                            }
                                        ?>
                                        <?php for ($i=0; $i < count($detail['datetitle_vi']); $i++): ?>
                                            <div role="tabpanel" class="tab-pane active" id="<?php echo $i; ?>">
                                                <div class="title-content-date showdate <?php echo $i; ?>">
                                                    <div class="btn btn-primary col-xs-12 btn-margin collapsed" type="button" data-toggle="collapse" href="#showdatecontent_<?php echo $i; ?>" aria-expanded="false" aria-controls="messageContent" style="padding:10px 0px;margin-bottom:3px;">
                                                        <div class="col-xs-11">Nội dung Đầy đủ Ngày <?php echo $i+1; ?></div>
                                                    </div>
                                                    <div class="no_border">
                                                        <div class="collapse" id="showdatecontent_<?php echo $i; ?>">
                                                            <div class="col-xs-12 title-content-date date " style="margin-top:-5px;">
                                                                <div class="img-vehicles">
                                                                    <div class="col-md-6 img">
                                                                        <img src="<?php echo base_url('assets/upload/'.$controller.'/'.$detail['slug'].'/' .$detailimg[$i]) ?>" alt="anh-cua-<?php echo $detail['datetitle_'.$key][$i] ?>" width="100%" >
                                                                    </div>
                                                                    <div class="col-md-6 vehicles">
                                                                        <strong>Phương tiện đi: </strong><?php echo $request_vehicles[$detail['vehicles'][$i]];?>
                                                                    </div>
                                                                </div>
                                                                <div class="col-xs-12" style="margin-top: 10px;">
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
                                                                <!-- Tab panes -->
                                                                <div class="col-xs-12 tab-content">
                                                                    <?php
                                                                        if(!empty($detail['dateimg'])){
                                                                            $detailimg = json_decode($detail['dateimg']);
                                                                        }
                                                                    ?>
                                                                    <?php foreach ($template as $key => $value): ?>
                                                                        <?php $active = ($number == 0)?'active':''; ?>
                                                                        <div role="tabpanel" class="tab-pane <?php echo $active; ?>" id="<?php echo $key.$i; ?>">
                                                                            <div class="table-responsive" style="border:1px solid gray;margin: 10px auto;">
                                                                                <table class="table table-striped">
                                                                                    <tbody>

                                                                                        <tr>
                                                                                            <th style="width: 150px"><?php echo ($key == 'vi')?'Tiêu đề ngày '.($i+1):'Title date '.($i+1); ?>: </th>
                                                                                            <td><?php echo $detail['datetitle_'.$key][$i]; ?></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <th style="width: 150px"><?php echo ($key == 'vi')?'Nội dung ngày '.($i+1):'Content date '.($i+1); ?>: </th>
                                                                                            <td><?php echo $detail['datecontent_'.$key][$i]; ?></td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                        <?php $number++;?>
                                                                    <?php endforeach ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endfor; ?>
                                    </div>

                                </div>

                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="img-tour">
                            <div class="box-body">
                                <div class="row">
                                    <div class="detail-image col-sm-12">
                                        <?php for($h = 0;$h < count($detail['librarylocaltion']); $h++): ?>
                                            <div role="tabpanel" class="tab-pane active" id="localtion_<?php echo $h; ?>">
                                                <div class="title-content-date showdate <?php echo $h; ?>">
                                                    <div class="btn btn-primary col-xs-12 btn-margin collapsed" type="button" data-toggle="collapse" href="#librarylocaltion_<?php echo $h; ?>" aria-expanded="false" aria-controls="messageContent" style="margin-bottom:3px;padding:10px 0px;">
                                                        <div class="col-xs-11">Nơi đến Ngày <?php echo $h+1; ?></div>
                                                    </div>
                                                    <div class="no_border">
                                                        <div class="col-xs-12">
                                                        <div class="collapse" id="librarylocaltion_<?php echo $h; ?>">
                                                            <?php if (!empty($detail['librarylocaltion'][$h])): ?>
                                                                <?php foreach ($detail['librarylocaltion'][$h] as $k => $value): ?>
                                                                    <?php if(!empty($value)): ?>
                                                                        <div class="col-sm-12" style="margin:10px 0px;">
                                                                            <div class="col-sm-5" style="padding: 0px; padding-right: 5px;">
                                                                                <img src="<?php echo base_url('assets/upload/localtion/'.$value['slug'].'/' .$value['image']) ?>" alt="anh-cua-<?php echo $detail['slug'] ?>"  style="width: 100%;">
                                                                            </div>
                                                                            <div class="col-sm-7" style="padding: 0px;">
                                                                                    <ul class="nav nav-pills nav-justified language" role="tablist">
                                                                                        <?php $number = 0; ?>
                                                                                        <?php foreach ($page_languages as $key => $val) : ?>
                                                                                            <?php $active = ($number == 0)?'active':''; ?>
                                                                                            <li role="presentation" class="<?php echo $active; ?>">
                                                                                                <a href="#date-localtion<?php echo $key.$h.$k;?>" aria-controls="<?php echo $key.$h;?>" role="tab" data-toggle="tab">
                                                                                                    <span class="badge"><?php echo $number + 1; ?></span><?php echo $val; ?>
                                                                                                </a>
                                                                                            </li>
                                                                                            <?php $number++; ?>
                                                                                        <?php endforeach; ?>
                                                                                        <?php $number = 0; ?>
                                                                                    </ul>
                                                                                <div class="tab-content">
                                                                                    <?php $number = 0; ?>
                                                                                    <?php foreach ($template as $key => $val): ?>
                                                                                        <div role="tabpanel" class="tab-pane <?php echo ($number == 0)? 'active' : '' ?>" id="date-localtion<?php echo $key.$h.$k; ?>">
                                                                                            <div style="padding: 5px;">
                                                                                                <label for=""><?php echo $template[$key]['title'];?>:</label>
                                                                                                <p>
                                                                                                    <?php echo $value['title_'. $key] ?>
                                                                                                </p>
                                                                                                <label for=""><?php echo $template[$key]['content'];?>:</label>
                                                                                                <p>
                                                                                                    <?php echo $value['content_'. $key] ?>
                                                                                                </p>
                                                                                            </div>
                                                                                        </div>
                                                                                        <?php $number++; ?>
                                                                                    <?php endforeach; ?>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <?php if ($k+1 < count($detail['librarylocaltion'][$h])): ?>
                                                                            <div style="border:2px solid gray" class="col-md-12"> </div>  
                                                                        <?php endif ?>       
                                                                    <?php else: ?>
                                                                        <div style="padding:20px;">
                                                                            Không có nơi nào được chọn trong ngày    
                                                                        </div>
                                                                    <?php endif;?>
                                                                <?php endforeach ?>
                                                            <?php endif ?>
                                                        </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endfor; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="col-md-12">
                <div class="box box-warning">
                    <div class="box-body">
                        <button style="float: left;" class="btn btn-warning" onclick="history.back(-1);" role="button">Go back</button>
                        <a style="float: right;" href="<?php echo base_url('admin/'.$controller.'/edit/'.$detail['id']) ?>" class="btn btn-warning" role="button">Chỉnh sửa</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
        <!-- END ACCORDION & CAROUSEL-->
    </section>
</div>