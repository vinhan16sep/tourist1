<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Chỉnh Sửa
            <small>Danh sách Chỉnh Sửa</small>
        </h1>
        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash() ?>" id="csrf" />
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="#"><i class="fa fa-dashboard"></i> Chỉnh Sửa</a></li>
            <li class="active">
                <?php
                    switch ($this->uri->segment(3)) {
                        case 'success':
                            echo 'Thành công';
                            break;
                        case 'cancel':
                            echo 'Hủy bỏ';
                            break;
                        default:
                            echo 'Chờ xác nhận';
                            break;
                    }
                ?>
            </li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <form action="<?php echo base_url('admin/customize/index') ?>" method="get">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Tìm kiếm theo tour ..." name="search" value="">
                                    <span class="input-group-btn">
                                        <input type="submit" class="btn btn-block btn-primary" value="Tìm kiếm">
                                    </span>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="table" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Họ Tên</th>
                                        <th>Tên Tour</th>
                                        <th>Tên Ngày</th>
                                        <th>Thời Gian</th>
                                        <th>Xem thêm</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ($booking): ?>
                                        <?php foreach ($booking as $key => $value): ?>
                                        <?php $i = 1 ?>
                                            <tr class="row-status-<?php echo $value['customize_id']; ?>">
                                                <td><?php echo $i++ ?></td>
                                                <td><?php echo $value['first_name']. ' ' .$value['last_name'] ?></td>
                                                <td><?php echo $value['product_title'] ?></td>
                                                <td><?php echo $value['tour_date_title'] ?></td>
                                                <td><?php echo $value['time'] ?></td>

                                                <td><a class="btn btn-primary" role="button" data-toggle="collapse" href="#collapse_<?php echo $value['customize_id']; ?>" aria-expanded="false" aria-controls="collapseExample">
                                                    Chi Tiết
                                                </a></td>
                                                
                                                <td>
                                                    <a href="<?php echo base_url('admin/customize/compare/'. $value['product_id']) ?>" class="dataActionEdit" title="So Sánh"><i class="fa fa-eye" aria-hidden="true"></i> </a>
                                                    <a href="javascript:void(0);" class="dataActionDelete btn-remove" data-controller="blog" data-id="<?php echo $value['id'] ?>" ><i class="fa fa-remove" aria-hidden="true"></i> </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="7">
                                                    <div class="collapse" id="collapse_<?php echo $value['customize_id']; ?>">
                                                        <div class="well">
                                                            <table class="table">
                                                                <tr>
                                                                    <td style="width: 20%"><strong>Email : </strong></td>
                                                                    <td><?php echo $value['email'] ?></td>
                                                                <tr>
                                                                <tr>
                                                                    <td><strong>Số Điện Thoại : </strong></td>
                                                                    <td><?php echo $value['phone'] ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><strong>Số người lớn : </strong></td>
                                                                    <td><?php echo $value['adults'] ?></td>
                                                                <tr>
                                                                    <td><strong>Trẻ em (2 - 11 tuổi) : </strong></td>
                                                                    <td><?php echo $value['children'] ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><strong>Quốc Gia : </strong></td>
                                                                    <td><?php echo $value['country'] ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><strong>Lời Nhắn : </strong></td>
                                                                    <td><?php echo $value['message'] ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><strong>Nội dung: </strong></td>
                                                                    <td><?php echo $value['content'] ?></td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    <?php else: ?>
                                        <tr>
                                            Chưa có khách đặt hàng
                                        </tr>
                                    <?php endif ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No.</th>
                                        <th>Họ Tên</th>
                                        <th>Tên Tour</th>
                                        <th>Tên Ngày</th>
                                        <th>Thời Gian</th>
                                        <th>Xem thêm</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
						<div class="col-md-6 col-md-offset-5 page">
                            <?php echo $page_links ?>
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

<!-- DataTables -->
<script>
    $(function () {
        $('#table').DataTable({
            'paging'      : false,
            'lengthChange': false,
            'searching'   : false,
            'bookinging'    : true,
            'info'        : true,
            'autoWidth'   : false
        })
    })
</script>