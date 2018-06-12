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
            <div class="col-md-9">
                <div class="box">
                    <div class="box-header">
                        <ul class="nav nav-tabs" role="tablist" id="nav-product">
                            <li role="presentation" class="active"><a href="#tour" class="btn btn-primary" aria-controls="tour" role="tab" data-toggle="tab">Tour</a></li>
                            <li role="presentation"><a href="#date-tour" class="btn btn-primary" aria-controls="date-tour" role="tab" data-toggle="tab">Date tour</a></li>
                        </ul>
                        <h3 class="box-title">Chi tiết</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade in active" id="tour">
                            <div class="box-body">
                                <div class="row">
                                    <div class="detail-image col-md-6">
                                        <label>Hình ảnh</label>
                                        <div class="row">
                                            <?php foreach (json_decode($detail['image']) as $key => $value): ?>
                                                <div class="item col-md-6 row_<?php echo $key ?>">
                                                    <div class="mask-sm">
                                                        <img src="<?php echo base_url('assets/upload/'.$controller.'/'.$detail['slug'].'/' .$value) ?>" alt="anh-cua-<?php echo $detail['slug'] ?>" width="100px" >
                                                        <i class="fa fa-times-circle fa-2x" onclick="remove_image('product',  <?php echo $detail['id'] ?>, '<?php echo $value ?>', <?php echo $key ?>)" style="cursor: pointer;" ></i>
                                                    </div>
                                                </div>
                                            <?php endforeach ?>
                                        </div>
                                    </div>
                                    <div class="detail-info col-md-6">
                                        <div class="table-responsive">
                                            <label>Thông tin</label>
                                            <table class="table table-striped">
                                                <tr>
                                                    <th colspan="2">Thông tin cơ bản</th>
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
                                                    <td><?php echo $tour_date['numberdate'] ?></td>
                                                </tr>

                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-md-12">

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
                                                                                <th style="width: 120px">Tiêu đề: </th>
                                                                                <td><?php echo $detail['title_'. $key] ?></td>
                                                                            </tr>
                                                                        <?php elseif($k == 'description' && in_array($k, $request_language_template)): ?>
                                                                            <tr>
                                                                                <th style="width: 120px">Giới thiệu: </th>
                                                                                <td><?php echo $detail['description_'. $key] ?></td>
                                                                            </tr>
                                                                        <?php elseif($k == 'content' && in_array($k, $request_language_template)): ?>
                                                                            <tr>
                                                                                <th style="width: 120px">Nội dung: </th>
                                                                                <td><?php echo $detail['content_'. $key] ?></td>
                                                                            </tr>
                                                                        <?php elseif($k == 'metakeywords' && in_array($k, $request_language_template)): ?>
                                                                            <tr>
                                                                                <th style="width: 120px">Từ khóa Meta: </th>
                                                                                <td><?php echo $detail['metakeywords_'. $key] ?></td>
                                                                            </tr>
                                                                        <?php elseif($k == 'metadescription' && in_array($k, $request_language_template)): ?>
                                                                            <tr>
                                                                                <th style="width: 120px">Mô tả Meta: </th>
                                                                                <td><?php echo $detail['metadescription_'. $key] ?></td>
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
                                    <div class="detail-image col-md-6">
                                        <label>Hình ảnh1</label>
                                        <div class="row">
                                            <?php foreach (json_decode($detail['image']) as $key => $value): ?>
                                                <div class="item col-md-6 row_<?php echo $key ?>">
                                                    <div class="mask-sm">
                                                        <img src="<?php echo base_url('assets/upload/'.$controller.'/'.$detail['slug'].'/' .$value) ?>" alt="anh-cua-<?php echo $detail['slug'] ?>" width="100px" >
                                                        <i class="fa fa-times-circle fa-2x" onclick="remove_image('product',  <?php echo $detail['id'] ?>, '<?php echo $value ?>', <?php echo $key ?>)" style="cursor: pointer;" ></i>
                                                    </div>
                                                </div>
                                            <?php endforeach ?>
                                        </div>
                                    </div>
                                    <div class="detail-info col-md-6">
                                        <div class="table-responsive">
                                            <label>Thông tin</label>
                                            <table class="table table-striped">
                                                <tr>
                                                    <th colspan="2">Thông tin cơ bản</th>
                                                </tr>
                                                <tr>
                                                    <th>Slug</th>
                                                    <td><?php echo $detail['slug'] ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Danh Mục</th>
                                                    <td><?php echo $detail['parent_title'] ?></td>
                                                </tr>

                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-md-12">

                                        <!-- Nav tabs -->
                                        <ul class="nav nav-pills nav-justified" role="tablist">
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
                                        <!-- Tab panes -->
                                        <div class="tab-content">
                                            <?php $i = 0; ?>
                                            <?php foreach ($template as $key => $value): ?>
                                                <div role="tabpanel" class="tab-pane <?php echo ($i == 0)? 'active' : '' ?>" id="<?php echo $key ?>1">
                                                    <?php for($i=0; $i < $tour_date['numberdate']; $i++): ?>
                                                        <div class="table-responsive" style="border:1px solid gray;margin: 10px auto;">
                                                            <table class="table table-striped">
                                                                <tbody>
                                                                        <tr>
                                                                            <th style="width: 150px"><?php echo ($key == 'vi')?'Tiêu đề ngày '.($i+1):'Title date '.($i+1); ?>: </th>
                                                                            <td><?php echo $tour_date_full[$key][$i]['title']; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th style="width: 150px"><?php echo ($key == 'vi')?'Nội dung ngày '.($i+1):'Content date '.($i+1); ?>: </th>
                                                                            <td><?php echo $tour_date_full[$key][$i]['content']; ?></td>
                                                                        </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    <?php endfor;?>
                                                </div>
                                                <?php $i++; ?>
                                            <?php endforeach ?>
                                            <div role="tabpanel" class="tab-pane" id="en">
                                                <div class="table-responsive">
                                                    <table class="table table-striped">
                                                        <tbody>
                                                            <tr>
                                                                <th style="width: 100px">Title: </th>
                                                                <td><?php echo $detail['title_en'] ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th style="width: 100px">Description: </th>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <th style="width: 100px">Content: </th>
                                                                <td></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>

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
            <div class="col-md-3">
                <div class="box box-warning">
                    <div class="box-header">
                        <h3 class="box-title">Chỉnh sửa 
                            Thực Đơn
                        này?</h3>
                    </div>
                    <div class="box-body">
                        <a href="<?php echo base_url('admin/'.$controller.'/edit/'.$detail['id']) ?>" class="btn btn-warning" role="button">Chỉnh sửa</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
        <!-- END ACCORDION & CAROUSEL-->
    </section>
</div>