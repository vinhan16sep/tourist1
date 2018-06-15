<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Đặt Tour
            <small>Danh sách Đặt Tour</small>
        </h1>
        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash() ?>" id="csrf" />
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="#"><i class="fa fa-dashboard"></i> Đặt Tour</a></li>
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
                        <h3 class="box-title">
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
                        </h3>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <?php $action = ($this->uri->segment(3) != '') ? $this->uri->segment(3) : 'index' ?>
                            <form action="<?php echo base_url('admin/booking/'. $action) ?>" method="get">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Tìm kiếm ..." name="search" value="">
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
                                        <th>Thời gian</th>
                                        <th>Tour</th>
                                        <th>Xem thêm</th>
                                        <th>Tình trạng</th>
                                        <th>Hủy bỏ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ($booking): ?>
                                        <?php foreach ($booking as $key => $value): ?>
                                        <?php $i = 1 ?>
                                            <tr class="row-status-<?php echo $value['booking_id']; ?>">
                                                <td><?php echo $i++ ?></td>
                                                <td><?php echo $value['first_name']. ' ' .$value['last_name'] ?></td>
                                                <td><?php echo $value['time'] ?></td>
                                                <td><a href="<?php echo base_url('admin/product/detail/' .$value['product_id']) ?>"><?php echo $value['product_title'] ?></a></td>
												<!--
												<td><?php echo $value['address'] ?></td>
												-->
                                                <td><a class="btn btn-primary" role="button" data-toggle="collapse" href="#collapse_<?php echo $value['booking_id']; ?>" aria-expanded="false" aria-controls="collapseExample">
                                                    Chi Tiết
                                                </a></td>
                                                <td>
                                                    <?php if ($value['status'] == 0): ?>
                                                        <span class="label label-warning status-success" data-id="<?php echo $value['booking_id']; ?>" data-controller="booking" style="cursor: pointer;" >Chờ xác nhận</span>
                                                    <?php elseif($value['status'] == 1): ?>
                                                        <span class="label label-success">Đã xác nhận</span>
                                                    <?php else: ?>
                                                        <span class="label label-danger">Đã hủy bỏ</span>
                                                    <?php endif ?>
                                                    
                                                </td>
                                                <td>
                                                    <?php if ($value['status'] == 2): ?>
                                                        <span class="label label-danger status-cancel" data-id="<?php echo $value['booking_id']; ?>" style="pointer-events: none; cursor: pointer;" >Hủy bỏ</span>
                                                    <?php else: ?>
                                                        <span class="label label-danger status-cancel" data-id="<?php echo $value['booking_id']; ?>" style="cursor: pointer;" >Hủy bỏ</span>
                                                    <?php endif ?>
                                                    
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="7">
                                                    <div class="collapse" id="collapse_<?php echo $value['booking_id']; ?>">
                                                        <div class="well">
                                                            <table class="table">
                                                                <tr>
                                                                    <td style="width: 20%"><strong>Số điện thoại : </strong></td>
                                                                    <td><?php echo $value['phone'] ?></td>
                                                                <tr>
                                                                <tr>
                                                                    <td><strong>Email : </strong></td>
                                                                    <td><?php echo $value['email'] ?></td>
                                                                <tr>
                                                                <tr>
                                                                    <td><strong>Số người lớn : </strong></td>
                                                                    <td><?php echo $value['adults'] ?></td>
                                                                <tr>
                                                                    <td><strong>Trẻ em (2 - 11 tuổi) : </strong></td>
                                                                    <td><?php echo $value['children'] ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><strong>Em bé (dưới 2 tuổi) : </strong></td>
                                                                    <td><?php echo $value['infants'] ?></td>
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
                                            Chưa có khách đặt tour
                                        </tr>
                                    <?php endif ?>
                                </tbody>
                                <tfooter>
                                    <tr>
                                        <th>No.</th>
                                        <th>Họ Tên</th>
                                        <th>Thời gian</th>
                                        <th>Tour</th>
                                        <th>Xem thêm</th>
                                        <th>Tình trạng</th>
                                        <th>Hủy bỏ</th>
                                    </tr>
                                </tfooter>
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