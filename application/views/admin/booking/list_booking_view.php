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
                            echo 'Đặt tour thành công';
                            break;
                        case 'cancel':
                            echo 'Tour đã hủy bỏ';
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
                                        echo 'Đặt tour thành công';
                                        break;
                                    case 'cancel':
                                        echo 'Tour đã hủy bỏ';
                                        break;
                                    default:
                                        echo 'Chờ xác nhận';
                                        break;
                                }
                            ?>
                        </h3>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <?php $action = ($this->uri->segment(3) != '') ? $this->uri->segment(3) : 'index' ?>
                            <form action="<?php echo base_url('admin/booking/'. $action) ?>" method="get">
                                <div class="input-group col-md-6" style="float: left;border-right: 5px solid white;">
                                  <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                  </div>
                                  <input type="text" value="<?php echo (isset($date))? $date : '';  ?>" class="form-control pull-right" id="reservation" name="date" readonly>
                                </div>

                                <div class="input-group col-md-6" style="float: left;">
                                    <input type="text" value="<?php echo (isset($keywords))? $keywords : '';  ?>" class="form-control" placeholder="Tìm kiếm theo tên hoặc họ khách hàng..." name="search" value="">
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
                                <?php if (!empty($booking)): ?>
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
                                <?php endif ?>
                                <tbody>
                                    <?php if ($booking): ?>
                                        <?php foreach ($booking as $key => $value): ?>
                                        <?php $i = 1 ?>
                                            <tr class="row-status-<?php echo $value['booking_id']; ?>">
                                                <td><?php echo $i++ ?></td>
                                                <td><?php echo $value['first_name']. ' ' .$value['last_name'] ?></td>
                                                <td>
                                                    <?php
                                                        if($value['time'] != "0000-00-00 00:00:00" && $value['time'] != "1970-01-01 08:00:00"){
                                                            $time = explode("-",str_replace(" 00:00:00","",$value['time']));
                                                            if(count($time) == 3){
                                                                echo $time[2]."/".$time[1]."/".$time[0];
                                                            }
                                                        }
                                                    ?>
                                                </td>
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
                                                        <span class="label label-danger status-cancel" data-id="<?php echo $value['booking_id']; ?>"  data-controller="booking" style="pointer-events: none; cursor: pointer;" >Hủy bỏ</span>
                                                    <?php else: ?>
                                                        <span class="label label-danger status-cancel" data-id="<?php echo $value['booking_id']; ?>"  data-controller="booking" style="cursor: pointer;" >Hủy bỏ</span>
                                                    <?php endif ?>
                                                    
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="7">
                                                    <div class="collapse" id="collapse_<?php echo $value['booking_id']; ?>">
                                                        <div class="well">
                                                            <table class="table">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Email</th>
                                                                        <th>Số Điện Thoại</th>
                                                                        <th>Số người lớn</th>
                                                                        <th>Trẻ em (2 - 11 tuổi)</th>
                                                                        <th>Em bé (dưới 2 tuổi)</th>
                                                                        <th>Quốc Gia</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td><?php echo $value['email'] ?></td>
                                                                        <td><?php echo $value['phone'] ?></td>
                                                                        <td><?php echo $value['adults'] ?></td>
                                                                        <td><?php echo $value['children'] ?></td>
                                                                        <td><?php echo $value['infants'] ?></td>
                                                                        <td><?php echo $value['country'] ?></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            <hr>
                                                            <table class="table">
                                                                <tbody>
                                                                    <tr>
                                                                        <th colspan="6">Nội dung: </th>
                                                                        <td><?php echo $value['content'] ?></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    <?php else: ?>
                                        <tr>
                                            <h4><?php echo NO_DATA;?></h4>
                                        </tr>
                                    <?php endif ?>
                                </tbody>

                                <?php if (!empty($booking)): ?>
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
                                <?php endif ?>
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
    $('#reservation').mouseup(function() {
        $('#reservation').daterangepicker({
           format: 'DD/MM/YYYY',
        });
        $(".ranges").css("display","none");
        $(".calendar").mouseover(function(){
           $("#reservation").val($("input[name=daterangepicker_start]").val()+" - "+$("input[name=daterangepicker_end]").val());
           $(".second.right tbody .available").mousedown(function(){
               $(".daterangepicker.dropdown-menu.show-calendar.opensleft").css("display","none");
           });
        });
    });
});
</script>