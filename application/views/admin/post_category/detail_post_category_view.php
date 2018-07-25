<link rel="stylesheet" href="<?php echo site_url('assets/sass/admin/') ?>detail.css">


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Chi tiết
            <small>
                <?php if (isset($detail['post_category_id'])): ?>
                    Bài viết
                <?php else: ?>
                    Danh Mục
                <?php endif ?>
            </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="#"><i class="fa fa-dashboard"></i> Chi tiết</a></li>
            <li class="active">
                <?php if (isset($detail['post_category_id'])): ?>
                    Bài viết
                <?php else: ?>
                    Danh Mục
                <?php endif ?>
            </li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-9">
                <div class="box">
                    <?php if (isset($detail['post_category_id'])): ?>
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash() ?>" id="csrf" />
                        <div class="box-header">
                            <ul class="nav nav-tabs" role="tablist" id="nav-product">
                                <li role="presentation" class="<?php echo ($this->uri->segment(5) == '' && !isset($_GET['active']))? 'active' : '' ?>"><a href="#blog" class="btn btn-primary" aria-controls="tour" role="tab" data-toggle="tab">Bài viết</a></li>
                                <li role="presentation" class="<?php echo ($this->uri->segment(5) != '' || isset($_GET['active']))? 'active' : '' ?>" id="btn-active-comment"><a href="#comment" class="btn btn-primary" aria-controls="comment" role="tab" data-toggle="tab">Bình luận</a></li>
                            </ul>
                            <h3 class="box-title">Chi tiết</h3>
                        </div>
                    <?php endif ?>
                    <!-- /.box-header -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade <?php echo ($this->uri->segment(5) == '' && !isset($_GET['active']))? 'in active' : '' ?>" id="blog">
                                <!-- /.box-header -->
                            <div class="box-body">
                                <div class="row">
                                    <div class="detail-image col-md-6">
                                        <label>Hình ảnh</label>
                                        <div class="row">
                                            <div class="item col-md-12">
                                                <div class="mask-lg">
                                                    <img src="<?php echo base_url('assets/upload/'.$controller.'/'. $detail['image'] ) ?>" alt="Image Detail" width=300px>
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
                                                    <th>Trạng thái</th>
                                                    <td>
                                                        <?php echo ($detail['is_activated'] == 0)? '<span class="label label-success">Đang sử dụng</span>' : '<span class="label label-warning">Không sử dụng</span>' ?>   
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
                        <?php if (isset($detail['post_category_id'])): ?>
                            <div role="tabpanel" class="tab-pane fade <?php echo ($this->uri->segment(5) != '' || isset($_GET['active']))? 'in active' : '' ?>" id="comment">
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <table class="table table-hover table-bordered table-condensed">
                                                <tbody>
                                                    <tr>
                                                        <td style="width: 150px"><b><a href="#">Email</a></b></td>
                                                        <td style="width: 100px"><b><a href="#">Họ tên</a></b></td>
                                                        <td><b><a href="#">Nội dung</a></b></td>
                                                        <td style="width: 100px"><b>Operations</b></td>
                                                    </tr>
                                                    <?php foreach ($comments as $key => $value): ?>
                                                        <tr class="remove_<?php echo $value['id'] ?>">
                                                            <td><?php echo $value['email'] ?></td>
                                                            <td><?php echo $value['name'] ?></td>
                                                            <td><?php echo $value['content'] ?></td>
                                                            <td>
                                                                <form class="form_ajax">
                                                                    <a href="javascript:void(0)" title="Xóa" class="btn-removes" data-id="<?php echo $value['id'] ?>" data-controller="comment" data-type="<?php echo $value['type'] ?>">
                                                                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                                    </a>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach ?>
                                                </tbody>
                                            </table>
                                            <div class="col-md-6 col-md-offset-5 page">
                                                <?php echo $page_links ?>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                    
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3">
                <div class="box box-warning">
                    <div class="box-header">
                        <h3 class="box-title">Chỉnh sửa 
                            <?php 
                                switch ($controller) {
                                    case 'post_category':
                                        echo "";
                                        break;
                                    case 'post':
                                        echo "Bài Viết";
                                        break;
                                    default:
                                        # code...
                                        break;
                                }
                             ?>
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

<script type="text/javascript">
    $('#btn-active-comment').click(function(){
        if(window.location.search != '?active=true'){
            window.location.replace(window.location.href+"?active=true");
        }
    });
</script>