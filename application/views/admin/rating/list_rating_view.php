<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Đánh Giá Sản Phẩm
            <small>Danh Sách Đánh Giá Sản Phẩm</small>
        </h1>
        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash() ?>" id="csrf" />
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="#"><i class="fa fa-dashboard"></i> Đặt Tour</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">

                        <h3 class="box-title">Đánh Giá Sản Phẩm</h3>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <form action="<?php echo base_url('admin/rating/index') ?>" method="get">
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
                                        <th>Tour</th>
                                        <th>Đánh Giá</th>
                                        <th>Xem thêm</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ($rating): ?>
                                        <?php foreach ($rating as $key => $value): ?>
                                        <?php $i = 1 ?>
                                            <tr class="remove_<?php echo $value['rating_id']; ?>">
                                                <td><?php echo $i++ ?></td>
                                                <td><?php echo $value['last_name']; ?></td>
                                                <td>
                                                    <a href="<?php echo base_url('admin/product/detail/' .$value['product_id']) ?>"><?php echo $value['product_title'] ?></a>
                                                </td>
                                                <td>
                                                    <div class="rateit" data-rateit-value="<?php echo $value['rating'] ?>"  data-rateit-readonly="true"></div>
                                                </td>
												<!--
												<td><?php echo $value['address'] ?></td>
												-->
                                                <td><a class="btn btn-primary" role="button" data-toggle="collapse" href="#collapse_<?php echo $value['rating_id']; ?>" aria-expanded="false" aria-controls="collapseExample">
                                                    Chi Tiết
                                                </a></td>
                                                <td>
                                                    <a href="javascript:void(0);" class="dataActionDelete btn-remove" data-controller="rating" data-id="<?php echo $value['rating_id'] ?>" ><i class="fa fa-remove" aria-hidden="true"></i> </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="6">
                                                    <div class="collapse" id="collapse_<?php echo $value['rating_id']; ?>">
                                                        <div class="well">
                                                            <table class="table">
                                                                <tr>
                                                                    <td style="width: 20%"><strong>Email : </strong></td>
                                                                    <td><?php echo $value['email']; ?></td>
                                                                <tr>
                                                                <tr>
                                                                    <td style="width: 20%"><strong>Số Điện Thoại : </strong></td>
                                                                    <td><?php echo $value['phone']; ?></td>
                                                                <tr>
                                                                <tr>
                                                                    <td style="width: 20%"><strong>Công Ty / Trường Học : </strong></td>
                                                                    <td><?php echo $value['company']; ?></td>
                                                                <tr>
                                                                <tr>
                                                                    <td style="width: 20%"><strong>Tuổi : </strong></td>
                                                                    <td><?php echo $value['age']; ?></td>
                                                                <tr>
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
                                        <th>Tour</th>
                                        <th>Đánh Giá</th>
                                        <th>Xem thêm</th>
                                        <th>Action</th>
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
<script type="text/javascript">
    $(function () {
       $('#rateit_star111').rateit({min: 1, max: 10, step: 0.5});
       $('#rateit_star111').bind('rated', function (e) {
         var ri = $(this);
         var value = ri.rateit('value');
         var productID = ri.data('productid');
         alert('Bạn đã đánh giá '+value +' sao cho sản phẩm có id là:'+productID );
         //không cho phép đánh giá,sau khi đã đánh giá xong
         ri.rateit('readonly', true);
     });
   });
</script>

<!-- DataTables -->