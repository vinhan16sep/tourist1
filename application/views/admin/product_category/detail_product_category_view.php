<link rel="stylesheet" href="<?php echo site_url('assets/sass/admin/') ?>detail.css">


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Chi tiết
            <small>
                Danh Mục
            </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="#"><i class="fa fa-dashboard"></i> Chi tiết</a></li>
            <li class="active">
                Danh Mục
            </li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <?php if ($this->session->flashdata('message_success')): ?>
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                <?php echo $this->session->flashdata('message_success'); ?>
            </div>
        <?php endif ?>
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash() ?>" id="csrf" />
            <div class="col-md-9">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Chi tiết</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="detail-image col-md-6">
                                <label>Hình ảnh</label>
                                <div class="row">
                                    <div class="item col-md-12">
                                        <div class="mask-lg">
                                            <img src="<?php echo base_url('assets/upload/'.$controller.'/'.$detail['slug'].'/' .$detail['image']) ?>" alt="anh-cua-<?php echo $detail['slug'] ?>" width="300px" > 
                                        </div>
                                    </div>
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
                                            <th>
                                                <?php if ($detail['parent_id'] != 0): ?>
                                                    Danh Mục Cha
                                                <?php else: ?>
                                                    Danh Mục
                                                <?php endif ?>
                                            </th>
                                            <td>
                                                <?php if ($detail['parent_id'] != 0): ?>
                                                    <a href="<?php echo base_url('admin/'. $controller .'/detail/'.$detail['parent_id']) ?>" class="btn btn-block btn-primary btn-flat" ><?php echo $detail['parent_title'] ?></a>
                                                <?php else: ?>
                                                    <a href="javascript:void(0)" class="btn btn-block btn-primary" ><?php echo $detail['parent_title'] ?></a>
                                                <?php endif ?>
                                                
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Trạng Thái</th>
                                            <td>
                                                <?php if ($detail['is_activated'] == 0): ?>
                                                    <span class="label label-success" onclick="deactive('product_category', <?php echo $detail['id'] ?>, 'Chăc chắn tắt danh mục(Lưu ý: Khi tắt danh mục thì tất cả danh mục con và thực đơn của danh mục cũng tắt theo)')" class="dataActionDelete" title="Tắt danh mục" style="cursor: pointer;">Đang sử dụng</span>
                                                <?php else: ?>
                                                    <span class="label label-warning" onclick="active('product_category', <?php echo $detail['id'] ?>, 'Chăc chắn bật danh mục(Lưu ý: Khi bật danh mục thì tất cả danh mục con và thực đơn của danh mục cũng bật theo)')" class="dataActionDelete" title="Bật danh mục" style="cursor: pointer;">Không sử dụng</span>
                                                <?php endif ?>
                                            </td>
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
                                                <div class="table-responsive">
                                                    <table class="table table-striped">
                                                        <tbody>
                                                            <?php if ($k == 'title' && in_array($k, $request_language_template)): ?>
                                                                <tr>
                                                                    <th style="width: 100px">Tiêu đề: </th>
                                                                    <td><?php echo $detail['title_'. $key] ?></td>
                                                                </tr>
                                                            <?php elseif($k == 'description' && in_array($k, $request_language_template)): ?>
                                                                <tr>
                                                                    <th style="width: 100px">Giới thiệu: </th>
                                                                    <td><?php echo $detail['description_'. $key] ?></td>
                                                                </tr>
                                                            <?php elseif($k == 'content' && in_array($k, $request_language_template)): ?>
                                                                <tr>
                                                                    <th style="width: 100px">Nội dung: </th>
                                                                    <td><?php echo $detail['content_'. $key] ?></td>
                                                                </tr>
                                                            <?php endif ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            <?php endforeach ?>
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
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3">
                <div class="box box-warning">
                    <div class="box-header">
                        <h3 class="box-title">Hành Động</h3>
                    </div>
                    <div class="box-body">
                        <a href="<?php echo base_url('admin/'.$controller.'/edit/'.$detail['id']) ?>" class="btn btn-warning" role="button">Chỉnh sửa</a>
                        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        <a href="<?php echo base_url('admin/'.$controller.'/create/'.$detail['id']) ?>" class="btn btn-success" role="button">Thêm mới danh mục con</a>
                    </div>
                </div>
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Danh Mục Con</h3>
                    </div>
                    <?php if ($sub_category): ?>
                        <?php foreach ($sub_category as $key => $value): ?>
                            <div class="box-body">
                                <a href="<?php echo base_url('admin/'.$controller.'/detail/'.$value['id']) ?>" class="btn btn-block btn-social btn-dropbox" role="button">
                                    <i class="fa fa-link" aria-hidden="true"></i>
                                    <?php echo $value['title'] ?>
                                </a>
                            </div>
                        <?php endforeach ?>
                    <?php else: ?>
                        <div class="box-body">
                            Hiện không có danh mục nhỏ
                        </div>
                    <?php endif ?>
                </div>
            </div>
        </div>
        <!-- /.row -->
        <!-- END ACCORDION & CAROUSEL-->
    </section>
</div>